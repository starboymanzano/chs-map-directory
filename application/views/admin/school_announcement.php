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
            <li role="presentation" class="active"><a href="<?= site_url('admin/announcements'); ?>"><b>Upcoming</b></a></li>
            <li role="presentation"><a href="<?= site_url('admin/past_announcements'); ?>"><b>Past</b></a></li>
            <li role="presentation"><a href="<?= site_url('admin/announcements/types'); ?>"><b>Announcement Type</b></a></li>
        </ul>

            <?php if($this->session->flashdata('announce_added')): ?>
            <?php echo '<p class="alert alert-info">'.$this->session->flashdata('announce_added').'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('announce_deleted')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('announce_deleted').'</p>'; ?>
            <?php endif; ?>

        <br/>
        <a href="<?= site_url('admin/announcements/add'); ?>" style="background-color:#5cb85c ;color:white; margin-right: 2%" class="btn btn-success pull-right">Add Announcement</a>

        <br/> <br/> <br/>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Program Title</th>
                    <th>Type</th>
                    <th>Organizer</th>
                    <th>Venue</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($announce as $announcement) : ?>
                    <tr style="text-align:center;">
                        <td><?= $announcement['AnnID']; ?></td>
                        <td><?= $announcement['AnnTitle']; ?></td>
                        <td><?= $announcement['TypeName']; ?></td>
                        <td><?= $announcement['AnnOrganizer']; ?></td>
                        <td><?= $announcement['AnnVenue']; ?></td>
                        <td><?= $announcement['AnnStartTime']; ?></td>
                        <td><?= $announcement['AnnEndTime']; ?></td>
                        <td>
                            <a href="<?= site_url('admin/announcements/view/' . $announcement['AnnID']); ?>">
                                <button  style="background-color:#428bca;color:white;" type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-road"></span> View
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination-links pull-right">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
