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
            <li role="presentation"><a href="<?= site_url('admin/announcements'); ?>"><b>Upcoming</b></a></li>
            <li role="presentation"><a href="<?= site_url('admin/past_announcements'); ?>"><b>Past</b></a></li>
            <li role="presentation" class="active"><a href="<?= site_url('admin/announcements/type'); ?>"><b>Announcement Type</b></a></li>
        </ul>

            <?php if($this->session->flashdata('type_added')): ?>
            <?php echo '<p class="alert alert-info">'.$this->session->flashdata('type_added').'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('type_updated')): ?>
            <?php echo '<p class="alert alert-info">'.$this->session->flashdata('type_updated').'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('type_deleted')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('type_deleted').'</p>'; ?>
            <?php endif; ?>

            <br/>
        <div class="col-md-5">
            <a href="<?= site_url('admin/announcements/types/add'); ?>" style="background-color:#5cb85c ;color:white; margin-right: 2%" class="btn btn-success pull-right">Add Type</a>
            <br/><br/><br/>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr style="text-align:center;">
                        <th style="text-align:center;">Type Name</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($typos as $types) : ?>

                        <tr style="text-align:center;">
                            <td><?= $types['TypeName']; ?></td>
                            <td>
                                <a href="<?= site_url('admin/announcements/types/edit/' . $types['TypeID']); ?>">
                                    <button  style="background-color:#428bca;color:white;" type="button" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-pencil"></span> Edit
                                    </button>
                                </a>

                                <a href="<?= site_url('admin/announcements/types/delete/' . $types['TypeID']); ?>">
                                    <button  style="background-color:#d9534f;color:white;" type="button" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this type? This action cannot be undone.')">
                                        <span class="glyphicon glyphicon-remove"></span> Delete
                                    </button>   
                                </a>
                            </td>
                        </tr>
                    
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="pagination-links pull-right">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
