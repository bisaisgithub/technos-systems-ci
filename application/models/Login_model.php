<?php
class Login_model extends CI_Model
{

 function login()
 {
  $email = $this->input->post('email');
  $this->db->where('email', $email);
  $query = $this->db->get('user');
  if ($query->num_rows() === 1) {
    $row = $query->row();
    $inputpassword = $this->input->post('password');
    $password_verify = password_verify($inputpassword, $row->password);
    if ($password_verify ==  1) {
      return $row->id;
    } else {
      return FALSE;
    }
  } else {
    return FALSE;
  }
 }
 function verifyPassword(){

 }

}