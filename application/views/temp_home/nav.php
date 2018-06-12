
<!--<div class="navbar-header">
    <a href="<?= base_url(); ?>Home.html" class="navbar-brand"><b></b></a>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
    </button>
</div>-->

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="active"><?php echo anchor('Home', 'Home') ?></li>
        <li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class="glyphicon glyphicon-cog"></span> Setting <b class='caret'></b></a>
            <ul class='dropdown-menu'>
                <li><?php echo anchor('Setting/set_user', 'Setting User') ?></li>
                <li><?php echo anchor('Setting/set_profil', 'Setting Profil') ?></li>
            </ul>
        </li>
        <li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class="glyphicon glyphicon-modal-window"></span> Master<b class='caret'></b></a>
            <ul class='dropdown-menu'>
                <li><?php echo anchor('Master/jenis_barang', 'Jenis Barang') ?></li>
            </ul>
        </li>
    </ul>
    <ul class="nav navbar-nav pull-right">    
        <li class="bg-gray-active" ><?php echo anchor('Login/logout/'.$kd_user, 'Log Out') ?></li>
    </ul>
</div>
