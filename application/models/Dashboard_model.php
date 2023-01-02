<?php
class Dashboard_model extends CI_Model
{

  public function checkId()
  {
    $id = $this->session->userdata('id');
    $this->db->where('id', $id);
    $query = $this->db->get('user');
    if ($query->num_rows() == 1) {
      $row = $query->row();
      return $row;
    } else {
      return FALSE;
    }

  }

}
