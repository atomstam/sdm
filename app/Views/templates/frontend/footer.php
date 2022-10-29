
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-10 col-md-6">
            <div class="footer-info">
              <h3><?=lang('Constant.webTitle_short');?> <?=lang('Constant.webVersion');?></h3>
              <p>
                <?=lang('Constant.webAuth_School');?> <br>
                <?=lang('Constant.webAuth_Area');?><br><br>
                <strong>Phone:</strong> +66 <?=lang('Constant.phone');?><br>
                <strong>Email:</strong> <?=lang('Constant.email');?><br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><a href="<?=base_url();?>">Home</a></li>
              <li><a href="<?=base_url();?>/login">Login</a></li>
              <li><a href="<?=base_url();?>/about">Auth</a></li>
            </ul>
          </div><!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span><?=lang('Constant.webTitle_short');?> <?=lang('Constant.webVersion');?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
          Designed by <a href="<?=lang('Constant.webHome');?>"><?=lang('Constant.auth');?></a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>


  <script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/plugins/aos/aos.js"></script>
  <script src="<?= base_url(); ?>/plugins/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url(); ?>/plugins/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>/plugins/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url(); ?>/plugins/purecounter/purecounter_vanilla.js"></script>
    <!-- Sweet Alert -->
  <script src="<?= base_url(); ?>/dash/js/plugin/sweetalert/sweetalert.min.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url(); ?>/plugins/input-mask/jquery.maskedinput.js"></script>
  <script src="<?= base_url(); ?>/plugins/php-email-form/validate.js"></script>
  <!-- Datatables -->
  <script src="<?= base_url() ?>/plugins/datatable/datatables.min.js"></script>
  <!--<script src="<?=base_url(); ?>/plugins/datatable/datatables.min.js" type="text/javascript"></script>-->
  <script src="<?=base_url(); ?>/plugins/datatable/dataTables.responsive.min.js" type="text/javascript"></script>
  <script src="<?=base_url(); ?>/plugins/datatable/responsive.bootstrap5.min.js" type="text/javascript"></script>
  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>/front/js/main.js"></script>

</body>

</html>