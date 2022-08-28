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
              <h4 class="card-title">Data Teori</h4>
              <a href="<?= base_url('admin/materiAdd') ?>" class="btn btn-primary">Tambah Teori</a>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message') ?>
              <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Komentar</th>
                      <th>Judul</th>
                      <th>Kelas</th>
                      <th>Tanggal & Waktu</th>
                      <th>Materi</th>
                      <th>Isi</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($materi as $m) : ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td>
                          <button type="" name="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#komentar<?= $m['id_materi'] ?> ">Komentar</button>
                        </td>
                        <td><?= $m['judul'] ?></td>
                        <td><?= $m['kelas'] ?></td>
                        <td><?= $m['tanggal_waktu'] ?></td>
                        <td><?= $m['isi'] ?></td>

                        <td>
                          <?php if ($m['file'] != 'tidak ada file') : ?>
                            <a href="<?= base_url('admin/materi_download/' . $m['file']) ?>">Download</a>
                          <?php else : ?>
                            <div class="text-danger  "> <?= $m['file'] ?></div>
                          <?php endif; ?>
                        </td>
                        <td><?= $m['status_materi'] ?></td>
                        <td>
                          <div class="d-flex">
                            <a href="<?= base_url('admin/materiUpdate/') . $m['id_materi'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?= base_url('admin/materiDelete/') . $m['id_materi'] ?>" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('yakin')"><i class="fa fa-trash"></i></a>
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


  <?php foreach ($materi as $m) : ?>
    <div class="modal fade" id="komentar<?= $m['id_materi'] ?>">
      <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Komentar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <?php
            $id_bm = $m['id_materi'];
            $queryS = $this->db->query(
              "SELECT * FROM tbl_komentar_materi WHERE status='0' AND id_materi=$id_bm"
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
              $query_bls = $this->db->query("SELECT * FROM tbl_komentar_materi WHERE status=$id_komen AND id_materi=$id_bm")->result_array();
              foreach ($query_bls as $balasan) :
              ?>
                <div class="ms-5">
                  <div class="balas-komentar d-flex justify-content-between">
                    <p><?= $balasan['nama_user'] ?></p>
                    <p><?= $balasan['tanggal_waktu'] ?></p>
                  </div>
                  <p><?= $balasan['komentar'] ?></p>
                  <hr>
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
                      <form action="<?= base_url('admin/materiKomentarBalas') ?>" method="post">
                        <div class="d-flex">
                          <input type="hidden" name="id_km" value="<?= $kt['id_km'] ?>">
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
            <form action="<?= base_url('admin/materiTugas') ?>" method="post">
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