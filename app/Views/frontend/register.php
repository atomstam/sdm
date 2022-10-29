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
            <div class="col-lg-12 col-xl-6 col-md-6 d-block mx-auto">
                <div class="card">
                    <div class="card-body p-6">
                        <div class="mb-6">
                            <h5 class="fs-25 font-weight-semibold">ลงทะเบียน</h5>
                            <p class="fs-16">กรอกข้อมูลเพื่อใช้สำหรับการเป็นสมาชิกของเว็บไซต์</p>
                            <?php if(isset($validation)): ?>
                            <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
                            <?php endif ?>
                        </div>
                        <div class="single-page customerpage">
                            <div class="wrapper wrapper2 box-shadow-0">
                                <form action="/register/save" method="post" id="register" class="" tabindex="500">
                                    <div class="role">
                                        <label>ประเภทสมาชิก</label>
                                        <select class="form-control select2 form-select" name="role" id="role">
                                            <option value="" selected>เลือก</option>
                                            <option value="Obec"
                                                <?php if(set_value('role')=='Obec') : echo 'selected'; endif ?>>
                                                เจ้าหน้าที่ สพฐ.</option>
                                            <option value="Area"
                                                <?php if(set_value('role')=='Area') : echo 'selected'; endif ?>>
                                                เจ้าหน้าที่ เขตพื้นที่ฯ</option>
                                            <option value="Teacher"
                                                <?php if(set_value('role')=='Teacher') : echo 'selected'; endif ?>>
                                                ครู/บุคลากรทางการศึกษา</option>
                                            <option value="Student"
                                                <?php if(set_value('role')=='Student') : echo 'selected'; endif ?>>
                                                นักเรียน/นักศึกษา</option>
                                            <option value="Population"
                                                <?php if(set_value('role')=='Population') : echo 'selected'; endif ?>>
                                                ประชาชนทั่วไป</option>
                                        </select>
                                    </div>
                                    <div class="prefix">
                                        <label>คำนำหน้า</label>
                                        <select class="form-control select2 form-select" name="prefix" id="prefix">
                                            <option>เลือก</option>
                                            <option value="นาย"
                                                <?php if(set_value('prefix')=='นาย') : echo 'selected'; endif ?>>นาย
                                            </option>
                                            <option value="นาง"
                                                <?php if(set_value('prefix')=='นาง') : echo 'selected'; endif ?>>นาง
                                            </option>
                                            <option value="นางสาว"
                                                <?php if(set_value('prefix')=='นางสาว') : echo 'selected'; endif ?>>
                                                นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="firstName">
                                        <label>ชื่อ</label>
                                        <input type="text" name="firstName" id="firstName"
                                            value="<?= set_value('firstName'); ?>">
                                    </div>
                                    <div class="lastName">
                                        <label>นามสกุล</label>
                                        <input type="text" name="lastName" id="lastName"
                                            value="<?= set_value('lastName'); ?>">
                                    </div>
                                    <div class="email">
                                        <label>อีเมล</label>
                                        <input type="email" name="email" value="<?= set_value('email'); ?>">
                                    </div>
                                    <div class="phone">
                                        <label>โทรศัพท์</label>
                                        <input type="text" name="phone" id="phone" value="<?= set_value('phone'); ?>"
                                            data-inputmask-mask="9999999999">
                                    </div>
                                    <div class="idCard">
                                        <label>เลขบัตรประชาชน</label>
                                        <input type="text" name="idCard" id="idCard" value="<?= set_value('idCard'); ?>"
                                            data-inputmask-mask="9999999999999">
                                    </div>
                                    <div class="password">
                                        <label>รหัสผ่าน</label>
                                        <input type="password" name="password">
                                    </div>
                                    <div class="confPassword">
                                        <label>ยืนยันรหัสผ่าน</label>
                                        <input type="password" name="confPassword">
                                    </div>
                                    <div class="submit">
                                        <button type="submit" class="btn btn-primary btn-block">ลงทะเบียน</button>
                                    </div>
                                    <p class="text-dark mb-0">หากเป็นสมาชิกอยู่แล้ว<a href="<?= base_url()?>/login"
                                            class="text-primary ms-1">เข้าสู่ระบบ</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-body p-6 border-top">
								<div class="d-flex">
									<div>
										<h5 class="modal-title fs-20 font-weight-semibold">Register with Social</h5>
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