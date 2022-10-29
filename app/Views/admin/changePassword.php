        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">เปลี่ยนรหัสผ่าน</h3>
                    </div>
                    <div class="card-body mb-0">

                        <?php if(isset($validation)): ?>
                            <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
                        <?php endif ?>

                        <?php if(session()->getFlashdata('msg-success')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('msg-success'); ?></div>
                        <?php endif ?>

                        <?php if(session()->getFlashdata('msg-error')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('msg-error'); ?></div>
                        <?php endif ?>

                        <form class="form-horizontal" method="post" action="<?= base_url('/admin/updatePassword'); ?>" name="submit-form-updatePassword" id="submit-form-updatePassword">
                            <?= csrf_field(); ?>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="oldPassword">รหัสผ่านปัจจุบัน <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="oldPassword" class="form-control" id="oldPassword" value="<?= set_value('oldPassword'); ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="newPassword">รหัสผ่านใหม่ <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="newPassword" class="form-control" id="newPassword" value="<?= set_value('newPassword'); ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="confPassword">ยืนยันรหัสผ่าน <i>*</i></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="confPassword" class="form-control" id="confPassword" value="<?= set_value('confPassword'); ?>" placeholder="">
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
        