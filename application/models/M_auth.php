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
   'username' => htmlspecialchars($username, true),
   'password' =>  password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
   'level' => htmlspecialchars($this->input->post('level'), true)
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
   'nama' => htmlspecialchars($this->input->post('nama', true)),
   'email' => htmlspecialchars($this->input->post('email', true)),
   'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
   'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
   'jk' => htmlspecialchars($this->input->post('jk', true)),
   'id_kls' => htmlspecialchars($this->input->post('kelas', true)),
   'foto' => 'default.png',
   'alamat' => ''
  ];
  $this->db->where('npm', $npm);
  $this->db->update('tbl_siswa', $data);
 }
}
