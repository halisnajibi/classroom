    <div class="content-body">
      <div class="container-fluid">
        <div class="row page-titles">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
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
                    <img src="<?= base_url('assets/user/profiel/' . $user['foto']) ?>" class="img-fluid rounded-circle" alt="">
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
                    <?= $this->session->flashdata('message') ?>
                    <ul class="nav nav-tabs">
                      <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">About Me</a>
                      </li>

                      <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Setting</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div id="my-posts" class="tab-pane fade active show">
                        <div class="my-post-content pt-3">
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
                              <h5 class="f-w-500">Age <span class="pull-end">:</span>
                              </h5>
                            </div>

                            <?php
                            // Tanggal Lahir
                            $tgl_lahir = $user['tanggal_lahir'];

                            // ubah ke format Ke Date Time
                            $lahir = new DateTime($tgl_lahir);
                            $hari_ini = new DateTime();

                            $diff = $hari_ini->diff($lahir);

                            // Display
                            // echo "Tanggal Lahir: " . date('d M Y', strtotime($tgl_lahir)) . '<br />';
                            // echo "Umur: " . $diff->y . " Tahun";
                            // echo " " . $diff->m . " Bulan";
                            // echo " " . $diff->d . " Hari";
                            $umur = $diff->y . ' Tahun'
                            ?>
                            <div class="col-sm-9 col-7"><span><?= $umur ?></span>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col-sm-3 col-5">
                              <h5 class="f-w-500">Address <span class="pull-end">:</span></h5>
                            </div>
                            <div class="col-sm-9 col-7"><span><?= $user['alamat'] ?></span>
                            </div>
                          </div>
                          <div class="post-input">

                            <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal">Update</a>
                            <!-- Modal -->
                            <div class="modal fade" id="postModal">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Update Personal Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="<?= base_url('user') ?>" method="post" enctype="multipart/form-data">
                                      <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                                      <input type="hidden" name="level" value="<?= $level['level'] ?>">
                                      <div class="mb-3">
                                        <label class=""><strong>Name</strong></label>
                                        <input type="text" class="form-control" value="<?= $user['nama'] ?>" name="nama">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                      </div>
                                      <div class="mb-3">
                                        <label class=""><strong>Email</strong></label>
                                        <input type="text" class="form-control" value="<?= $user['email'] ?>" name="email">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                      </div>
                                      <div class="mb-3">
                                        <label class=""><strong>Date of birth</strong></label>
                                        <input type="date" class="form-control" value="<?= $user['tanggal_lahir'] ?>" name="tanggal_lahir">
                                        <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                      </div>
                                      <label class=""><strong>Address</strong></label>
                                      <textarea name="alamat" id="textarea2" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."><?= $user['alamat'] ?></textarea>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text">Upload</span>
                                        <div class="form-file">
                                          <input type="file" class="form-file-input form-control" name="foto">
                                        </div>
                                      </div>
                                      <button type="submit" class="btn btn-primary btn-rounded" name="update">Update</button>

                                  </div>
                                  </form>

                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div id="profile-settings" class="tab-pane fade">
                        <div class="pt-3">
                          <div class="settings-form">
                            <h4 class="text-primary">Account Setting</h4>
                            <form>
                              <div class="row">
                                <div class="mb-3 col-md-6">
                                  <label class="form-label">Username</label>
                                  <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control">
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label class="form-label">Password</label>
                                  <input type="password" placeholder="Password" class="form-control">
                                </div>
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" placeholder="1234 Main St" class="form-control">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Address 2</label>
                                <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                              </div>

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
      </div>
    </div>
    </div>