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
            <h4 class="card-title">Add Data Student</h4>
          </div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-3 col-md-6">
                <label class="form-label">Kelas</label>
                <input type="text" class="form-control" name="kelas" placeholder="kelas">
                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <button type="submit" name="simpan" class="btn btn-primary mt-3">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>