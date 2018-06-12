<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$a = $this->session->userdata('is_login');
$msg = $this->session->flashdata('msg');
$tipe = $this->session->flashdata('tipe');
$lambang = 'fa-check';
$notify = 'Sukses!';
echo $javasc;
?>

<button data-toggle="modal" data-target="#aksi_jenis" data-ket='tambah' class="btn btn-success btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Jenis Barang</button>
<div class="box">
    <div class="box-body">
        <div class="table-responsive">
            <table class="tabel_3 table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width='3%'>No</th>
                        <th>Kode Jenis</th>
                        <th>Nama Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $jumlah = $get_jenisBarang->num_rows();
                    foreach ($get_jenisBarang->result() as $row) {
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $row->kd_jenis; ?></td>
                            <td class=""><?= $row->ket_jenis; ?></td>
                            <td class="text-center">
                                <button title="Edit jenis barang" class="btn btn-flat btn-sm btn-warning" data-toggle="modal" 
                                        data-target="#aksi_jenis" 
                                        data-ket_jenis ="<?= $row->ket_jenis; ?>"
                                        data-kd_jenis="<?= $row->kd_jenis; ?>"
                                        data-ket="edit" ><i class="fa fa-pencil"></i> Edit</button>
                                <button title="hapus jenis barang" class="btn btn-flat btn-sm btn-danger" data-toggle="modal" 
                                        data-target="#aksi_jenis" 
                                        data-ket_jenis ="<?= $row->ket_jenis; ?>"
                                        data-kd_jenis="<?= $row->kd_jenis; ?>"
                                        data-ket="hapus" ><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="aksi_jenis" role="dialog" aria-labelledby="editlabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray-active">
                <button type="button" class="close" id="close-modal"  data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editlabel"></h4>
            </div>
            <form id="aksi_user_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-4">
                            <label>Kode Jenis</label>
                        </div>
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <input class="form-control inputs kd_jenis1" maxlength="3" size="3" name="kd_jenis1" type="number">&emsp;
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <input class="form-control inputs kd_jenis2" maxlength="3" size="3" name="kd_jenis2" type="number" >&emsp;
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Nama Jenis</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type='text' name='ket_jenis' class="form-control ket_jenis" placeholder="Nama Jenis" >
                            </div>
                        </div>
                        <input type='hidden' id='ket' class="form-control ket">
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
    $(function () {
        $.autotab({tabOnSelect: true});
        $('.inputs').autotab('filter', 'number');
    });

    $('#aksi_jenis').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var kd_jenis = button.data('kd_jenis');
        var ket_jenis = button.data('ket_jenis');
        var ket = button.data('ket');
        var modal = $(this);

        modal.find('.modal-body input.ket').val(ket);
        if (ket == 'tambah') {
            modal.find('#editlabel').html('<b>Form Tambah Data Jenis Barang</b>');
            modal.find('.modal-body input.kd_jenis1').val('').removeAttr('readonly', 'readonly');
            modal.find('.modal-body input.kd_jenis2').val('').removeAttr('readonly', 'readonly');
            modal.find('.modal-body input.ket_jenis').val('').removeAttr('readonly', 'readonly');
            modal.find('.submit').html('<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>');
        } else if (ket == 'edit') {
            var kd_jenis1 = kd_jenis.toString().substr(0, 3);
            var kd_jenis2 = kd_jenis.toString().substr(3, 6);
            modal.find('#editlabel').html('<b>Form Hapus Data User</b>');
            modal.find('.modal-body input.kd_jenis1').val(kd_jenis1).attr('readonly', 'readonly');
            modal.find('.modal-body input.kd_jenis2').val(kd_jenis2).attr('readonly', 'readonly');
            modal.find('.modal-body input.ket_jenis').val(ket_jenis).removeAttr('readonly', 'readonly');
            modal.find('.submit').html('<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Edit</button>');
        } else if (ket == 'hapus') {
            var kd_jenis1 = kd_jenis.toString().substr(0, 3);
            var kd_jenis2 = kd_jenis.toString().substr(3, 6);
            modal.find('#editlabel').html('<b>Form Hapus Data User</b>');
            modal.find('.modal-body input.kd_jenis1').val(kd_jenis1).attr('readonly', 'readonly');
            modal.find('.modal-body input.kd_jenis2').val(kd_jenis2).attr('readonly', 'readonly');
            modal.find('.modal-body input.ket_jenis').val(ket_jenis).attr('readonly', 'readonly');
            modal.find('.submit').html('<button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</button>');
        }
    });
    $('#aksi_user_form').validate({
        rules: {
            kd_jenis1: {required: true},
            kd_jenis2: {required: true},
            ket_jenis: {required: true}
        },
        submitHandler: function (form) {
            var ket = $('#ket').val();
            if (ket == 'tambah' || ket == 'edit') {
                var url_form = '<?= site_url("Master/insertJenis"); ?>';
            } else if (ket == 'hapus') {
                var url_form = '<?= site_url("Master/deleteJenis"); ?>';
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
</script>