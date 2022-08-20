<?php

class M_absen extends CI_Model
{
 public function getAllAbsen()
 {
  $this->db->select('*');
  $this->db->from('tbl_kelas');
  $this->db->join('tbl_buku_absen', 'tbl_buku_absen.id_kls = tbl_kelas.id_kelas');
  $query = $this->db->get()->result_array();
  return $query;
 }
}
