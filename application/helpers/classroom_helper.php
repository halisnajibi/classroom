<?php

function cek_login()
{
 $ci = get_instance();
 $id_user = $ci->session->userdata('id_user');
 //cek login atau belum
 if (!$ci->session->userdata('id_user')) {
  redirect('auth');
 } else {
  //cek yg login level nya siapa
  // $menu = $ci->uri->segment(1);
  // $ci->db->get_where('user', ['id_user' => $id_user])->row_array();
 }
}
