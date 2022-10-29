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
            <div class="section-title d-md-flex">
                <div>
                    <h3>หลักสูตรทั้งหมด</h3>
                </div>
                <div class="ms-auto d-inline-flex">
                    <div class="w-250 mt-3 me-0">
                        <select class="form-control select2-show-search  border-bottom-0" data-placeholder="Select Category" >
                            <optgroup label="Categories">
                                <option>เลือกรายการ</option>
                                <option value="1">ภาวะโภชนาการ</option>
                                <option value="2">ภาวะทุพโภชนาการ</option>
                                <option value="3">อาหารที่ปลอดภัย</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">

			<div class="row">
				<?php if ($course) : ?>
					<?php foreach ($course as $key => $course_item) : ?>
						<div class="col-xl-4 col-md-6">
							<div class="card overflow-hidden">

								<?php if ($course_item['c_award'] == 1) : ?>
									<div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">ส่งประกวด</span></div>
								<?php endif; ?>

								<div class="item-card7-img pt-5 px-5">
									<div class="item-card7-imgs">
										<?php if ($course_item['c_cover'] != '') : ?>
											<a href="<?= base_url('/getcourse/' . $course_item['id']); ?>"></a>
											<img src="<?= base_url() ?>/uploads/course/<?= $course_item['c_cover']; ?>" height="203" alt="img" class="cover-image br-7 border">
										<?php else : ?>
											<a href="<?= base_url('/getcourse/' . $course_item['id']); ?>"></a>
											<img src="<?= base_url() ?>/uploads/cover/default.png" height="203" alt="img" class="cover-image br-7 border">
										<?php endif ?>
									</div>
								</div>
								<div class="card-body">
									<div class="item-card7-desc">

										<div class="item-card7-text">
											<a href="<?= base_url('/getcourse/' . $course_item['id']); ?>" class="text-dark">
												<h4 class="font-weight-semibold mb-1"><?= $course_item['c_name']; ?></h4>
											</a>
										</div>
										<div class="item7-card-desc d-flex mb-2">
											<a href="javascript:void(0)"><i class="fe fe-calendar me-2 float-start mt-1"></i><?= ShortDateThai($course_item['c_created']); ?></a>
											<div class="ms-auto">
												<a href="javascript:void(0)"><i class="fe fe-message-circle me-2 float-start mt-1"></i>0 Comments</a>
											</div>
										</div>
										<!--<p class="mb-0 mt-0"><?= $course_item['c_detail']; ?></p>-->
										<p class="mb-0 mt-0"><i class="fe fe-star me-2 float-start"></i>Ratings :
											<span class="fs-14 ">
												<?php

												if ($course_item['c_rating'] == 5) :
													for ($i = 0; $i < 5; $i++) {
														echo '<i class="fa fa-star text-yellow me-0"></i>';
													}

												elseif ($course_item['c_rating'] == 4) :
													for ($i = 0; $i < 4; $i++) {
														echo '<i class="fa fa-star text-yellow me-0"></i>';
													}
													echo '<i class="fa fa-star-o text-yellow me-2"></i>';

												elseif ($course_item['c_rating'] == 3) :
													for ($i = 0; $i < 3; $i++) {
														echo '<i class="fa fa-star text-yellow me-0"></i>';
													}
													echo '<i class="fa fa-star-o text-yellow me-2"></i>';
													echo '<i class="fa fa-star-o text-yellow me-2"></i>';

												elseif ($course_item['c_rating'] == 2) :
													for ($i = 0; $i < 2; $i++) {
														echo '<i class="fa fa-star text-yellow me-0"></i>';
													}
													echo '<i class="fa fa-star-o text-yellow me-2"></i>';
													echo '<i class="fa fa-star-o text-yellow me-2"></i>';
													echo '<i class="fa fa-star-o text-yellow me-2"></i>';

												elseif ($course_item['c_rating'] == 1) :
													for ($i = 0; $i < 1; $i++) {
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
												<?php if ($course_item['c_rating'] != 0) : ?>
													<a href="javascript:void(0)" class="icons h4 font-weight-semibold text-dark">
														<span class=""><?= number_format($course_item['c_rating'], 1) ?></span>
													</a>
												<?php endif ?>
											</span>
										</p>
										<p class="mb-0 mt-0"><i class="fe fe-eye me-2 float-start"></i>Reviews : <?= $course_item['c_view']; ?></p>
									</div>

									<a class="btn btn-primary mb-0 mt-2" href="<?= base_url('/getcourse/' . $course_item['id']); ?>">รายละเอียด <i class="fe fe-chevron-right"></i></a>
								</div>
							</div>
						</div>

					<?php endforeach ?>
				<?php endif ?>

				<div class="d-flex justify-content-end">
					<?php if ($pager) :?>
					<?php $pagi_path= 'course'; ?>
					<?php $pager->setPath($pagi_path); ?>
					<?= $pager->links('default', 'bootstrap4_pagination'); ?>
					<?php endif ?>
				</div>
				
			</div>

		</div>
	</div>
</section>
<!--/Section-->


<?php echo view('templates/frontend/footer'); ?>
