<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()

  {
    parent::__construct();
    if (!$this->session->userdata('id') || $this->session->userdata('id') == '') {
      redirect('login');
    }
    $this->load->model('dashboard_model');
  }

  function index(){

    if ($this->input->method(true) === 'GET') {
      $user = $this->dashboard_model->checkId();
      if ($user) {
        $data['full_name'] = $user->full_name;
        $this->load->view('dashboard', $data);
      } else {
        $this->session->sess_destroy();
        redirect('login');
      }
    } else {
      $this->session->sess_destroy();
      redirect('login');
    }

  }
}
