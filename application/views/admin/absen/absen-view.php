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
        <h4 class="card-title">Data Absen</h4>
        <a href="" data-bs-toggle="modal" data-bs-target="#addmodal" class="btn btn-primary">Tambah Absen</a>
       </div>
       <div class="card-body">
        <?= $this->session->flashdata('message') ?>
        <div class="table-responsive">
         <table id="example3" class="display" style="min-width: 845px">
          <thead>
           <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Jam Awal</th>
            <th>Jam Akhir</th>
            <th>Kelas</th>
            <th>Action</th>
           </tr>
          </thead>
          <tbody>
           <?php $i = 1; ?>
           <?php foreach ($absen as $a) : ?>
            <tr>
             <td><?= $i++; ?></td>
             <td><?= $a['tanggal'] ?></td>
             <td><?= $a['jam_mulai'] ?></td>
             <td><?= $a['jam_akhir'] ?></td>
             <td><?= $a['kelas'] ?></td>
             <td>
              <div class="d-flex">
               <a href="" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#addupdate<?= $a['id_buku_absen']; ?>"><i class="fas fa-pencil-alt"></i></a>
               <a href="<?= base_url('admin/absenDelete/') . $a['id_buku_absen'] ?>" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('yakin')"><i class="fa fa-trash"></i></a>
              </div>
             </td>
            </tr>
           <?php endforeach; ?>
          </tbody>
         </table>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>

  <!-- modal add -->
  <div class="modal fade" id="addmodal">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header">
      <h5 class="modal-title">Tambah Absen</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal">
      </button>
     </div>
     <div class="modal-body">
      <form action="" method="post">
       <div class="mb-3">
        <label class="form-label">Kelas</label>
        <select class="default-select  form-control wide" name="kelas">
         <option>--Pilih--</option>
         <?php foreach ($kelas as $k) : ?>
          <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>
         <?php endforeach; ?>
        </select>
       </div>
       <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" class="form-control" name="tanggal">
        <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
       </div>
       <div class="mb-3">
        <label class="form-label">Jam Mulai</label>
        <input type="time" class="form-control" name="mulai">
        <?= form_error('mulai', '<small class="text-danger pl-3">', '</small>'); ?>
       </div>
       <div class="mb-3">
        <label class="form-label">Jam Akhir</label>
        <input type="time" class="form-control" name="akhir">
        <?= form_error('akhir', '<small class="text-danger pl-3">', '</small>'); ?>
       </div>

     </div>
     <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      </form>
     </div>
    </div>
   </div>
  </div>


  <!-- modal update -->
  <?php
  foreach ($absen as $a) :
  ?>
   <div class="modal fade" id="addupdate<?= $a['id_buku_absen'] ?>">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title">Tambah Absen</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal">
       </button>
      </div>
      <div class="modal-body">
       <form action="<?= base_url('admin/updateAbsen/') ?>" method="post">
        <input type="hidden" name="id" value="<?= $a['id_buku_absen'] ?>">
        <div class="mb-3">
         <label class="form-label">Kelas</label>
         <select class="default-select  form-control wide" name="kelas">
          <option>--Pilih--</option>
          <?php foreach ($kelas as $k) : ?>
           <?php if ($k['id_kelas'] == $a['id_kls']) : ?>
            <option value="<?= $k['id_kelas'] ?>" selected><?= $k['kelas'] ?></option>
           <?php endif ?>
           <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>
          <?php endforeach; ?>
         </select>
        </div>
        <div class="mb-3">
         <label class="form-label">Tanggal</label>
         <input type="date" class="form-control" name="tanggal" value="<?= $a['tanggal'] ?>">
         <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="mb-3">
         <label class="form-label">Jam Mulai</label>
         <input type="time" class="form-control" name="mulai" value="<?= $a['jam_mulai'] ?>">
         <?= form_error('mulai', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="mb-3">
         <label class="form-label">Jam Akhir</label>
         <input type="time" class="form-control" name="akhir" value="<?= $a['jam_akhir'] ?>">
         <?= form_error('akhir', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary">Save</button>
       </form>
      </div>
     </div>
    </div>
   </div>
  <?php endforeach; ?>