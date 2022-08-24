<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Data Absen <?= $kelas['nama'] ?></h4>
            <?php
            date_default_timezone_set('Asia/Makassar');
            $waktu_sekarang =  date('h:i:s');
            $id_buku_absen = $absen['id_buku_absen'];
            $id_user = $user['id_user'];
            $query = $this->db->query("SELECT * FROM `tbl_siswa_absen` WHERE id_buku_absen=$id_buku_absen AND id_user=$id_user");
            $cek = $this->db->affected_rows($query);
            ?>
            <?php
            if ($cek == 0) : ?>
              <!-- tampilkan tombol absen -->
              <?php  ?>
              <?php
              if ($waktu_sekarang > $absen['jam_mulai'] && $waktu_sekarang < $absen['jam_toleransi']) : ?>
                <button type="" name="" class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#addmodal">Absen</button>
              <?php endif; ?>
            <?php else : ?>
              <!-- hapus tombol absen -->
            <?php endif;      ?>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <div class="table-responsive">
              <table id="example3" class="display" style="min-width: 845px">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Pertemuan</th>
                    <th>Waktu Absen</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($absenSiswa as $s) : ?>
                    <tr>
                      <td>
                        <?= $i++ ?>
                      </td>
                      <td><?= $s['judul'] ?></td>
                      <td><?= $s['waktu_absen'] ?></td>
                      <td><?= $s['status_absen'] ?>
                      </td>
                      <?php if ($s['keterangan'] == 'sukses') : ?>
                        <td class="text-success">
                          <?= $s['keterangan'] ?>
                        </td>
                      <?php else : ?>
                        <td class="text-danger">
                          <?= $s['keterangan'] ?>
                        </td>
                      <?php endif; ?>
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

<!-- modal add absen -->
<div class="modal fade" id="addmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Absen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="mb-3">
            <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
            <input type="hidden" name="id_buku_absen" value="<?= $absen['id_buku_absen'] ?>">
            <label class="form-label">Waktu Berakhir</label>
            <input type="text" class="form-control" name="waktu" readonly value="<?= $absen['jam_akhir'] ?>">
          </div>
          <?php
          date_default_timezone_set('Asia/Makassar');
          $waktu_absen =  date('h:i:s');
          $waktu_akhir = $absen['jam_akhir'];
          if (strtotime($waktu_absen)  > strtotime($waktu_akhir)) {
            $cek = 'telat';

            //menghitung selisih dengan hasil detik
            $diff    = strtotime($waktu_absen)  - strtotime($waktu_akhir);

            //membagi detik menjadi jam
            $jam    = floor($diff / (60 * 60));

            //membagi sisa detik setelah dikurangi $jam menjadi menit
            $menit    = $diff - $jam * (60 * 60);
            if ($jam == 0) {
              $cek = 'telat ' . floor($menit / 60) . 'menit';
            } else {
              $cek = 'telat ' . $jam . 'jam' . floor($menit / 60)  .  'menit';
            }
          } else {
            $cek = 'sukses';
          }
          ?>
          <input type="hidden" name="waktu_absen" value="<?= $waktu_absen ?>">
          <input type="hidden" value="<?= $cek ?>" name="keterangan">
          <label for="">Status</label>
          <div class="mb-3">
            <label class="radio-inline me-3"><input type="radio" name="status" value="hadir" checked> Hadir</label>
            <label class="radio-inline me-3"><input type="radio" name="status" value="izin"> Izin</label>

            <label class="radio-inline me-3"><input type="radio" name="status" value="sakit"> Sakit</label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>