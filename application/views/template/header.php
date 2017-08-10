<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <title><?= $title; ?></title>
  <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/jquery.datetimepicker.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/owl.theme.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/owl.transitions.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/lightbox.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/fonts/et-line-font/style.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/animate.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/main.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/bootstrap-drawer.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" >

  <style>
    body { margin: 0; }
    
    canvas {
      width: 100%;
      height:100%;
    }

    .row{position: relative;padding:7px;}
    .post-list { 
        margin-bottom:20px;
    }
    
    /* search & filter */
      .post-search-panel input[type="text"]{
          width: 220px;
          height: 28px;
          color: #333;
          font-size: 16px;
      }
      .post-search-panel select{
          height: 34px;
          color: #333;
          font-size: 12px;
      }

      /* Pagination */
      div.pagination {
        font-family: "Lucida Sans Unicode", "Lucida Grande", LucidaGrande, "Lucida Sans", Geneva, Verdana, sans-serif;
        padding:2px;
        margin: 20px 10px;
        float: right;
      }

      div.pagination a {
        margin: 2px;
        padding: 0.5em 0.64em 0.43em 0.64em;
        background-color: #FD1C5B;
        text-decoration: none; /* no underline */
        color: #fff;
      }

      div.pagination a:hover, div.pagination a:active {
        padding: 0.5em 0.64em 0.43em 0.64em;
        margin: 2px;
        background-color: #FD1C5B;
        color: #fff;
      }

      div.pagination span.current {
          padding: 0.5em 0.64em 0.43em 0.64em;
          margin: 2px;
          background-color: #f6efcc;
          color: #6d643c;
        }

        div.pagination span.disabled {
            display:none;
          }

        .pagination ul li{display: inline-block;}
        .pagination ul li a.active{opacity: .5;}

        /* loading */
        .loading{position: absolute;left: 0; top: 0; right: 0; bottom: 0;z-index: 2;background: rgba(255,255,255,0.7);}
        .loading .content {
          position: absolute;
          transform: translateY(-50%);
         -webkit-transform: translateY(-50%);
         -ms-transform: translateY(-50%);
          top: 50%;
          left: 0;
          right: 0;
          text-align: center;
          color: #555;
      }
  </style>
</head>

