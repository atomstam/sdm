
		<div class="row">
            <div class="col-lg-12">
                <div class="card">

					  <div class="card-header">

						  <div class="d-flex align-items-center">
							<h3 class="card-title"><?=$title[3]?> : <?=$title[4]?></h3>
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
									<select class="form-control" id="it_id" name="it_id">
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
                        <input id="iu_eid" name="iu_eid" type="hidden" class="form-control" >
					</form>
				</div>
				<div class="modal-footer no-bd">
					<button id="Item-formEdit-submit" class="btn btn-primary" >Edit</button>
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


    <?php if (session()->getFlashdata('msg')) : ?>
        <script type="text/javascript">
	    $(document).ready(function() {
            var placementFrom = "top";
			var placementAlign = "right";
			var state = "success";
			var style = "withicon";
			var content = {};

			content.message = "<?php echo session()->getFlashdata('msg');?>";
			content.title = "success";
	        if (style == "withicon") {
				content.icon = 'fa fa-bell';
		    } else {
				content.icon = 'none';
			}
			content.url = "<?=base_url('/admin/item10_detail/'.$main.'/'.$sub.'/'.$cate)?>";
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
        });
        </script>
    <?php endif; ?>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#basic-datatables').DataTable({
			lengthMenu: [[ 10, 30, -1], [ 10, 30, "All"]], // page length options
			bProcessing: true,
			serverSide: true,
			scrollCollapse: true,
			ajax: {
				url: '<?=base_url('index.php/admin/find_ItemUp_Ajax/'.$gr.'/'.$main.'/'.$sub.'/'.$cate)?>',
				type: "get",
				data: {
				// key1: value1 - in case if we want send data with request
				},
			},
			columns: [
				{ data: "iu_id" ,sClass:"text-center",},
				{ data: "iu_topic" },
                { data: "iu_typeup" ,sClass:"text-center",},
                { 
                    data: "iu_typefile" ,
                    sClass:"text-center",
                    render:function(data,type,row){
                        var dataItTypeUp = row['iu_typeup'];
                        var dataItTypeFile = row['iu_typefile'];
						var dataItTypeCon = row['iu_linkcon'];
                        if(dataItTypeUp=='Upload'){
							if(dataItTypeCon !=''){
								if(dataItTypeFile=='pdf'){
									var Icon = '<i class="fas fa-file-pdf text-warning icon-big"></i>';
								} else if(dataItTypeFile=='ppt' || dataItTypeFile=='pptx' || dataItTypeFile=='xls' ||dataItTypeFile=='xlsx' || dataItTypeFile=='doc' || dataItTypeFile=='docx' ) {
									var Icon = '<i class="fas fa-file-word text-danger icon-big"></i>';
								} else if(dataItTypeFile=='png' || dataItTypeFile=='gif' || dataItTypeFile=='jpeg' ||dataItTypeFile=='jpg') {
									var Icon = '<i class="fas fa-file-image text-success icon-big"></i>';
								}
							} else {
								var Icon = '';
							}
                        } else {
                            var Icon = '<i class="fas fa-link text-primary icon-big"></i>';
                        }
                        return Icon;

                    },
                },
				{ 
					data: "iu_id" ,
				  	sClass:"text-center",
					render:function(data,type,row){
						var dataItID = row['iu_id'];
						var dataItGr = 10;
                        var dataItArea = row['iu_area'];
                        var dataItSch = row['iu_school'];
						var dataItMain = row['iu_main'];
						var dataItSub = row['iu_sub'];
						var dataItItemID = row['iu_itemID'];
                        var dataLinkUp = row['iu_typeup'];
                        var dataLinkFile = row['iu_linkcon'];
						var dataPosted = row['iu_posted'];
                        if(dataLinkUp=='Upload'){
                            var LinkUp = '<?php echo base_url();?>/uploads/item/'+dataLinkFile;
                        } else {
                            var LinkUp = dataLinkFile;
                        }
						//var btnDetail = '<a href="'+data+'" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-eye"></i></a>';
						if(dataPosted =="<?=session()->get('id');?>" && (dataPosted == 1 || dataPosted == 2 )){
						var btnAll = '<a href="'+LinkUp+'" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-eye"></i></a>&nbsp;<a onclick="edit_Item_Up('+dataItArea+','+dataItSch+','+dataItID+')" class="btn btn-warning btn-sm" ><i class="fas fa-edit"></i></a>&nbsp;<a onclick="deleteItemUpID('+dataItMain+','+dataItSub+','+dataItItemID+','+dataItArea+','+dataItSch+','+dataItID+')" class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i></a>';
						} else {
						var btnAll = '<a href="'+LinkUp+'" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-eye"></i></a>&nbsp;<a onclick="edit_Item_Up('+dataItArea+','+dataItSch+','+dataItID+')" class="btn btn-warning btn-sm" ><i class="fas fa-edit"></i></a>';
						}						
						return btnAll ;
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
		$("#LinkEditDiv").hide();
		$("#UpEditDiv").hide();
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
		$("#iu_etypeup").change(function(){
			//alert('The option with value ' + $(this).val());
			var DivValue = $(this).val();
			//alert(VivValue);
			if(DivValue=="Upload"){
                $("#UpEditDiv").show();
                $("#LinkEditDiv").hide();
			} else {
                $("#LinkEditDiv").show();
                $("#UpEditDiv").hide();				
			}
		});
	});
	$(function() { 
		$("button#Item-formAdd-submit").on('click', function(e) {
			e.preventDefault();
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
				//var iu_id = $(this).val('iu_id');
				//alert(iu_id);
					$.ajax({
						//method: 'GET',
						type: "POST",
						url: "<?=base_url();?>/admin/saveAllItem",
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
								content.url = "<?=base_url('/admin/item'.$gr.'_detail/'.$main.'/'.$sub.'/'.$cate)?>";
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
									location.href = "<?=base_url('/admin/item'.$gr.'_detail/'.$main.'/'.$sub.'/'.$cate)?>";
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

		$("button#Item-formEdit-submit").on('click', function(e) {
			e.preventDefault();
			var frmEditdata = new FormData($('#ItemEditForm')[0]);
    		var files = $('#iu_efileup')[0].files[0];
			var iu_ids = $('#iu_eid').val();
			var iu_topics = $('#iu_etopic').val();
			var iu_typeups = $('#iu_etypeup').val();
			var iu_linkurls = $('#iu_elinkurl').val();
			var it_id = $('#it_id').val();
    		frmEditdata.append('file',files);
    		frmEditdata.append('iu_id',iu_ids);
    		frmEditdata.append('iu_topic',iu_topics);
    		frmEditdata.append('iu_typeup',iu_typeups);
    		frmEditdata.append('iu_linkurl',iu_linkurls);	
			frmEditdata.append('it_id',it_id);
				//var iu_id = $(this).val('iu_id');
				//alert(iu_id);
					$.ajax({
						//method: 'GET',
						type: "POST",
						url: "<?=base_url();?>/admin/saveEditAllItem",
						//data: $('form.ItemAddForm').serialize(),
						data: frmEditdata,
      					contentType: false,
      					processData: false,
						//dataType: 'json',
						cache: false,
						success: function(data){
							$('#ItemEditModal').modal('hide');
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
								content.url = "<?=base_url('/admin/item'.$gr.'_detail/'.$main.'/'.$sub.'/'.$cate)?>";
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
									location.href = "<?=base_url('/admin/item'.$gr.'_detail/'.$main.'/'.$sub.'/'.$cate)?>";
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
    function deleteItemUpID(dataItMain,dataItSub,dataItCate,dataItArea,dataItSch,dataItID){
        swal({
            title: "ยืนยันการลบข้อมูล?",
            text: "หากท่านยืนยันจะลบให้กด OK เพื่อยืนยันข้อมูล",
            icon: "warning",
            buttons: true,
            primaryMode: true,
        })
        .then((delUp_Item) => {
            if(delUp_Item){
                location.href = "<?=base_url('admin/delUp_Item')?>/10/" + dataItMain +'/'+ dataItSub +'/'+ dataItCate +'/'+ dataItArea +'/'+ dataItSch +'/'+ dataItID;
            }
        });
    }


    function edit_Item_Up(dataItArea,dataItSch,dataItID){
        $('#ItemEditForm')[0].reset(); // reset form on modals
        //Ajax Load data from ajax
        $.ajax({
            url : "<?=base_url('admin/ajax_edit_up')?>/" +dataItArea+"/"+dataItSch+"/"+ dataItID,
            type: "GET",
            dataType: "JSON",
            contentType: false,
      		processData: false,
            success: function(data)
            {
                //console.log(data);
                //var obj = JSON.parse(data);
                //var obj = JSON.parse(data);
                //alert(data);
				$('[name="it_id"]').val(data.iu_itemID);
                $('[name="iu_eid"]').val(data.iu_id);
                $('[name="iu_etypeup"]').val(data.iu_typeup);
                $('[name="iu_etopic"]').val(data.iu_topic);
                $('[name="iu_etypefile"]').val(data.iu_typefile);
                $('[name="iu_elinkurl"]').val(data.iu_linkcon);
                if(data.iu_typeup=='Upload'){
                    $('#UpEditDiv').show();
                }else{
                    $('#LinkEditDiv').show();
                }
                $('#ItemEditModal').modal('show'); // show bootstrap modal when complete loaded
                //$('.modal-title').text('แก้ไขข้อมูล'); // Set title to Bootstrap modal title
            },
            eerror: function (jqXHR, textStatus, errorThrown)
            {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }

	</script>
