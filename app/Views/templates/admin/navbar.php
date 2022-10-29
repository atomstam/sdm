
					<div class="page-header">
						<h4 class="page-title"><?= $title[1]; ?></h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="<?= base_url(); ?>">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="<?= $url[1]; ?>"><?= $title[1]; ?></a>
							</li>
							<?php if(isset($title[2])) :?>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="<?= $url[2]; ?>"><?= $title[2]; ?></a>
							</li>
							<?php endif;?>
							<?php if(isset($title[3])) :?>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="<?= $url[3]; ?>"><?= $title[3]; ?></a>
							</li>
							<?php endif;?>
							<?php if(isset($title[4])) :?>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="<?= $url[4]; ?>"><?= $title[4]; ?></a>
							</li>
							<?php endif;?>
						</ul>
					</div>
			