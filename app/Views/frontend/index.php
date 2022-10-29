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
          <li><a href="<?=base_url();?>" class="active">หน้าแรก</a></li>
          <li><a href="<?=base_url();?>/complaint">ส่งเรื่องร้องเรียน</a></li>
		  <li><a href="<?=base_url();?>/chat">ถามตอบ</a></li>
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h3 data-aos="fade-down">ขอต้อนรับสู่ระบบ <span>ITA</span></h3>
            	<p data-aos="fade-up">ระบบนี้เป็นระบบสำหรับรวบรวมร่องรอยในรูปแบบไฟล์เอกสาร ไฟล์รูปภาพ และอื่นๆ เพื่อรองรับการประเมิน ITA ของโรงเรียน</p>
            <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Get Started</a>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url(<?= base_url(); ?>/front/img/hero-carousel/hero-carousel-1.jpg)"></div>
      <div class="carousel-item" style="background-image: url(<?= base_url(); ?>/front/img/hero-carousel/hero-carousel-2.jpg)"></div>
      <div class="carousel-item" style="background-image: url(<?= base_url(); ?>/front/img/hero-carousel/hero-carousel-3.jpg)"></div>
      <div class="carousel-item" style="background-image: url(<?= base_url(); ?>/front/img/hero-carousel/hero-carousel-4.jpg)"></div>
      <div class="carousel-item" style="background-image: url(<?= base_url(); ?>/front/img/hero-carousel/hero-carousel-5.jpg)"></div>

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter section-bg">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="fas fa-file-pdf text-warning flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?=number_format($pdf);?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>ไฟล์ PDF</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="fas fa-file-image text-success flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?=number_format($img);?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>ไฟล์รูปภาพ</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="fas fa-file-word text-danger flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?=number_format($doc);?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>ไฟล์ Office</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="fas fa-link text-primary flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?=number_format($linkurl);?>" data-purecounter-duration="1" class="purecounter"></span>
                <p>Link</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row p-0">
          <div class="col-lg-4">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-map text-info"></i>
			  <a href="<?=base_url('complaint');?>" class="text-center">
              <h3>ช่องทางร้องเรียน</h3>
              <p><?=lang('Constant.webAuth_School');?></p>
			  </a>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-4 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-envelope text-success"></i>
              <h3>แสดงความคิดเห็น</h3>
              <p><?=lang('Constant.email');?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-4 col-md-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-telephone text-danger"></i>
              <h3>ถาม-ตอบ</h3>
              <p>+66 <?=lang('Constant.phone');?></p>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2> OIT </h2>
          <p>แบบตรวจการเปิดเผยข้อมูลสาธารณะ (Open Data Integrity and Transparency Assessment: OIT) มีวัตถุประสงค์เพื่อเป็นการประเมินระดับการเปิดเผยข้อมูลต่อสาธารณะของหน่วยงาน เพื่อให้ประชาชนทั่วไปสามารถเข้าถึงได้ ในตัวชี้วัดการเปิดเผยข้อมูล และการป้องกันการทุจริต สำหรับการประเมินคุณธรรมและความโปร่งใสในการดำเนินงานของหน่วยงานภาครัฐ (ITA)</p>
        </div>
        <div class="accordion" id="accordionExample">
        <?php foreach ($itemsub as $key => $itemall_item) : $aa=$key+1;?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?= $key + 1; ?>">
              <button class="accordion-button <?php if($aa !=1){ echo "collapsed";}?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $key + 1; ?>" aria-expanded="false" aria-controls="collapse<?= $key + 1; ?>">
                <?= $itemall_item['is_item']; ?> : <?= $itemall_item['is_category_name']; ?>
              </button>
            </h2>
            <div id="collapse<?= $key + 1; ?>" class="accordion-collapse collapse <?php if($aa==1){ echo "show";}?>" aria-labelledby="heading<?= $key + 1; ?>" data-bs-parent="#accordionExample">
              <div class="accordion-body">
					<?php
						if($aa==1):
							$itemall = $item_1;
						elseif($aa==2):
							$itemall = $item_2;
						elseif($aa==3):
							$itemall = $item_3;
						elseif($aa==4):
							$itemall = $item_4;
						elseif($aa==5):
							$itemall = $item_5;
						elseif($aa==6):
							$itemall = $item_6;
						elseif($aa==7):
							$itemall = $item_7;
						endif;
					?>
                          <table id="basic-datatables" class="display table table-striped responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%" class="text-center">#</th>
                                        <th class="text-center">รายการ</th>
                                        <th style="width: 15%" class="text-center">จำนวนรายการ</th>
                                        <th style="width: 18%" class="text-center">option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($itemall as $keys => $itemall_item) : $bb=$keys + 1; $cc=$aa-5; $dd=$bb-5;?>
										<?php
										if($aa>0 and $aa<6):
												$LinkDetail = '<a href="'.base_url('item9_detail').'/1/'.$aa.'/'.$itemall_item['it_id'].'" class="btn btn-success btn-sm" target="_blanks"><i class="fas fa-search"></i></a>';
										elseif($aa>5 and $aa<8):
												$LinkDetail = '<a href="'.base_url('item10_detail').'/2/'.$cc.'/'.$itemall_item['it_id'].'" class="btn btn-success btn-sm" target="_blanks"><i class="fas fa-search"></i></a>';
										endif;
										?>
										<div id="accordion<?= $keys + 1; ?>">
                                            <tr>
                                                <td class="text-center"><?= $keys + 1; ?></td>
                                                <td>
												<?= $itemall_item['it_topic'];?>
												</td>
                                                <td class="text-center">
													<div  id="divid">
															<?=$itemall_item['Coup'];?>
													</div>
                                                </td>
                                                <td class="text-center">
													<?=$LinkDetail;?>
													</div>
                                                </td>
                                            </tr>
										</div>

                                        <?php endforeach ?>

                                </tbody>
                            </table>

              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>

      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-10 col-md-6">
            <div class="footer-info">
              <h3><?=lang('Constant.webTitle_short');?> <?=lang('Constant.webVersion');?></h3>
              <p>
                <?=lang('Constant.webAuth_School');?> <br>
                <?=lang('Constant.webAuth_Area');?><br><br>
                <strong>Phone:</strong> +66 <?=lang('Constant.phone');?><br>
                <strong>Email:</strong> <?=lang('Constant.email');?><br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><a href="<?=base_url();?>">Home</a></li>
              <li><a href="<?=base_url();?>/login">Login</a></li>
              <li><a href="<?=base_url();?>/about">Auth</a></li>
            </ul>
          </div><!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span><?=lang('Constant.webTitle_short');?> <?=lang('Constant.webVersion');?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
          Designed by <a href="<?=lang('Constant.webHome');?>"><?=lang('Constant.auth');?></a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/plugins/aos/aos.js"></script>
  <script src="<?= base_url(); ?>/plugins/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url(); ?>/plugins/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>/plugins/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url(); ?>/plugins/purecounter/purecounter_vanilla.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>/front/js/main.js"></script>
  <script type="text/javascript">
	$(document).ready(function() {
		$('#basic-datatables').DataTable();
	});
  </script>
</body>

</html>