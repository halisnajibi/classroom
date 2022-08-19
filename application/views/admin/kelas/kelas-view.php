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
              <h4 class="card-title">Data Class</h4>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal">Add Class</button>

            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message') ?>

              <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Class</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kelas as $s) : ?>
                      <tr>
                        <td><?= $i++; ?></td>

                        <td><?= $s['kelas'] ?></td>

                        <td>
                          <div class="d-flex">
                            <a href="<?= base_url('admin/kelasUpdate/') . $s['id_kelas'] ?>" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#basicModal<?= $s['id_kelas'] ?>"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?= base_url('admin/kelasDelete/') . $s['id_kelas'] ?>" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('yakin')"><i class="fa fa-trash"></i></a>
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
  <!-- modal add -->
  <div class="modal fade" id="addmodal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal">
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <label class="form-label">Kelas</label>
            <input type="text" class="form-control" name="kelas">
            <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal edit -->
  <?php
  foreach ($kelas as $s) : ?>
    <div class="modal fade" id="basicModal<?= $s['id_kelas'] ?>">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Class</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal">
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/kelas/kelasUpdate') ?>" method="post">
              <label class="form-label">Kelas</label>
              <input type="text" class="form-control" name="kelas" value="<?= $s['kelas'] ?>">
              <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>