        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มผู้ใช้ใหม่</h3>
                    </div>
                    <div class="card-body mb-0">
                        <?php if(isset($validation)): ?>
                            <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
                        <?php endif ?>

                        <form class="form-horizontal" method="post" action="<?= base_url('/admin/submit-form-storeUser'); ?>" name="submit-form-storeUser" id="submit-form-storeUser">
                            <?= csrf_field(); ?>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Role <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="role" id="role">
                                            <option value="" selected>เลือก</option>
                                            <option value="admin" <?php if(set_value('role')=='admin') : echo 'selected'; endif ?>>Admin</option>
                                            <option value="obec" <?php if(set_value('role')=='obec') : echo 'selected'; endif ?>>Obec</option>
                                            <option value="area" <?php if(set_value('role')=='area') : echo 'selected'; endif ?>>Area</option>
                                            <option value="teacher" <?php if(set_value('role')=='teacher') : echo 'selected'; endif ?>>Teacher</option>
                                            <option value="student" <?php if(set_value('role')=='student') : echo 'selected'; endif ?>>Student</option>
                                            <option value="population" <?php if(set_value('role')=='population') : echo 'selected'; endif ?>>Population</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">คำนำหน้า <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="prefix" id="prefix">
                                            <option value="" selected>เลือก</option>
                                            <option value="นาย" <?php if(set_value('prefix')=='นาย') : echo 'selected'; endif ?>>นาย</option>
                                            <option value="นาง" <?php if(set_value('prefix')=='นาง') : echo 'selected'; endif ?>>นาง</option>
                                            <option value="นางสาว" <?php if(set_value('prefix')=='นางสาว') : echo 'selected'; endif ?>>นางสาว</option>
                                            <option value="เด็กชาย" <?php if(set_value('prefix')=='เด็กชาย') : echo 'selected'; endif ?>>เด็กชาย</option>
                                            <option value="เด็กหญิง" <?php if(set_value('prefix')=='เด็กหญิง') : echo 'selected'; endif ?>>เด็กหญิง</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="firstName">ชื่อ <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="firstName" class="form-control" id="firstName" value="<?= set_value('firstName'); ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="lastName">นามสกุล <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="lastName" class="form-control" id="lastName" value="<?= set_value('lastName'); ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="email">อีเมล <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="email" name="email" class="form-control" id="email" value="<?= set_value('email'); ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="phone">โทรศัพท์ <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="phone" class="form-control" id="phone" value="<?= set_value('phone'); ?>" placeholder="" data-inputmask-mask="9999999999">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="idCard">เลขบัตรประชาชน <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="idCard" class="form-control" id="idCard" value="<?= set_value('idCard'); ?>" placeholder="" data-inputmask-mask="9999999999999">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="password">รหัสผ่าน <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="password" class="form-control" id="password" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Status <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="status" id="status">
                                            <option value="1" selected>เปิดใช้งาน</option>
                                            <option value="0">ปิดใช้งาน</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 row justify-content-end">
                                <div class="col-md-9 float-end">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">บันทึก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
