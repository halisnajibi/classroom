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

 function tgl_indo($tanggal)
 {
  $bulan = array(
   1 =>   'Januari',
   'Februari',
   'Maret',
   'April',
   'Mei',
   'Juni',
   'Juli',
   'Agustus',
   'September',
   'Oktober',
   'November',
   'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
 }
}
