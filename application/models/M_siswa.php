<?php

class M_siswa extends CI_Model
{

 public function getAll($id)
 {
  // return $this->db->get_where('admin', ['id_user' => $id])->row_array();
  $this->db->select('*');
  $this->db->from('user');
  $this->db->join('tbl_siswa', 'tbl_siswa.id_user = user.id_user');
  $this->db->where('tbl_siswa.id_user',  $id);
  $query = $this->db->get()->row_array();
  return $query;
 }
 public function getByUser($id)
 {
  return $this->db->get_where('tbl_siswa', ['id_user' => $id])->row_array();
 }
 public function getJumlahS($id)
 {
  return $this->db->get_where('tbl_siswa', ['id_kls' => $id])->result_array();
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
  $this->db->update('tbl_siswa', $data);
  if ($image != null) {
   $upload_image_admin = [
    'nama' => $this->input->post('nama'),
    'email' => $this->input->post('email'),
    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
    'foto' => $image,
    'alamat' => $this->input->post('alamat'),
   ];
   $this->db->where('id_user', $id);
   $this->db->update('tbl_siswa', $upload_image_admin);
  }
 }
}
