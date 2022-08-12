<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
 public function __construct()
 {
  parent::__construct();
  cek_login();
 }
 public function index()
 {
  $session_user = $this->session->userdata('id_user');
  // $data['user'] = $this->M_Siswa->getAll($session_user);
  echo 'halaman siswa' . $session_user;
 }
}
