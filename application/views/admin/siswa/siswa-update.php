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
              <h4 class="card-title">Update Data Student</h4>
            </div>
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa'] ?>">
                <input type="hidden" name="id_user" value="<?= $siswa['id_user'] ?>">
                <input type="hidden" name="fotosiswa" value="<?= $siswa['foto'] ?>">
                <div class="mb-3 col-md-6">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?= $siswa['nama'] ?>">
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Nomor Pokok Mahasiswa</label>
                  <input type="text" readonly class="form-control" name="npm" value="<?= $siswa['npm'] ?>" <?= form_error('npm', '<small class="text-danger pl-3">', '</small>'); ?>>
                </div>

                <div class="mb-3">
                  <label class="form-label">Jenis Kelamin</label>
                  <select class="default-select  form-control wide" name="jk">
                    <option>--Pilih--</option>
                    <?php if ($siswa['jk'] == 'laki-laki') { ?>
                      <option value="laki-laki" selected>Laki-Laki</option>
                      <option value="perempuan">Perempuan</option>
                    <?php } else { ?>
                      <option value="perempuan" selected>Perempuan</option>
                      <option value="laki-laki">Laki-Laki</option>
                    <?php } ?>

                  </select>
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" value="<?= $siswa['tanggal_lahir'] ?>">
                  <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>">
                  <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control" name="email" value="<?= $siswa['email'] ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3">
                  <label class="form-label">Kelas</label>
                  <select class="default-select  form-control wide" name="kelas">
                    <option>--Pilih--</option>
                    <?php foreach ($kelas as $k) : ?>
                      <?php if ($k['id_kelas'] == $siswa['id_kls']) : ?>
                        <option value="<?= $k['id_kelas'] ?>" selected><?= $k['kelas'] ?></option>
                      <?php else : ?>
                        <option value="<?= $k['id_kelas'] ?>"><?= $k['kelas'] ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
                <label for="textarea">Alamat</label>
                <textarea name="alamat" id="textarea" cols="30" rows="5" class="form-control bg-transparent"><?= $siswa['alamat'] ?> </textarea>
                <button type="submit" name="simpan" class="btn btn-primary mt-3">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>