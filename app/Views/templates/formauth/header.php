<?php
$request = service('request');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="<?php echo lang('Constant.webTitle_full');?> : <?php echo lang('Constant.webTitle_short');?>" name="<?php echo lang('Constant.webTitle_full');?>">
    <meta name="keywords" content="ita , ITA" />
    <!-- Title -->
    <title>
        <?php
        if (!empty($title[3])) :
            echo $title[3];
        elseif (!empty($title[2])) :
            echo $title[2];
        else :
            echo $title[1];
        endif;
        ?>
        : <?php echo lang('Constant.webTitle_short');?> </title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url(); ?>/img/icon/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>/img/icon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>/img/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>/img/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>/img/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/img/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>/img/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>/img/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>/img/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>/img/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/img/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>/img/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>/img/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/img/icon/favicon-16x16.png">
    <meta name="msapplication-TileImage" content="<?= base_url() ?>/img/icon/ms-icon-144x144.png">

    <link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">

    <style>
        body,
        table,
        td,
        th {
            font-family: 'Prompt';
            font-size: 15px;
        }

        .sticky-wrapper>div>div>nav>ul>li>a {
            font-family: 'Prompt';
            font-size: 15px;
        }

        .body>div>section>div>div.section-title.d-md-flex>div>h2 {
            font-family: 'Prompt';
        }
    </style>
  </head>
  <body>
