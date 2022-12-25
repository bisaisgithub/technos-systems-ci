<?php
class Register_model extends CI_Model
{
 function insert($data)
 {
  $this->db->insert('user', $data);
  return $this->db->insert_id();
 }
 function checkEmail($email)
 {
  $this->db->where('email', $email);
  $query = $this->db->get('user');
  return $query->num_rows();
 }

}
