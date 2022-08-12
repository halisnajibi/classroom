<?php

class M_user extends CI_Model
{

 public function getUser($id)
 {
  return $this->db->get_where('user', ['id_user' => $id])->row_array();
 }

 public function update($image = null)
 {
  $id = $this->input->post('id_user');
  $level
   = $this->input->post('level');
  $data = [
   'nama' => $this->input->post('nama'),
   'email' => $this->input->post('email'),
   'tanggal_lahir' => $this->input->post('tanggal_lahhir'),
   'alamat' => $this->input->post('alamat'),
  ];
 }
}
