<script src="<?= base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script>
    function searchFilter(page_num) {
        page_num = page_num?page_num:0;
        var searchQuery = $('#searchQuery').val();
        var sortBy = $('#sortBy').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>student/ajaxPaginationData/'+page_num,
            data:'page='+page_num+'&searchQuery='+searchQuery+'&sortBy='+sortBy,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (html) {
                $('#establist').html(html);
                $('.loading').fadeOut("slow");
            }
        });
    }
</script>
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
                            <li><a href="<?= "This is modal"; ?>" class="page-scroll" data-toggle="modal" data-target="#myModal">Announcement</a></li>
                            <li><a href="<?= base_url() . 'map_directory' ; ?>" class="page-scroll">Map Directory</a></li>
                            <li><a href="<?= base_url() . 'help' ; ?>" class="page-scroll">Information</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
</section>

<div id="drawerExample" class="drawer dw-xs-10 dw-sm-6 dw-md-3 fold" aria-labelledby="drawerExample">
    <div class="drawer-controls">
        <p><a href="#drawerExample" data-toggle="drawer" aria-foldedopen="false" aria-controls="drawerExample" class="btn btn-danger btn-lg">
                <span class="glyphicon glyphicon-search"></span>
        </a></p>
    </div>
    <div class="drawer-contents">
        <div class="drawer-heading">
            <h2 class="drawer-title">Search</h2>
        </div>

        <div class="drawer-body">
                <div class="row">
        <div class="post-search-panel">
            <input type="text" id="searchQuery" placeholder="Search Establishment ..." onkeyup="searchFilter()"/>
            <select id="sortBy" onchange="searchFilter()">
                <option value="">Sort By</option>
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
        </div>
        <div class="post-list" id="establist">
            <?php if(!empty($establishment)): foreach($establishment as $establishments): ?>
                <div class="list-item">
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="javascript:void(0);"><?php echo $establishments['EstName']; ?></a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </div>
            <?php endforeach; else: ?>
            <p>Establishment(s) not found.</p>
            <?php endif; ?>
            <?php echo $this->ajax_pagination->create_links(); ?>
        </div>
        <div class="loading" style="display: none;"><div class="content"><img src="<?php echo base_url().'assets/images/loading.gif'; ?>"/></div></div>
    </div>
        </div>
    </div>
</div>


    <div class="container">
        <canvas id="renderCanvas"></canvas>
    </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b><?= $modal_title; ?></b></h4>
      </div>
      <div class="modal-body">
        <a class="pull-right" href="<?= base_url(); ?>announcement_main"><i>>> For more announcements and events, go to this page!</i></a>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#upcoming">Upcoming Announcements</a></li>
            <li><a data-toggle="tab" href="#past">Past Announcements</a></li>
        </ul>

        <div class="tab-content">

        <div id="upcoming" class="tab-pane fade in active">
        <div class="panel panel-primary">
        <div class="panel-heading">Upcoming Announcements</div>
            <table class="table table-bordered">
                <thead style="background-color:#f1f1f1;">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th style="width:30%">Description</th>
                        <th>Type</th>
                        <th>Organizer</th>
                        <th>Venue</th>
                        <th>Start Date/Time</th>
                        <th>End Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($upcome as $upcoming) : ?>
                    <tr>
                        <td><?= $upcoming['AnnID']; ?></td>
                        <td><?= $upcoming['AnnTitle']; ?></td>
                        <td style="width:30%"><?= $upcoming['AnnDesc']; ?></td>
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
            <div class="panel panel-primary">
        <div class="panel-heading">Past Announcements</div>
            <table class="table table-bordered">
                <thead style="background-color:#f1f1f1;">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th style="width:30%">Description</th>
                        <th>Type</th>
                        <th>Organizer</th>
                        <th>Venue</th>
                        <th>Start Date/Time</th>
                        <th>End Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pass as $past) : ?>
                    <tr>
                        <td><?= $past['AnnID']; ?></td>
                        <td><?= $past['AnnTitle']; ?></td>
                        <td style="width:30%"><?= $past['AnnDesc']; ?></td>
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
      </div><!-- Modal Body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->