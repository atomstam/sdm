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
                            <table id="basic-datatables" class="display table table-bordered table-striped responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%" class="text-center">#</th>
                                        <th class="text-center">รายการ</th>
                                        <th style="width: 15%" class="text-center">ประเภท</th>
                                        <th style="width: 15%" class="text-center">ชนิดไฟล์</th>
                                        <th style="width: 22%" class="text-center">option</th>
                                    </tr>
                                </thead>
                            </table>
						</div>

					</div>
				</div>
			</div>
		</div>


	<!-- Modal Add-->
	<div class="modal fade" id="ItemAddModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							เพิ่มข้อมูล</span> 
						<span class="fw-light">
							ใหม่
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="ItemAddForm" id="ItemAddForm" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="defaultSelect">กลุ่มรายการ</label>
									<select class="form-control" id="iu_id" name="iu_id">
									<option value=""  >เลือกรายการ</option>
									<?php foreach ($itemall as $key => $itemall_modal) : ?>
										<option value="<?= $itemall_modal['it_id'];?>"><?= $itemall_modal['it_eng'];?> : <?= $itemall_modal['it_topic'];?></option>
									<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>ชื่อรายการ</label>
									<input id="iu_topic" type="text" class="form-control" name="iu_topic">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="defaultSelect">ชนิด</label>
									<select class="form-control" id="iu_typeup" name="iu_typeup">
										<option value="" >เลือกรายการ</option>
										<option value="Upload">Upload</option>
										<option value="Link">Link</option>
									</select>
								</div>
							</div>
							<div id="UpDiv" class="col-sm-12">
								<div class="form-group">
									<label> เลือกไฟล์อัพโหลด</label>
									<label class="input-group-btn">
                                            <span class="btn btn-primary btn-sm">
                                                เลือกไฟล์ <input type="file" accept=".jpg, .jpeg, .png, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .pdf" style="display: none;" id="iu_fileup" name="iu_fileup" class="form-control">
                                            </span>
									</label>
								</div>
							</div>
							<div id="LinkDiv" class="col-sm-12">
								<div class="form-group">
									<label>วางลิงค์เอกสาร</label>
									<input id="iu_linkurl" name="iu_linkurl" type="text" class="form-control" >
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer no-bd">
					<button id="Item-formAdd-submit" class="btn btn-primary" >Add</button>
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Add-->
	<div class="modal fade" id="ItemEditModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							แก้ไขข้อมูล</span> 
						<span class="fw-light">
							ใหม่
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="ItemEditForm" id="ItemEditForm" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="defaultSelect">กลุ่มรายการ</label>
									<select class="form-control" id="iu_eid" name="iu_eid">
									<option value=""  >เลือกรายการ</option>
									<?php foreach ($itemall as $key => $itemall_modal) : ?>
										<option value="<?= $itemall_modal['it_id'];?>"><?= $itemall_modal['it_eng'];?> : <?= $itemall_modal['it_topic'];?></option>
									<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>ชื่อรายการ</label>
									<input id="iu_etopic" type="text" class="form-control" name="iu_etopic">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="defaultSelect">ชนิด</label>
									<select class="form-control" id="iu_etypeup" name="iu_etypeup">
										<option value="" >เลือกรายการ</option>
										<option value="Upload">Upload</option>
										<option value="Link">Link</option>
									</select>
								</div>
							</div>
							<div id="UpEditDiv" class="col-sm-12">
								<div class="form-group">
									<label> เลือกไฟล์อัพโหลด</label>
									<label class="input-group-btn">
                                            <span class="btn btn-primary btn-sm">
                                                เลือกไฟล์ <input type="file" accept=".jpg, .jpeg, .png, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .pdf" style="display: none;" id="iu_efileup" name="iu_efileup" class="form-control">
                                            </span>
									</label>
								</div>
							</div>
							<div id="LinkEditDiv" class="col-sm-12">
								<div class="form-group">
									<label>วางลิงค์เอกสาร</label>
									<input id="iu_elinkurl" name="iu_elinkurl" type="text" class="form-control" >
								</div>
							</div>
						</div>
                        <!--<input id="iu_eid" name="iu_eid" type="hidden" class="form-control" >-->
					</form>
				</div>
				<div class="modal-footer no-bd">
					<button id="Item-formEdit-submit" class="btn btn-primary" >Edit</button>
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
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
