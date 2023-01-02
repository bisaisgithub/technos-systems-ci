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
      $this->form_validation->set_rules('full_name','Full Name','required');
      $this->form_validation->set_rules('email','Email','required|trim|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
      $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'matches[password]');
      $this->form_validation->set_rules('terms','Terms','required',array('required' => 'You must agree to the %s'));

      if ($this->form_validation->run() == true) {
        $emailExist = $this->register_model->checkEmail();
        if ($emailExist > 0) {
          $this->session->set_flashdata('register_error', 'Email Exist');
          $this->load->view('register');
        } else {
          $id = $this->register_model->insert();
          if ($id > 0) {
            $this->session->set_flashdata('register_success', "Account has been created succesfully. <a href='login'>Login Now!</a>");
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
