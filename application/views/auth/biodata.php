<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="keywords" content="">
 <meta name="author" content="">
 <meta name="robots" content="">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
 <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
 <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
 <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
 <meta name="format-detection" content="telephone=no">

 <!-- PAGE TITLE HERE -->
 <title>Haliz Classroom | Register</title>

 <!-- FAVICONS ICON -->
 <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/template/images/hc.png') ?>">
 <link href="<?= base_url('assets/template/') ?>css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
 <div class="authincation ">
  <div class="container ">
   <div class="row justify-content-center  align-items-center">
    <div class="col-md-6">
     <div class="authincation-content">
      <div class="row no-gutters">
       <div class="col-xl-12">

        <div class="auth-form">
         <div class="text-center mb-3">
          <a href="<?= base_url() ?>"><img src="<?= base_url('assets/template/images/logo.png') ?>" alt="" width="100"></a>
         </div>
         <h4 class="text-center mb-4">Personal</h4>
         <?= $this->session->flashdata('message') ?>
         <form action="<?= base_url('auth/biodata') ?>" method="POST">
          <?php
          $data = $this->session->userdata('username');
          ?>
          <input type="hidden" name="npm" value="<?= $data ?>">
          <div class="mb-3">
           <label class="mb-1"><strong>Nama</strong></label>
           <input type="text" class="form-control" placeholder="Nama" name="nama">
           <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="mb-3">
           <label class="form-label">Jenis Kelamin</label>
           <select class="default-select  form-control wide" name="jk">
            <option>--Pilih--</option>
            <option value="laki-laki">Laki-Laki</option>
            <option value="perempuan">Perempuan</option>
           </select>
          </div>
          <div class="mb-3">
           <label class="mb-1"><strong>Email</strong></label>
           <input type="text" class="form-control" placeholder="example@gamil.com" name="email">
           <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="mb-3">
           <label class="mb-1"><strong>Tanggal Lahir</strong></label>
           <input type="date" class="form-control" name="tanggal_lahir">
           <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="mb-3">
           <label class="mb-1"><strong>Tempat Lahir</strong></label>
           <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir">
           <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
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
          <div class="text-center mt-4">
           <button type="submit" class="btn btn-primary btn-block">Save</button>
          </div>

         </form>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

 <!--**********************************
	Scripts
***********************************-->
 <!-- Required vendors -->
 <script src="<?= base_url('assets/template/') ?> vendor/global/global.min.js"></script>
 <script src="<?= base_url('assets/template/') ?>js/custom.min.js"></script>
 <script src="<?= base_url('assets/template/') ?>js/dlabnav-init.js"></script>
 <script src="<?= base_url('assets/template/') ?>js/styleSwitcher.js"></script>
</body>

</html>