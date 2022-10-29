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
                            <p class="fs-16">กรุณาใส่อีเมลที่ลงทะเบียน</p>

                            <?php if(session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('msg'); ?></div>
                            <?php endif ?>
                            <?php if(session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
                            <?php endif ?>
                            <?php if(session()->getFlashdata('sent')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('sent'); ?></div>
                            <?php endif ?>
                            <?php if(isset($validation)): ?>
                            <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
                            <?php endif ?>

                        </div>
                        <div class="single-page customerpage">
                            <div class="wrapper wrapper2 box-shadow-0">
                                <form action="/forgot" method="post" id="forgot" class="" tabindex="500">
                                    <?= csrf_field(); ?>
                                    <div class="email">
                                        <label>อีเมล</label>
                                        <input type="email" name="forgot_email" id="forgot_email" value="<?= set_value('forgot_email'); ?>">
                                    </div>
                                    <div class="submit">
                                        <input type="submit" name="password-reset-token"
                                            class="btn btn-primary btn-block fs-16" value="ส่งข้อมูล" />
                                    </div>
                                    <div class="d-flex mb-0">
                                        <p class="text-dark mb-0 ms-auto">หากรีเซตรหัสผ่านแล้ว<a
                                                href="<?= base_url('/login'); ?>"
                                                class="text-primary ms-1">เข้าสู่ระบบ</a></p>
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