<title>User Management</title>
<div class="container-fluid">

    <div class="alert alert-success" role="alert">
      <i class="fas fa-users-cog"></i>
            User Management
    </div>

    <?= $this->session->flashdata('pesan') ?>

    <?= anchor('user/tambah_user','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah User</button>') ?>
    <table id="table_user" class="table table-bordered table-hover table-striped">
      <thead>
        <tr>
            <th>NO</th>
            <th>NAMA USER</th>
            <th>USERNAME</th>
            <th>ROLE</th>
            <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($tb_user as $user): ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $user->nama?></td>
            <td><?= $user->username?></td>
            <td><?= $user->role?></td>
            <td width="140px">
            <?php if($this->session->userdata('id_user') == $user->id_user){?>
            <?php }else{ ?>
            <?= anchor('user/update/'.$user->id_user,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?>
            <div href="#modaldelete" data-toggle="modal" onclick="$('#modaldelete #formdelete').attr('action','<?= base_url('user/delete/'.$user->id_user)?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></td>
            <?php } ?>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
      $('#table_user').DataTable({
      });
    });

  </script>
<!-- Modal -->
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