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
        <h4 class="card-title">Tambah Data Materi</h4>
       </div>
       <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
         <div class="mb-3 col-md-6">
          <label class="form-label">Kelas</label>
          <select class="default-select  form-control wide" name="kelas">
           <option>--Pilih--</option>
           <?php foreach ($kelas as $k) : ?>
            <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>
           <?php endforeach; ?>
          </select>
         </div>
         <div class="mb-3 mt-3 col-md-6">
          <label class="form-label">Judul</label>
          <input type="text" class="form-control" name="judul" placeholder="judul">
          <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
         </div>
         <label for="textarea">Materi</label>
         <textarea name="isi" id="summernote" class="form-control"></textarea>
         <div class="input-group mt-3">
          <span class="input-group-text">File Materi</span>
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