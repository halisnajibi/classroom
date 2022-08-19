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
        <h4 class="card-title">Add Data Student</h4>
       </div>
       <div class="card-body">
        <form action="<?= base_url('admin/siswaAdd') ?>" method="post" enctype="multipart/form-data">
         <div class="mb-3 col-md-6">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" placeholder="Nama">
          <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
         </div>
         <div class="mb-3 col-md-6">
          <label class="form-label">Nomor Pokok Mahasiswa</label>
          <input type="text" class="form-control" name="npm" placeholder="Nomor Pokok Mahasiswa">
          <?= form_error('npm', '<small class="text-danger pl-3">', '</small>'); ?>
         </div>
         <div class="mb-3">
          <label class="form-label">Jenis Kelamin</label>
          <select class="default-select  form-control wide" name="jk">
           <option>--Pilih--</option>
           <option value="laki-laki">Laki-Laki</option>
           <option value="perempuan">Perempuan</option>
          </select>
         </div>
         <div class="mb-3 col-md-6">
          <label class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" name="tanggal_lahir">
          <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
         </div>
         <div class="mb-3 col-md-6">
          <label class="form-label">Tempat Lahir</label>
          <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
          <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
         </div>
         <div class="mb-3 col-md-6">
          <label class="form-label">Email</label>
          <input type="text" class="form-control" name="email" placeholder="Email">
          <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
         </div>
         <div class="mb-3">
          <label class="form-label">Kelas</label>
          <select class="default-select  form-control wide" name="kelas">
           <option>--Pilih--</option>
           <?php foreach ($kelas as $k) : ?>
            <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>
           <?php endforeach; ?>
          </select>
         </div>
         <label for="textarea">Alamat</label>
         <textarea name="alamat" id="textarea" cols="30" rows="5" class="form-control bg-transparent" placeholder="Alamat"></textarea>
         <button type="submit" name="simpan" class="btn btn-primary mt-3">Simpan</button>
        </form>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>