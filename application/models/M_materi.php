<?php

class M_materi extends CI_Model
{
 public function getAllMateri()
 {
  $this->db->select('*');
  $this->db->from('tbl_kelas');
  $this->db->join('tbl_materi', 'tbl_materi.id_kelas = tbl_kelas.id_kelas');
  $query = $this->db->get()->result_array();
  return $query;
 }

 public function getMateriById($id)
 {
  $this->db->select('*');
  $this->db->from('tbl_kelas');
  $this->db->join('tbl_materi', 'tbl_materi.id_kelas = tbl_kelas.id_kelas');
  $this->db->where('id_materi', $id);
  $query = $this->db->get()->row_array();
  return $query;
 }

 public function getMateriByKelas($id)
 {
  return $this->db->get_where('tbl_materi', ['id_kelas' => $id])->result_array();
 }

 public function getUserMateri($id_user)
 {
  $id = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
  $cek = $id['level'];
  if ($cek == 1) {
   return $this->db->get_where('admin', ['id_user' => $id_user])->row_array();
  } else if ($cek == 3) {
   return $this->db->get_where('tbl_guru', ['id_user' => $id_user])->row_array();
  }
 }
}
