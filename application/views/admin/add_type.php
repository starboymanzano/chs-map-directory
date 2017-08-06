<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="<?= base_url() . 'assets/media/admin/sidebar.jpg'; ?>">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?= base_url() . 'admin'; ?>" class="simple-text">
                    <img width="25%" height="25%" src="<?= base_url() . 'assets/media/admin/logo.png'; ?>" /><br/>Welcome, <?= $admin['AdminFullName']; ?></a>
            </div>
            <ul class="nav">
                <li>
                    <a href="<?php echo base_url(); ?>admin/profile">
                        <i class="pe-7s-notebook"></i>
                        <p>School Profile</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/establishment">
                        <i class="pe-7s-map-2"></i>
                        <p>School Establishments</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url(); ?>admin/announcements">
                        <i class="pe-7s-note2"></i>
                        <p>Announcements</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/settings">
                        <i class="pe-7s-config"></i>
                        <p>Administrator Settings</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/webmaster">
                        <i class="pe-7s-user"></i>
                        <p>Contact Webmaster</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand">Add Type</p>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>My Account<b class="caret"></b></p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>admin/webmaster">Contact Webmaster</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>admin/logout">Logout</a></li>
                            </ul>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="panel panel-info">
            <div class="panel-body">
                <div class="row">  
                    <div class="col-md-10">
                        <div class="form-group">
                            <?= form_open('admin/announcements/types/add'); ?>
                                <label for="typename">Type : </label>
                                <p><input required class="form-control" id="typename" type="text" name="typename"></p>

                                <input style="background-color:#428bca; color:white;" class="btn btn-primary" type="submit" value="Add Type">

                                <a style="margin-left:1%; background-color:#5bc0de; color:white;" class="btn btn-info" href="<?=site_url('admin/announcements/types'); ?>">Cancel</a>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


