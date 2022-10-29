
		<div class="row">
            <div class="col-lg-12">
                <div class="card">

					  <div class="card-header">

						  <div class="d-flex align-items-center">
							<h3 class="card-title"><?=$title[3]?></h3>
							<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#ItemAddModal">
								<i class="fa fa-plus"></i>
								เพิ่มรายการ
							</button>
						</div>
					</div>
                    <div class="card-body p-1">

                       <div class="table-responsive mb-0 mt-0">
                            <table id="basic-datatables" class="display table table-bordered table-striped responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%" class="text-center">#</th>
                                        <th class="text-center">รายการ</th>
                                        <th style="width: 15%" class="text-center">จำนวน</th>
                                        <th style="width: 18%" class="text-center">option</th>
                                    </tr>
                                </thead>
                            </table>
						</div>

					</div>
				</div>
			</div>
		</div>


	<!-- Modal -->
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


	<script type="text/javascript">
	$(document).ready(function() {
		$('#basic-datatables').DataTable({
			lengthMenu: [[ 10, 30, -1], [ 10, 30, "All"]], // page length options
			bProcessing: true,
			serverSide: true,
			scrollCollapse: true,
			ajax: {
				url: '<?=base_url('index.php/admin/find_Item_Ajax/'.$gr.'/'.$main.'/'.$sub)?>',
				type: "get",
				data: {
				// key1: value1 - in case if we want send data with request
				}
			},
			columns: [
				{ data: "it_id" ,sClass:"text-center",},
				{ data: "name" },
				{ data: "Coup" ,sClass:"text-center",},
				{ 
					data: "it_id" ,
				  	sClass:"text-center",
					render:function(data,type,row){
						var dataItID = row['it_id'];
						var dataItGr = 9;
						var dataItMain = row['it_main'];
						var dataItSub = row['it_sub'];
						var dataItItemID = row['it_cate'];
						//var btnDetail = '<a href="'+data+'" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-eye"></i></a>';
						var btnDetail = '<a href="<?php echo base_url('admin/item10_detail');?>/'+dataItMain+'/'+dataItSub+'/'+dataItItemID+'" class="btn btn-success btn-sm" ><i class="fas fa-search"></i></a>';							
						//var status = (data !='') ? btnDetail : btnAdd ;
						return btnDetail ;
					},
				}
			],
			columnDefs: [
				{ orderable: true, targets: [0, 1, 2, 3] }
			],
			bFilter: true, // to display datatable search
            "aLengthMenu": [25,50,75,100,125,150,175,200],
            "responsive" : true,
            "pagingType": "full_numbers",
            "language": {
                "sProcessing": "กำลังดำเนินการ...",
                "sLengthMenu": "แสดง_MENU_ แถว",
                "sZeroRecords": "ไม่พบข้อมูล",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sSearch": "ค้นหา:",
                "sUrl": "",
                "oPaginate": {
                  "sFirst": "เริ่มต้น",
                  "sPrevious": "ก่อนหน้า",
                  "sNext": "ถัดไป",
                  "sLast": "สุดท้าย"
                  }
            },
		});
	});
	</script>

	<script type="text/javascript">
	$(function() {
		$("#LinkDiv").hide();
		$("#UpDiv").hide();
		$("#iu_typeup").change(function(){
			//alert('The option with value ' + $(this).val());
			var DivValue = $(this).val();
			//alert(VivValue);
			if(DivValue=="Upload"){
				$("#UpDiv").show();
				$("#LinkDiv").hide();
			} else {
				$("#LinkDiv").show();
				$("#UpDiv").hide();				
			}
		});
	});
	$(function() { 
		$("button#Item-formAdd-submit").on('click', function(e) {
			var frmdata = new FormData($('#ItemAddForm')[0]);
    		var files = $('#iu_fileup')[0].files[0];
			var iu_ids = $('#iu_id').val();
			var iu_topics = $('#iu_topic').val();
			var iu_typeups = $('#iu_typeup').val();
			var iu_linkurls = $('#iu_linkurl').val();
    		frmdata.append('file',files);
    		frmdata.append('iu_id',iu_ids);
    		frmdata.append('iu_topic',iu_topics);
    		frmdata.append('iu_typeup',iu_typeups);
    		frmdata.append('iu_linkurl',iu_linkurls);			
			e.preventDefault();
				//var iu_id = $(this).val('iu_id');
				//alert(iu_id);
					$.ajax({
						//method: 'GET',
						type: "POST",
						url: "<?php echo base_url();?>/admin/saveAllItem",
						//data: $('form.ItemAddForm').serialize(),
						data: frmdata,
      					contentType: false,
      					processData: false,
						//dataType: 'json',
						cache: false,
						success: function(data){
							$('#ItemAddModal').modal('hide');
							var obj = JSON.parse(data);
							//alert(obj.gr);
							if(obj.state=='success'){
								//$('#success').show(obj.message);
								//setTimeout( "$('#success').hide();",3000 );
								var placementFrom = "top";
								var placementAlign = "right";
								var state = "success";
								var style = "withicon";
								var content = {};

								content.message = obj.message;
								content.title = obj.state;
								if (style == "withicon") {
									content.icon = 'fa fa-bell';
								} else {
									content.icon = 'none';
								}
								content.url = "<?=base_url('/admin/item'.$gr.'/'.$main.'/'.$sub)?>";
								//content.target = '_blank';

								$.notify(content,{
									type: state,
									placement: {
										from: placementFrom,
										align: placementAlign
									},
								},{
									timer: 1000,
									delay: 0,
								});
								setTimeout(function(){
									location.href = "<?=base_url('/admin/item'.$gr.'/'.$main.'/'.$sub)?>";
								}, 2000);
							} else {
								$('#error').show(obj.message);
								setTimeout( "$('#error').hide();",3000 );
							}
							//location.href = "<?=base_url('/admin/item'.$gr.'/'.$main.'/'.$sub)?>";
						},
						error: function (data) {
							alert(data.status + ':' + data.statusText,data.responseText);
							//console.log(data.status + ':' + data.statusText,data.responseText);
						// check the err for error details
						}
					});
		});
	});
	</script>
