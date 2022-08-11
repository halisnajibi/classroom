<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

 public function index()
 {
  $session_user = $this->session->userdata('id_user');
  $data['user'] = $this->M_admin->getAll($session_user);
  $this->load->view('template/header', $data);
  $this->load->view('admin/index', $data);
  $this->load->view('template/footer');
 }
}
