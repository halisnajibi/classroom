<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/index');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$password = $this->input->post('password');
		$query = $this->M_auth->login();
		//cek jika user nya ada
		if ($query != null) {
			//cek password
			if (password_verify($password, $query['password'])) {
				//berhasil login
				//cek level akses nya
				$data = [
					'id_user' => $query['id_user'],
					'level' => $query['level']
				];
				$this->session->set_userdata($data);
				if ($query['level'] == 1) {
					//admin
					redirect('admin');
				} else if ($query['level'] == 2) {
					//siswa
					redirect('siswa');
				} else {
					//guru
					redirect('guru');
				}
			} else {
				//password salah & gagal login
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
Wrong Password!
  </div>');
				redirect('auth');
			}
		} else {
			//tidak ada usernya
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  Username is not resgistered !
  </div>');
			redirect('auth');
		}
	}

	public function regestrasi()
	{
		$username = $this->input->post('username');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|numeric|is_unique[user.username]');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/regestrasi');
		} else {
			$this->M_auth->insertreg();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
 Congratulation! your account has been created. Please fill in bio !!
</div>');

			$dataSes = [
				'username' => $username
			];
			$this->session->set_userdata($dataSes);
			redirect('auth/biodata');
		}
	}

	public function biodata()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['kelas'] = $this->M_kelas->getAllClass();
			$this->load->view('auth/biodata', $data);
		} else {
			$this->M_auth->biodata();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			 Congratulation! your personal has been created. Please login !!
			</div>');
			redirect('auth');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata['id_user'];
		$this->session->unset_userdata['level'];
		redirect('auth');
	}
}
