<?php

class M_kelas extends CI_Model
{
 public function getAllClass()
 {
  return $this->db->get('tbl_kelas')->result_array();
 }
}
