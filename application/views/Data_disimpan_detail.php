<title>Detail Barang Di Simpan</title>
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Detail Barang Disimpan
    </div>
        <?php foreach ($tb_barang_disimpan as $brg) : ?>
            <?= form_open_multipart('data_barang/detail_disimpan_aksi/'.$brg->id_barang_disimpan)?>
            <div class="row">
                <div class="form-group col-md-10">
                    <label>Nama Barang</label>
                        <input type="hidden" name="id_barang" class="form-control" value="<?= $brg->id_barang ?>">
                        <input type="text" name="nama_barang" placeholder="Masukkan Nama Barang" class="form-control" value="<?= $brg->nama_barang ?>" readonly>
                    <?= form_error('nama_barang','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Tanggal Barang Disimpan</label>
                        <input type="text" name="tanggal_barang_disimpan" class="form-control" value="<?= $brg->tanggal_barang_disimpan ?>" readonly>
                </div>
                <div class="form-group col-md-5">
                    <label>Tanggal Input Penyimpanan</label>
                        <input type="text" name="tanggal_input_penyimpanan" class="form-control" value="<?= $brg->tanggal_input_penyimpanan ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Asal Donatur</label>
                        <input type="text" name="asal_donatur" class="form-control" value="<?= $brg->asal_donatur ?>" readonly>
                    <?= form_error('asal_donatur','<div class="text-danger small" ml-3>','</div>')?>
                </div>
                <div class="form-group col-md-5">
                    <label>Pemberi</label>
                        <input type="text" name="pemberi" class="form-control" value="<?= $brg->pemberi ?>" readonly>
                    <?= form_error('pemberi','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Jenis</label>
                        <input type="text" name="jenis_barang" class="form-control" value="<?= $brg->jenis_barang ?>" readonly>
                    <?= form_error('jenis_barang','<div class="text-danger small" ml-3>','</div>')?>
                </div>
                <div class="form-group col-md-5">
                    <label>Tempat Penyimpanan Barang</label>
                        <input type="text" name="tempat_penyimpanan_barang" class="form-control" value="<?= $brg->tempat_penyimpanan_barang ?>" readonly>
                    <?= form_error('tempat_penyimpanan_barang','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Kuantitas</label>
                        <input type="text" name="kuantitas" placeholder="Masukkan Kuantitas" class="form-control" value="<?= $brg->kuantitas ?>" readonly>
                    <?= form_error('kuantitas','<div class="text-danger small" ml-3>','</div>')?>
                </div>
                <div class="form-group col-md-5">
                    <label>Satuan</label>
                        <input type="text" name="satuan" placeholder="Masukkan Satuan Barang" class="form-control" value="<?= $brg->satuan ?>" readonly>
                    <?= form_error('tempat_lahir','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Keterangan Harga</label>
                        <input type="text" id="rupiah" name="keterangan_harga" placeholder="Masukkan Keterangan Harga" class="form-control" value="<?= $brg->keterangan_harga ?>" readonly>
                    <?= form_error('keterangan_harga','<div class="text-danger small" ml-3>','</div>')?>
                </div>
                <div class="form-group col-md-5">
                    <label>Kondisi Barang</label>
                        <input type="text" name="kondisi_barang" placeholder="Masukkan Kondisi Barang" class="form-control" value="<?= $brg->kondisi_barang ?>" readonly>
                    <?= form_error('kondisi_barang','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <div>
                <label>Laporan Penyimpanan Logistik</label><br>
                <?php if($brg->laporan_penyimpanan_logistik == ''){?>
                    <input type="file" name="lpl">
                <?= form_error('laporan_penyimpanan_logistik','<div class="text-danger small" ml-3>','</div>')?>
                <?php }else{?>
                    <p><?=$brg->laporan_penyimpanan_logistik?></p>
                <?= anchor('download/download_laporan_penyimpanan_logistik/'.$brg->laporan_penyimpanan_logistik,'<div class="btn btn-primary mb-5"> Download</div>')?>
                <?= anchor('download/hapus_file_disimpan/laporan_penyimpanan_logistik/'.$brg->id_barang_disimpan.'/'.$brg->laporan_penyimpanan_logistik,'<div class="btn btn-danger mb-5"> Hapus</div>')?>

                <?php } ?>
            </div>
            <br>
            <button type="submit" class="btn btn-primary mb-5"><i class="fas fa-file-download"></i> Simpan</button>
            <?= anchor('data_barang/data_barang_disimpan','<div class="btn btn-secondary ml-2 mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
            <br><br>
            <?php form_close();?>
        <?php endforeach;?>

        <script>
            var rupiah = document.getElementById('rupiah');

            rupiah.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                rupiah.value = formatRupiah(this.value, 'Rp. ');
            });

            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix){
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                rupiah     		= split[0].substr(0, sisa),
                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if(ribuan){
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        </script>