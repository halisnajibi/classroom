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
 <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/user/icon/hc.png') ?>">
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
         <h4 class="text-center mb-4">Register your account</h4>
         <form action="<?= base_url('auth/regestrasi') ?>">
          <div class="mb-3">
           <label class="mb-1"><strong>Npm</strong></label>
           <input type="text" class="form-control" placeholder="Nomor Pokok Mahasiswa" name="npm">
          </div>
          <div class="mb-3">
           <label class="mb-1"><strong>Name</strong></label>
           <input type="text" class="form-control" placeholder="Nama Lengkap">
          </div>
          <div class="mb-3">
           <label class="form-label">Class</label>
           <select class="default-select  form-control wide">
            <option>--Pilih--</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
           </select>
          </div>
          <div class="mb-3">
           <label class="mb-1"><strong>Phone</strong></label>
           <input type="text" class="form-control" placeholder="Phone">
          </div>
          <div class="mb-3">
           <label class="mb-1"><strong>Email</strong></label>
           <input type="text" class="form-control" placeholder="Email">
          </div>
          <div class="mb-3">
           <label class="mb-1"><strong>Password</strong></label>
           <input type="password" class="form-control" placeholder="Password">
          </div>
          <div class="mb-3">
           <label class="mb-1"><strong>Confirm Password</strong></label>
           <input type="password" class="form-control" placeholder="Password">
          </div>

          <div class="text-center mt-4">
           <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
         </form>
         <div class="new-account mt-3">
          <button type="submit" class="btn btn-secondary btn-block">Log In</button>
         </div>
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