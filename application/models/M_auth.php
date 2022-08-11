<?php

class M_auth extends CI_Model
{
 public function login()
 {
  $username = $this->input->post('username');
  $password = $this->input->post('password');
  return $this->db->get_where('user', ['username' => $username])->row_array();
 }

 public function insertreg()
 {
  //insert tabel user
  $username = $this->input->post('username');
  $data1 = [
   'username' => $username,
   'password' =>  password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
   'level' => $this->input->post('level'),
  ];
  $this->db->insert('user', $data1);
  //insert tabel siswa
  $rowUser = $this->db->get_where('user', ['username' => $username])->row_array();
  $id_user = $rowUser['id_user'];
  $data2 = [
   'npm' => $username,
   'nama' => '',
   'email' => '',
   'tanggal_lahir' => '',
   'tempat_lahir' => '',
   'jk' => '',
   'id_kls' => 1,
   'foto' => 'default.png',
   'alamat' => '',
   'id_user' => $id_user
  ];
  $this->db->insert('tbl_siswa', $data2);
 }

 public function biodata()
 {
  $npm = $this->input->post('npm');
  $data = [
   'npm' => $npm,
   'nama' => $this->input->post('nama'),
   'email' => $this->input->post('email'),
   'tanggal_lahir' => $this->input->post('tanggal_lahir'),
   'tempat_lahir' => $this->input->post('tempat_lahir'),
   'jk' => $this->input->post('jk'),
   'id_kls' => $this->input->post('kelas'),
   'foto' => 'default.png',
   'alamat' => ''
  ];
  $this->db->where('npm', $npm);
  $this->db->update('tbl_siswa', $data);
 }
}
