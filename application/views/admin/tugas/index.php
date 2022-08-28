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
            <h4 class="card-title">Data Tugas</h4>
            <a href="<?= base_url('admin/tugasAdd') ?>" class="btn btn-primary">Add Tugas</a>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('message') ?>

            <div class="table-responsive">
              <table id="example3" class="display" style="min-width: 845px">
                <thead>
                  <tr>
                    <th>#</th>
                    <th> </th>
                    <th>Judul Tugas</th>
                    <th>Kelas</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Akhir</th>
                    <th>Waktu Toleransi</th>
                    <th>Penjelasan</th>
                    <th>File</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($tugas as $s) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td>
                        <a href="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#komentar<?= $s['id_buku_tugas'] ?> ">Komentar</a>
                      </td>
                      <td><?= $s['judul'] ?></td>
                      <td><?= $s['kelas'] ?></td>
                      <td><?= $s['waktu_mulai'] ?></td>
                      <td><?= $s['waktu_akhir'] ?></td>
                      <td><?= $s['waktu_toleransi'] ?></td>
                      <td><?= $s['penjelasan'] ?></td>
                      <?php if ($s['file'] == 'tidak ada file') : ?>
                        <td><?= $s['file'] ?></td>
                      <?php else : ?>
                        <td><a href="<?= base_url('admin/tugasDownload/' . $s['file']) ?>" class="btn btn-primary">Download</a></td>
                      <?php endif; ?>

                      <td>
                        <div class="d-flex">
                          <a href="<?= base_url('admin/tugasUpdate/') . $s['id_buku_tugas'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                          <a href="<?= base_url('admin/tugasDelete/') . $s['id_buku_tugas'] ?>" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('yakin')"><i class="fa fa-trash"></i></a>
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

<?php foreach ($tugas as $t) : ?>
  <div class="modal fade" id="komentar<?= $t['id_buku_tugas'] ?>">
    <div class="modal-dialog modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Komentar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <?php
          $id_bt = $t['id_buku_tugas'];
          $queryS = $this->db->query(
            "SELECT * FROM tbl_komentar_tugas WHERE status='0' AND id_buku_tugas=$id_bt"
          )->result_array();
          ?>
          <?php foreach ($queryS as $kt) : ?>
            <div class="komentar d-flex justify-content-between">
              <p><?= $kt['nama_user'] ?></p>
              <p><?= $kt['tanggal_waktu'] ?></p>
            </div>
            <h6><?= $kt['komentar'] ?></h6>
            <span class="badge rounded-pill bg-primary" data-bs-toggle="modal" data-bs-target="#balaskomentar<?= $kt['id_kt'] ?>">Balas</span>
            <hr>
            <!-- balasan koemntar -->
            <?php

            $id_komen = $kt['id_kt'];
            $query_bls = $this->db->query("SELECT * FROM tbl_komentar_tugas WHERE status=$id_komen AND id_buku_tugas=$id_bt")->result_array();
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
            <div class="modal fade modal-balas" id="balaskomentar<?= $kt['id_kt'] ?>">
              <div class="modal-dialog modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Balas Komentar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url('admin/tugasKomentarBalas') ?>" method="post">
                      <div class="d-flex">
                        <input type="hidden" name="id_kt" value="<?= $kt['id_kt'] ?>">
                        <input type="hidden" name="nama_user" value="<?= $user['nama'] ?>">
                        <input type="hidden" name="id_buku_tugas" value="<?= $t['id_buku_tugas'] ?>">
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
          <form action="<?= base_url('admin/tugasKomentar') ?>" method="post">
            <input type="hidden" name="nama_user" value="<?= $user['nama'] ?>">
            <input type="hidden" name="id_buku_tugas" value="<?= $t['id_buku_tugas'] ?>">
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