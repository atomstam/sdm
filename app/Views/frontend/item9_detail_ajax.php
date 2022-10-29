    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2> OIT </h2>
          <p>แบบตรวจการเปิดเผยข้อมูลสาธารณะ (Open Data Integrity and Transparency Assessment: OIT) มีวัตถุประสงค์เพื่อเป็นการประเมินระดับการเปิดเผยข้อมูลต่อสาธารณะของหน่วยงาน เพื่อให้ประชาชนทั่วไปสามารถเข้าถึงได้ ในตัวชี้วัดการเปิดเผยข้อมูล และการป้องกันการทุจริต สำหรับการประเมินคุณธรรมและความโปร่งใสในการดำเนินงานของหน่วยงานภาครัฐ (ITA)</p>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="card">

					  <div class="card-header">

						  <div class="d-flex align-items-center">
							<h5 class="card-title"><?=$title[3]?> : <?=$title[4]?></h5>
						</div>
					</div>
                    <div class="card-body p-1">

                       <div class="table-responsive mb-0 mt-0">
                            <table id="basic-datatables" class="table table-striped responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%" class="text-center">#</th>
                                        <th class="text-center">รายการ</th>
                                        <th style="width: 22%" class="text-center">option</th>
                                    </tr>
                                </thead>
                               <tbody>
                                        <?php foreach ($itemsuball as $key => $itemall_item) : ?>
										<?php
										$dataLinkUp = $itemall_item['iu_typeup'];
										$dataLinkFile = $itemall_item['iu_linkcon'];
										if($dataLinkUp=='Upload'){
											$LinkUp = base_url().'/uploads/item/'.$dataLinkFile;
										} else {
											$LinkUp = $dataLinkFile;
										}
										?>
										<div id="accordion<?= $key + 1; ?>">
                                            <tr>
                                                <td class="text-center"><?= $key + 1; ?></td>
                                                <td>
												<?= $itemall_item['iu_topic'];?>
												</td>
                                                <td class="text-center">
													<a href="<?=$LinkUp;?>" class="btn btn-warning btn-sm waves-effect waves-light" ><i class="fa fa-eye"></i></a>
													</div>
                                                </td>
                                            </tr>
										</div>

                                        <?php endforeach ?>

                                </tbody>
                            </table>
						</div>

					</div>
				</div>
			</div>
		</div>

		</div>
	</section>
  <script type="text/javascript">
	$(document).ready(function() {
		$('#basic-datatables').DataTable();
	});
  </script>