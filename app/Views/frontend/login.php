<?php echo view('templates/formauth/header'); ?>

  <section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <div class="logo">
                  <img src="<?= base_url() ?>/img/logo.png">
                </div>
                <?php if(session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('msg'); ?></div>
                            <?php endif ?>
                            <?php if(session()->getFlashdata('fail')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                            <?php endif ?>
                            <?php if(session()->getFlashdata('registed')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('registed'); ?></div>
                            <?php endif ?>
              <form action="/login/auth" method="post" id="login" method="post">
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
                </div>

                <div class="form-group">
                  <input type="password" id="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Enter Password" required="" aria-required="true">
                </div>

                <!--<div class="checkbox form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="">
                    <label class="form-check-label" for="">
                      Remember me
                    </label>
                  </div>
                  <a href="#">Forgot Password</a>
                </div>-->

                <div class="form-group">
                  <input type="submit" value="เข้าระบบ" class="btn btn-block btn-primary _btn_04">
                </div>
                
              </form>
              <div class="font-size-sm mt-4 text-muted text-center">
                <strong><?php echo lang('Constant.webTitle_full');?> : <?php echo lang('Constant.webVersion');?> </strong><br>
                (<?php echo lang('Constant.webTitle_eng');?> : <?php echo lang('Constant.webTitle_short');?>)<br>
                <span ><?php echo lang('Constant.webAuth_School');?></span>
							  <span ><?php echo lang('Constant.webAuth_Area');?></span><br>
							  <span ><?php echo lang('Constant.webAuth_Obec');?></span><br>
							  <span ><?php echo lang('Constant.webAuth_Moe');?></span><br>
							  สงวนลิขสิทธิ์ &copy; <span data-toggle="year-copy">2022</span>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php echo view('templates/formauth/footer'); ?>