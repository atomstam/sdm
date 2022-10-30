<?php echo view('templates/formauth/header'); ?>

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('formlogin/images/ccpk.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-9 col-lg-9 col-xl-5">
            <div class="form-block">
							<div class="text-center mb-3" >
								<img src="<?= base_url() ?>/img/logo.png" style="width:80%; max-width:150px;" />
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
                <div class="form-group first">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                
                <div class="d-sm-flex mb-3 align-items-center">
                  <!--<label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>--> 
                </div>

                <input type="submit" value="เข้าระบบ" class="btn btn-block btn-info">

              </form>
            </div>
                <div class="font-size-sm mt-4 text-muted text-center">
                <strong><?php echo lang('Constant.webTitle_full');?> : <?php echo lang('Constant.webVersion');?> </strong><br>
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

<?php echo view('templates/formauth/footer'); ?>