        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">แก้ไขข้อมูลผู้ใช้ [Update User]</h3>
                    </div>
                    <div class="card-body mb-0">
                        <?php if(isset($validation)): ?>
                            <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
                        <?php endif ?>

                        <form class="form-horizontal" method="post" action="<?= base_url('/admin/updateUser'); ?>" name="submit-form-updateUser" id="submit-form-updateUser">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" value="<?= $user_obj['ID']; ?>" />
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Role</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="role" id="role">
                                            <option value="" selected>เลือก</option>
                                            <option value="admin" <?php if($user_obj['role']=='admin') : echo 'selected'; endif ?>>Admin</option>
                                            <option value="obec" <?php if($user_obj['role']=='obec') : echo 'selected'; endif ?>>Obec</option>
                                            <option value="area" <?php if($user_obj['role']=='area') : echo 'selected'; endif ?>>Area</option>
                                            <option value="teacher" <?php if($user_obj['role']=='teacher') : echo 'selected'; endif ?>>Teacher</option>
                                            <option value="student" <?php if($user_obj['role']=='student') : echo 'selected'; endif ?>>Student</option>
                                            <option value="population" <?php if($user_obj['role']=='population') : echo 'selected'; endif ?>>Population</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">คำนำหน้า</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="prefix" id="prefix">
                                            <option value="" selected>เลือก</option>
                                            <option value="นาย" <?php if($user_obj['prefix']=='นาย') : echo 'selected'; endif ?>>นาย</option>
                                            <option value="นาง" <?php if($user_obj['prefix']=='นาง') : echo 'selected'; endif ?>>นาง</option>
                                            <option value="นางสาว" <?php if($user_obj['prefix']=='นางสาว') : echo 'selected'; endif ?>>นางสาว</option>
                                            <option value="เด็กชาย" <?php if($user_obj['prefix']=='เด็กชาย') : echo 'selected'; endif ?>>เด็กชาย</option>
                                            <option value="เด็กหญิง" <?php if($user_obj['prefix']=='เด็กหญิง') : echo 'selected'; endif ?>>เด็กหญิง</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="firstName">ชื่อ</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="firstName" class="form-control" id="firstName" value="<?= $user_obj['firstName']; ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="lastName">นามสกุล</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="lastName" class="form-control" id="lastName" value="<?= $user_obj['lastName']; ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="email">อีเมล</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="email" name="email" class="form-control" id="email" value="<?= $user_obj['email']; ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="phone">โทรศัพท์</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="phone" class="form-control" id="phone" value="<?= $user_obj['phone']; ?>" placeholder="" data-inputmask-mask="9999999999">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="idCard">เลขบัตรประชาชน</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="idCard" class="form-control" id="idCard" value="<?= $user_obj['idCard']; ?>" placeholder="" data-inputmask-mask="9999999999999">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Status</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="status" id="status">
                                            <option value="1" <?php if($user_obj['status']=='1') : echo 'selected'; endif ?>>เปิดใช้งาน</option>
                                            <option value="0" <?php if($user_obj['status']=='0') : echo 'selected'; endif ?>>ปิดใช้งาน</option>
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
