<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$a = $this->session->userdata('is_login');
$msg = $this->session->flashdata('msg');
$tipe = $this->session->flashdata('tipe');
$lambang = 'fa-check';
$notify = 'Sukses!';
echo $javasc;
?>
<button data-toggle="modal" data-target="#aksi_user" data-ket='tambah' class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah User</button>
<div class="box">
    <div class="box-body">
        <div class="table-responsive">
            <table class="tabel_3 table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width='3%'>No</th>
                        <th>Nama User</th>
                        <th>Ket User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Ket</th>
                        <th>Status</th>
                        <th width='5%'><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $jumlah = $get_user->num_rows();
                    foreach ($get_user->result() as $row) {
                        if ($a['kd_user'] == $row->kd_user) {
                            $att = 'disabled';
                        } else {
                            $att = '';
                        }
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class=""><?= $row->nama_user; ?></td>
                            <td class=""><?= $row->ket_level; ?></td>
                            <td class=""><?= $row->username; ?></td>
                            <td class=""><?= $row->password; ?></td>
                            <td class="text-center">
                                <?php if ($row->is_login == 1) { ?>
                                    <label class="label label-success">Online</label>
                                <?php } else { ?>
                                    <label class="label label-danger">Offline</label>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php if ($row->is_active == 1) { ?>
                                    <button <?= $att; ?> class="btn btn-sm btn-flat btn-block btn-success" onclick="aksi_kunci('<?= $row->kd_user; ?>', 'kunci');">Aktif</button>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-flat btn-block btn-danger" onclick="aksi_kunci('<?= $row->kd_user; ?>', 'buka');">Non Aktif</button>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <button <?= $att; ?> title="hapus user" class="btn btn-flat btn-sm btn-danger" data-toggle="modal" 
                                                     data-target="#aksi_user" 
                                                     data-username ="<?= $row->username; ?>"
                                                     data-password="<?= $row->password; ?>"
                                                     data-kd_level="<?= $row->kd_level; ?>"
                                                     data-nama_user="<?= $row->nama_user; ?>"
                                                     data-kd_user ="<?= $row->kd_user; ?>"
                                                     data-ket="hapus" ><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="aksi_user" role="dialog" aria-labelledby="editlabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray-active">
                <button type="button" class="close" id="close-modal"  data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editlabel"></h4>
            </div>
            <form id="aksi_user_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Pilih Level</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <select class="btn btn-default select2 kd_level" style="width: 100%" name='kd_level' >
                                    <option value=''> Pilih Level User</option>
                                    <?php
                                    foreach ($get_levelUser as $row_lvl) {
                                        echo"<option value='$row_lvl->kd_level'>" . $row_lvl->ket_level . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Username</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type='text' name='username' class="form-control username"  autofocus="true" placeholder="Username" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Password</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type='password' name='password' class="form-control password"  placeholder="Password" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Nama Admin</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type='text' name='nama_user' class="form-control nama_user"  placeholder="Nama Admin" >
                            </div>
                        </div>
                        <input type='hidden' name='ket' class="form-control ket" id='ket' >
                        <input type='hidden' name='kd_user' class="form-control kd_user" >
                    </div>
                </div>
                <div class="modal-footer bg-gray-active">
                    <!--<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>-->
                    <div class="submit"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#aksi_user').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var kd_level = button.data('kd_level');
        var ket = button.data('ket');
        var username = button.data('username');
        var nama_user = button.data('nama_user');
        var password = button.data('password');
        var kd_user = button.data('kd_user');
        var modal = $(this);
        modal.find('.modal-body input.ket').val(ket);

        if (ket == 'tambah') {
            modal.find('#editlabel').html('<b>Form Tambah Data User</b>');
            modal.find('.modal-body select.kd_level').val('').change();
            modal.find('.modal-body input.nama_admin').val('').removeAttr('readonly', 'readonly');
            modal.find('.modal-body input.username').val('').removeAttr('readonly', 'readonly');
            modal.find('.modal-body input.nama_user').val('').removeAttr('readonly', 'readonly');
            modal.find('.modal-body input.kd_user').val('');
            modal.find('.pass').removeClass('hidden');
            modal.find('.submit').html('<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>');
        } else if (ket == 'hapus') {
            modal.find('#editlabel').html('<b>Form Hapus Data User</b>');
            modal.find('.modal-body input.password').val(password).attr('readonly', 'readonly');
            modal.find('.modal-body input.nama_user').val(nama_user).attr('readonly', 'readonly');
            modal.find('.modal-body input.username').val(username).attr('readonly', 'readonly');
            modal.find('.modal-body input.kd_user').val(kd_user);
            modal.find('.modal-body select.kd_level').val(kd_level).change().attr('disabled', 'disabled');
            modal.find('.pass').addClass('hidden');
            modal.find('.submit').html('<button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-save"></i> Hapus</button>');
        }
    });
    $('#aksi_user_form').validate({
        rules: {
            kd_level: {required: true},
            username: {required: true},
            password: {required: true},
            nama_user: {required: true}
        },
        submitHandler: function (form) {
            var ket = $('#ket').val();
            if (ket == 'tambah') {
                var url_form = '<?= site_url("Setting/insertUser"); ?>';
            } else if (ket == 'hapus') {
                var url_form = '<?= site_url("Setting/deleteUser"); ?>';
            }
            $.ajax({
                type: 'POST',
                url: url_form,
                data: $(form).serialize(),
                success: function (data) {
                    if (data == 'true') {
                        sukses(ket);
                    } else {
                        gagal(ket);
                    }
                }
            });
        }
    });
    function aksi_kunci(kd_user, ket) {
        var url_form = '<?= site_url('Setting/updateKunci'); ?>';
        $.ajax({
            type: 'POST',
            url: url_form,
            data: {kd_user: kd_user, ket: ket},
            success: function (data) {
                if (data == 'true') {
                    sukses(ket);
                } else {
                    gagal(ket);
                }
            }
        });
    }

</script>
