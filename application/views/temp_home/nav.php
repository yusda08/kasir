
<div class="navbar-header">
    <a href="<?= base_url(); ?>Home.html" class="navbar-brand"><b></b></a>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
    </button>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="active"><?php echo anchor('Home', 'Home') ?></li>
        <li ><?php echo anchor('Login/logout/'.$kd_user, 'Setting User') ?></li>
        <li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class="glyphicon glyphicon-cog"></span> Setting <b class='caret'></b></a>
            <ul class='dropdown-menu'>
                <li><?php echo anchor('Setting/set_user', 'Setting User') ?></li>
            </ul>
        </li>
    </ul>
</div>
