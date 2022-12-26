<?php
class Dashboard_model extends CI_Model
{

 function checkId($id)
 {
  $this->db->where('id', $id);
  $query = $this->db->get('user');
  return $query;
 }

}