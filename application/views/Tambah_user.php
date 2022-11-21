<title>Tambah User</title>
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-user"></i>
            Tambah User
    </div>
    <form method="post" action="<?= base_url('user/tambah_user_aksi')?>">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control">
            <?= form_error('nama','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
            <?= form_error('username','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
            <?= form_error('password','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="">--Pilih Role--</option>
                <option value="Admin">Admin</option>
                <option value="Petugas Penerima Barang">Petugas Penerima Barang</option>
                <option value="Petugas Logistik">Petugas Logistik</option>
            </select>
            <?= form_error('role','<div class="text-danger small" ml-3>','</div>')?>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan</button>
        <?= anchor('user','<div class="btn btn-secondary ml-2"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
    </form>
    <br><br>