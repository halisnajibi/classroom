  <div class="content-body">
   <div class="container-fluid">

    <div class="row page-titles">
     <ol class="breadcrumb">
      <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= ucfirst($this->uri->segment(1)) ?></a></li>
      <li class="breadcrumb-item"><a href="javascript:void(0)"><?= ucfirst($this->uri->segment(2)) ?></a></li>
     </ol>
    </div>
    <!-- row -->

    <div class="row">
     <div class="col-12">
      <div class="card">
       <div class="card-header">
        <h4 class="card-title">Update Data Tugas</h4>
       </div>
       <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
         <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
         <input type="hidden" name="id_buku_tugas" value="<?= $tugas['id_buku_tugas'] ?>">
         <div class="mb-3 col-md-6">
          <label class="form-label">Kelas</label>
          <select class="default-select  form-control wide" name="kelas">
           <option>--Pilih--</option>
           <?php foreach ($kelas as $k) : ?>
            <?php if ($k['id_kelas'] == $tugas['id_kelas']) : ?>
             <option value="<?= $k['id_kelas'] ?>" selected><?= $k['kelas'] ?></option>
            <?php else : ?>
             <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>
            <?php endif ?>
           <?php endforeach; ?>
          </select>
         </div>
         <div class="mb-3 mt-3 col-md-6">
          <label class="form-label">Judul Tugas</label>
          <input type="text" class="form-control" name="judul" value="<?= $tugas['judul'] ?>">
          <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
         </div>
         <div class="mb-3 mt-3 col-md-6">
          <label class="form-label">Waktu Mulai</label>
          <input type="datetime-local" class="form-control" name="wm" value="<?= $tugas['waktu_mulai'] ?>">
          <?= form_error('wm', '<small class="text-danger pl-3">', '</small>'); ?>
         </div>
         <div class="mb-3 mt-3 col-md-6">
          <label class="form-label">Waktu Akhir</label>
          <input type="datetime-local" class="form-control" name="wa" value="<?= $tugas['waktu_akhir'] ?>">
          <?= form_error('wa', '<small class="text-danger pl-3">', '</small>'); ?>
         </div>
         <div class="mb-3 mt-3 col-md-6">
          <label class="form-label">Waktu Toleransi</label>
          <input type="datetime-local" class="form-control" name="wt" value="<?= $tugas['waktu_toleransi'] ?>">
          <?= form_error('wt', '<small class="text-danger pl-3">', '</small>'); ?>
         </div>
         <label for="textarea">Penjelasan</label>
         <textarea name="penjelasan" id="summernote" class="form-control"><?= $tugas['penjelasan'] ?></textarea>
         <div class="input-group mt-3">
          <span class="input-group-text">File Tugas</span>
          <div class="form-file">
           <input type="file" class="form-file-input form-control" name="file">
           <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
         </div>
         <button type="submit" name="simpan" class="btn btn-primary mt-3">Simpan</button>
        </form>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>