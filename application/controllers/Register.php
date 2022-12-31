<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('id') || $this->session->userdata('id') != '') {
      redirect('dashboard');
    }
    $this->load->library('form_validation');
    $this->load->model('register_model');
  }

  function index()
  {
    // $this->load->view('register');
    if ($this->input->post('register')) {
      $this->form_validation->set_rules('full_name', 'full_name', 'required');
      $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
      $this->form_validation->set_rules('password', 'password', 'required|min_length[8]');

      if ($this->form_validation->run() == true) {
        $email = $this->input->post('email');
        $emailExist = $this->register_model->checkEmail($email);
        if ($emailExist > 0) {
          $this->session->set_flashdata('register_error', 'Email Exist');
          $this->load->view('register');
        } else {

          $encrypted_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
          $data = array(
            'full_name'  => $this->input->post('full_name'),
            'email'  => $this->input->post('email'),
            'password' => $encrypted_password
          );

          $id = $this->register_model->insert($data);

          if ($id > 0) {
            $this->session->set_flashdata('register_success', "Account has been created succesfully. <a href='login.php'>Login Now!</a>");
            $this->load->view('register');
          } else {
            $this->session->set_flashdata('register_error', "Creating account failed, please try again later");
            $this->load->view('register');
          }
        }
      } else {
        $this->session->set_flashdata('register_error', "User input/s validation failed, please try again");
        $this->load->view('register');
      }
    }else{
      $this->load->view('register');
    }
  }
}
