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

<!--Register-section-->
<section class="sptb">
    <div class="container customerpage">
        <div class="row">
            <div class="col-lg-5 col-xl-5 col-md-6 d-block mx-auto">
                <div class="card">
                    <div class="card-body p-6">
                        <div class="mb-6">
                            <p class="fs-16">กรุณาตั้งรหัสผ่านใหม่ (6 ตัวอักษรขึ้นไป)</p>

                            <?php if(session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('msg'); ?></div>
                            <?php endif ?>
                            <?php if(session()->getFlashdata('fail')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                            <?php endif ?>
                            <?php if(isset($validation)): ?>
                            <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
                            <?php endif ?>

                        </div>
                        <div class="single-page customerpage">
                            <div class="wrapper wrapper2 box-shadow-0">
                                <form action="/saveNewPassword" method="post" id="saveNewPassword" class="" tabindex="500">
                                    <?= csrf_field(); ?>
                                    <div class="email">
                                        <label>รหัสผ่านใหม่</label>
                                        <input type="password" name="new_pass"">
                                    </div>
                                    <div class="passwd">
                                        <label>ยืนยันรหัสผ่านใหม่</label>
                                        <input type="password" name="conf_password">
                                    </div>
                                    <div class="submit">
                                        <input type="hidden" name="email" value="<?=$email?>">
                                        <input type="hidden" name="reset_link_token" value="<?=$reset_link_token?>">
                                        <button type="submit"
                                            class="btn btn-primary btn-block fs-16">ตั้งรหัสผ่าน</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-body p-6 border-top">
								<div class="d-flex">
									<div>
										<h5 class="modal-title fs-20 font-weight-semibold">Login with Social</h5>
										<p class="fs-16">If you are going to use a passage of Lorem Ipsum</p>
										<div class="">
											<div class="btn-group mb-3 mb-lg-0">
												<a href="https://www.facebook.com/" class="social-button">
													<span class="fe fe-facebook"></span> Facebook
												</a>
											</div>
											<div class="btn-group mb-3 mb-lg-0">
												<a href="https://www.google.com/gmail/" class="social-button">
													<span class="fe fe-linkedin"></span> Linkedin
												</a>
											</div>
											<div class="btn-group mb-3 mb-lg-0">
												<a href="https://twitter.com/" class="social-button">
													<span class="fe fe-twitter"></span> Twitter
												</a>
											</div>
										</div>
									</div>
								</div>
							</div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/Register-section-->

<?php echo view('templates/frontend/footer'); ?>