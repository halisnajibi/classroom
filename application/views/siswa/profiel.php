   <div class="content-body">
    <div class="container-fluid">


     <div class="row page-titles">
      <ol class="breadcrumb">
       <?php  ?>
       <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $this->uri->segment(1); ?></a></li>
       <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $this->uri->segment(2); ?></a></li>
      </ol>
     </div>
     <!-- row -->
     <div class="row">
      <div class="col-lg-12">
       <div class="profile card card-body px-3 pt-3 pb-0">
        <div class="profile-head">
         <div class="photo-content">
          <div class="cover-photo rounded"></div>
         </div>
         <div class="profile-info">
          <div class="profile-photo">
           <img src="<?= base_url('assets/user/profiel/') . $user['foto'] ?>" class="img-fluid rounded-circle" alt="">
          </div>
          <div class="profile-details">
           <div class="profile-name px-3 pt-2">
            <h4 class="text-primary mb-0"><?= $user['nama'] ?></h4>
            <p>Admin</p>
           </div>
           <div class="profile-email px-2 pt-2">
            <h4 class="text-muted mb-0"><?= $user['email'] ?></h4>
            <p>Email</p>
           </div>

          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
     <div class="row">

      <div class="col-xl-12">
       <div class="card">
        <div class="card-body">
         <div class="profile-tab">
          <div class="custom-tab-1">
           <ul class="nav nav-tabs">
            <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">About Me</a>
            </li>
            <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">Update</a>
            </li>
            <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Setting</a>
            </li>
           </ul>
           <div class="tab-content">
            <div id="my-posts" class="tab-pane fade active show">
             <div class="my-post-content pt-3">
              <?= $this->session->flashdata('message')  ?>
              <h4 class="text-primary mb-4">Personal Information</h4>
              <div class="row mb-2">
               <div class="col-sm-3 col-5">
                <h5 class="f-w-500">Name <span class="pull-end">:</span>
                </h5>
               </div>
               <div class="col-sm-9 col-7"><span><?= $user['nama'] ?></span>
               </div>
              </div>
              <div class="row mb-2">
               <div class="col-sm-3 col-5">
                <h5 class="f-w-500">Email <span class="pull-end">:</span>
                </h5>
               </div>
               <div class="col-sm-9 col-7"><span><?= $user['email'] ?></span>
               </div>
              </div>

              <div class="row mb-2">
               <div class="col-sm-3 col-5">
                <h5 class="f-w-500">Date of birth <span class="pull-end">:</span>
                </h5>
               </div>

               <div class="col-sm-9 col-7"><span><?= tgl_indo($user['tanggal_lahir'])  ?></span>
               </div>
              </div>
              <div class="row mb-2">
               <div class="col-sm-3 col-5">
                <h5 class="f-w-500">Address <span class="pull-end">:</span></h5>
               </div>
               <div class="col-sm-9 col-7"><span><?= $user['alamat'] ?></span>
               </div>
              </div>

             </div>
            </div>
            <div id="about-me" class="tab-pane fade">
             <div class="profile-about-me">
              <div class="pt-4 border-bottom-1 pb-3">
               <h4 class="text-primary mb-4">Update Personal</h4>

               <form action="<?= base_url('siswa/profiel') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 col-md-6">
                 <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                 <input type="hidden" name="email" value="<?= $user['email'] ?>">
                 <label class="form-label">Name</label>
                 <input type="text" class="form-control" value="<?= $user['nama'] ?>" name="nama">
                 <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3 col-md-6">
                 <label class="form-label">Jenis Kelamin</label>
                 <select class="default-select  form-control wide" name="jk">
                  <?php if ($user['jk'] == 'laki-laki') : ?>
                   <option value="laki-laki" selected>Laki-Laki</option>
                   <option value="perempuan">Perempuan</option>
                  <?php else : ?>
                   <option value="perempuan" selected>Perempuan</option>
                   <option value="laki-laki">Laki-Laki</option>
                  <?php endif; ?>

                 </select>
                </div>
                <div class="mb-3 col-md-6 mt-3">
                 <label class="form-label">Date of birth</label>
                 <input type="date" class="form-control" name="tanggal_lahir" value="<?= $user['tanggal_lahir'] ?>">
                 <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3 col-md-6">
                 <label class="form-label">Address</label>
                 <textarea name="alamat" id="textarea" cols="30" rows="5" class="form-control bg-transparent"><?= $user['alamat'] ?></textarea>
                 <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="input-group mb-3">
                 <span class="input-group-text">Foto</span>
                 <div class="form-file">
                  <input type="file" class="form-file-input form-control" name="foto">
                 </div>
                </div>
                <button type="submit" name="update_profiel" class="btn btn-primary">Update</button>
               </form>
              </div>
             </div>

            </div>
            <div id="profile-settings" class="tab-pane fade">
             <div class="pt-3">
              <div class="settings-form">
               <h4 class="text-primary">Account Setting</h4>
               <form action="<?= base_url('siswa/password') ?>" method="POST">
                <div class="row">
                 <div class="mb-3 col-md-6">
                  <label class="form-label">Username</label>
                  <input type="text" value="<?= $user['username'] ?>" class="form-control" readonly>
                 </div>
                 <div class="mb-3 col-md-6">
                  <label class="form-label">Previous Password</label>
                  <input type="password" name="pw-lama" class="form-control" placeholder="Previous Password">
                  <?= form_error('pw-lama', '<small class="text-danger pl-3">', '</small>'); ?>
                 </div>
                </div>
                <div class="mb-3">
                 <label class="form-label">Password New</label>
                 <input type="password" name="pw-baru" class="form-control" placeholder="Password New">
                 <?= form_error('pw-baru', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3">
                 <label class="form-label">Confirm Password</label>
                 <input type="password" name="pw-confirm" class="form-control" placeholder="Confirm Password">
                 <?= form_error('pw-confirm', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
               </form>
              </div>
             </div>
            </div>
           </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="replyModal">
           <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title">Post Reply</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
             </div>
             <div class="modal-body">
              <form>
               <textarea class="form-control" rows="4">Message</textarea>
              </form>
             </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
              <button type="button" class="btn btn-primary">Reply</button>
             </div>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>