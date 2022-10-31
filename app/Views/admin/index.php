				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Welcome back, <?= session()->get('firstName'); ?></h2>
								<h5 class="text-white op-7 mb-2">โรงเรียน<?php echo $schools['sch_name'];?></h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<button class="btn btn-warning btn-round" data-toggle="modal" data-target="#ItemAddModal">Add Item</button>
							</div>
						</div>
					</div>
				</div>

				<div class="page-inner mt--5">
						<div class="row row-card-no-pd mt--2">
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-user text-warning"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">ครูเวรบันทึก</p>
													<h4 class="card-title"><?=number_format($pdf);?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-comment text-success"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">ภารโรงเวรบันทึก</p>
													<h4 class="card-title"><?=number_format($img);?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-tags text-danger"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">ผู้ตรวจเวร</p>
													<h4 class="card-title"><?=number_format($doc);?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="fas fa-cloud text-primary"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">ผู้อำนวยการ</p>
													<h4 class="card-title"><?=number_format($linkurl);?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				


		<div class="row">
            <div class="col-lg-12">
			
			</div>
		</div>