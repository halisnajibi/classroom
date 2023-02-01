   <div class="content-body">
     <!-- row -->
     <div class="container-fluid">
       <div class="row">
         <div class="col-12">
           <div class="card">
             <?= $this->session->flashdata('message'); ?>
             <div class="card-header">
               <h4 class="card-title">Tugas Kelas <?= $kelas['kelas'] ?></h4>
               <button type="" name="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#lihattugas<?= $user['id_user'] ?>">Data Tugas</button>
             </div>
             <?php foreach ($tugasSiswa as $tugas) : ?>
               <div class=" card-body">

                 <div class="media pt-3 pb-3">
                   <div class="media-body">
                     <h5 class="m-b-5"><?= $tugas['judul'] ?></h5>
                     <p class="mb-0 text-danger"><?= $tugas['waktu_mulai'] ?> sd <?= $tugas['waktu_akhir'] ?></p>
                     <hr>
                     <?= $tugas['penjelasan'] ?>
                     <br>
                     <div class="btn-bawah mt-3">
                       <?php if ($tugas['file'] != 'tidak ada file') : ?>
                         <a href="<?= base_url('siswa/tugas_download/' . $tugas['file']) ?>" class="btn btn-primary">Download</a>
                       <?php endif; ?>
                       <?php
                        date_default_timezone_set('Asia/Makassar');
                        $waktu_sekarang =  date('Y-m-d H:i:s');
                        $id_buku_tugas = $tugas['id_buku_tugas'];
                        $id_user = $user['id_user'];
                        $query = $this->db->query("SELECT * FROM `tbl_siswa_tugas` WHERE id_buku_tugas=$id_buku_tugas AND id_user=$id_user");
                        $cek = $this->db->affected_rows($query);
                        ?>
                       <?php
                        if ($cek == 0) : ?>
                         <!-- tampilkan tombol absen -->
                         <button type="" name="" class="btn btn-success btn-add" data-bs-toggle="modal" data-bs-target="#addmodal<?= $tugas['id_buku_tugas'] ?>">Kirim</button>
                         <?php
                          if ($waktu_sekarang > $tugas['waktu_mulai'] && $waktu_sekarang < $tugas['waktu_toleransi']) : ?>

                         <?php endif; ?>
                       <?php else : ?>
                         <!-- hapus tombol absen -->
                       <?php endif;      ?>
                       <a href="<?= base_url('') ?>" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#komentar<?= $tugas['id_buku_tugas'] ?> ">Komentar</a>
                     </div>
                   </div>
                 </div>

                 <hr>
               </div>

             <?php endforeach; ?>
           </div>

         </div>
       </div>
     </div>
   </div>

   <!-- modal add tugas -->
   <?php foreach ($tugasSiswa as $tugas) :
      var_dump($tugas['id_buku_tugas']);
    ?>
     <div class="modal fade" id="addmodal<?= $tugas['id_buku_tugas'] ?>">
       <div class="modal-dialog modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Kirim Tugas</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
           </div>
           <div class="modal-body">

             <?php
              date_default_timezone_set('Asia/Makassar');
              $waktu_kirim =  date('Y-m-d H:i:s');
              $waktu_akhir = $tugas['waktu_akhir'];
              if (strtotime($waktu_kirim)  > strtotime($waktu_akhir)) {
                $cek = 'telat';

                //menghitung selisih dengan hasil detik
                $diff    = strtotime($waktu_kirim)  - strtotime($waktu_akhir);

                //membagi detik menjadi jam
                $jam    = floor($diff / (60 * 60));

                //membagi sisa detik setelah dikurangi $jam menjadi menit
                $menit    = $diff - $jam * (60 * 60);
                if ($jam == 0) {
                  $cek = 'telat ' . floor($menit / 60) . 'menit';
                } else {
                  $cek = 'telat ' . $jam . 'jam' . floor($menit / 60)  .  'menit';
                }
              } else {
                $cek = 'sukses';
              }
              ?>
             <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="status" value="terkirim">
               <input type="hidden" name="keterangan" value="<?= $cek ?>">
               <input type="hidden" name="waktu_kirim" value="<?= $waktu_kirim ?>">
               <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
               <input type="hidden" name="id_buku_tugas" value="<?= $tugas['id_buku_tugas'] ?>">
               <?php if ($tugas['file'] != 'tidak ada file') : ?>
                 <label class="form-label">File</label>
                 <input type="file" class="form-control" name="file_tugas">
                 <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
               <?php else : ?>
                 <label for="textarea">Jawaban</label>
                 <textarea name="text" id="summernote" class="form-control"></textarea>
                 <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
               <?php endif; ?>

           </div>
           <div class="modal-footer">
             <button type="submit" class="btn btn-success">Kirim</button>
             </form>

           </div>
         </div>
       </div>
     </div>
   <?php endforeach; ?>

   <!-- modal lihat tgas -->
   <div class="modal fade" id="lihattugas<?= $user['id_user'] ?>">
     <div class="modal-dialog modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title">Data Tugas</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>
         <div class="modal-body">
           <?php
            $id = $user['id_user'];
            $query = $this->db->query("SELECT * FROM tbl_siswa_tugas INNER JOIN tbl_buku_tugas ON tbl_siswa_tugas.id_buku_tugas = tbl_buku_tugas.id_buku_tugas WHERE id_user=$id")->result_array();
            ?>
           <div class="table-responsive">
             <table id="example3" class="display" style="min-width: 845px">
               <thead>
                 <tr>
                   <th>#</th>
                   <th>Judul Tugas</th>
                   <th>Waktu Kirim</th>
                   <th>Status</th>
                   <th>Keterangan</th>

                 </tr>
               </thead>
               <tbody>
                 <?php $i = 1; ?>
                 <?php foreach ($query as $a) : ?>
                   <tr>
                     <td><?= $i++; ?></td>
                     <td><?= $a['judul'] ?></td>
                     <td><?= $a['waktu_kirim'] ?></td>
                     <td><?= $a['status'] ?></td>
                     <?php if ($a['keterangan'] == 'sukses') : ?>
                       <td class="text-success"><?= $a['keterangan'] ?></td>
                     <?php else : ?>
                       <td class="text-danger"><?= $a['keterangan'] ?></td>
                     <?php endif; ?>

                   </tr>
                 <?php endforeach; ?>
               </tbody>
             </table>
           </div>
         </div>
         <div class="modal-footer">
           <button type="submit" class="btn btn-success">Kirim</button>
           </form>

         </div>
       </div>
     </div>
   </div>

   <!-- komentar -->
   <?php foreach ($tugasSiswa as $t) : ?>
     <div class="modal fade" id="komentar<?= $t['id_buku_tugas'] ?>">
       <div class="modal-dialog modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Komentar</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
           </div>
           <div class="modal-body">
             <?php
              $id_bt = $t['id_buku_tugas'];
              $queryS = $this->db->query(
                "SELECT * FROM tbl_komentar_tugas WHERE status='0' AND id_buku_tugas=$id_bt"
              )->result_array();
              ?>
             <?php foreach ($queryS as $kt) : ?>
               <div class="komentar d-flex justify-content-between">
                 <p><?= $kt['nama_user'] ?></p>
                 <p><?= $kt['tanggal_waktu'] ?></p>
               </div>
               <h6><?= $kt['komentar'] ?></h6>
               <span class="badge rounded-pill bg-primary" data-bs-toggle="modal" data-bs-target="#balaskomentar<?= $kt['id_kt'] ?>">Balas</span>
               <hr>
               <!-- balasan koemntar -->
               <?php

                $id_komen = $kt['id_kt'];
                $query_bls = $this->db->query("SELECT * FROM tbl_komentar_tugas WHERE status=$id_komen AND id_buku_tugas=$id_bt")->result_array();
                foreach ($query_bls as $balasan) :
                ?>
                 <div class="ms-5">
                   <div class="balas-komentar d-flex justify-content-between">
                     <p><?= $balasan['nama_user'] ?></p>
                     <p><?= $balasan['tanggal_waktu'] ?></p>
                   </div>
                   <p><?= $balasan['komentar'] ?></p>
                   <hr>
                 </div>

               <?php endforeach; ?>
               <!-- end -->
               <!-- modal balas komentar -->
               <div class="modal fade modal-balas" id="balaskomentar<?= $kt['id_kt'] ?>">
                 <div class="modal-dialog modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Balas Komentar</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                     </div>
                     <div class="modal-body">
                       <form action="<?= base_url('siswa/tugasKomentarBalas') ?>" method="post">
                         <div class="d-flex">
                           <input type="hidden" name="id_kt" value="<?= $kt['id_kt'] ?>">
                           <input type="hidden" name="nama_user" value="<?= $user['nama'] ?>">
                           <input type="hidden" name="id_buku_tugas" value="<?= $t['id_buku_tugas'] ?>">
                         </div>
                     </div>
                     <div class="modal-footer">

                       <textarea name="komentar" class="form-control" placeholder="Balasan Komentar"></textarea>
                       <?= form_error('komentar', '<small class="text-danger pl-3">', '</small>'); ?>
                       <button type="submit" class="btn btn-secondary">Kirim</button>
                       </form>
                     </div>
                   </div>
                 </div>
               </div>


             <?php endforeach; ?>
             <form action="<?= base_url('siswa/tugasKomentar') ?>" method="post">
               <input type="hidden" name="nama_user" value="<?= $user['nama'] ?>">
               <input type="hidden" name="id_buku_tugas" value="<?= $t['id_buku_tugas'] ?>">
           </div>
           <div class="modal-footer">
             <textarea name="komentar" class="form-control" placeholder="Tulis Komentar"></textarea>
             <?= form_error('komentar', '<small class="text-danger pl-3">', '</small>'); ?>
             <button type="submit" class="btn btn-secondary">Kirim</button>
             </form>
           </div>
         </div>
       </div>
     </div>
   <?php endforeach; ?>