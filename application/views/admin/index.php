<?php
// jumlah data siswa
$queryJS = $this->db->query("SELECT * FROM tbl_siswa");
$jumlah_Js = $this->db->affected_rows($queryJS);
//jumlah kelas
$queryJk = $this->db->query('SELECT * FROM tbl_kelas');
$jumlah_Kls = $this->db->affected_rows($queryJk);
?>

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

            </div>

          </div>
          <div class="col-xl-6">
            <div class="row">
              <div class="col-xl-12">
                <div class="row">
                  <div class="col-xl-6 col-sm-6">
                    <div class="card">
                      <div class="card-body d-flex px-4 pb-0 justify-content-between">
                        <div>
                          <h4 class="fs-18 font-w600 mb-4 text-nowrap">Total Class</h4>
                          <div class="d-flex align-items-center">
                            <h2 class="fs-32 font-w700 mb-0"><?= $jumlah_Kls ?></h2>
                          </div>
                        </div>
                        <img src="<?= base_url('assets/template/images/classroom.png') ?>" alt="student" width="80">
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-6 col-sm-6">
                    <div class="card">
                      <div class="card-body d-flex px-4  justify-content-between">
                        <div>
                          <div class="">
                            <h2 class="fs-32 font-w700"><?= $jumlah_Js ?></h2>
                            <span class="fs-18 font-w500 d-block">Total Student</span>

                          </div>
                        </div>
                        <img src="<?= base_url('assets/template/images/student.png') ?>" alt="student" width="80">
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