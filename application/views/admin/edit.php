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
                    <a class="navbar-brand" href=""><?= 'Edit ' . $est_info['EstName']; ?></a>
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
                    <div class="col-lg-7">
                    <?= form_open('admin/establishment/view/' . $est_info['EstID'] . '/edit'); ?>
                        <input type="hidden" name="temp_id" value="<?= $est_info['EstID']; ?>" />
                            <p><strong>Establishment Name: </strong></p>
                             <p><input required class="form-control" type="text" name="est_name" value="<?= $est_info['EstName']; ?>"/></p>

                            <p><strong>Description: </strong></p>
                            <p style="text-indent:2%;">
                                <textarea required id="editor1" name="description" rows="10" cols="100"><?= preg_replace('/[\s]+/',' ', $est_info['EstDesc']); ?></textarea>
                            </p>

                            <p><strong>Walk Time:</strong></p>
                            <p style="text-indent:2%;">
                                <select class="form-control" required name="walktime">
                                    <option selected value="<?= preg_replace('/[\s]+/',' ', $est_info['EstWalkTime']); ?>"><?= preg_replace('/[\s]+/',' ', $est_info['EstWalkTime']); ?></option>
                                    <option value="10 seconds">10 seconds</option>
                                    <option value="20 seconds">20 seconds</option>
                                    <option value="30 seconds">30 seconds</option>
                                    <option value="40 seconds">40 seconds</option>
                                    <option value="50 seconds">50 seconds</option>
                                    <option value="1 minute">1 minute</option>
                                    <option value="1 minute 15 seconds">1 minute 15 seconds</option>
                                    <option value="1 minute 30 seconds">1 minute 30 seconds</option>
                                    <option value="1 minute 45 seconds">1 minute 45 seconds</option>
                                    <option value="2 minutes">2 minutes</option>
                                </select>
                            </p>

                            <p><strong>Distance:</strong></p>
                            <p style="text-indent:2%;">
                                <select class="form-control" required name="distance">
                                    <option selected value="<?= preg_replace('/[\s]+/',' ', $est_info['EstDistance']); ?>"><?= preg_replace('/[\s]+/',' ', $est_info['EstDistance']); ?></option>
                                    <option value="10 meters">10 meters</option>
                                    <option value="20 meters">20 meters</option>
                                    <option value="30 meters">30 meters</option>
                                    <option value="40 meters">40 meters</option>
                                    <option value="50 meters">50 meters</option>
                                    <option value="60 meters">60 meters</option>
                                    <option value="70 meters">70 meters</option>
                                    <option value="80 meters">80 meters</option>
                                    <option value="90 meters">90 meters</option>
                                    <option value="100 meters">100 meters</option>
                                    <option value="110 meters">110 meters</option> 
                                    <option value="120 meters">120 meters</option> 
                                    <option value="130 meters">130 meters</option> 
                                    <option value="140 meters">140 meters</option>
                                    <option value="150 meters">150 meters</option>
                                    <option value="160 meters">160 meters</option> 
                                    <option value="170 meters">170 meters</option> 
                                    <option value="180 meters">180 meters</option> 
                                    <option value="190 meters">190 meters</option> 
                                    <option value="200 meters">200 meters</option>   
                                </select>
                            </p><br/>

                            <input style="background-color:#428bca; color:white;" class="btn btn-primary" type="submit" value="Update Information">

                            <a style="margin-left:1%; background-color:#5bc0de; color:white;" class="btn btn-info" href="<?= site_url('admin/establishment/view/' . $est_info['EstID']); ?>">Cancel</a>   
                    <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

