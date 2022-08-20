<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
  }



  // ADMIN

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

  public function profiel()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('tanggal_lahir', 'Date of birth', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Address', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['user'] = $this->M_admin->getAll($session_user);
      $data['level'] = $session_level;
      $this->load->view('template/header', $data);
      $this->load->view('admin/profiel', $data);
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
          $data['user'] = $this->M_admin->getAll($session_user);
          $foto_lama =   $data['user']['foto'];
          if ($foto_lama != 'default.png') {
            unlink(FCPATH . 'assets/user/profiel/' . $foto_lama);
          }
          $new_image = $this->upload->data('file_name');
          $this->M_admin->update($new_image);
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . $this->upload->display_errors()  . '
            </div>');
          redirect('admin/profiel');
        }
      }
      // insert data
      $this->M_admin->update();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Your Profiel Has been update !
      </div>');
      redirect('admin/profiel');
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
      $data['user'] = $this->M_admin->getAll($session_user);
      $data['level'] = $session_level;
      $this->load->view('template/header', $data);
      $this->load->view('admin/profiel', $data);
      $this->load->view('template/footer');
    } else {
      $pw_lama = $this->input->post('pw-lama');
      $pw_baru = $this->input->post('pw-baru');
      $session_user = $this->session->userdata('id_user');
      $data['user'] = $this->M_admin->getAll($session_user);
      if (!password_verify($pw_lama, $data['user']['password'])) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
Wrong current password !
  </div>');
        redirect('admin/profiel');
      } else {
        //cek pw lama dan baru kd boleh sama
        if ($pw_lama == $pw_baru) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      new password cannot be the same as current password !
        </div>');
          redirect('admin/profiel');
        } else {
          //passwod sudah ok
          $password_hash = password_hash($pw_baru, PASSWORD_DEFAULT);
          $this->db->set('password', $password_hash);
          $this->db->where('id_user', $this->session->userdata('id_user'));
          $this->db->update('user');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      password change!
        </div>');
          redirect('admin/profiel');
        }
      }
    }
  }

  // SISWA

  public function siswa()
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['user'] = $this->M_admin->getAll($session_user);
    $data['siswa'] = $this->M_admin->getAllSiswa();
    $this->load->view('template/header', $data);
    $this->load->view('admin/siswa/siswa-view', $data);
    $this->load->view('template/footer');
  }

  public function siswaAdd()
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['user'] = $this->M_admin->getAll($session_user);
    $data['kelas'] = $this->M_kelas->getAllClass();
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('npm', 'Nomor Pokok Mahasiswa', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|trim');
    $data['siswa'] = $this->M_admin->getAllSiswa();
    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('admin/siswa/siswa-add', $data);
      $this->load->view('template/footer');
    } else {
      //berhasil validasi
      $this->M_admin->insertSiswa();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    New student added !!
        </div>');
      redirect('admin/siswa');
    }
  }

  public function siswaDelete($id)
  {
    $this->M_admin->deleteSiswa($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
     student delete !!
        </div>');
    redirect('admin/siswa');
  }

  public function siswaUpdate($id)
  {

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('npm', 'Nomor Pokok Mahasiswa', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['user'] = $this->M_admin->getAll($session_user);
      $data['level'] = $session_level;
      $data['siswa']  = $this->M_admin->getSswById($id);
      $data['kelas'] = $this->M_kelas->getAllClass();
      $this->load->view('template/header', $data);
      $this->load->view('admin/siswa/siswa-update', $data);
      $this->load->view('template/footer');
    } else {
      $this->M_admin->updateSiswa();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
     student update  !!
        </div>');
      redirect('admin/siswa');
    }
  }

  public function kelas()
  {
    $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['user'] = $this->M_admin->getAll($session_user);
      $data['level'] = $session_level;
      $data['kelas'] = $this->M_kelas->getAllClass();
      $this->load->view('template/header', $data);
      $this->load->view('admin/kelas/kelas-view', $data);
      $this->load->view('template/footer');
    } else {
      $this->M_admin->addKelas();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  class add !!
        </div>');
      redirect('admin/kelas');
    }
  }

  public function kelasUpdate($id)
  {
    $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['user'] = $this->M_admin->getAll($session_user);
      $data['level'] = $session_level;
      $data['kelas'] = $this->M_kelas->getAllClass();
      $this->load->view('template/header', $data);
      $this->load->view('admin/kelas/kelas-view', $data);
      $this->load->view('template/footer');
    } else {
      $data = [
        'kelas' => $this->input->post('kelas')
      ];
      $this->db->where('id_kelas', $id);
      $this->db->update('tbl_kelas', $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  class updated !!
        </div>');
      redirect('admin/kelas');
    }
  }

  public function kelasDelete($id)
  {
    $this->M_admin->deleteKelas($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  class deleted !!
        </div>');
    redirect('admin/kelas');
  }



  // DATA TEORI ATAU MATERI AJAR
  public function teori()
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['user'] = $this->M_admin->getAll($session_user);
    $data['level'] = $session_level;
    $data['materi'] = $this->M_materi->getAllMateri();
    $this->load->view('template/header', $data);
    $this->load->view('admin/teori/teori-view', $data);
    $this->load->view('template/footer');
  }

  public function materiAdd()
  {
    $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['user'] = $this->M_admin->getAll($session_user);
      $data['level'] = $session_level;
      $data['kelas'] = $this->M_kelas->getAllClass();
      $this->load->view('template/header', $data);
      $this->load->view('admin/teori/teori-add', $data);
      $this->load->view('template/footer');
    } else {
      //jika ada file upload
      $file = $_FILES['file']['name'];
      if ($file) {
        $config['upload_path'] = './assets/user/materi/';
        $config['allowed_types'] = 'pdf|ppt|pptx|docx';
        $config['max_size']     = '5000';
        $this->load->library('upload', $config);
        //lakukan upload
        if ($this->upload->do_upload('file')) {
          $new_file = $this->upload->data('file_name');
          $this->M_admin->insertMateri($new_file);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       materi add!
          </div>');
          redirect('admin/teori/teori-view');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . $this->upload->display_errors()  . '
            </div>');
          redirect('admin/teori/teori-add');
        }
      } else {
        //  pilih tidak ada yg di upload
        $this->M_admin->insertMateri();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       materi add!
          </div>');
        redirect('admin/teori/teori-view');
      }
    }
  }

  public function materiDelete($id)
  {
    $query = $this->db->get_where('tbl_materi', ['id_materi' => $id])->row_array();
    $file = $query['file'];
    $this->db->where('id_materi', $id);
    $this->db->delete('tbl_materi');
    unlink(FCPATH . 'assets/user/materi/' . $file);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
       materi deleted!
          </div>');
    redirect('admin/teori/teori-view');
  }

  public function materiUpdate($id)
  {
    $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['user'] = $this->M_admin->getAll($session_user);
      $data['level'] = $session_level;
      $data['kelas'] = $this->M_kelas->getAllClass();
      $data['materi'] =  $this->M_materi->getMateriById($id);
      $this->load->view('template/header', $data);
      $this->load->view('admin/teori/teori-update', $data);
      $this->load->view('template/footer');
    } else {
      //berhasil validasi

      //cek jika ada file upload
      $file = $_FILES['file']['name'];
      if ($file) {
        $config['upload_path'] = './assets/user/materi/';
        $config['allowed_types'] = 'pdf|ppt|pptx|docx|xlsx';
        $config['max_size']     = '5000';
        $this->load->library('upload', $config);
        //lakukan upload
        if ($this->upload->do_upload('file')) {
          $session_user = $this->session->userdata('id_user');
          $session_level = $this->session->userdata('level');
          $data['user'] = $this->M_admin->getAll($session_user);
          $data['level'] = $session_level;
          $data['materi'] =  $this->M_materi->getMateriById($id);
          $file_lama  = $data['materi']['file'];
          unlink(FCPATH . 'assets/user/materi/' . $file_lama);
          $new_file = $this->upload->data('file_name');
          $this->M_admin->updateMateri($new_file);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       materi updated!
          </div>');
          redirect('admin/teori/teori-view');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . $this->upload->display_errors()  . '
            </div>');
          redirect('admin/teori/teori-update');
        }
      } else {
        //  pilih tidak ada yg di upload
        $this->M_admin->updateMateri();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       materi update!
          </div>');
        redirect('admin/teori/teori-view');
      }
    }
  }

  public function materi_download($nama)
  {
    $this->load->helper('download');
    force_download("assets/user/materi/$nama", NULL);
  }


  // ABSEN
  public function absen()
  {
    $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['user'] = $this->M_admin->getAll($session_user);
      $data['level'] = $session_level;
      $data['kelas'] = $this->M_kelas->getAllClass();
      $data['absen'] = $this->M_absen->getAllAbsen();
      $this->load->view('template/header', $data);
      $this->load->view('admin/absen/absen-view', $data);
      $this->load->view('template/footer');
    } else {
      $this->M_admin->insertAbsen();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       absen add!
          </div>');
      redirect('admin/absen/absen-view');
    }
  }

  public function updateAbsen()
  {

    $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['user'] = $this->M_admin->getAll($session_user);
      $data['level'] = $session_level;
      $data['kelas'] = $this->M_kelas->getAllClass();
      $data['absen'] = $this->M_absen->getAllAbsen();
      $this->load->view('template/header', $data);
      $this->load->view('admin/absen/absen-view', $data);
      $this->load->view('template/footer');
    } else {
      $this->M_admin->updateAbsen();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       absen update!
          </div>');
      redirect('admin/absen/absen-view');
    }
  }

  public function absenDelete($id)
  {
    $this->db->where('id_buku_absen', $id);
    $this->db->delete('tbl_buku_absen');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       absen deletd!
          </div>');
    redirect('admin/absen/absen-view');
  }
}
