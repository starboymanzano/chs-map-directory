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
                <li>
                    <a href="<?php echo base_url(); ?>admin/announcements">
                        <i class="pe-7s-note2"></i>
                        <p>Announcements</p>
                    </a>
                </li>
                <li class="active">
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
                    <a class="navbar-brand" href=""><?php echo $title; ?></a>
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
         <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?= site_url('admin/settings'); ?>"><b>Administrator Name</b></a></li>
            <li role="presentation"><a href="<?= site_url('admin/settings/change_password'); ?>"><b>Change Password</b></a></li>
        </ul>
         <div class="col-md-6" style="padding:3%;">

            <?php if($this->session->flashdata('name_changed')): ?>
            <?php echo '<p class="alert alert-info">'.$this->session->flashdata('name_changed').'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('name_error')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('name_error').'</p>'; ?>
            <?php endif; ?>

            <?php echo '<i>' . validation_errors() . '</i>'; ?>

            <br/>
            <?php echo form_open('admin/settings'); ?>
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" name="full_name" class="form-control" id="full_name" value="<?= $admin['AdminFullName']; ?>"/>
                </div>

                <div class="form-group">
                    <label for="current_pw">Password</label>
                    <input type="password" class="form-control" id="current_pw" name="current_pw"/>
                </div>

                <div class="form-group">
                    <label for="confirm_pw">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_pw" name="confirm_pw"/>
                </div>

                <div class="form-group">
                    <input style="background-color:#428bca;color:white;" type="submit" class="btn btn-primary form-control" value="Update Administrator Name" />
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
