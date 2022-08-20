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

 public function getSswById($id)
 {
  return $this->db->get_where('tbl_siswa', ['id_user' => $id])->row_array();
 }

 public function insertSiswa()
 {
  $npm = $this->input->post('npm', true);
  $data1 = [
   'username' => htmlspecialchars($npm),
   'password' => password_hash($this->input->post('npm', true), PASSWORD_DEFAULT),
   'level' => 2
  ];
  //bikin akun untuk siswa
  $this->db->insert('user', $data1);
  //ambil data id_user berdasarkan username
  $query_id = $this->db->get_where('user', ['username' => $npm])->row_array();
  $id_user = $query_id['id_user'];
  //inset tabel siswa
  $data2 = [
   'npm' => htmlspecialchars($npm),
   'nama' => htmlspecialchars($this->input->post('nama', true)),
   'email'  => htmlspecialchars($this->input->post('email', true)),
   'tanggal_lahir'  => htmlspecialchars($this->input->post('tanggal_lahir', true)),
   'tempat_lahir'  => htmlspecialchars($this->input->post('tempat_lahir', true)),
   'jk'  => htmlspecialchars($this->input->post('jk', true)),
   'id_kls'  => htmlspecialchars($this->input->post('kelas', true)),
   'foto' => 'default.png',
   'alamat'  => htmlspecialchars($this->input->post('alamat', true)),
   'id_user'  => $id_user,
  ];
  $this->db->insert('tbl_siswa', $data2);
 }


 public function deleteSiswa($id)
 {
  $this->db->delete('tbl_siswa', ['id_user' => $id]);
  $this->db->delete('user', ['id_user' => $id]);
 }


 public function updateSiswa()
 {
  $id = $this->input->post('id_user');
  $data = [
   'id_siswa' => $this->input->post('id_siswa'),
   'npm' => $this->input->post('npm'),
   'nama' => $this->input->post('nama'),
   'email' => $this->input->post('email'),
   'tanggal_lahir' => $this->input->post('tanggal_lahir'),
   'tempat_lahir' => $this->input->post('tempat_lahir'),
   'jk' =>  $this->input->post('jk'),
   'id_kls' => $this->input->post('kelas'),
   'foto ' => $this->input->post('fotosiswa'),
   'alamat' => $this->input->post('alamat'),
   'id_user' => $id
  ];
  $this->db->where('id_user', $id);
  $this->db->update('tbl_siswa', $data);
 }

 public function addKelas()
 {
  $data = [
   'kelas' => $this->input->post('kelas')
  ];
  $this->db->insert('tbl_kelas', $data);
 }

 public function deleteKelas($id)
 {
  $this->db->where('id_kelas', $id);
  $this->db->delete('tbl_kelas');
 }

 public function insertMateri($file = null)
 {
  if ($file != null) {
   $data1 = [
    'judul' => $this->input->post('judul'),
    'isi' => $this->input->post('isi'),
    'file' => $file,
    'id_kelas' => $this->input->post('kelas')
   ];
   $this->db->insert('tbl_materi', $data1);
  } else {
   $data = [
    'judul' => $this->input->post('judul'),
    'isi' => $this->input->post('isi'),
    'file' => 'tidak ada file',
    'id_kelas' => $this->input->post('kelas')
   ];
   $this->db->insert('tbl_materi', $data);
  }
 }

 public function updateMateri($file = null)
 {
  $id = $this->input->post('id_materi');
  if ($file != null) {
   $data1 = [
    'judul' => $this->input->post('judul'),
    'isi' => $this->input->post('isi'),
    'file' => $file,
    'id_kelas' => $this->input->post('kelas')
   ];
   $this->db->where('id_materi', $id);
   $this->db->update('tbl_materi', $data1);
  } else {
   $data = [
    'judul' => $this->input->post('judul'),
    'isi' => $this->input->post('isi'),
    'file' => $this->input->post('file_materi'),
    'id_kelas' => $this->input->post('kelas')
   ];
   $this->db->where('id_materi', $id);
   $this->db->update('tbl_materi', $data);
  }
 }
}
