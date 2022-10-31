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
		<link rel="icon" href="<?= base_url(); ?>/img/icon/favicon.ico" type="image/x-icon"/>
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

		<!-- Fonts and icons -->
		<script src="<?= base_url() ?>/dash/js/plugin/webfont/webfont.min.js"></script>
		<script>
			WebFont.load({
				google: {"families":["Lato:300,400,700,900"]},
				custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url() ?>/dash/css/fonts.min.css']},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?=base_url()?>/plugins/fontawesome-free/css/all.min.css">
		<!-- CSS Files -->
		<link rel="stylesheet" href="<?= base_url() ?>/dash/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>/dash/css/atlantis.min.css">
		<!-- TataTable -->
		<link href="<?=base_url()?>/plugins/datatable/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>/plugins/datatable/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
		<!--<link href="<?=base_url()?>/plugins/datatable/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>/plugins/datatable/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>/plugins/datatable/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>/plugins/datatable/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>/plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>/plugins/datatable/css/rowGroup.bootstrap5.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>/plugins/datatable/datatables.min.css" rel="stylesheet" type="text/css" />
		<!--<link href="<?=base_url()?>/plugins/datatable/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>/plugins/datatable/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />-->
		<!--   Core JS Files   -->
		<script src="<?= base_url(); ?>/dash/js/core/jquery.3.2.1.min.js"></script>
		<script src="<?= base_url(); ?>/dash/js/core/popper.min.js"></script>
		<script src="<?= base_url(); ?>/dash/js/core/bootstrap.min.js"></script>

		<!-- jQuery UI -->
		<script src="<?= base_url(); ?>/dash/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="<?= base_url(); ?>/dash/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

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
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="<?= base_url() ?>" class="logo">
					<img src="<?= base_url() ?>/img/logo_brand.png" alt="navbar brand" class="navbar-brand" width="133">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages 									
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img"> 
													<img src="<?= base_url() ?>/dash/img/jm_denis.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="<?= base_url() ?>/dash/img/chadengle.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Chad</span>
													<span class="block">
														Ok, Thanks !
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="<?= base_url() ?>/dash/img/mlane.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jhon Doe</span>
													<span class="block">
														Ready for the meeting today...
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="<?= base_url() ?>/dash/img/talha.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Talha</span>
													<span class="block">
														Hi, Apa Kabar ?
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
												<div class="notif-content">
													<span class="block">
														Rahmad commented on Admin
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="<?= base_url() ?>/dash/img/profile2.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="block">
														Reza send messages to you
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
												<div class="notif-content">
													<span class="block">
														Farrah liked Admin
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Report</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Create New Database</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Create New Post</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Create New Task</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Completed Tasks</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Create New Invoice</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
								<?php if(!empty(session()->get('imageProfile'))): ?>
									<img src="<?= base_url() ?>/uploads/profile/<?=session()->get('imageProfile');?>" class="avatar-img rounded-circle">
								<?php else:  ?>
									<img src="<?= base_url() ?>/uploads/profile/no_image.jpg" class="avatar-img rounded-circle">
								<?php endif ?>
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg">
											<?php if(!empty(session()->get('imageProfile'))): ?>
											<img src="<?= base_url() ?>/dash/img/profile.jpg" class="avatar-img rounded">
											<?php else:  ?>
												<img src="<?= base_url() ?>/uploads/profile/no_image.jpg" class="avatar-img rounded">
											<?php endif ?>
											</div>
											<div class="u-text">
												<h4><?= session()->get('firstName').' '.session()->get('lastName'); ?></h4>
												<p class="text-muted"><?= session()->get('email'); ?></p><a href="<?= base_url('/admin/profile'); ?>" class="btn btn-xs btn-secondary btn-sm">ดูข้อมูล</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= base_url('/admin/profile'); ?>"><i class="fas fa-user"></i>&nbsp;ข้อมูลส่วนตัว</a>
										<a class="dropdown-item" href="<?= base_url('/admin/changePassword'); ?>"><i class="fas fa-key"></i>&nbsp;เปลี่ยนรหัสผ่าน</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= base_url('/logout'); ?>"><i class="fas fa-power-off"></i>&nbsp;ออกจาระบบ</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
