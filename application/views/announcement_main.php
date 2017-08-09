<body class="has-drawer">
<section class="main-header">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/media/logo.png"  alt="logo" class="img-responsive" style="margin:0;padding:0;width:70px;height:70px"></a>
                </div>
                <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                    <div class="col-md-8 col-xs-12 nav-wrap">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= base_url(); ?>" class="page-scroll">Home</a></li>
                            <li><a href="<?= base_url(); ?>announcement_main" class="page-scroll">Announcement</a></li>
                            <li><a href="<?= base_url() . 'map_directory' ; ?>" class="page-scroll">Map Directory</a></li>
                            <li><a href="<?= base_url() . 'help' ; ?>" class="page-scroll">Tutorial</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
</section>
<div class="container-fluid">
    <div class="panel">
    <div class="panel-title"><h3><?= $title; ?></h3></div>
    <br/>
         <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#upcoming">Upcoming Announcements</a></li>
                <li><a data-toggle="tab" href="#past">Past Announcements</a></li>
        </ul>
    </div>

    <div class="tab-content">

        <div id="upcoming" class="tab-pane fade in active">
        <div class="panel panel-primary">
        <div class="panel-heading">Upcoming Announcements</div>
            <table class="table table-bordered">
                <thead style="background-color:#f1f1f1;">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th style="width:20%">Description</th>
                        <th>Type</th>
                        <th>Organizer</th>
                        <th>Venue</th>
                        <th>Start Date/Time</th>
                        <th>End Date/Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($upcome as $upcoming) : ?>
                    <tr>
                        <td><?= $upcoming['AnnID']; ?></td>
                        <td><?= $upcoming['AnnTitle']; ?></td>
                        <td style="width:20%"><?= $upcoming['AnnDesc']; ?></td>
                        <td><?= $upcoming['TypeName']; ?></td>
                        <td><?= $upcoming['AnnOrganizer']; ?></td>
                        <td><?= $upcoming['AnnVenue']; ?></td>
                        <td><?= $upcoming['AnnStartTime']; ?></td>
                        <td><?= $upcoming['AnnEndTime']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>

        <div id="past" class="tab-pane fade">
            <div class="panel panel-danger">
        <div class="panel-heading">Past Announcements</div>
            <table class="table table-bordered">
                <thead style="background-color:#f1f1f1;">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th style="width:20%">Description</th>
                        <th>Type</th>
                        <th>Organizer</th>
                        <th>Venue</th>
                        <th>Start Date/Time</th>
                        <th>End Date/Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pass as $past) : ?>
                    <tr>
                        <td><?= $past['AnnID']; ?></td>
                        <td><?= $past['AnnTitle']; ?></td>
                        <td style="width:20%"><?= $past['AnnDesc']; ?></td>
                        <td><?= $past['TypeName']; ?></td>
                        <td><?= $past['AnnOrganizer']; ?></td>
                        <td><?= $past['AnnVenue']; ?></td>
                        <td><?= $past['AnnStartTime']; ?></td>
                        <td><?= $past['AnnEndTime']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>

        </div><!--End of Tab Content-->


    




</div>