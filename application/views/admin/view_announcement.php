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
                    <a class="navbar-brand" href="<?= site_url('/admin/announcements/'); ?>"><span class="pe-7s-angle-left-circle"></span> Back to Announcement Lists</a>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><?= $title; ?></div>                     
            </div>

            <?php if($this->session->flashdata('announce_updated')): ?>
            <?php echo '<p class="alert alert-info">'.$this->session->flashdata('announce_updated').'</p>'; ?>
            <?php endif; ?>

            <div class="panel-body">
                <p><strong>Description: </strong></p>
                <p style="text-indent:2%;"><?= $ann_info['AnnDesc']; ?></p>

                <p><strong>Type:</strong></p>
                <p style="text-indent:2%;"><?= $ann_info['TypeName']; ?></p>

                <p><strong>Organizer:</strong></p>
                <p style="text-indent:2%;"><?= $ann_info['AnnOrganizer']; ?></p>

                <p><strong>Venue:</strong></p>
                <p style="text-indent:2%;"><?= $ann_info['AnnVenue']; ?></p>

                <p><strong>Start Date/Time:</strong></p>
                <p style="text-indent:2%;"><?= $ann_info['AnnStartTime']; ?></p>

                <p><strong>End Date/Time:</strong></p>
                <p style="text-indent:2%;"><?= $ann_info['AnnEndTime']; ?></p>
                
                <hr/>

                <p><strong>Date Last Modified:</strong></p>
                <p style="text-indent:2%;"><?php if ($ann_info['AnnDateModified'] != '0000-00-00 00:00:00') { echo $ann_info['AnnDateModified']; } else { echo "Not Yet"; } ?></p>

                <br/>

                <a href="<?= site_url('admin/announcements/view/' . $ann_info['AnnID'] . '/edit'); ?>">
                    <button style="background-color:#428bca;color:white;"class="btn btn-primary">
                        <span class="glyphicon glyphicon-pencil">  </span> Edit
                    </button>
                </a>

                <a href="<?= site_url('admin/announcements/view/' . $ann_info['AnnID'] . '/delete'); ?>" onClick="return confirm('Are you sure you want to delete this announcement? This action cannot be undone')">
                    <button style="background-color:#d9534f;color:white;" class="btn btn-danger">
                        <span class="pe-7s-trash">  </span> Delete
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>



