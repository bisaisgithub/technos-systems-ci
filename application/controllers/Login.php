<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('id') || $this->session->userdata('id') != '') {
      redirect('dashboard');
    }
    $this->load->model('login_model');
  }

  function index()
  {
    if ($this->input->post('SignIn')) {
      $email = $this->input->post('email');
      $User = $this->login_model->getUserByEmail($email);
      if ($User->num_rows() ===  1) {
        $inputpassword = $this->input->post('password');
        $row = $User->row();
        // print_r('$row : '. $row->password);
        $password_verify = password_verify($inputpassword, $row->password);
        // print('verify :'. $password_verify);
        if ($password_verify == 1) {
          $this->session->set_userdata('id', $row->id);
          print_r($_POST);
          if ($this->input->post('rememberMe')) {
            setcookie('email', $_POST['email'], (time() + ((365 * 24 * 60 * 60) * 3)));
            setcookie('password', $_POST['password'], (time() + ((365 * 24 * 60 * 60) * 3)));
          } else {
            setcookie('email', $_POST['email'], (time() - (24 * 60 * 60)));
            setcookie('password', $_POST['password'], (time() - (24 * 60 * 60)));
          }
          // redirect('dashboard');
        } else {
          $this->session->set_flashdata('login_err', "Invalid email and or password");
          $this->load->view('login');
        }
      } else {
        $this->session->set_flashdata('login_err', "Invalid email and or password");
        $this->load->view('login');
      }
    } else {
      $this->load->view('login');
    }
  }
}
