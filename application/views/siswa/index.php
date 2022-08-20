<div class="content-body">
 <!-- row -->
 <div class="container-fluid">
  <div class="row">
   <div class="col-xl-12">
    <div class="row">
     <div class="col-xl-6">
      <div class="row">
       <div class="col-xl-12">
        <div class="card tryal-gradient">
         <div class="card-body tryal row">
          <div class="col-xl-7 col-sm-6">
           <h2>Welcome to classroom</h2>
           <span><?= $user['nama'] ?></span>
          </div>
         </div>
        </div>
       </div>
       <div class="col-xl-12">
        <div class="widget-stat card bg-danger">
         <div class="card-body  p-4">
          <div class="media">
           <span class="me-3">
            <i class="la la-users"></i>
           </span>
           <div class="media-body text-white text-end">
            <p class="mb-1">Siswa Kelas <?= $kelas['kelas'] ?></p>
            <h3 class="text-white">76</h3>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>

     </div>
     <div class="col-xl-6">
      <div class="row">
       <div class="col-xl-12">
        <div class="row">
         <div class="col-xl-12">
          <div class="widget-stat card bg-primary">
           <div class="card-body  p-4">
            <div class="media">
             <span class="me-3">
              <i class="fa-solid fa-fingerprint"></i>
             </span>
             <div class="media-body text-white text-end">
              <p class="mb-1">Absen</p>
              <h3 class="text-white">76/16</h3>
             </div>
            </div>
           </div>
          </div>
         </div>
        </div>
        <div class="row">
         <div class="col-xl-12">
          <div class="widget-stat card bg-secondary">
           <div class="card-body  p-4">
            <div class="media">
             <span class="me-3">
              <i class="fa-solid fa-file-pen"></i>
             </span>
             <div class="media-body text-white text-end">
              <p class="mb-1">Tugas</p>
              <h3 class="text-white">76</h3>
             </div>
            </div>
           </div>
          </div>
         </div>
        </div>

       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="row">
   <div class="col-12">
    <div class="card">
     <div class="card-header">
      <h4 class="card-title">Data Siswa Kelas <?= $kelas['kelas'] ?></h4>
     </div>
     <div class="card-body">
      <?= $this->session->flashdata('message') ?>
      <div class="table-responsive">
       <table id="example3" class="display" style="min-width: 845px">
        <thead>
         <tr>
          <th>Foto</th>
          <th>Npm</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
         </tr>
        </thead>
        <tbody>
         <?php $i = 1; ?>
         <?php foreach ($jumlah_siswa as $s) : ?>
          <tr>

           <td>
            <img src="<?= base_url('assets/user/profiel/' . $s['foto']) ?>" alt="" width="40" class="img-circle">
           </td>
           <td><?= $s['npm'] ?></td>
           <td><?= $s['nama'] ?></td>
           <td><?= $s['jk'] ?></td>
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