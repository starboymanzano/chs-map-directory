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
                    <a class="navbar-brand" href="">Add Announcement</a>
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
                        <?= form_open('admin/announcements/add'); ?>
                            <div class="row">
                                <div id="message"></div>
                                <div class="col-lg-5">
                                    <label for="starttime">Start Time : </label>
                                    <span><input class="form-control" required autocomplete="disabled" id="default_datetimepicker" type="text" name="starttime"/></span>
                                </div>
                                <div class="col-lg-5">
                                    <label for="endtime">End Time: </label>
                                    <span><input class="form-control" required autocomplete="disabled" id="default_datetimepickers" type="text" name="endtime"/></span>
                                </div>
                            </div>
                            <br/>

                            <label for="title">Announcement Title</label>
                            <p><input required class="form-control" id="title" type="text" name="title"/></p>

                            <label for="desc">Description</label>
                            <p><textarea required rows="5" class="form-control" id="desc" type="text" name="desc"/></textarea></p>

                            <label for="organizer">Organizer</label>
                            <p><input required class="form-control" id="organizer" type="text" name="organizer"/></p>

                            <label for="type">Type</label>
                            <p>
                            <select required name="type" id="type" class="form-control">
                                <option value="" selected disabled>Please Select Type</option>

                                <?php foreach($announce as $announcement) : ?>
                                    <option value="<?= preg_replace('/[\s] + /','', $announcement['TypeID']); ?>"><?= $announcement['TypeName']; ?></option>
                                <?php endforeach; ?> 

                            </select>  
                            </p>

                            <label for="venue">Venue</label>
                            <p><input required class="form-control" id="venue" type="text" name="venue"></p>

                            <input style="background-color:#428bca; color:white;" class="btn btn-primary" type="submit" value="Add">

                            <a style="margin-left:1%; background-color:#5bc0de; color:white;" class="btn btn-info" href="<?= site_url('admin/announcements'); ?>">Cancel</a>
                        <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


