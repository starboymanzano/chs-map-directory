<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="<?= base_url() . 'assets/media/admin/sidebar.jpg'; ?>">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?= base_url() . 'admin'; ?>" class="simple-text">
                    <img width="25%" height="25%" src="<?= base_url() . 'assets/media/admin/logo.png'; ?>" /><br/>Welcome, <?= $admin['AdminFullName']; ?></a>
            </div>
            <ul class="nav">
                <li class="active">
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
            <?php if($this->session->flashdata('user_loggedin')): ?>
            <?php echo '<p class="alert alert-info">'.$this->session->flashdata('user_loggedin'). ' ' . $admin['AdminFullName'] . ' </p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('profile_updated')): ?>
            <?php echo '<p class="alert alert-info">'.$this->session->flashdata('profile_updated').'</p>'; ?>
            <?php endif; ?>

                <div class="col-md-6" style="padding:3%;">
                    <?php echo form_open('admin/profile/update'); ?>
                        <input type="hidden" name="school_seqno" />
                        <div class="form-group">
                            <label for="school_name">School Name</label>
                            <input type="text" class="form-control" id="school_name" value="Caloocan High School" readonly/>
                        </div>

                        <div class="form-group">
                            <label for="school_add">School Address</label>
                            <input type="text" class="form-control" id="school_add" value="10th ave., West Grace Park, Barangay 62, Zone 2, District 2, Caloocan City" readonly/>
                        </div>

                        <div class="form-group">
                            <label for="school_tel">School Telephone Number</label>
                            <input type="text" class="form-control" id="school_tel" name="school_telno" value="<?= $profile['SchoolTelNo']; ?>" required />
                            <h3 class="label label-default">Ex. (02) 123-4567 (Optional: Local hotlines)</h3>
                        </div>

                        <div class="form-group">
                            <label for="school_fax">School Fax Number</label>
                            <input type="text" class="form-control" id="school_fax" name="school_faxno" value="<?= $profile['SchoolFaxNo']; ?>" required/>
                            <h3 class="label label-default">Ex. (02) 123-4567 (Optional: Local hotlines)</h3>
                        </div>
                        
                        <div class="form-group">
                            <label for="school_email">School E-mail Address</label>
                            <input type="email" class="form-control" id="school_email" name="school_emailadd" value="<?= $profile['SchoolEmail']; ?>" required />
                            <h3 class="label label-default">Ex. youremail@domain.com</h3>
                        </div>

                        <hr/>

                        <div class="form-group">
                            <input style="background-color:#428bca;color:white;" type="submit" class="btn btn-primary form-control" value="Update School Profile" />
                        </div>
                    <?php echo form_close(); ?>
                </div>     
    </div>
</div>

        