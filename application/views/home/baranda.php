<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$a = $this->session->userdata('is_login');
echo $javasc;
?>

<div class="box">
    <div class="box-body">
        <h3>Welcome <?=$a['ket_level'];?></h3>
    </div>
</div>