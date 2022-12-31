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
      $id = $this->session->userdata('id');
      $idExist = $this->db
        ->select("*")
        ->from("user")
        ->where("id", $id)
        ->get();
      if ($idExist->num_rows() ===  1) {

        $row = $idExist->row();
        $data['full_name'] = $row->full_name;
        $this->load->view('dashboard', $data);

      } else {

        redirect('login');
      }
    } else {
      redirect('login');
    }

  }
}
