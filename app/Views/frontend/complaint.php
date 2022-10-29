    <!-- ======= complaint Section ======= -->
    <section id="complaint" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="section-header">
          <h2> <?=$title[1];?> </h2>
          <p>กรุณากรอกข้อมูลให้ครบถ้วนในการเสนอขอร้องเรียน เพราะมีความจำเป็นในการตรวจสอบข้อมูลและส่งกลับข้อมูลไปยังผู้ร้องเรียน</p>
        </div>
		<div class="row gy-4 mt-1">

					  <div class="col-lg-12">
						<form role="form" id="CommAddForm" action="<?=base_url('saveComm')?>" method="post" enctype="multipart/form-data" class="php-email-form">
						  <div class="row gy-4">
							<div class="col-lg-6 form-group">
							  <label for="name">ชื่อ - นามสกุล (กรอกข้อมูลตามความจริง) <span class="text-danger">*</span></label>
							  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
							</div>
							<div class="col-lg-6 form-group">
							  <label for="cardid">เลขบัตรประจำตัวประชาชน <span class="text-danger">*</span></label>
							  <input type="text" class="form-control" name="cardid" id="cardid" placeholder="Your CardID" data-inputmask='"mask": "9999999999999"' data-mask required>
							</div>
						  </div>
						  <div class="row gy-4">
						  <div class="form-group">
							<label for="address">ที่อยู่ที่สามารถติดต่อได้ <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="address" id="address" placeholder="Subject"  required>
						  </div>
						  </div>
						  <div class="row gy-4">
							<div class="col-lg-6 form-group">
							  <label for="phone">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
							  <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone" required>
							</div>
							<div class="col-lg-6 form-group">
							  <label for="name">อีเมล์ <span class="text-danger">*</span></label>
							  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
							</div>
						  </div>
						  <div class="row gy-4">
						  <div class="form-group">
							<label for="subject">หัวข้อร้องเรียน <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
						  </div>
						  </div>
						  <div class="row gy-4">
						  <div class="form-group">
							<label for="message">รายละเอียดของเรื่องที่ร้องเรียน <span class="text-danger">*</span></label>
							<textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
						  </div>
						  </div>
						  <div class="my-3">
						  	<h4>คำแนะนำ</h4>
							<p>
							การร้องเรียนควรมีรายละเอียดให้ครบถ้วนตามที่กำหนด ดังนี้<br>
							1. ควรป้อนข้อมูลเกี่ยวกับ ชื่อ – สกุล ที่อยู่ โทรศัพท์ และอีเมล์ (e-mail) ของผู้ส่งที่สามารถติดต่อได้ให้ชัดเจน เพื่อประโยชน์ในการติดต่อกลับและยืนยันข้อมูลการร้องเรียนหรือข้อเท็จจริงเพิ่มเติมให้ชัดเจนสามารถดำเนินการต่อไปได้ เพื่อรายงานผลกลับไปยังท่านต่อไป<br>
							2. ข้อมูลของท่านจะถูกเก็บเป็นความลับอย่างที่สุด<br>
							3. กรณีที่ไม่เปิดเผยชื่อ – สกุลจริงถือว่าเป็น <font class="text-danger">“บัตรสนเท่ห์”</font> ซึ่งหากไม่ระบุพยานหลักฐานชัดเจนเพียงพอที่จะดำเนินการสืบสวนข้อเท็จจริงได้ </p>
						  </div>
						  <div class="text-center"><button type="submit" class="btn btn-success" id="Item-formAdd-submit">ส่งข้อมูลการร้องเรียน</button></div>
						</form>
					  </div><!-- End Contact Form -->

		</div>


	</div>
</section>

	<script type="text/javascript">
	$(function() { 
		$("#CommAddForm").submit(function(e) {
			//alert("sssssssssssss");
			e.preventDefault();
			var form = $(this);
			var actionUrl = form.attr('action');
					$.ajax({
						type: "POST",
						url: actionUrl,
						data: form.serialize(),
						//processData: false,
						//contentType: false,
						success: function(data){
							//$('#ItemAddModal').modal('hide');
							var obj = JSON.parse(data);
							//alert(obj.gr);
							if(obj.state=='success'){
								setTimeout(function() {
									swal({
										title: "การส่งข้อมูล",
										text: obj.message,
										icon: "success",
										buttons: true,
										primaryMode: true,
									}).then(function() {
											window.location.href = "<?php echo base_url();?>";
									})
								}, 1000);
							} else {
								setTimeout(function() {
								swal({
									title: "การส่งข้อมูล",
									text: obj.message,
									icon: "danger",
									buttons: true,
									primaryMode: true,
									}).then(function() {
											window.location.href = "<?php echo base_url();?>";
									})
								}, 1000);
							}
						},
						error: function (data) {
							alert(data.status + ':' + data.statusText,data.responseText);
							//console.log(data.status + ':' + data.statusText,data.responseText);
						// check the err for error details
						}
					});
		});
	});

	$(function () {
	  $('[data-mask]').inputmask()
	})
	</script>