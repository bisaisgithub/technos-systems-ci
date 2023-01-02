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

  public function index()
  {
    if ($this->input->post('SignIn')) {
      $verify = $this->login_model->login();
      if ($verify) {
        $this->session->set_userdata('id', $verify);
        if ($this->input->post('rememberMe')) {
          setcookie('email', $_POST['email'], (time() + ((365 * 24 * 60 * 60) * 3)), '/', 'localhost', false, true);
          setcookie('password', $_POST['password'], (time() + ((365 * 24 * 60 * 60) * 3)),  '/', 'localhost', false, true);
        } else {
          setcookie('email', $_POST['email'], (time() - (24 * 60 * 60)), '/', 'localhost', false, true);
          setcookie('password', $_POST['password'], (time() - (24 * 60 * 60)), '/', 'localhost', false, true);
        }
        redirect('dashboard');
        echo 'login ok';
      } else {
        $this->session->set_flashdata('login_err', "Invalid email and or password");
        $this->load->view('login');
      }
    } else {
      $this->load->view('login');
    }
  }
}
