<title>Input Barang</title>
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-pencil-alt"></i>
            Input Barang
    </div>

    <?= form_open_multipart('data_barang/tambah_barang_aksi')?>
    <div class="row">
            <div class="form-group col-md-5">
                <label>Nama Barang</label>
                    <input type="text" name="nama_barang" placeholder="Masukkan Nama Barang" class="form-control">
                    <input type="hidden" name="tanggal_input_barang" class="form-control" value="<?= date('Y-m-d'); ?>">
                    <input type="hidden" name="penginput_barang" class="form-control" value="<?= $this->session->userdata('nama') ?>">
                <?= form_error('nama_barang','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group col-md-5">
                <label>Tanggal Terima Barang</label>
                    <input type="date" name="tanggal_terima_barang" placeholder="Masukkan Tanggal Terima Barang" class="form-control">
                <?= form_error('tanggal_terima_barang','<div class="text-danger small" ml-3>','</div>')?>
            </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
                <label>Asal Donatur</label>
                <select name="asal_donatur" class="form-control">
                    <option value="">--Pilih Asal Donatur--</option>
                    <option value="Pemerintah Pusat">Pemerintah Pusat</option>
                    <option value="Pemerintah Daerah">Pemerintah Daerah</option>
                    <option value="Pihak Swasta">Pihak Swasta</option>
                    <option value="Organisasi">Organisasi</option>
                    <option value="Per-orangan">Per-orangan</option>
                    <option value="Lain-lain">Lain-lain</option>
                </select>
                <?= form_error('asal_donatur','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group col-md-5">
                <label>Pemberi</label>
                    <input type="text" name="pemberi" placeholder="Masukkan Nama Pemberi" class="form-control">
                <?= form_error('pemberi','<div class="text-danger small" ml-3>','</div>')?>
            </div>
    </div>
    <div class="row">
            <div class="form-group col-md-5">
                <label>Jenis Barang</label>
                <select id="jenis_barang" name="jenis_barang" class="form-control">
                    <option value="">--Pilih Jenis Barang--</option>
                    <option value="Alat Kesehatan">Alat Kesehatan</option>
                    <option value="Non Alat Kesehatan">Non Alat Kesehatan</option>
                    <option value="Alat Pelindung Diri">Alat Pelindung Diri</option>
                    <option value="Farmasi/Obat">Farmasi/Obat</option>
                    <option value="Barang Rumah Tangga">Barang Rumah Tangga</option>
                    <option value="Cairan Rumah Tangga">Cairan Rumah Tangga</option>
                    <option value="Penginapan Hotel">Penginapan Hotel</option>
                    <option value="Transportasi">Transportasi</option>
                    <option value="Lain-lain">Lain-lain</option>
            </select>
                <?= form_error('jenis_barang','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group col-md-5" id="alat_kesehatan" hidden>
                <label>Jenis Alat Kesehatan</label>
                <select name="alat_kesehatan" class="form-control">
                    <option value="">--Pilih Jenis Alat Kesehatan--</option>
                    <option value="(BMN)">Barang Milik Negara (BMN)</option>
                    <option value="(BHP)">Barang Habis Pakai (BHP)</option>
                </select>
                <?= form_error('alat_kesehatan','<div class="text-danger small" ml-3>','</div>')?>
            </div>
    </div>
    <div class="row">
            <div class="form-group col-md-5">
                <label>Kuantitas</label>
                    <input type="number" name="kuantitas" placeholder="Masukkan Kuantitas" class="form-control">
                <?= form_error('kuantitas','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group col-md-5">
                <label>Satuan</label>
                    <input type="text" name="satuan" placeholder="Masukkan Satuan Barang" class="form-control">
                <?= form_error('satuan','<div class="text-danger small" ml-3>','</div>')?>
            </div>
    </div>
    <div class="row">
            <div class="form-group col-md-5">
                <label>Keterangan Harga</label>
                    <input type="text" id="rupiah" name="keterangan_harga" placeholder="Masukkan Keterangan Harga" class="form-control">
                <?= form_error('keterangan_harga','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group col-md-5">
                <label>Kondisi Barang</label>
                    <select name="kondisi_barang" class="form-control">
                        <option value="">--Pilih Kondisi Barang--</option>
                        <option value="Baik/Standar">Baik/Standar</option>
                        <option value="Tidak Baik/Tidak Standar">Tidak Baik/Tidak Standar</option>
                    </select>
                <?= form_error('kondisi_barang','<div class="text-danger small" ml-3>','</div>')?>
            </div>
    </div>
    <div class="form-check">
        <input class="form-check-input ukuran-checkbox" type="checkbox" name="didistribusi" value="distribusikan" onclick="getClick(this.value)" id="check">
        <label class="form-check-label" for="flexCheckDefault">Distribusikan Barang</label>
    </div>
    <br>
    <div id="distribusi" class="row" hidden>
        <div class="form-group col-md-5">
            <label>Penerima Barang Distribusi</label>
            <input type="text" id="item_distribusi" name="penerima_barang_distribusi" placeholder="Masukkan Penerima Barang Distribusi" class="form-control">
        </div>
        <div class="form-group col-md-5">
            <label>Upload Laporan Distribusi</label><br>
            <input type="file" name="lp">
        </div>
        <div class="form-group col-md-5">
            <label>Tanggal Barang Didistribusi</label>
            <input type="date" id="item_distribusi2" name="tanggal_barang_didistribusi" placeholder="Masukkan Tanggal Barang Didistribusi" class="form-control">
        </div>
    </div>
    <?php if($this->session->userdata('role') == 'Admin'){?>
        <hr>
            <div class="form-group">
                <label>Surat Resmi Donasi</label><br>
                    <input type="file" name="surat_resmi_donasi">
            </div>
            <div class="form-group">
                <label>Surat Tugas Pengambilan</label><br>
                    <input type="file" name="surat_tugas_pengambilan">
            </div>
            <div class="form-group">
                <label>Surat Serah Terima</label><br>
                    <input type="file" name="surat_serah_terima">
            </div>
            <div class="form-group">
                <label>Foto Dokumentasi Serah Terima</label><br>
                    <input type="file" name="foto_dokumentasi_serah_terima">
            </div>
            <div class="form-group">
                <label>Foto Barang</label><br>
                    <input type="file" name="foto_barang">
            </div>
            <div class="form-group">
                <label>Sertifikat Ucapan Terima Kasih</label><br>
                    <input type="file" name="sertifikat_ucapan_terima_kasih">
            </div>
            <?php } ?>
            <br>
        <button type="submit" class="btn btn-primary mb-5"><i class="fas fa-file-download"></i> Simpan</button>
        <?= anchor('data_barang','<div class="btn btn-secondary ml-2 mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
        <br>
        <br>
    <?php form_close();?>
    <script>
        $(document).ready(function(){
                $("#jenis_barang").on('change', function(){
                    if($(this).val()=='Alat Kesehatan'){
                        $('#alat_kesehatan').prop('hidden', false);
                    } else {
                        $('#alat_kesehatan').prop('hidden', true);
                    }
                    });
                });

        function getClick(){
                    var c = document.querySelector("input[type=checkbox]");
                    var id = document.getElementById("distribusi");
                    var item = document.getElementById("item_distribusi");
                    var item2 = document.getElementById("item_distribusi2");

                    if(c.checked == true){
                        id.removeAttribute("hidden",0);
                        item.setAttribute("required",1);
                        item2.setAttribute("required",1);
                    }else{
                        id.setAttribute("hidden",1);
                        item.removeAttribute("required",0);
                        item2.removeAttribute("required",0);
                    }
                };

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