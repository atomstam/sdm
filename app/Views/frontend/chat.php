    <!-- ======= complaint Section ======= -->
    <section id="complaint" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="section-header">
          <h2> <?=$title[1];?> </h2>
          <p>กรุณากรอกข้อมูลให้ครบถ้วนในการเสนอขอร้องเรียน เพราะมีความจำเป็นในการตรวจสอบข้อมูลและส่งกลับข้อมูลไปยังผู้ร้องเรียน</p>
        </div>
		<div class="row gy-4 mt-1">
					  <div class="col-lg-12">
						<div class="row gy-4">
						  <!-- Conversations are loaded here -->
						  <div class="direct-chat-messages " id="messagesDiv">
						  </div>
						</div>
						<form role="form" id="ChatAddForm" action="<?=base_url('saveChat')?>" method="post" enctype="multipart/form-data" class="php-email-form">
						  <div class="row gy-4">

							<div class="input-group">
							<input type="hidden" class="form-control" name="userID1" id="userID1" value="<?=session()->get('ses_user_id');?>" placeholder="UserID 1">
							<input type="hidden" class="form-control" name="userID2" id="userID2" value="<?=session()->get('ses_user_id');?>" placeholder="UserID 2">    
							<input name="h_maxID" type="hidden" id="h_maxID" value="0">
							  <input type="text" name="msg" id="msg" placeholder="Message.. And Enter." class="form-control">
								  <span class="input-group-btn">
									<button type="submit" class="btn btn-danger btn-flat" id="send" name="send">Send</button>
								  </span>
							</div>
						</form>
					  </div><!-- End Contact Form -->

		</div>


	</div>
</section>

	<script type="text/javascript">
	var UrlImg="<?= base_url(); ?>";
	var load_chat; // กำหนดตัวแปร สำหรับเป็นฟังก์ชั่นเรียกข้อมูลมาแสดง
	var first_load=1; // กำหนดตัวแปรสำหรับโหลดข้อมูลครั้งแรกให้เท่ากับ 1

	load_chat = function(userID){
		var maxID = $("#h_maxID").val(); // chat_id ล่าสุดที่แสดง
		$.post("<?= base_url(); ?>/savechat",{
			viewData:first_load,
			userID:userID,
			maxID:maxID
		},function(data){
			if(first_load==1){ // ถ้าเป็นการโหลดครั้งแรก ให้ดึงข้อมูลทั้งหมดที่เคยบันทึกมาแสดง
				for(var k=0;k<data.length;k++){ // วนลูปแสดงข้อความ chat ที่เคยบันทึกไว้ทั้งหมด
					if(parseInt(data[0].max_id)>parseInt(maxID)){ // เทียบว่าข้อมูล chat_id .ใหม่กว่าที่แสดงหรือไม่
						$("#h_maxID").val(data[k].max_id); // เก็บ chat_id เป็น ค่าล่าสุด
						// แสดงข้อความการ chat มีการประยุกต์ใช้ ตำแหน่งข้อความ เพื่อจัด css class ของข้อความที่แสดง
						$("#messagesDiv").append('<div class="direct-chat-msg '+data[k].data_align+'"><div class="direct-chat-'+data[k].data_css+' clearfix"><span class="direct-chat-name '+data[k].data_align_bak+'">'+data[k].data_user+'</span></div><img class="direct-chat-img" src="modules/chat/img/'+data[k].data_img+'"><div class="direct-chat-text">'+data[k].data_msg+'</div><div class="direct-chat-info clearfix '+data[k].data_css+'"><span class="direct-chat-timestamp '+data[k].data_align_bak+'">'+data[k].data_time+'</span></div></div>'); 
						$("#messagesDiv")[0].scrollTop = $("#messagesDiv")[0].scrollHeight; // เลือน scroll ไปข้อความล่าสุด  	
					}
				};
			}else{ // ถ้าเป็นข้อมูลที่เพิ่งส่งไปล่าสุด
				if(parseInt(data[0].max_id)>parseInt(maxID)){ // เทียบว่าข้อมูล chat_id .ใหม่กว่าที่แสดงหรือไม่
					$("#h_maxID").val(data[0].max_id); // เก็บ chat_id เป็น ค่าล่าสุด
					// แสดงข้อความการ chat มีการประยุกต์ใช้ ตำแหน่งข้อความ เพื่อจัด css class ของข้อความที่แสดง
					$("#messagesDiv").append('<div class="direct-chat-msg '+data[0].data_align+'"><div class="direct-chat-'+data[0].data_css+' clearfix"><span class="direct-chat-name '+data[0].data_align_bak+'">'+data[0].data_user+'</span></div><img class="direct-chat-img" src="modules/chat/img/'+data[k].data_img+'"><div class="direct-chat-text">'+data[0].data_msg+'</div><div class="direct-chat-'+data[0].data_css+' clearfix"><span class="direct-chat-timestamp '+data[0].data_align_bak+'">'+data[0].data_time+'</span></div></div>'); 
					$("#messagesDiv")[0].scrollTop = $("#messagesDiv")[0].scrollHeight;   // เลือน scroll ไปข้อความล่าสุด
				}
			}
			first_load++;// บวกค่า first_load
		});		
	}
	// กำหนดให้ทำงานทกๆ 2.5 วินาทีเพิ่มแสดงข้อมูลคู่สนทนา
	setInterval(function(){
		var userID = $("#userID2").val(); // id user ของผู้รับ
		load_chat(userID); // เรียกใช้งานฟังก์ช่นแสดงข้อความล่าสุด
	},2500);	


	$(function(){
		 /// เมื่อพิมพ์ข้อความ แล้วกดส่ง
	  $("#msg").keypress(function (e) { // เมื่อกดที่ ช่องข้อความ  
		if (e.keyCode == 13) { // ถ้ากดปุ่ม enter  
		  var user1 = $("#userID1").val(); // เก็บ id user  ผู้ใช้ที่ส่ง
		  var user2 = $("#userID2").val(); // เก็บ id user  ผู้ใช้ที่รับ
		  var msg = $("#msg").val();  // เก็บค่าข้อความ  
		  $.post("<?= base_url(); ?>/ajax_chat",{
			  user1:user1,
			  user2:user2,
			  msg:msg
		  },function(data){
				load_chat(user2);// เรียกใช้งานฟังก์ช่นแสดงข้อความล่าสุด
				$("#msg").val(""); // ล้างค่าช่องข้อความ ให้พร้อมป้อนข้อความใหม่  		  
		  });
		}  
	  });  
	  
	});

	$(function(){
	/// เมื่อพิมพ์ข้อความ แล้วกดปุ่มส่ง
		$("#ChatAddForm").submit(function(e) {
	  //$("#send").click(function (e) { // เมื่อกดที่ ช่องข้อความ  
		  var user1 = $("#userID1").val(); // เก็บ id user  ผู้ใช้ที่ส่ง
		  var user2 = $("#userID2").val(); // เก็บ id user  ผู้ใช้ที่รับ
		  var msg = $("#msg").val();  // เก็บค่าข้อความ  
		  $.post("<?= base_url(); ?>/ajax_chat",{
			  user1:user1,
			  user2:user2,
			  msg:msg
		  },function(data){
				load_chat(user2);// เรียกใช้งานฟังก์ช่นแสดงข้อความล่าสุด
				$("#msg").val(""); // ล้างค่าช่องข้อความ ให้พร้อมป้อนข้อความใหม่  		  
		  });
	  });  

	  });  


	$(function () {
	  $('[data-mask]').inputmask()
	})
	</script>