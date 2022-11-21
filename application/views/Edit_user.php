<title>Edit User</title>
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
            Edit User
    </div>

    <?php foreach($tb_user as $user):?>
        <form method="post" action="<?= base_url('user/update_aksi')?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="hidden" name="id_user" class="form-control" value="<?= $user->id_user ?>">
                <input type="text" name="nama" class="form-control" value="<?= $user->nama ?>">
                <?= form_error('nama','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?= $user->username ?>">
                <?= form_error('username','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <?php if($this->session->userdata('id_user') == $user->id_user){?>
            <?php }else{ ?>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" placeholder="Masukkan Password Jika Ingin Mengganti Password">
            </div>
            <?php } ?>
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="<?= $user->role ?>"><?= $user->role ?></option>
                    <option value="Admin">Admin</option>
                    <option value="Petugas Penerima Barang">Petugas Penerima Barang</option>
                    <option value="Petugas Logistik">Petugas Logistik</option>
                </select>
                <?= form_error('role','<div class="text-danger small" ml-3>','</div>')?>
            </div>
            <br>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-download"></i> Simpan</button>
            <?php if($this->session->userdata('id_user') == $user->id_user){?>
            <?php }else{ ?>
            <?= anchor('user','<div class="btn btn-secondary ml-2"><i class="far fa-caret-square-left"></i> Kembali</div>')?>
            <?php } ?>
        </form>
        <br>
    <?php endforeach;?>