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
        <h3>Welcome <?=$a['ket_level'];?></h3>
    </div>
</div>