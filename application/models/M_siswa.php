<?php

class M_siswa extends CI_Model
{

  public function getAll($id)
  {
    // return $this->db->get_where('admin', ['id_user' => $id])->row_array();
    $this->db->select('*');
    $this->db->from('user');
    $this->db->join('tbl_siswa', 'tbl_siswa.id_user = user.id_user');
    $this->db->where('tbl_siswa.id_user',  $id);
    $query = $this->db->get()->row_array();
    return $query;
  }
  public function getByUser($id)
  {
    return $this->db->get_where('tbl_siswa', ['id_user' => $id])->row_array();
  }
  public function getJumlahS($id)
  {
    return $this->db->get_where('tbl_siswa', ['id_kls' => $id])->result_array();
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
    $this->db->update('tbl_siswa', $data);
    if ($image != null) {
      $upload_image_admin = [
        'nama' => $this->input->post('nama'),
        'email' => $this->input->post('email'),
        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        'foto' => $image,
        'alamat' => $this->input->post('alamat'),
      ];
      $this->db->where('id_user', $id);
      $this->db->update('tbl_siswa', $upload_image_admin);
    }
  }

  public function getAbsen($id_kelas)
  {
    $query = $this->db->query("
  SELECT * FROM `tbl_buku_absen` INNER JOIN tbl_materi ON tbl_buku_absen.id_materi = tbl_materi.id_materi WHERE id_kls=$id_kelas ORDER BY id_buku_absen DESC LIMIT 1;
  ");
    // $this->db->order_by('id_kls', 'DESC');
    // $query = $this->db->get_where('tbl_buku_absen', ['id_kls' => $id_kelas]);
    return $query->row_array();
  }


  public function getAbsenSiswa($id_user)
  {
    $query = $this->db->query("
SELECT * FROM `tbl_siswa_absen` INNER JOIN tbl_buku_absen ON tbl_siswa_absen.id_buku_absen = tbl_buku_absen.id_buku_absen INNER JOIN tbl_materi ON tbl_buku_absen.id_materi = tbl_materi.id_materi WHERE tbl_siswa_absen.id_user=$id_user");
    // $this->db->order_by('id_kls', 'DESC');
    // $query = $this->db->get_where('tbl_buku_absen', ['id_kls' => $id_kelas]);
    return $query->result_array();
  }




  public function insertAbsen()
  {
    $akhir = $this->input->post('waktu');

    $data = [
      'status_absen' => $this->input->post('status'),
      'keterangan' => $this->input->post('keterangan'),
      'waktu_absen' => $this->input->post('waktu_absen'),
      'id_buku_absen' => $this->input->post('id_buku_absen'),
      'id_user' => $this->input->post('id_user')
    ];
    $this->db->insert('tbl_siswa_absen', $data);
  }

  public function getTugas($id_kelas)
  {
    $query = $this->db->query("
  SELECT * FROM `tbl_buku_tugas` WHERE id_kelas=$id_kelas ORDER BY id_buku_tugas DESC LIMIT 1;
  ");
    // $this->db->order_by('id_kls', 'DESC');
    // $query = $this->db->get_where('tbl_buku_absen', ['id_kls' => $id_kelas]);
    return $query->row_array();
  }


  public function getTugasSiswa($id_kelas)
  {
    $query = $this->db->query("
SELECT * FROM `tbl_buku_tugas` WHERE tbl_buku_tugas.id_kelas=$id_kelas ORDER BY id_buku_tugas DESC");
    // $this->db->order_by('id_kls', 'DESC');
    // $query = $this->db->get_where('tbl_buku_absen', ['id_kls' => $id_kelas]);
    return $query->result_array();
  }

  public function tugas($file = null)
  {
    if ($file != null) {
      $upload_image_admin = [
        'waktu_kirim' => $this->input->post('waktu_kirim'),
        'status' => $this->input->post('status'),
        'keterangan' => $this->input->post('keterangan'),
        'file' => $file,
        'id_buku_tugas' => $this->input->post('id_buku_tugas'),
        'id_user' => $this->input->post('id_user'),
      ];
      $this->db->insert('tbl_siswa_tugas', $upload_image_admin);
    } else {
      $data = [
        'waktu_kirim' => $this->input->post('waktu_kirim'),
        'status' => $this->input->post('status'),
        'keterangan' => $this->input->post('keterangan'),
        'file' => $this->input->post('text'),
        'id_buku_tugas' => $this->input->post('id_buku_tugas'),
        'id_user' => $this->input->post('id_user'),
      ];
      $this->db->insert('tbl_siswa_tugas', $data);
    }
  }

  public function komentar()
  {
    $data = [
      'komentar' => $this->input->post('komentar'),
      'nama_user' => $this->input->post('nama_user'),
      'id_materi' => $this->input->post('id_materi')
    ];
    $this->db->insert('tbl_komentar_materi', $data);
  }

  public function komentarTugas()
  {
    $data = [
      'komentar' => $this->input->post('komentar'),
      'nama_user' => $this->input->post('nama_user'),
      'id_buku_tugas' => $this->input->post('id_buku_tugas'),
      'status' => 0
    ];
    $this->db->insert('tbl_komentar_tugas', $data);
  }

  public function tugasKomentarBalas()
  {
    $data = [
      'komentar' => $this->input->post('komentar'),
      'nama_user' => $this->input->post('nama_user'),
      'id_materi' => $this->input->post('id_materi'),
      'status' => $this->input->post('id_kt')
    ];
    $this->db->insert('tbl_komentar_materi', $data);
  }
}
