<?php
    $uri = new \CodeIgniter\HTTP\URI(current_url());
    $uri_one = '';
	$uri_two = '';
	$uri_tree = '';
	$uri_four = '';
	$uri_five = '';
	$uri_six = '';
    if($uri->getTotalSegments() > 0 && $uri->getSegment(1))
        $uri_one = $uri->getSegment(1);
    if($uri->getTotalSegments() > 1 && $uri->getSegment(2))
	    $uri_two = $uri->getSegment(2);
    if($uri->getTotalSegments() > 2 && $uri->getSegment(3))
	    $uri_tree = $uri->getSegment(3);
    if($uri->getTotalSegments() > 3 && $uri->getSegment(4))
	    $uri_four = $uri->getSegment(4);
    if($uri->getTotalSegments() > 4 && $uri->getSegment(5))
	    $uri_five = $uri->getSegment(5);
    if($uri->getTotalSegments() > 5 && $uri->getSegment(6))
	    $uri_six = $uri->getSegment(6);
?>
		<?php if($uri_two=='admin' and $uri_tree !='' ): echo "</div>"; endif;?>
		</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo lang('Constant.webHome');?>"><?php echo lang('Constant.webTitle_full');?> : <?php echo lang('Constant.webVersion');?>
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2022, made with <i class="fa fa-heart heart text-danger"></i> by <a href="<?php echo lang('Constant.webHome');?>">Atomy</a>
					</div>				
				</div>
			</footer>

	</div>

	<!-- jQuery Scrollbar -->
	<script src="<?= base_url(); ?>/dash/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?= base_url(); ?>/dash/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?= base_url(); ?>/dash/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url(); ?>/dash/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?= base_url(); ?>/dash/js/plugin/sweetalert/sweetalert.min.js"></script>
	
	<!-- Datatables -->
	<script src="<?= base_url() ?>/dash/js/plugin/datatables/datatables.min.js"></script>
    <!--<script src="<?=base_url(); ?>/plugins/datatable/datatables.min.js" type="text/javascript"></script>-->
	<script src="<?=base_url(); ?>/plugins/datatable/dataTables.responsive.min.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/responsive.bootstrap5.min.js" type="text/javascript"></script>
	<!--<script src="<?=base_url(); ?>/plugins/datatable/js/buttons.bootstrap5.min.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/js/buttons.colVis.min.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/js/buttons.html5.min.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/js/buttons.print.min.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/js/dataTables.bootstrap.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/js/dataTables.bootstrap5.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/js/dataTables.buttons.min.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/js/dataTables.rowGroup.min.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="<?=base_url(); ?>/plugins/datatable/js/jszip.min.js" type="text/javascript"></script>-->
	<!-- pdf thai -->
	<script src="<?=base_url()?>/plugins/datatable/pdfmake/pdfmake.min.js" type="text/javascript"></script>
	<script src="<?=base_url()?>/plugins/datatable/pdfmake/vfs_fonts.js" type="text/javascript"></script>

	<!-- Atlantis JS -->
	<script src="<?= base_url(); ?>/dash/js/atlantis.min.js"></script>

</body>
</html>