<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-header">
            <h4 class="card-title">Materi Kelas <?= $kelas['kelas'] ?></h4>
          </div>
          <?php foreach ($materi_kelas as $materi) : ?>
            <div class="card-body">

              <div class="media pt-3 pb-3">
                <img src="<?= base_url('assets/user/profiel/' . $user_post_materi['foto']) ?>" alt="image" class="me-3 rounded" width="40">
                <div class="media-body">
                  <h5 class="m-b-5"><?= $user_post_materi['nama'] ?></h5>
                  <p class="mb-0 text-muted"><?= $materi['tanggal_waktu'] ?></p>
                  <hr>
                  <?= $materi['isi'] ?>
                  <?php if ($materi['file'] != 'tidak ada file') : ?>
                    <a href="<?= base_url('admin/materi_download/' . $materi['file']) ?>" class="btn btn-primary">Download</a>
                  <?php endif; ?>
                  <button type="" name="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#komentar<?= $materi['id_materi'] ?> ">Komentar</button>
                </div>
              </div>

              <hr>
            </div>

          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- modal komentar -->
<?php foreach ($materi_kelas as $m) : ?>
  <div class="modal fade" id="komentar<?= $m['id_materi'] ?>">
    <div class="modal-dialog modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Komentar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <?php
          $id_mat = $m['id_materi'];
          $queryS = $this->db->query(
            "SELECT * FROM tbl_komentar_materi WHERE status='0' AND id_materi=$id_mat"
          )->result_array();
          ?>
          <?php foreach ($queryS as $kt) : ?>
            <div class="komentar d-flex justify-content-between">
              <p><?= $kt['nama_user'] ?></p>
              <p><?= $kt['tanggal_waktu'] ?></p>
            </div>
            <h6><?= $kt['komentar'] ?></h6>
            <span class="badge rounded-pill bg-primary" data-bs-toggle="modal" data-bs-target="#balaskomentar<?= $kt['id_km'] ?>">Balas</span>
            <hr>
            <!-- balasan koemntar -->
            <?php

            $id_komen = $kt['id_km'];
            $query_bls = $this->db->query("SELECT * FROM tbl_komentar_materi WHERE status=$id_komen AND id_materi=$id_mat")->result_array();
            foreach ($query_bls as $balasan) :
            ?>
              <div class="ms-5">
                <div class="balas-komentar d-flex justify-content-between">
                  <p><?= $balasan['nama_user'] ?></p>
                  <p><?= $balasan['tanggal_waktu'] ?></p>
                </div>
                <p><?= $balasan['komentar'] ?></p>
              </div>
            <?php endforeach; ?>
            <!-- end -->
            <!-- modal balas komentar -->
            <div class="modal fade modal-balas" id="balaskomentar<?= $kt['id_km'] ?>">
              <div class="modal-dialog modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Balas Komentar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url('siswa/tugasKomentarBalas') ?>" method="post">
                      <div class="d-flex">
                        <input type="hidden" name="id_kt" value="<?= $kt['id_km'] ?>">
                        <input type="hidden" name="nama_user" value="<?= $user['nama'] ?>">
                        <input type="hidden" name="id_materi" value="<?= $m['id_materi'] ?>">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <textarea name="komentar" class="form-control" placeholder="Balasan Komentar"></textarea>
                    <?= form_error('komentar', '<small class="text-danger pl-3">', '</small>'); ?>
                    <button type="submit" class="btn btn-secondary">Kirim</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <form action="" method="post">
            <input type="hidden" name="nama_user" value="<?= $user['nama'] ?>">
            <input type="hidden" name="id_materi" value="<?= $m['id_materi'] ?>">
        </div>
        <div class="modal-footer">
          <textarea name="komentar" class="form-control" placeholder="Tulis Komentar"></textarea>
          <?= form_error('komentar', '<small class="text-danger pl-3">', '</small>'); ?>
          <button type="submit" class="btn btn-secondary">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>