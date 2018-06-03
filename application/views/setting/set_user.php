<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$a = $this->session->userdata('is_login');
$msg = $this->session->flashdata('msg');
$tipe = $this->session->flashdata('tipe');
$lambang = 'fa-check';
$notify = 'Sukses!';
echo $javasc;
?>

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
                        <th>Status</th>
                        <th width='5%'><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $jumlah = $get_user->num_rows();
                    foreach ($get_user->result() as $row) {
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class=""><?= $row->nama_user; ?></td>
                            <td class=""><?= $row->ket_level; ?></td>
                            <td class=""><?= $row->username; ?></td>
                            <td class=""><?= $row->password; ?></td>
                            <td class="text-center">
                                <?php if ($row->is_active == 1) { ?>
                                    <button class="btn btn-sm btn-flat btn-block btn-success">Aktif</button>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-flat btn-block btn-danger">Non Aktif</button>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($jumlah == 1 ) {
                                    $att = 'disabled';
                                } else {
                                    $att = '';
                                }
                                ?>
                                <button  <?= $att; ?> class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>