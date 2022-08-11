<?php

class M_admin extends CI_Model
{
 public function getAll($id)
 {
  return $this->db->get_where('admin', ['id_user' => $id])->row_array();
 }
}
