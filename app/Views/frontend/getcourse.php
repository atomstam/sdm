<?php echo view('templates/frontend/header'); ?>
<?php echo view('templates/frontend/breadcrumb'); ?>

<!-- Shape Start -->
<div class="relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmsns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="#f5f4f9"></path>
        </svg>
    </div>
</div>
<!--Shape End-->

<!--Section-->
<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12">

                <?php if(session()->getFlashdata('registed')) : ?>
                <div class="alert alert-warning text-center"><?= session()->getFlashdata('registed'); ?></div>
                <?php endif ?>

                <!--Coursed Description-->
                <div class="card overflow-hidden">

                    <?php if($course_item['c_award'] == 1) : ?>
                    <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger">ส่งประกวด</span>  
                    </div>
					<?php endif ?>

                    <div class="card-body pb-0">
                        <a href="javascript:void(0)" class="text-dark">
                            <h2 class="font-weight-semibold mb-0"><?=$course_item['c_name'];?></h2>
                        </a>
						<div class="mt-2 mb-2">
						<span class="icons fs-16 font-weight-semibold text-dark ">หมวดหมู่ : <a href="javascript:void(0)" class="icons h4 text-dark"><?=$course_item['cat_name']?></a></span>
						</div>
						<p class="mt-2"><a href="javascript:void(0)" class="btn btn-primary btn-sm">ระดับ <?=$course_item['c_level']?></a></p>
                        <p class="lead-1"></p>
                        <div class="product-slider">
                            <ul class="list-unstyled video-list-thumbs">
                                <li class="mb-0">
                                    <a class="class-video p-0">
                                                   <?php if ($course_item['c_cover'] != '') : ?>
                                                        <a href="<?= base_url('/getcourse/' . $course_item['id']); ?>"></a>
                                                        <img src="<?= base_url() ?>/uploads/course/<?= $course_item['c_cover']; ?>" alt="img" class="cover-image br-7 border">
                                                    <?php else : ?>
                                                        <a href="<?= base_url('/getcourse/' . $course_item['id']); ?>"></a>
                                                        <img src="<?= base_url() ?>/uploads/cover/default.png" alt="img" class="cover-image br-7 border">
                                                    <?php endif ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="item-card-text-bottom">
                            <h4 class="mb-0">
                                    
                                    <?php

                                        $sum = $course_item['c_numberUnit'] + 10;
										$created = $course_item['sumUnit'] + $course_item['sumQuestion'];
										$percen = $created*100/$sum;

                                        if($course_item['c_status'] == '1') : 
                                            if($percen == 100) :
                                                echo 'เผยแพร่';
                                            else :
                                                echo '<i class="fe fe-alert-circle"></i> หลักสูตรยังไม่สมบูรณ์';

                                            endif;
                                        else :
                                            echo 'Waiting';
                                        endif;

                                    ?>
                                
                            </h4>
                        </div>
                    </div>
                    <div class="row details-1">
                        <div class="col-xl-6 col-lg-6 col-md-6 ">
                            <div class="card mb-0 border-0 shadow-none">
                                <div class="card-body d-flex pb-0 pb-md-5">
								<?php if ($course_item['imageProfile'] != '') : ?>
                                    <img src="<?=base_url('uploads/profile/'.$course_item['imageProfile'])?>"
                                        class="brround d-none d-md-flex avatar-md me-3" alt="<?=$course_item['firstName'].' '.$course_item['lastName']?>">
								<?php else : ?>
                                    <img src="<?=base_url('assets/images/users/user-profile.png')?>"
                                        class="brround d-none d-md-flex avatar-md me-3" alt="<?=$course_item['firstName'].' '.$course_item['lastName']?>">
								<?php endif ?>
                                    <div>
                                        <span class="icons fs-16 font-weight-semibold text-dark">ผู้สร้าง</span>
                                        <a href="javascript:void(0)"
                                            class="icons h4 text-dark"><span
                                                class=" d-block"><?=$course_item['firstName'].' '.$course_item['lastName'];?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="card mb-0 border-0 shadow-none">
                                <div class="card-body">
                                    <span href="javascript:void(0)"
                                        class="icons font-weight-semibold fs-16 text-dark">Rating</span>
                                    <span class="d-block">
                                        <p class="mb-0">
                                            <span class="fs-14 ">
                                                <?php 

													if($course_item['c_rating'] == 5) :
														for ($i=0; $i < 5; $i++) { echo '<i class="fa fa-star text-yellow me-0"></i>'; }

													elseif($course_item['c_rating'] == 4) :
														for ($i=0; $i < 4; $i++) { 
															echo '<i class="fa fa-star text-yellow me-0"></i>'; 
														}
														echo '<i class="fa fa-star-o text-yellow me-2"></i>';

													elseif($course_item['c_rating'] == 3) :
														for ($i=0; $i < 3; $i++) { 
															echo '<i class="fa fa-star text-yellow me-0"></i>'; 
														}
														echo '<i class="fa fa-star-o text-yellow me-2"></i>';
														echo '<i class="fa fa-star-o text-yellow me-2"></i>';

													elseif($course_item['c_rating'] == 2) :
														for ($i=0; $i < 2; $i++) { 
															echo '<i class="fa fa-star text-yellow me-0"></i>'; 
														}
														echo '<i class="fa fa-star-o text-yellow me-2"></i>';
														echo '<i class="fa fa-star-o text-yellow me-2"></i>';
														echo '<i class="fa fa-star-o text-yellow me-2"></i>';
													
													elseif($course_item['c_rating'] == 1) :
														for ($i=0; $i < 1; $i++) { 
															echo '<i class="fa fa-star text-yellow me-0"></i>'; 
														}
														echo '<i class="fa fa-star-o text-yellow me-2"></i>';
														echo '<i class="fa fa-star-o text-yellow me-2"></i>';
														echo '<i class="fa fa-star-o text-yellow me-2"></i>';
														echo '<i class="fa fa-star-o text-yellow me-2"></i>';
													else :
														echo 'ยังไม่มีข้อมูล';
													
													endif;
														
													
												?>
                                                <?php if($course_item['c_rating'] != 0) : ?>
                                                <a href="javascript:void(0)"
                                                    class="icons h4 font-weight-semibold text-dark"><span class="">
                                                    <?=number_format($course_item['c_rating'],1)?></span></a>
                                                <?php endif ?>
                                            </span>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">รายละเอียด</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 description">
                            <?=$course_item['c_detail']?>
                        </div>
                        <h4 class="mb-4 font-weight-bold">บทเรียนในหลักสูตร</h4>
                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <ul class="list-unstyled widget-spec-1">

                                    <?php foreach($unit_item as $unit) : ?>
                                    <li class="text-default-dark">
                                        <i class="text-default fe fe-star"></i>
                                        <span>เรื่องที่ <?=$unit['unit_number'].' '.$unit['unit_name']?></span>
                                    </li>
                                    <?php endforeach ?>

                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="icons">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#register_course" class="btn btn-primary mb-3 mb-xl-0"><i class="fe fe-shopping-cart me-1"></i>สมัครเข้าเรียน</a>
                        </div>
                    </div>
                </div>
                <!--/Coursed Description-->

                <!-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Shares</h3>
                    </div>
                    <div class="card-body product-filter-desc">
                        <div class="product-filter-icons">
                            <a href="javascript:void(0)" class=" text-center facebook-bg"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="javascript:void(0)" class=" text-center twitter-bg"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="javascript:void(0)" class=" text-center google-bg"><i class="fa fa-google"></i></a>
                            <a href="javascript:void(0)" class=" text-center dribbble-bg"><i
                                    class="fa fa-dribbble"></i></a>
                            <a href="javascript:void(0)" class=" text-center pinterest-bg"><i
                                    class="fa fa-pinterest"></i></a>
                            <a href="javascript:void(0)" class=" text-center linkedin-bg"><i
                                    class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div> -->

            </div>

            <!--Right Side Content-->
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ผู้สร้างหลักสูตร</h3>
                    </div>
                    <div class="card-body  item-user">
                        <div class="profile-pic mb-0">

                            <?php if ($course_item['imageProfile'] != '') : ?>
                                <img src="<?=base_url('uploads/profile/'.$course_item['imageProfile'])?>" class="brround avatar-xxl" alt="<?=$course_item['firstName'].' '.$course_item['lastName']?>">
                            <?php else : ?>
                                <img src="<?=base_url('assets/images/users/user-profile.png')?>"
                                    class="brround avatar-xxl" alt="<?=$course_item['firstName'].' '.$course_item['lastName']?>" >
                            <?php endif ?>
                            
                            <div>
                            <?php 
                                if(session()->get('role')){ 
                                    $link = base_url(session()->get('role')); 
                                }else{
                                    $link = 'javascript:void(0)';
                                }
                            ?>
                                <a href="<?=$link?>" class="text-dark">
                                    <h4 class="mt-3 mb-1 font-weight-bold"><?=$course_item['firstName'].' '.$course_item['lastName']?></h4>
                                </a>
                                <span class="lead fs-16">เป็นสมาชิกตั้งแต่ <?php echo thai_date_no_date(strtotime($course_item['created_at']))?></span>
                                <div class=" item-user-icons mt-3">
											<a target="blank" href="<?=$course_item['phone']?>" class="facebook-bg mt-0"><i
													class="fa fa-phone"></i></a>
											<a target="blank" href="<?=$course_item['email']?>" class="facebook-bg mt-0"><i
													class="fa fa-envelope"></i></a>
											<a target="blank" href="<?=$course_item['facebook']?>" class="facebook-bg mt-0"><i
													class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body item-user">
                        <h4 class="mb-4">ข้อมูลเพิ่มเติม</h4>
                        <div>
                            <h6 class="mb-3"><span class="font-weight-semibold"><i
                                        class="fe fe-user-check me-2 mb-2"></i></span><a href="javascript:void(0)"
                                    class="text-body">ผู้สมัครหลักสูตร <?=number_format($course_registed)?> คน</a></h6>
                            <h6 class="mb-3"><span class="font-weight-semibold"><i
                                        class="fe fe-eye me-2 mb-2"></i></span><a href="javascript:void(0)"
                                    class="text-body"> ที่เยี่ยมชม <?=number_format($course_item['c_view'])?> ครั้ง</a></h6>
                            <!-- <h6 class="mb-3"><span class="font-weight-semibold"><i
                                        class="fe fe-thumbs-up me-2  mb-2"></i></span><a href="javascript:void(0)"
                                    class="text-body"> ที่ถูกใจ <?=number_format($course_item['c_like'])?> ครั้ง</a></h6> -->
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">วันที่สร้างและปรับปรุง</h3>
                    </div>
                    <div class="card-body ">
                        <table>
                            <tbody>
                                <tr>
                                    <td><span class="fs-14 font-weight-bold text-default-dark">วันที่สร้าง</span>
                                    </td>
                                    <td class="w-30 text-center"><span class="">:</span></td>
                                    <td><span class="fs-14 font-weight-normal"><?php echo thai_date_short(strtotime($course_item['c_created']))?></span></td>
                                </tr>
                                <?php if($course_item['c_update'] != "0000-00-00 00:00:00") : ?>
                                <tr>
                                    <td><span class="fs-14 font-weight-bold text-default-dark">วันที่ปรับปรุงล่าสุด</span>
                                    </td>
                                    <td class="w-30 text-center"><span class="">:</span></td>
                                    <td><span class="fs-14 font-weight-normal"><?php echo thai_date_short(strtotime($course_item['c_update']))?></span></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search Classes</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="text2" placeholder="What are you looking for?">
                        </div>
                        <div class="form-group">
                            <select name="country" id="select-countries"
                                class="form-control form-select select2-show-search">
                                <option value="1" selected>All Categories</option>
                                <option value="2">Private</option>
                                <option value="3">Software</option>
                                <option value="4">Banking</option>
                                <option value="5">Finaces</option>
                                <option value="6">Carporate</option>
                                <option value="7">Driving</option>
                                <option value="8">Sales</option>
                            </select>
                        </div>
                        <div class="">
                            <a href="javascript:void(0)" class="btn  btn-primary">Search</a>
                        </div>
                    </div>
                </div> -->
            </div>
            <!--Right Side Content-->
        </div>
    </div>
</section>
<!--/Section-->

<!-- small Modal -->
<div id="register_course" class="modal fade">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><i
                        class="fe fe-alert-circle"></i> การยืนยัน</h6>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>ยืนยันการสมัครเข้าศึกษาในหลักสูตรนี้ ?</p>
            </div><!-- modal-body -->
            <div class="modal-footer">
                <a href="<?=base_url('rc/'.$course_item['c_id'])?>"
                    class="btn btn-primary">สมัครเข้าเรียน</a>
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<?php echo view('templates/frontend/footer'); ?>
