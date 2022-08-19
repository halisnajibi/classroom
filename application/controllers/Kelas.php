<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
 public function __construct()
 {
  parent::__construct();
  cek_login();
 }
 public function index()
 {
  $session_user = $this->session->userdata('id_user');
  $session_level = $this->session->userdata('level');
  $data['user'] = $this->M_admin->getAll($session_user);
  $data['level'] = $session_level;
  $this->load->view('template/header', $data);
  $this->load->view('admin/index', $data);
  $this->load->view('template/footer');
 }
}
