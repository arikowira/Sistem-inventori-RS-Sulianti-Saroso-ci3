<title>Data Barang</title>
<div class="container-fluid">

    <div class="alert alert-success" role="alert">
      <i class="fas fa-users-cog"></i>
            Data Barang Masuk
    </div>

  <?= $this->session->flashdata('pesan') ?>
  <?php if($this->session->userdata('role') != 'Petugas Logistik'){ ?>
    <?= anchor('data_barang/tambah_barang','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Input Barang</button>') ?>
  <?php }?>
  <?php if($this->session->userdata('role') == 'Admin'){?>
  <a href="<?=base_url()?>data_barang/cetak_laporan_barang" target="_blank" class="btn btn-sm btn-success mb-3 ml-1"><i class="fa fa-print"></i> Cetak Laporan</a>
  <?php } ?>

<div class="table-responsive">
    <table id="table" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
            <th>NO</th>
            <th>PENGINPUT BARANG</th>
            <th>ASAL DONATUR</th>
            <th>JENIS BARANG</th>
            <th>NAMA BARANG</th>
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
        foreach($tb_barang as $brg): ?>

        <tr>
            <td><?= $no++?></td>
            <td><?= $brg->penginput_barang?></td>
            <td><?= $brg->asal_donatur?></td>
            <td><?= $brg->jenis_barang?></td>
            <td><?= $brg->nama_barang?></td>
            <td><?= $brg->pemberi?></td>
            <td><?= $brg->kuantitas?></td>
            <td><?= $brg->satuan?></td>
            <td><?= $brg->kondisi_barang?></td>
            <td width="120px">
            <?= anchor('data_barang/update/'.$brg->id_barang,'<div class="btn btn-sm btn-success"><i class="fa fa-eye"></i></div>')?>
            <?php if($this->session->userdata('role') != 'Petugas Penerima Barang'){ ?>
            <?= anchor('data_barang/pindah_barang/'.$brg->id_barang,'<div class="btn btn-sm btn-warning"><i class="fa fa-random"></i></div>')?>
            <?php }else{?>
            <?php } ?>
            <?php if($this->session->userdata('role') == 'Admin'){ ?>
            <div href="#modaldelete" data-toggle="modal" onclick="$('#modaldelete #formdelete').attr('action','<?= base_url('data_barang/delete/'.$brg->id_barang)?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>
            <?php }else{?>
            <?php } ?>
          </td>
        </tr>
      </tbody>
        <?php endforeach ?>
    </table>
    </div>
</div>

<script>
    $(document).ready(function () {
      $('#table').DataTable({
      });
    });
</script>

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
