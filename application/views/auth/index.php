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
    <title>Haliz Classroom | Login</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/template/images/hc.png') ?>">
    <link href="<?= base_url('assets/template') ?>/css/style.css" rel="stylesheet">
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="<?= base_url() ?>"><img src="<?= base_url('assets/template/images/logo.png') ?>" alt="" width="100"></a>
                                    </div>
                                    <h4 class="text-center mb-4">Log in your account</h4>
                                    <?= $this->session->flashdata('message') ?>
                                    <form action="<?= base_url('auth') ?>" method="post">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username" placeholder="Username">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                          <!--   <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div> -->
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                        </div>
                                    </form>
                                    <a href="<?= base_url('auth/regestrasi') ?>" class="">
                                        <button type="submit" class="btn btn-secondary btn-block mt-3">Register</button></a>
                                </div>
                            </div>
                       

                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                              <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets6.lottiefiles.com/packages/lf20_jcikwtux.json"  background="transparent"  speed="1"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>
                        </div>  
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?= base_url('assets/template') ?>/vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets/template') ?>/js/custom.min.js"></script>
    <script src="<?= base_url('assets/template') ?>/js/dlabnav-init.js"></script>

</body>

</html>