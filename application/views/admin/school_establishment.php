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
        <div class="col-md-11" style="padding:3%;" >
            <?php foreach($estabs as $establishment) : ?>
                <div class="row">
                    <div class="col-xs-10 slide-row">
                        <div class="col-md-4">
                            <a href="<?= site_url('admin/establishment/view/' . $establishment['EstID']); ?>" class="thumbnail">
                                <img class="img-responsive" src="<?= base_url() . 'assets/media/admin/buildings/' . $establishment['EstImage']; ?>" alt="<?= $establishment['EstName']; ?>">
                            </a>
                        </div>
                        <div class="slide-content">
                            <h4><?= $establishment['EstName'] ?></h4>
                            <p class="truncate"><?= $establishment['EstDesc']; ?></p>
                            <p><b>Walk Time: </b><?= $establishment['EstWalkTime']; ?></p>
                            <p><b>Distance: </b><?= $establishment['EstDistance']; ?></p>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="slide-footer" style="position:relative;">
                            <span class="pull-right buttons">
                                <a href="<?= site_url('admin/establishment/view/' . $establishment['EstID']); ?>">
                                    <button style="background-color:#428bca; color:#f9f9f9;" class="btn btn-lg btn-primary"><i class="pe-7s-notebook"> </i> Show Info</button>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <hr/>
            <?php endforeach; ?>
            <div class="pagination-links">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>

