<body>
    <section class="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
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
                            <li><a href="#owl-hero" class="page-scroll">Home</a></li>
                            <li><a href="<?= base_url() . 'announcement_main' ; ?>" class="page-scroll">Announcement</a></li>
                            <li><a href="<?= base_url() . 'map_directory' ; ?>" class="page-scroll">Map Directory</a></li>
                            <li><a href="<?= base_url() . 'help' ; ?>" class="page-scroll">Tutorial</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div id="owl-hero" class="owl-carousel owl-theme">
            <div class="item img-responsive" style="background-image: url(<?= base_url(); ?>assets/media/sliders/Slide.jpg)">
                <div class="caption">
                    <br/><br/>
                    <h1>Caloocan High School</h1>
                    <h6 style="padding: 0 100px 0 100px;text-align:center"><span>Caloocan High School first stepped its foot to then Municipality of Caloocan in 1941. It was once the second largest high school in the entire Asia, with a population of 10,000 students. Now, it currently offers multi-curricular programs, complying to the standards set by the Department of Education.</span></h6>
                    <!--<a class="btn btn-transparent" href="#">Learn More</a><a class="btn btn-light" href="#">Buy Now</a>-->
                </div>
            </div>
            <div class="item img-responsive" style="background-image: url(<?= base_url(); ?>assets/media/sliders/Slide2.jpg)">
                <div class="caption">
                    <h1>Now offer 3D Map</h1>
                    <h6 style="padding: 0 100px 0 100px;text-align:center"><span>Using Kiosk Touch Screen, you can find and navigate the Map Directory easily.</span></h6>
                     <!--<a class="btn btn-transparent" href="#">Learn More</a><a class="btn btn-light" href="#">Buy Now</a>-->
                </div>
            </div>
            <div class="item img-responsive" style="background-image: url(<?= base_url(); ?>assets/media/sliders/Slide5.jpg)">
                <div class="caption">
                    <h1 style="padding: 0 100px 0 100px;">Check announcement at a glance</h1>
                    <h6 style="padding: 0 100px 0 100px;text-align:center"><span>Using Kiosk Touch Screen, you can check announcement effortless.</span></h6>
                     <!--<a class="btn btn-transparent" href="#">Learn More</a><a class="btn btn-light" href="#">Buy Now</a>-->
                </div>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="container">
            <h1 style="font-size:270%;">CALOOCAN HIGH SCHOOL</h1>
            <h6>10th ave., West Grace Park, Barangay 62, Zone 2, District 2, Caloocan City</h6><br/>
            <h6><span class="glyphicon glyphicon-earphone "> </span> <?= 'Tel. No: ' . $profile['SchoolTelNo']; ?></h6>
            <h6><span class="glyphicon glyphicon-earphone "> </span> <?= 'Fax. No: ' . $profile['SchoolFaxNo']; ?></h6>
             <h6><span class="glyphicon glyphicon-hand-right "> </span> <?= 'E-mail: ' . $profile['SchoolEmail']; ?></h6>
        </div>
    </footer>