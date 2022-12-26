<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // if ($this->session->userdata('id')) {
    //   redirect('private_area');
    // }
    $this->load->model('login_model');
  }

  function index()
  {
      $this->load->view('login');
  }
  function login(){
    $email = $this->input->post('email');
    $emailExist = $this->register_model->checkEmail($email);

    if ($emailExist > 0) {

      $encrypted_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $data = array(
        'full_name'  => $this->input->post('full_name'),
        'email'  => $this->input->post('email'),
        'password' => $encrypted_password
      );

      $id = $this->register_model->insert($data);

      if ($id > 0) {
        $this->session->set_userdata('msg', "Account has been created succesfully. <a href='login.php'>Login Now!</a>");
        $this->load->view('register');
      } else {
        $this->session->set_userdata('err', "Creating account failed, please try again later");
        $this->load->view('register');
      }

      

    } else {
      $this->session->set_userdata('err', 'Invalid email and or password');
      $this->load->view('login');
    }
  }
}
