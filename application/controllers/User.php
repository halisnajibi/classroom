<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
  }
  public function index()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('tanggal_lahir', 'Date of birth', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Address', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $data['user'] = $this->M_admin->getAll($session_user);
      $data['siswa'] = $this->M_siswa->getByUser($session_user);
      $data['level'] =  $this->M_user->getUser($session_user);
      $this->load->view('template/header', $data);
      $this->load->view('user/index', $data);
      $this->load->view('template/footer');
    } else {
      //jika ada file upload
      $foto = $_FILES['foto']['username'];
      if ($foto) {
        $config['upload_path'] = './assets/user/profiel/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']     = '1000';
        $this->load->library('upload', $config);
        //lakukan upload
        if ($this->upload->do_upload('foto')) {
          $foto_lama = $data['siswa']['foto'];
          if ($foto_lama != 'default.png') {
            unlink(FCPATH . 'assets/user/profiel/' . $foto_lama);
          }
          $new_image = $this->upload->data('file_name');
          $this->M_user->update($new_image);
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
' . $this->upload->display_errors()  . '
  </div>');
          redirect('user');
        }
      }
      //insert data
      $this->M_user->update();
    }
  }
}
