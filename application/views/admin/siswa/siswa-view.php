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
              <h4 class="card-title">Data Student</h4>
              <a href="siswaAdd" class="btn btn-primary">Add Student</a>

            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message') ?>

              <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th></th>
                      <th>Name</th>
                      <th>NPM</th>
                      <th>Gender</th>
                      <th>Date of birth</th>
                      <th>Place of birth</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $s) : ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><img class="rounded-circle" width="35" src="<?= base_url('assets/user/profiel/') . $s['foto'] ?>" alt=""></td>
                        <td><?= $s['nama'] ?></td>
                        <td><?= $s['npm'] ?></td>
                        <td><?= $s['jk'] ?></td>
                        <td><?= $s['tanggal_lahir'] ?></td>
                        <td><?= $s['tempat_lahir'] ?></td>
                        <td><?= $s['email'] ?></td>
                        <td><?= $s['alamat'] ?></td>
                        <td>
                          <div class="d-flex">
                            <a href="<?= base_url('admin/siswaUpdate/') . $s['id_user'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?= base_url('admin/siswaDelete/') . $s['id_user'] ?>" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('yakin')"><i class="fa fa-trash"></i></a>
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