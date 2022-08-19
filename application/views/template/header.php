<!DOCTYPE html>
<html lang="en">

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
  <meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
  <meta name="format-detection" content="telephone=no">

  <!-- PAGE TITLE HERE -->
  <title>Admin Dashboard</title>

  <!-- FAVICONS ICON -->
  <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/template/images/hc.png') ?>">
  <link href="<?= base_url('assets/template/') ?>vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <link href="<?= base_url('assets/template/') ?>vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link rel="stylesheet" href="v<?= base_url('assets/template/') ?>vendor/nouislider/nouislider.min.css">

  <!-- Style css -->
  <link href="<?= base_url('assets/template/') ?>css/style.css" rel="stylesheet">
  <link href="<?= base_url('assets/template/') ?>css/me.css" rel="stylesheet">
  <!-- datatable -->
  <link href="<?= base_url('assets/template/') ?>vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
  <!-- sweatalert -->
  <link href="<?= base_url('assets/template/') ?>vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/template/') ?>vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
</head>

<body>

  <!--*******************
        Preloader start
    ********************-->
  <div id="preloader">
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
  </div>
  <!--*******************
        Preloader end
    ********************-->

  <!--**********************************
        Main wrapper start
    ***********************************-->
  <div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
      <a href="<?= base_url() ?>" class="brand-logo">
        <img src="<?= base_url('assets/template/images/logo.png') ?>" alt="" width="150" class="logo">
        <img src="<?= base_url('assets/template/images/hc.png') ?>" alt="" class="hc">
      </a>
      <div class="nav-control">
        <div class="hamburger">
          <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
      </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header border-bottom">
      <div class="header-content">
        <nav class="navbar navbar-expand">
          <div class="collapse navbar-collapse justify-content-between">
            <div class="header-left">
              <div class="dashboard_bar">
                <?php if ($this->uri->segment(2) == '') {
                  echo 'Dasboard';
                } else {
                  echo ucfirst($this->uri->segment(2));
                }
                ?>

              </div>
            </div>
            <ul class="navbar-nav header-right">
              <li class="nav-item dropdown  header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                  <img src="<?= base_url('assets/user/profiel/' . $user['foto']) ?>" width="56" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="
                  <?php
                  if ($level == 1) {
                    echo  base_url('admin/profiel');
                  } else if ($level == 2) {
                    echo  base_url('siswa/profiel');
                  } else {
                    echo  base_url('guru/profiel');
                  }
                  ?>
                  " class="dropdown-item ai-icon">
                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                      <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="ms-2">Profile </span>
                  </a>
                  <a href="<?= base_url('auth/logout') ?>" class="dropdown-item ai-icon">
                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                      <polyline points="16 17 21 12 16 7"></polyline>
                      <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span class="ms-2">Logout </span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    <div class="dlabnav">
      <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
          <li><a class="" href="<?= base_url('admin') ?>">
              <i class="fas fa-home"></i>
              <span class="nav-text">Dashboard</span>
            </a>
          </li>
          <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
              <i class="fas fa-clone"></i>
              <span class="nav-text">Master Data</span>
            </a>
            <ul aria-expanded="false">
              <li><a href="<?= base_url('admin/siswa') ?>">Data Student</a></li>
              <li><a href="<?= base_url('admin/kelas') ?>">Data Class</a></li>

            </ul>
          </li>
          <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">

              <i class="fas fa-table"></i>
              <span class="nav-text">Learning</span>
            </a>
            <ul aria-expanded="false">
              <li><a href="form-element.html">Theory</a></li>
              <li><a href="form-wizard.html">Presence</a></li>
            </ul>
          </li>

          <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
              <i class="fas fa-file-alt"></i>
              <span class="nav-text">Report</span>
            </a>
            <ul aria-expanded="false">
              <li><a href="app-calender.html">Student</a></li>
              <li><a href="app-profile.html">Theory</a></li>
              <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Presence</a>
                <ul aria-expanded="false">
                  <li><a href="email-compose.html">Compose</a></li>
                  <li><a href="email-inbox.html">Inbox</a></li>
                  <li><a href="email-read.html">Read</a></li>
                </ul>
              </li>
              <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Class</a>
                <ul aria-expanded="false">
                  <li><a href="ecom-product-grid.html">Product Grid</a></li>
                  <li><a href="ecom-product-list.html">Product List</a></li>
                  <li><a href="ecom-product-detail.html">Product Details</a></li>
                  <li><a href="ecom-product-order.html">Order</a></li>
                  <li><a href="ecom-checkout.html">Checkout</a></li>
                  <li><a href="ecom-invoice.html">Invoice</a></li>
                  <li><a href="ecom-customers.html">Customers</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!--**********************************
            Sidebar end
        ***********************************-->