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
                        <td><?= $m['status'] ?></td>
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