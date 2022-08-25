<div class="content-body">
 <!-- row -->
 <div class="container-fluid">
  <div class="row">
   <div class="col-12">
    <div class="card">

     <div class="card-header">
      <h4 class="card-title">Materi Kelas <?= $kelas['kelas'] ?></h4>
     </div>
     <?php foreach ($materi_kelas as $materi) : ?>
      <div class="card-body">

       <div class="media pt-3 pb-3">
        <img src="<?= base_url('assets/user/profiel/' . $user_post_materi['foto']) ?>" alt="image" class="me-3 rounded" width="40">
        <div class="media-body">
         <h5 class="m-b-5"><?= $user_post_materi['nama'] ?></h5>
         <p class="mb-0 text-muted"><?= $materi['tanggal_waktu'] ?></p>
         <hr>
         <?= $materi['isi'] ?>
         <?php if ($materi['file'] != 'tidak ada file') : ?>
          <a href="<?= base_url('admin/materi_download/' . $materi['file']) ?>" class="btn btn-primary">Download</a>
         <?php endif; ?>
         <button type="" name="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#komentar<?= $materi['id_materi'] ?> ">Komentar</button>
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

<!-- modal komentar -->
<?php foreach ($materi_kelas as $m) : ?>
 <div class="modal fade" id="komentar<?= $m['id_materi'] ?>">
  <div class="modal-dialog modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title">Komentar</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <div class="modal-body">
     <?php
     $id = $m['id_materi'];
     $query = $this->db->query("SELECT * FROM tbl_komentar_materi INNER JOIN tbl_siswa ON tbl_komentar_materi.id_user = tbl_siswa.id_user WHERE id_materi=$id")->result_array();
     ?>
     <?php foreach ($query as $km) : ?>
      <div class="komentar d-flex justify-content-between">
       <p><?= $km['nama'] ?></p>
       <p><?= $km['tanggal_waktu'] ?></p>
      </div>
      <h6><?= $km['komentar'] ?></h6>
      <hr>
     <?php endforeach; ?>
     <form action="" method="post">
      <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
      <input type="hidden" name="id_materi" value="<?= $m['id_materi'] ?>">
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