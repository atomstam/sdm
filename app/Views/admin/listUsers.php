        <div class="row">
            <div class="col-lg-12">
                <div class="card">
					  <div class="card-header d-flex justify-content-between">
							<h3 class="w-75 p-0 m-0"><?= $title[1]; ?></h3>
							<div class="card-options">
								<a href="<?= base_url('/admin/createUser'); ?>" class="btn btn-primary" style="margin-left: 1em"><i class="fe fe-plus"></i>&nbsp;เพิ่ม User ใหม่</a>
							</div>
					  </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('msg'); ?></div>
                        <?php endif ?>
 
                            <table id="example1" class="table-listUsers table table-striped table-bordered table-hover text-nowrap mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%" class="text-center">#</th>
                                        <th class="text-center">ชื่อ-นามสกุล</th>
                                        <th style="width: 15%" class="text-center">role</th>
                                        <th style="width: 15%" class="text-center">status</th>
                                        <th style="width: 15%" class="text-center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($users) : ?>
                                        <?php foreach ($users as $key => $user_item) : ?>
                                            <tr>
                                                <td class="text-center"><?= $key + 1; ?></td>
                                                <td><?= $user_item['prefix'] . $user_item['firstName'] . ' ' . $user_item['lastName']; ?></td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" class="btn btn-<?php if ($user_item['role'] == 'admin') : echo 'success';
                                                                                                elseif ($user_item['role'] == 'area') : echo "primary";
                                                                                                elseif ($user_item['role'] == 'teacher') : echo "warning";
                                                                                                elseif ($user_item['role'] == 'student') : echo "danger";
                                                                                                elseif ($user_item['role'] == 'population') : echo "info";
                                                                                                endif ?> btn-sm"><?= $user_item['role']; ?></a>
                                                </td>
                                                <td class="font-weight-semibold fs-16 text-center">
                                                    <?php if ($user_item['status'] == '1') : echo '<span class="btn btn-success btn-sm">Active</span>';
                                                    else : echo '<span class="btn btn-warning btn-sm">Waiting...</span>';
                                                    endif ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('/admin/editUser/' . $user_item['ID']); ?>" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                                                    <a href="<?= base_url('/admin/deleteUser/' . $user_item['ID']); ?>" class="btn btn-danger btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>

                                </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>

