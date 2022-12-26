<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

  public function __construct()

  {
    parent::__construct();
    $this->session->sess_destroy();
  }
  function index(){
    redirect('login');
  }
}
