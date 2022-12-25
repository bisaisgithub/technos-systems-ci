<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // if ($this->session->userdata('id')) {
    //   redirect('private_area');
    // }
    $this->load->library('form_validation');
    $this->load->model('register_model');
  }

  function index()
  {
    // $this->load->view('register');
    $this->form_validation->set_rules('full_name', 'full_name', 'required');
    $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('confirmpassword', 'confirmpassword', 'required|min_length[8]');

    if ($this->form_validation->run() == true) {
      $email = $this->input->post('email');
      $emailExist = $this->register_model->checkEmail($email);
      if ($emailExist > 0) {
        $data['err'] = 'Email Exist';
        print_r($emailExist);
        $this->load->view('register', $data);
      } else {
        $data['err'] = 'Not Email Exist';
        print_r($emailExist);
        $this->load->view('register', $data);
        // $encrypted_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        // $data = array(
        //   'name'  => $this->input->post('full_name'),
        //   'email'  => $this->input->post('email'),
        //   'password' => $encrypted_password
        // );

        // $id = $this->register_model->insert($data);

        // if ($id > 0) {
        // } else {
        //   echo 'insert failed';
        // }
      }
    } else {
      //  $data['err'] = 'Validation Failed';
        // echo $data['err'];
        $this->load->view('register');
    }
  }
}
