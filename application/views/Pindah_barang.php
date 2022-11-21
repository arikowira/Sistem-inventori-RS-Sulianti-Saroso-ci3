<title>Pindah Barang</title>
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-pencil-alt"></i>
        <?php foreach($tb_barang as $brg): ?>
            Pindah Barang <strong><?= $brg->nama_barang ?></strong>
    </div>
    <?= form_open_multipart('data_barang/pindah_barang_aksi/'.$brg->id_barang)?>
        <div class="row">
            <div class="form-group col-md-2">
                <label>Kuantitas Barang</label>
                <input type="text" name="kuantitas" class="form-control" value="<?= $brg->kuantitas ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-5">
                <label>Jumlah Barang</label>
                <input type="hidden" name="id_barang" class="form-control" value="<?= $brg->id_barang ?>">
                <input type="hidden" name="nama_barang" class="form-control" value="<?= $brg->nama_barang ?>">
                <input type="hidden" name="tanggal_terima_barang" class="form-control" value="<?= $brg->tanggal_terima_barang ?>" readonly>
                <input type="hidden" name="tanggal_input" class="form-control" value="<?= date('Y-m-d'); ?>">
                <input type="hidden" name="asal_donatur" placeholder="Masukkan Nama Asal Donatur" class="form-control" value="<?= $brg->asal_donatur ?>">
                <input type="hidden" name="pemberi" placeholder="Masukkan Nama Pemberi" class="form-control" value="<?= $brg->pemberi ?>">
                <input type="hidden" name="jenis_barang" placeholder="Masukkan Nama Jenis Barang" class="form-control" value="<?= $brg->jenis_barang ?>">
                <input type="number" name="kuantitas" placeholder="Masukkan Kuantitas Barang Yang Ingin Dipindahkan" class="form-control" required>
                <input type="hidden" name="satuan" class="form-control" value="<?= $brg->satuan ?>">
                <input type="hidden" name="keterangan_harga" class="form-control" value="<?= $brg->keterangan_harga ?>">
                <input type="hidden" name="kondisi_barang" class="form-control" value="<?= $brg->kondisi_barang ?>">
            </div>
        </div>
        <label>Pilih Aksi</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="aksi" type="radio" onclick="changeFunction()" value="disimpan" name="radio" id="disimpan" required>
            <label class="form-check-label" for="flexRadioDefault1">
              Di Simpan
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" name="aksi" type="radio" onclick="changeFunction()" value="didistribusi" name="radio" id="didistribusi" required>
            <label class="form-check-label" for="flexRadioDefault1">
              Di Distribusi
            </label>
          </div>
        </div>
        <br>
        <div class="row" id="form_distribusi" hidden>
            <div class="form-group col-md-5">
                <label>Tanggal Barang Didistribusi</label>
                <input type="date" id="item_distribusi" name="tanggal_barang_didistribusi" placeholder="Masukkan Tanggal Barang Didistribusi" class="form-control" required>
            </div>
            <div class="form-group col-md-5">
                <label>Penerima Barang Distribusi</label>
                <input type="text" id="item_distribusi1" name="penerima_barang_distribusi" placeholder="Masukkan Penerima Barang Distribusi" class="form-control" required>
            </div>
        </div>
        <div class="row" id="form_simpan" hidden>
            <div class="form-group col-md-5">
                <label>Tanggal Barang Disimpan</label>
                <input type="date" id="item_simpan" name="tanggal_barang_disimpan" placeholder="Masukkan Tanggal Barang Disimpan" class="form-control" required>
            </div>
            <div class="form-group col-md-5">
                <label>Tempat Penyimpanan Barang</label>
                <input type="text" id="item_simpan1" name="tempat_penyimpanan_barang" placeholder="Masukkan Tempat Penyimpanan Barang" class="form-control" required>
            </div>
        </div>
        <label>Upload Laporan</label><br>
          <input type="file" name="lp">
          <br>
          <br>
            <button type="submit" class="btn btn-primary"><i class="fa fa-random"></i> Pindahkan</button>
            <?= anchor('data_barang','<div class="btn btn-secondary ml-2"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        <?php endforeach;?>
        <?= form_close()?>
        <br>
        <br>
    <script>
                function changeFunction(){
                    const v = document.querySelector('input[name=aksi]:checked').value;
                    var s = document.getElementById('form_simpan');
                    var d = document.getElementById('form_distribusi');
                    var item1 = document.getElementById('item_distribusi');
                    var item2 = document.getElementById('item_simpan');
                    var item3 = document.getElementById('item_distribusi1');
                    var item4 = document.getElementById('item_simpan1');

                    if(v == 'disimpan'){
                      s.removeAttribute('hidden',0);
                      d.setAttribute('hidden',1);
                      item2.setAttribute('required',1);
                      item4.setAttribute('required',1);
                      item1.removeAttribute('required',0);
                      item3.removeAttribute('required',0);
                    }else{
                      d.removeAttribute('hidden',0);
                      s.setAttribute('hidden',1);
                      item1.setAttribute('required',1);
                      item3.setAttribute('required',1);
                      item2.removeAttribute('required',0);
                      item4.removeAttribute('required',0);
                    }
                }
    </script>