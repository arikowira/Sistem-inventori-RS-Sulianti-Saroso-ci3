<title>Detail Barang</title>
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Detail Barang
    </div>
        <?php foreach ($tb_barang as $brg) : ?>
            <?php if($this->session->userdata('role') == 'Petugas Logistik'){ ?>
                <?= form_open_multipart('data_barang/update_barang_aksi')?>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Penginput Barang</label>
                        <input type="text" name="penginput_barang" class="form-control" value="<?= $brg->penginput_barang ?>" readonly>
                </div>
                <div class="form-group col-md-5">
                    <label>Nama Barang</label>
                        <input type="hidden" name="id_barang" class="form-control" value="<?= $brg->id_barang ?>">
                        <input type="text" name="nama_barang" placeholder="Masukkan Nama Barang" class="form-control" value="<?= $brg->nama_barang ?>" readonly>
                    <?= form_error('nama_barang','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Tanggal Terima Barang</label>
                        <input type="date" name="tanggal_terima_barang" class="form-control" value="<?= $brg->tanggal_terima_barang ?>" readonly>
                </div>
                <div class="form-group col-md-5">
                    <label>Tanggal Input Barang</label>
                        <input type="date" name="tanggal_input_barang" class="form-control" value="<?= $brg->tanggal_input_barang ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Asal Donatur</label>
                    <select name="asal_donatur" class="form-control" readonly>
                        <option value="<?= $brg->asal_donatur ?>"><?= $brg->asal_donatur ?></option>
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
                        <input type="text" name="pemberi" class="form-control" value="<?= $brg->pemberi ?>" readonly>
                    <?= form_error('pemberi','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Jenis Barang</label>
                    <select id="jenis_barang" name="jenis_barang" class="form-control" readonly>
                        <option value="<?= $brg->jenis_barang ?>"><?= $brg->jenis_barang ?></option>
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
                    <select name="alat_kesehatan" id="item" class="form-control">
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
                        <input type="text" id ="rupiah" name="keterangan_harga" placeholder="Masukkan Keterangan Harga" onkeyup="convertToRupiah(this);" class="form-control" value="<?= $brg->keterangan_harga ?>" readonly>
                    <?= form_error('keterangan_harga','<div class="text-danger small" ml-3>','</div>')?>
                </div>
                <div class="form-group col-md-5">
                    <label>Kondisi Barang</label>
                        <select name="kondisi_barang" class="form-control" readonly>
                            <option value="<?= $brg->kondisi_barang ?>"><?= $brg->kondisi_barang ?></option>
                            <option value="Baik/Standar">Baik/Standar</option>
                            <option value="Tidak Baik/Tidak Standar">Tidak Baik/Tidak Standar</option>
                        </select>
                    <?= form_error('kondisi_barang','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <br>
            <?= anchor('data_barang','<div class="btn btn-secondary mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
            <br><br>
            <?php form_close();?>
            <?php }else{?>
            <?= form_open_multipart('data_barang/update_barang_aksi')?>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Penginput Barang</label>
                        <input type="text" name="penginput_barang" class="form-control" value="<?= $brg->penginput_barang ?>" readonly>
                </div>
                <div class="form-group col-md-5">
                    <label>Nama Barang</label>
                        <input type="hidden" name="id_barang" class="form-control" value="<?= $brg->id_barang ?>">
                        <input type="text" name="nama_barang" placeholder="Masukkan Nama Barang" class="form-control" value="<?= $brg->nama_barang ?>">
                    <?= form_error('nama_barang','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Tanggal Terima Barang</label>
                        <input type="date" name="tanggal_terima_barang" class="form-control" value="<?= $brg->tanggal_terima_barang ?>">
                </div>
                <div class="form-group col-md-5">
                    <label>Tanggal Input Barang</label>
                        <input type="date" name="tanggal_input_barang" class="form-control" value="<?= $brg->tanggal_input_barang ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Asal Donatur</label>
                    <select name="asal_donatur" class="form-control">
                        <option value="<?= $brg->asal_donatur ?>"><?= $brg->asal_donatur ?></option>
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
                        <input type="text" name="pemberi" class="form-control" value="<?= $brg->pemberi ?>">
                    <?= form_error('pemberi','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Jenis Barang</label>
                    <select id="jenis_barang" name="jenis_barang" class="form-control">
                        <option value="<?= $brg->jenis_barang ?>"><?= $brg->jenis_barang ?></option>
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
                    <select name="alat_kesehatan" id="item" class="form-control">
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
                        <input type="text" name="kuantitas" placeholder="Masukkan Kuantitas" class="form-control" value="<?= $brg->kuantitas ?>">
                    <?= form_error('kuantitas','<div class="text-danger small" ml-3>','</div>')?>
                </div>
                <div class="form-group col-md-5">
                    <label>Satuan</label>
                        <input type="text" name="satuan" placeholder="Masukkan Satuan Barang" class="form-control" value="<?= $brg->satuan ?>">
                    <?= form_error('tempat_lahir','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Keterangan Harga</label>
                        <input type="text" id ="rupiah" name="keterangan_harga" placeholder="Masukkan Keterangan Harga" onkeyup="convertToRupiah(this);" class="form-control" value="<?= $brg->keterangan_harga ?>">
                    <?= form_error('keterangan_harga','<div class="text-danger small" ml-3>','</div>')?>
                </div>
                <div class="form-group col-md-5">
                    <label>Kondisi Barang</label>
                        <select name="kondisi_barang" class="form-control">
                            <option value="<?= $brg->kondisi_barang ?>"><?= $brg->kondisi_barang ?></option>
                            <option value="Baik/Standar">Baik/Standar</option>
                            <option value="Tidak Baik/Tidak Standar">Tidak Baik/Tidak Standar</option>
                        </select>
                    <?= form_error('kondisi_barang','<div class="text-danger small" ml-3>','</div>')?>
                </div>
            </div>
            <?php if($this->session->userdata('role') == 'Admin'){?>
            <div>
                <label>Surat Resmi Donasi</label>
                <br>
                <?php if($brg->surat_resmi_donasi == ''){?>
                    <input type="file" name="srd" value="<?= $brg->surat_resmi_donasi ?>">
                <?= form_error('surat_resmi_donasi','<div class="text-danger small" ml-3>','</div>')?>
                <?php }else{?>
                    <p><?= $brg->surat_resmi_donasi ?></p>
                    <?= anchor('download/download_surat_resmi_donasi/'.$brg->surat_resmi_donasi,'<div class="btn btn-primary mb-5"> Download</div>')?>
                    <?= anchor('download/hapus_file/surat_resmi_donasi/'.$brg->id_barang.'/'.$brg->surat_resmi_donasi,'<div class="btn btn-danger mb-5"> Hapus</div>')?>
                <?php } ?>
            </div>
            <br>
            <div>
                <label>Surat Tugas Pengambilan</label><br>
                <?php if($brg->surat_tugas_pengambilan == ''){?>
                    <input type="file" name="stp" value="<?= $brg->surat_tugas_pengambilan ?>">
                <?= form_error('surat_tugas_pengambilan','<div class="text-danger small" ml-3>','</div>')?>
                <?php }else{?>
                    <p><?= $brg->surat_tugas_pengambilan ?></p>
                    <?= anchor('download/download_surat_tugas_pengambilan/'.$brg->surat_tugas_pengambilan,'<div class="btn btn-primary mb-5"> Download</div>')?>
                    <?= anchor('download/hapus_file/surat_tugas_pengambilan/'.$brg->id_barang.'/'.$brg->surat_tugas_pengambilan,'<div class="btn btn-danger mb-5"> Hapus</div>')?>
                <?php } ?>
            </div>
            <br>
            <div>
                <label>Surat Serah Terima</label><br>
                <?php if($brg->surat_serah_terima == ''){?>
                    <input type="file" name="sst" value="<?= $brg->surat_serah_terima ?>">
                <?= form_error('surat_serah_terima','<div class="text-danger small" ml-3>','</div>')?>
                <?php }else{?>
                    <p><?= $brg->surat_serah_terima ?></p>
                    <?= anchor('download/download_surat_serah_terima/'.$brg->surat_serah_terima,'<div class="btn btn-primary mb-5"> Download</div>')?>
                    <?= anchor('download/hapus_file/surat_serah_terima/'.$brg->id_barang.'/'.$brg->surat_serah_terima,'<div class="btn btn-danger mb-5"> Hapus</div>')?>
                <?php } ?>
            </div>
            <br>
            <div>
                <label>Foto Dokumentasi Serah Terima</label><br>
                <?php if($brg->foto_dokumentasi_serah_terima == ''){?>
                    <input type="file" name="fdst" value="<?= $brg->foto_dokumentasi_serah_terima ?>">
                <?= form_error('foto_dokumentasi_serah_terima','<div class="text-danger small" ml-3>','</div>')?>
                <?php }else{?>
                    <p><?= $brg->foto_dokumentasi_serah_terima ?></p>
                    <?= anchor('download/download_foto_dokumentasi_serah_terima/'.$brg->foto_dokumentasi_serah_terima,'<div class="btn btn-primary mb-5"> Download</div>')?>
                    <?= anchor('download/hapus_file/foto_dokumentasi_serah_terima/'.$brg->id_barang.'/'.$brg->foto_dokumentasi_serah_terima,'<div class="btn btn-danger mb-5"> Hapus</div>')?>
                <?php } ?>
            </div>
            <br>
            <div>
                <label>Foto Barang</label><br>
                <?php if($brg->foto_barang == ''){?>
                    <input type="file" name="fb" value="<?= $brg->foto_barang ?>">
                <?= form_error('foto_barang','<div class="text-danger small" ml-3>','</div>')?>
                <?php }else{?>
                    <p><?= $brg->foto_barang ?></p>
                    <?= anchor('download/download_foto_barang/'.$brg->foto_barang,'<div class="btn btn-primary mb-5"> Download</div>')?>
                    <?= anchor('download/hapus_file/foto_barang/'.$brg->id_barang.'/'.$brg->foto_barang,'<div class="btn btn-danger mb-5"> Hapus</div>')?>
                <?php } ?>
            </div>
            <br>
            <div>
                <label>Sertifikat Ucapan Terima Kasih</label><br>
                <?php if($brg->sertifikat_ucapan_terima_kasih == ''){?>
                    <input type="file" name="sutk" value="<?= $brg->sertifikat_ucapan_terima_kasih ?>">
                <?= form_error('sertifikat_ucapan_terima_kasih','<div class="text-danger small" ml-3>','</div>')?>
                <?php }else{?>
                    <p><?= $brg->sertifikat_ucapan_terima_kasih ?></p>
                    <?= anchor('download/download_sertifikat_ucapan_terima_kasih/'.$brg->sertifikat_ucapan_terima_kasih,'<div class="btn btn-primary mb-5"> Download</div>')?>
                    <?= anchor('download/hapus_file/sertifikat_ucapan_terima_kasih/'.$brg->id_barang.'/'.$brg->sertifikat_ucapan_terima_kasih,'<div class="btn btn-danger mb-5"> Hapus</div>')?>
                <?php } ?>
            </div>
            <?php } ?>
            <br>
            <button type="submit" class="btn btn-primary mb-5"><i class="fas fa-file-download"></i> Simpan</button>
            <?= anchor('data_barang','<div class="btn btn-secondary ml-2 mb-5"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
            <br><br>
            <?php form_close();?>
            <?php } ?>
        <?php endforeach;?>
        <script>
        $(document).ready(function(){
                $("#jenis_barang").on('change', function(){
                    if($(this).val()=='Alat Kesehatan'){
                        $('#alat_kesehatan').prop('hidden', false);
                        $('#item').prop('required', true);
                    } else {
                        $('#alat_kesehatan').prop('hidden', true);
                        $('#item').prop('required', false);
                    }
                    });
                });

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