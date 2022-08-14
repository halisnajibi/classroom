<?php

class M_admin extends CI_Model
{
 public function getAll($id)
 {
  // return $this->db->get_where('admin', ['id_user' => $id])->row_array();
  $this->db->select('*');
  $this->db->from('user');
  $this->db->join('admin', 'admin.id_user = user.id_user');
  $this->db->where('admin.id_user',  $id);
  $query = $this->db->get()->row_array();
  return $query;
 }

 public function getByLevel($level)
 {
  return $this->db->get_where('user', ['level' => $level])->row_array();
 }

 public function update($image = null)
 {
  $id = $this->input->post('id_user');
  //jika file tidak ada yg di upload maka data ini digunakan
  $data = [
   'nama' => $this->input->post('nama'),
   'tanggal_lahir' => $this->input->post('tanggal_lahir'),
   'alamat' => $this->input->post('alamat'),
  ];
  $this->db->where('id_user', $id);
  $this->db->update('admin', $data);
  if ($image != null) {
   $upload_image_admin = [
    'nama' => $this->input->post('nama'),
    'email' => $this->input->post('email'),
    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
    'foto' => $image,
    'alamat' => $this->input->post('alamat'),
   ];
   $this->db->where('id_user', $id);
   $this->db->update('admin', $upload_image_admin);
  }
 }

 public function getAllSiswa()
 {
  return $this->db->get('tbl_siswa')->result_array();
 }
}
