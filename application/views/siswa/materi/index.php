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
         <a href="<?= base_url('') ?>" class="btn btn-secondary">Komentar</a>
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