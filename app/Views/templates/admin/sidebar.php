<?php
    $uri = new \CodeIgniter\HTTP\URI(current_url());
    $uri_one = '';
	$uri_two = '';
	$uri_tree = '';
	$uri_four = '';
	$uri_five = '';
	$uri_six = '';
    if($uri->getTotalSegments() > 0 && $uri->getSegment(1))
        $uri_one = $uri->getSegment(1);
    if($uri->getTotalSegments() > 1 && $uri->getSegment(2))
	    $uri_two = $uri->getSegment(2);
    if($uri->getTotalSegments() > 2 && $uri->getSegment(3))
	    $uri_tree = $uri->getSegment(3);
    if($uri->getTotalSegments() > 3 && $uri->getSegment(4))
	    $uri_four = $uri->getSegment(4);
    if($uri->getTotalSegments() > 4 && $uri->getSegment(5))
	    $uri_five = $uri->getSegment(5);
    if($uri->getTotalSegments() > 5 && $uri->getSegment(6))
	    $uri_six = $uri->getSegment(6);
?>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
						<?php if(!empty(session()->get('imageProfile'))): ?>
							<img src="<?=base_url()?>/uploads/profile/<?=session()->get('imageProfile');?>" class="avatar-img rounded-circle">
						<?php else:  ?>
							<img src="<?=base_url()?>/uploads/profile/no_image.jpg" class="avatar-img rounded-circle">
						<?php endif ?>
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= session()->get('firstName').' '.session()->get('lastName'); ?>
									<span class="user-level"><?= session()->get('role'); ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="<?= base_url('/admin/profile'); ?>">
											<span class="link-collapse">ข้อมูลส่วนตัว</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('/admin/changePassword'); ?>">
											<span class="link-collapse">เปลี่ยนรหัสผ่าน</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('/logout'); ?>">
											<span class="link-collapse">ออกจากระบบ</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item <?php if($uri_two=='admin' and ($uri_tree=='' or !isset($uri_tree)) ): echo "active"; endif;?>">
							<a href="<?= base_url(); ?>/admin" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>หน้าแรก</p>
							</a>
						</li>
						<!--<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">จัดการระบบ</h4>
						</li>-->
						<li class="nav-item <?php if($uri_two=='admin' and $uri_tree=='item9' or ($uri_six>0 and $uri_six<34)): echo "active"; endif;?>">
							<a data-toggle="collapse" href="#O9" class="collapsed" aria-expanded="false">
								<i class="fas fa-edit"></i>
								<p>บันทึกการปฏิบัติ</p>
								<span class="caret"></span>
							</a>
							<div class="collapse <?php if($uri_two=='admin' and $uri_tree=='item9' or ($uri_six>0 and $uri_six<34)): echo "show"; endif;?>" id="O9">
								<ul class="nav nav-collapse">
									<li class="<?php if($uri_two=='admin' and $uri_tree=='item9' and $uri_four=='1' and $uri_five=='1' or ($uri_six >0 and $uri_six<10) ): echo "active"; endif;?>">
										<a href="<?=base_url('admin/item9/1/1')?>">
											<span class="sub-item">ครูเวร</span>
										</a>
									</li>
									<li class="<?php if($uri_two=='admin' and $uri_tree=='item9' and $uri_four=='1' and $uri_five=='2' or ($uri_six >9 and $uri_six<18) ): echo "active"; endif;?>">
										<a href="<?=base_url('admin/item9/1/2')?>">
											<span class="sub-item">ภารโรงเวร</span>
										</a>
									</li>
									<li class="<?php if($uri_two=='admin' and $uri_tree=='item9' and $uri_four=='1' and $uri_five=='2' or ($uri_six >9 and $uri_six<18) ): echo "active"; endif;?>">
										<a href="<?=base_url('admin/item9/1/2')?>">
											<span class="sub-item">ผู้ตรวจเวร</span>
										</a>
									</li>
									<li class="<?php if($uri_two=='admin' and $uri_tree=='item9' and $uri_four=='1' and $uri_five=='2' or ($uri_six >9 and $uri_six<18) ): echo "active"; endif;?>">
										<a href="<?=base_url('admin/item9/1/2')?>">
											<span class="sub-item">ผอ./ผู้ได้รับมอบหมาย</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?php if($uri_two=='admin' and $uri_tree=='item10' or ($uri_six>33 and $uri_six<44)): echo "active"; endif;?>">
							<a data-toggle="collapse" href="#O10" class="collapsed" aria-expanded="false">
								<i class="fas fa-line-chart"></i>
								<p>สารสนเทศ</p>
								<span class="caret"></span>
							</a>
							<div class="collapse <?php if($uri_two=='admin' and $uri_tree=='item10' or ($uri_six>33 and $uri_six<44)): echo "show"; endif;?>" id="O10">
								<ul class="nav nav-collapse">
									<li class="<?php if($uri_two=='admin' and $uri_tree=='item10' and $uri_four=='2' and $uri_five=='1' or ($uri_six >33 and $uri_six<42) ): echo "active"; endif;?>">
										<a href="<?=base_url('admin/item10/2/1')?>">
											<span class="sub-item">ตามเวร</span>
										</a>
									</li>
									<li class="<?php if($uri_two=='admin' and $uri_tree=='item10' and $uri_four=='2' and $uri_five=='2' or ($uri_six >41 and $uri_six<44) ): echo "active"; endif;?>">
										<a href="<?=base_url('admin/item10/2/2')?>">
											<span class="sub-item">ตามวัน</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!--<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">ข้อมูลส่วตัว</h4>
						</li>-->
						<li class="nav-item <?php if($uri_two=='admin' and $uri_tree=='profile' ): echo "active"; endif;?>">
							<a  href="<?= base_url(session()->get('role').'/profile')?>">
								<i class="fas fa-print"></i>
								<p>พิมพ์ผลการปฏิบัติ</p>
							</a>
						</li>
						<li class="nav-item <?php if($uri_two=='admin' and $uri_tree=='profile' ): echo "active"; endif;?>">
							<a  href="<?= base_url(session()->get('role').'/profile')?>">
								<i class="fas fa-user"></i>
								<p>ข้อมูลส่วนตัว</p>
							</a>
						</li>
						<li class="nav-item <?php if($uri_two=='admin' and $uri_tree=='changePassword' ): echo "active"; endif;?>">
							<a  href="<?= base_url(session()->get('role').'/changePassword')?>">
								<i class="fas fa-key"></i>
								<p>เปลี่ยนรหัสผ่าน</p>
							</a>
						</li>
						<li class="nav-item">
							<a  href="<?= base_url('logout')?>">
								<i class="fas fa-power-off"></i>
								<p>ออกจากระบบ</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
			<?php if($uri_two=='admin' and $uri_tree !='' ): echo "<div class=\"page-inner\">"; endif;?>

			