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
  //jika file tidak ada yg di upload maka data ini digunakan
  $data = [
   'nama' => $this->input->post('nama'),
   'email' => $this->input->post('email'),
   'tanggal_lahir' => $this->input->post('tanggal_lahir'),
   'alamat' => $this->input->post('alamat'),
  ];
  //cek level
  if ($level == 1) {
   //admin
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
  } else if ($level == 2) {
   $this->db->where('id_user', $id);
   $this->db->update('tbl_siswa', $data);
   if ($image != null) {
    $upload_image_siswa = [
     'nama' => $this->input->post('nama'),
     'email' => $this->input->post('email'),
     'tanggal_lahir' => $this->input->post('tanggal_lahir'),
     'foto' => $image,
     'alamat' => $this->input->post('alamat'),
    ];
    $this->db->where('id_user', $id);
    $this->db->update('tbl_siswa', $upload_image_siswa);
   }
  } else {
   $this->db->where('id_user', $id);
   $this->db->update('tbl_guru', $data);
   if ($image != null) {
    $upload_image_guru = [
     'nama' => $this->input->post('nama'),
     'email' => $this->input->post('email'),
     'tanggal_lahir' => $this->input->post('tanggal_lahir'),
     'foto' => $image,
     'alamat' => $this->input->post('alamat'),
    ];
    $this->db->where('id_user', $id);
    $this->db->update('tbl_guru', $upload_image_guru);
   }
  }
 }
}
