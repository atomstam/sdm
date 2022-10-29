<?php
$request = service('request');
$uri = current_url(true);
//echo (string) $uri;  // http://example.com/index.php
$segments = $uri->getSegments(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ITA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>/img/icon/favicon.ico" rel="icon">
  <link href="<?= base_url(); ?>/img/icon/apple-icon.png" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url(); ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/plugins/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/plugins/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/plugins/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- TataTable -->
  <link href="<?=base_url()?>/plugins/datatable/datatables.min.css" rel="stylesheet" type="text/css" />
  <link href="<?=base_url()?>/plugins/datatable/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="<?=base_url()?>/plugins/datatable/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>/front/css/main.css" rel="stylesheet">

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
  <!-- jQuery -->
  <script src="<?=base_url(); ?>/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?=base_url(); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?=base_url();?>" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="front/img/logo.png" alt=""> -->
					<img src="<?= base_url() ?>/img/logo.png" >
        <h1><?=lang('Constant.webTitle_short');?><span>.</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?=base_url();?>" <?php if($segments[0]=='index.php' and $segments[1]=='' ){ echo 'class="active"';}?>>หน้าแรก</a></li>
          <li><a href="<?=base_url();?>/complaint" <?php if($segments[0]=='index.php' and $segments[1]=='complaint' ){ echo 'class="active"';}?>>ส่งเรื่องร้องเรียน</a></li>
		  <li><a href="<?=base_url();?>/chat" <?php if($segments[0]=='index.php' and $segments[1]=='chat' ){ echo 'class="active"';}?>>ถามตอบ</a></li>
		  <?php if(session()->get('id')): ?>
          <li class="dropdown"><a href="#">
		  						<div class="avatar-sm">
								<?php if(!empty(session()->get('imageProfile'))): ?>
									<img src="<?= base_url() ?>/uploads/profile/<?=session()->get('imageProfile');?>" class="avatar-img rounded-circle">
								<?php else:  ?>
									<img src="<?= base_url() ?>/uploads/profile/no_image.jpg" class="avatar-img rounded-circle">
								<?php endif ?>
								</div>
		  <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?= base_url('/admin'); ?>">จัดการระบบ</a></li>
              <li><a href="<?= base_url('/admin/profile'); ?>">ข้อมูลส่วนตัว</a></li>
              <li><a href="<?= base_url('/admin/changePassword'); ?>">เปลี่ยนรหัสผ่าน</a></li>
              <li><a href="<?= base_url('/logout'); ?>">ออกจาระบบ</a></li>
            </ul>
          </li>
		<?php else: ?>
          <li><a href="<?=base_url();?>/login">เข้าระบบ</a></li>
		<?php endif; ?>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <?php
		$images = array('hero-carousel-1.jpg', 'hero-carousel-2.jpg', 'hero-carousel-3.jpg', 'hero-carousel-4.jpg', 'hero-carousel-5.jpg');
		$random_image = array_rand($images);
  ?>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= base_url(); ?>/front/img/hero-carousel-page/<?=$images[$random_image];?>');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h3><?=$title[1]?></h3>
        <ol>
          <li><a href="<?= base_url();?>">Home</a></li>
          <li><?=$title[1]?></li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

  <!-- ======= heromini Section ======= 
  <section id="heromini" class="heromini">

    <div id="heromini-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url(<?= base_url(); ?>/front/img/hero-carousel-page/hero-carousel-1.jpg)"></div>
      <div class="carousel-item" style="background-image: url(<?= base_url(); ?>/front/img/hero-carousel-page/hero-carousel-2.jpg)"></div>
      <div class="carousel-item" style="background-image: url(<?= base_url(); ?>/front/img/hero-carousel-page/hero-carousel-3.jpg)"></div>
      <div class="carousel-item" style="background-image: url(<?= base_url(); ?>/front/img/hero-carousel-page/hero-carousel-4.jpg)"></div>
      <div class="carousel-item" style="background-image: url(<?= base_url(); ?>/front/img/hero-carousel-page/hero-carousel-5.jpg)"></div>

      <a class="carousel-control-prev" href="#heromini-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heromini-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End heromini Section -->

  <main id="main">