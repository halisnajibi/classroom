<?php

class M_siswa extends CI_Model
{
 public function getByUser($id)
 {
  return $this->db->get_where('tbl_siswa', ['id_user' => $id])->row_array();
 }
}
