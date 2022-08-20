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
  $session_level = $this->session->userdata('level');
  $data['user'] = $this->M_siswa->getAll($session_user);
  $kelas = $data['user']['id_kls'];
  $data['jumlah_siswa'] = $this->M_siswa->getJumlahS($kelas);
  $data['level'] = $session_level;
  $data['kelas'] = $this->M_kelas->getJoinKelas($session_user);
  $this->load->view('template/header', $data);
  $this->load->view('siswa/index', $data);
  $this->load->view('template/footer');
 }

 public function profiel()
 {
  $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
  if ($this->form_validation->run() == false) {
   $session_user = $this->session->userdata('id_user');
   $session_level = $this->session->userdata('level');
   $data['user'] = $this->M_siswa->getAll($session_user);
   $kelas = $data['user']['id_kls'];
   $data['jumlah_siswa'] = $this->M_siswa->getJumlahS($kelas);
   $data['level'] = $session_level;
   $data['kelas'] = $this->M_kelas->getJoinKelas($session_user);
   $this->load->view('template/header', $data);
   $this->load->view('siswa/profiel', $data);
   $this->load->view('template/footer');
  } else {
   //jika ada file upload
   $foto = $_FILES['foto']['name'];
   if ($foto) {
    $config['upload_path'] = './assets/user/profiel/';
    $config['allowed_types'] = 'jpeg|jpg|png';
    $config['max_size']     = '1000';
    $this->load->library('upload', $config);
    //lakukan upload
    if ($this->upload->do_upload('foto')) {
     $session_user = $this->session->userdata('id_user');
     $session_level = $this->session->userdata('level');
     $data['user'] = $this->M_siswa->getAll($session_user);
     $foto_lama =   $data['user']['foto'];
     if ($foto_lama != 'default.png') {
      unlink(FCPATH . 'assets/user/profiel/' . $foto_lama);
     }
     $new_image = $this->upload->data('file_name');
     $this->M_siswa->update($new_image);
    } else {
     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . $this->upload->display_errors()  . '
            </div>');
     redirect('siswa/profiel');
    }
   }
   // insert data
   $this->M_siswa->update();
   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Your Profiel Has been update !
      </div>');
   redirect('siswa/profiel');
  }
 }


 public function password()
 {
  $this->form_validation->set_rules('pw-lama', 'Previous Password', 'required|trim');
  $this->form_validation->set_rules('pw-baru', 'New Password', 'required|trim|min_length[3]|matches[pw-confirm]');
  $this->form_validation->set_rules('pw-confirm', 'Confirm New Password', 'required|trim|min_length[3]|matches[pw-baru]');
  if ($this->form_validation->run() == false) {
   $session_user = $this->session->userdata('id_user');
   $session_level = $this->session->userdata('level');
   $data['user'] = $this->M_siswa->getAll($session_user);
   $data['level'] = $session_level;
   $this->load->view('template/header', $data);
   $this->load->view('siswa/profiel', $data);
   $this->load->view('template/footer');
  } else {
   $pw_lama = $this->input->post('pw-lama');
   $pw_baru = $this->input->post('pw-baru');
   $session_user = $this->session->userdata('id_user');
   $data['user'] = $this->M_siswa->getAll($session_user);
   if (!password_verify($pw_lama, $data['user']['password'])) {
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
Wrong current password !
  </div>');
    redirect('siswa/profiel');
   } else {
    //cek pw lama dan baru kd boleh sama
    if ($pw_lama == $pw_baru) {
     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      new password cannot be the same as current password !
        </div>');
     redirect('siswa/profiel');
    } else {
     //passwod sudah ok
     $password_hash = password_hash($pw_baru, PASSWORD_DEFAULT);
     $this->db->set('password', $password_hash);
     $this->db->where('id_user', $this->session->userdata('id_user'));
     $this->db->update('user');
     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      password change!
        </div>');
     redirect('siswa/profiel');
    }
   }
  }
 }
}
