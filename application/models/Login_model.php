<?php
class Login_model extends CI_Model
{

 function checkEmail($email)
 {
  $this->db->where('email', $email);
  $query = $this->db->get('user');
  return $query;
 }

}