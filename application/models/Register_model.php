<?php
class Register_model extends CI_Model
{
  public function insert()
  {
    $encrypted_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    $data = array(
      'full_name' => $this->input->post('full_name'),
      'email' => $this->input->post('email'),
      'password' => $encrypted_password,
    );
    $this->db->insert('user', $data);
    return $this->db->insert_id();
  }
  public function checkEmail()
  {
    $email = $this->input->post('email');
    $this->db->where('email', $email);
    $query = $this->db->get('user');
    return $query->num_rows();
  }

}
