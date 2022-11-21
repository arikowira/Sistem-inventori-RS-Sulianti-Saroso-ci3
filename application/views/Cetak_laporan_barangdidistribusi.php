<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang Didistribusi</title>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <style>
    .content {
      text-align: center
    }
  </style>
    </head>
<div class="container-fluid">

<center><h1>Data Barang Didistribusi</h1></center>
        <?= form_open_multipart('data_barang/cetak_laporan_barangdidistribusi')?>
            <h4>Filter Tanggal Barang Didistribusi</h4>
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Tampilkan Tanggal</label>
                    <input type="date" name="tgl_mulai" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="tgl_selesai" class="form-control">
                </div>
            </div>
                <button type="submit" name="filter_tgl" class="btn btn-primary my-1">Filter</button>
                <hr>
        <?php form_close();?>

<table id="table" class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th>NO</th>
        <th>NAMA BARANG</th>
        <th>TANGGAL INPUT PENDISTRIBUSIAN</th>
        <th>TANGGAL BARANG DIDISTRIBUSI</th>
        <th>ASAL DONATUR</th>
        <th>PEMBERI</th>
        <th>JENIS BARANG</th>
        <th>PENERIMA BARANG DISTRIBUSI</th>
        <th>KUANTITAS</th>
        <th>SATUAN</th>
        <th>KETERANGAN HARGA</th>
        <th>KONDISI BARANG</th>
    </tr>
</thead>

<tbody>
    <?php
        $no = 1;
        foreach($tb_barangdidistribusi as $brg): ?>

        <tr>
            <td><?= $no++?></td>
            <td><?= $brg->nama_barang?></td>
            <td><?= $brg->tanggal_input_pendistribusian?></td>
            <td><?= $brg->tanggal_barang_didistribusi?></td>
            <td><?= $brg->asal_donatur?></td>
            <td><?= $brg->pemberi?></td>
            <td><?= $brg->jenis_barang?></td>
            <td><?= $brg->penerima_barang_distribusi?></td>
            <td><?= $brg->kuantitas?></td>
            <td><?= $brg->satuan?></td>
            <td><?= $brg->keterangan_harga?></td>
            <td><?= $brg->kondisi_barang?></td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>
</div>
<script>
    $(document).ready(function() {
    $('#table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print', 'excel', 'pdf'
        ]
    } );
} );
</script>
</script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>




