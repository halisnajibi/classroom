<?php

class M_kelas extends CI_Model
{
 public function getAllClass()
 {
  return $this->db->get('tbl_kelas')->result_array();
 }

 public function getJoinKelas($id)
 {
  $this->db->select('*');
  $this->db->from('tbl_kelas');
  $this->db->join('tbl_siswa', 'tbl_siswa.id_kls = tbl_kelas.id_kelas');
  $this->db->where('tbl_siswa.id_user',  $id);
  $query = $this->db->get()->row_array();
  return $query;
 }
}
