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
                <li class="active">
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
                    <a class="navbar-brand" href="<?= site_url('/admin/establishment/'); ?>"><span class="pe-7s-angle-left-circle"></span> Back to Establishment Lists</a>
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
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title"><?= $title; ?></div>
            </div>
                     
                    <?php if($this->session->flashdata('establishment_updated')): ?>
                    <?php echo '<p class="alert alert-primary">'.$this->session->flashdata('establishment_updated').'</p>';?>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('establishment_cleared')): ?>
                    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('establishment_cleared').'</p>'; ?>
                    <?php endif; ?>

            <div class="panel-body">
                <p><strong>Description: </strong></p>
                <p style="text-indent:2%;"><?= $est_info['EstDesc']; ?></p>

                <p><strong>Walk Time:</strong></p>
                <p style="text-indent:2%;"><?= $est_info['EstWalkTime']; ?></p>

                <p><strong>Distance:</strong></p>
                <p style="text-indent:2%;"><?= $est_info['EstDistance']; ?></p>

                <p><strong>Date Last Modified:</strong></p>
                <p style="text-indent:2%;"><?= $est_info['EstDateModified']; ?></p>

                <br/>

                <a href="<?= site_url('admin/establishment/view/' . $est_info['EstID'] . '/edit'); ?>">
                    <button style="background-color:#428bca;color:white;"class="btn btn-primary">
                        <span class="glyphicon glyphicon-pencil">  </span> Edit
                    </button>
                </a>

                <a href="<?= site_url('admin/establishment/view/' . $est_info['EstID'] . '/delete'); ?>" onClick="return confirm('Are you sure you want to delete information?')">
                    <button style="background-color:#d9534f;color:white;" class="btn btn-danger">
                        <span class="pe-7s-trash">  </span> Delete
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>


