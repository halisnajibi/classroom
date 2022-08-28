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
    'id_kelas' => $this->input->post('kelas'),
    'id_user' => $this->input->post('id_user')
   ];
   $this->db->insert('tbl_materi', $data1);
  } else {
   $data = [
    'judul' => $this->input->post('judul'),
    'isi' => $this->input->post('isi'),
    'file' => 'tidak ada file',
    'id_kelas' => $this->input->post('kelas'),
    'id_user' => $this->input->post('id_user')
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
    'id_kelas' => $this->input->post('kelas'),
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

 // ASBEN
 public function insertAbsen()
 {
  $id_kls = $this->input->post('kelas');
  $query = $this->db->query("SELECT * FROM tbl_materi WHERE id_kelas = $id_kls ORDER BY id_materi DESC LIMIT 1");
  $ambil = $query->row_array();
  $id_materi = $ambil['id_materi'];


  $data = [
   'tanggal' => $this->input->post('tanggal'),
   'jam_mulai' => $this->input->post('mulai'),
   'jam_akhir' => $this->input->post('akhir'),
   'jam_toleransi' => $this->input->post('toleransi'),
   'id_kls' => $id_kls,
   'id_materi' => $id_materi
  ];

  $this->db->insert('tbl_buku_absen', $data);
 }

 public function updateAbsen()
 {
  $id = $this->input->post('id');
  $data = [
   'tanggal' => $this->input->post('tanggal'),
   'jam_mulai' => $this->input->post('mulai'),
   'jam_akhir' => $this->input->post('akhir'),
   'jam_toleransi' => $this->input->post('toleransi'),
   'id_kls' => $this->input->post('kelas')
  ];
  $this->db->where('id_buku_absen', $id);
  $this->db->update('tbl_buku_absen', $data);
 }

 // Tugas
 public function getAllTugas()
 {
  $this->db->select('*');
  $this->db->from('tbl_kelas');
  $this->db->join('tbl_buku_tugas', 'tbl_buku_tugas.id_kelas = tbl_kelas.id_kelas');
  $query = $this->db->get()->result_array();
  return $query;
 }

 public function getTugasById($id)
 {
  $this->db->select('*');
  $this->db->from('tbl_kelas');
  $this->db->join('tbl_buku_tugas', 'tbl_buku_tugas.id_kelas = tbl_kelas.id_kelas');
  $this->db->where('id_buku_tugas', $id);
  $query = $this->db->get()->row_array();
  return $query;
 }

 public function insertTugas($file = null)
 {
  if ($file != null) {
   $data = [
    'waktu_mulai' => $this->input->post('wm'),
    'waktu_akhir' => $this->input->post('wa'),
    'waktu_toleransi' => $this->input->post('wt'),
    'id_kelas' => $this->input->post('kelas'),
    'judul' => $this->input->post('judul'),
    'penjelasan' => $this->input->post('penjelasan'),
    'file' => $file
   ];
   $this->db->insert('tbl_buku_tugas', $data);
  } else {
   $data = [
    'waktu_mulai' => $this->input->post('wm'),
    'waktu_akhir' => $this->input->post('wa'),
    'waktu_toleransi' => $this->input->post('wt'),
    'id_kelas' => $this->input->post('kelas'),
    'judul' => $this->input->post('judul'),
    'penjelasan' => $this->input->post('penjelasan'),
    'file' => 'tidak ada file'
   ];
   $this->db->insert('tbl_buku_tugas', $data);
  }
 }

 public function deleteTugas($id)
 {
  $this->db->delete('tbl_buku_tugas', ['id_buku_tugas' => $id]);
 }


 public function UpdateTugas($file = null)
 {
  $id = $this->input->post('id_buku_tugas');
  if ($file != null) {
   $data = [
    'waktu_mulai' => $this->input->post('wm'),
    'waktu_akhir' => $this->input->post('wa'),
    'waktu_toleransi' => $this->input->post('wt'),
    'id_kelas' => $this->input->post('kelas'),
    'judul' => $this->input->post('judul'),
    'penjelasan' => $this->input->post('penjelasan'),
    'file' => $file
   ];
   $this->db->where('id_buku_tugas', $id);
   $this->db->update('tbl_buku_tugas', $data);
  } else {
   $data = [
    'waktu_mulai' => $this->input->post('wm'),
    'waktu_akhir' => $this->input->post('wa'),
    'waktu_toleransi' => $this->input->post('wt'),
    'id_kelas' => $this->input->post('kelas'),
    'judul' => $this->input->post('judul'),
    'penjelasan' => $this->input->post('penjelasan'),
    'file' => 'tidak ada file'
   ];
   $this->db->where('id_buku_tugas', $id);
   $this->db->update('tbl_buku_tugas', $data);
  }
 }

 public function insertTugasKomentar()
 {
  $data = [
   'komentar' => $this->input->post('komentar'),
   'id_buku_tugas' => $this->input->post('id_buku_tugas'),
   'nama_user' => $this->input->post('nama_user'),
   'status' => 0
  ];
  $this->db->insert('tbl_komentar_tugas', $data);
 }

 public function insertTugasKomentarBalas()
 {
  $data = [
   'komentar' => $this->input->post('komentar'),
   'id_buku_tugas' => $this->input->post('id_buku_tugas'),
   'nama_user' => $this->input->post('nama_user'),
   'status' => $this->input->post('id_kt')
  ];
  $this->db->insert('tbl_komentar_tugas', $data);
 }


 public function materiKomentar()
 {
  $data = [
   'komentar' => $this->input->post('komentar'),
   'id_materi' => $this->input->post('id_materi'),
   'nama_user' => $this->input->post('nama_user'),
   'status' => 0
  ];
  $this->db->insert('tbl_komentar_materi', $data);
 }

 public function materiKomentarBalas()
 {
  $data = [
   'komentar' => $this->input->post('komentar'),
   'id_materi' => $this->input->post('id_materi'),
   'nama_user' => $this->input->post('nama_user'),
   'status' => $this->input->post('id_km')
  ];
  $this->db->insert('tbl_komentar_materi', $data);
 }
}
