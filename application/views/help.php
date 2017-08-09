<body style="background-color: #7f8c8d">
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
                    <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/media/logo.png" class="img-responsive" alt="logo" style="width:75px; height:65px;"></a>
                </div>
                <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                    <div class="col-md-8 col-xs-12 nav-wrap">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= base_url(); ?>" class="page-scroll">Home</a></li>
                            <li><a href="<?= base_url() . 'announcement_main' ; ?>" class="page-scroll">Announcement</a></li>
                            <li><a href="<?= base_url() . 'map_directory' ; ?>" class="page-scroll">Map Directory</a></li>
                            <li><a href="<?= base_url() . 'help' ; ?>" class="page-scroll">Tutorial</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <div class="container">
        <div class="jumbotron">
            <h1><span class="glyphicon glyphicon-question-sign"> </span> Help / Tutorial</h1>
            <br/><hr/>
            <p><b>If you're using the system for the first time, this section is under you.</b></p> 
            <hr/>

            <b><p>1. You want to view the map directory of the Caloocan High School?</p></b>
            <ul style="list-style-type:none">
                <li>a. Tap the <a href="<?= base_url() . 'map_directory'; ?>">link here</a></li>
                <li>b. Look at the above menu and tap the <a href="<?= base_url() . 'map_directory'; ?>">"Map Directory"</a> to see the page.</li>
            </ul>
            <hr/>
            <b><p>2. You want to check upcoming or past announcements of Caloocan High School?</p></b>
            <ul style="list-style-type:none">
                <li>a. Tap the <a href="<?= base_url() . 'announcement_main'; ?>">link here</a></li>
                <li>b. Look at the above menu and tap the <a href="<?= base_url() . 'announcement_main'; ?>">"Announcement"</a> to see the page.</li>
            </ul>
             <hr/>
            <b><p>3. Back to homepage and explore</p></b>
            <ul style="list-style-type:none">
                <li>a. Tap the <a href="<?= base_url(); ?>">link here</a></li>
                <li>b. Look at the above menu and tap the <a href="<?= base_url(); ?>">"Home"</a> to see the homepage.</li>
            </ul>
            <br/>
            <p><i>Not familiar using computer, the school staffs are there to assist us.</i></p>
        </div>
    </div>


