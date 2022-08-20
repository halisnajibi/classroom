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
}
