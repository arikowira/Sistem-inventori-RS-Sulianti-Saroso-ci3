<title>Data Barang Di Simpan</title>
<div class="container-fluid">

    <div class="alert alert-success" role="alert">
      <i class="fas fa-users-cog"></i>
            Data Barang Disimpan
    </div>

  <?= $this->session->flashdata('pesan') ?>
  <?php if($this->session->userdata('role') == 'Admin'){?>
  <a href="<?=base_url()?>data_barang/cetak_laporan_barangdisimpan" target="_blank" class="btn btn-sm btn-success mb-3"><i class="fa fa-print"></i> Cetak Laporan</a>
  <?php } ?>
  <div class="table-responsive">
    <table id="table" class="table table-striped table-bordered table-hover">
      <thead>
      <tr>
            <th>NO</th>
            <th>TEMPAT PENYIMPANAN BARANG</th>
            <th>TANGGAL BARANG DI SIMPAN</th>
            <th>NAMA BARANG</th>
            <th>JENIS BARANG</th>
            <th>NAMA PEMBERI</th>
            <th>KUANTITAS</th>
            <th>SATUAN</th>
            <th>KONDISI BARANG</th>
            <th>AKSI</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        foreach($tb_barang_disimpan as $brg): ?>

        <tr>
            <td><?= $no++?></td>
            <td><?= $brg->tempat_penyimpanan_barang?></td>
            <td><?= $brg->tanggal_barang_disimpan?></td>
            <td><?= $brg->nama_barang?></td>
            <td><?= $brg->jenis_barang?></td>
            <td><?= $brg->pemberi?></td>
            <td><?= $brg->kuantitas?></td>
            <td><?= $brg->satuan?></td>
            <td><?= $brg->kondisi_barang?></td>
            <td width="120px">
            <?= anchor('data_barang/detail_disimpan/'.$brg->id_barang_disimpan,'<div class="btn btn-sm btn-success"><i class="fa fa-eye"></i></div>')?>
            <div href="#modalbarang<?= $brg->id_barang ?>" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-random"></i></div>
            <?php if($this->session->userdata('role') == 'Admin'){ ?>
            <div href="#modaldelete" data-toggle="modal" onclick="$('#modaldelete #formdelete').attr('action','<?= base_url('data_barang/delete_disimpan/'.$brg->id_barang_disimpan)?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>
            <?php }else{?>
            <?php } ?>
          </td>
        </tr>
      </tbody>
<!-- Modal Pindah -->
<div class="modal fade" id="modalbarang<?= $brg->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Pindahkan Barang</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('data_barang/pindah_barang_skd/'.$brg->id_barang)?>
        <label>Jumlah Barang</label>
        <input type="hidden" name="id_barang_disimpan" class="form-control" value="<?= $brg->id_barang_disimpan ?>">
        <input type="hidden" name="id_barang" class="form-control" value="<?= $brg->id_barang ?>">
        <input type="hidden" name="nama_barang" class="form-control" value="<?= $brg->nama_barang ?>">
        <input type="hidden" name="tanggal_terima_barang" class="form-control" value="<?= $brg->tanggal_terima_barang ?>" readonly>
        <input type="hidden" name="tanggal_input" class="form-control" value="<?= date('d-m-Y'); ?>">
        <input type="hidden" name="asal_donatur" placeholder="Masukkan Nama Asal Donatur" class="form-control" value="<?= $brg->asal_donatur ?>">
        <input type="hidden" name="pemberi" placeholder="Masukkan Nama Pemberi" class="form-control" value="<?= $brg->pemberi ?>">
        <input type="hidden" name="jenis_barang" placeholder="Masukkan Nama Jenis Barang" class="form-control" value="<?= $brg->jenis_barang ?>">
        <input type="text" name="kuantitas" placeholder="Masukkan Kuantitas Barang Yang Ingin Dipindahkan" class="form-control">
        <input type="hidden" name="satuan" class="form-control" value="<?= $brg->satuan ?>">
        <input type="hidden" name="keterangan_harga" class="form-control" value="<?= $brg->keterangan_harga ?>">
        <input type="hidden" name="kondisi_barang" class="form-control" value="<?= $brg->kondisi_barang ?>">
        <br>
        <label>Aksi</label>
        <input type="text" name="aksi" class="form-control" value="Di Distribusi" readonly>
          <br>
        <label>Penerima Barang Distribusi</label>
            <input type="text" name="penerima_barang_distribusi" placeholder="Masukkan Penerima Barang Distribusi" class="form-control" required>
        <br>
        <label>Tanggal Barang Didistribusi</label>
          <input type="date" name="tanggal_barang_didistribusi" placeholder="Masukkan Tanggal Barang Didistribusi" class="form-control" required>
        <br>
        <label>Upload Laporan Distribusi</label><br>
          <input type="file" name="lp">
      </div>
      <div class="modal-footer">
        <form id="formbarang" action="" method="post">
            <button type="submit" class="btn btn-danger">Pindahkan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        </form>
        <?= form_close()?>
      </div>
    </div>
  </div>
</div>
        <?php endforeach ?>
    </table>
  </div>

<!-- Modal Delete -->
<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>PERINGATAN!</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apa anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <form id="formdelete" action="" method="post">
            <button type="submit" class="btn btn-danger">Hapus</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {
      $('#table').DataTable({
      });
    });

  </script>
