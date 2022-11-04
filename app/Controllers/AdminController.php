<?php

namespace App\Controllers;

use \Mpdf\Mpdf;

use App\Models\AreasModel;
use App\Models\SchoolsModel;
use App\Models\UsersModel;
use App\Models\ItemModel;
use App\Models\ItemcatModel;
use App\Models\ItemmainModel;
use App\Models\ItemsubModel;
use App\Models\ItemupModel;
use App\Models\EventsModel;
use App\Models\EventscateModel;
use App\Models\EventstypeModel;

use CodeIgniter\Controller;
use CodeIgniter\Files\File;

class AdminController extends Controller
{

    public function __construct()
    {
        $segments = new \CodeIgniter\HTTP\URI();
        $segments = current_url(true);
        helper(['function', 'form']);
    }

    public function index()
    {
        $usersModel = new UsersModel;
        $areasModel = new AreasModel;
        $schoolsModel = new SchoolsModel;
        $ItemsModel = new ItemModel;
        $ItemscatModel = new ItemcatModel;
        $ItemsmainModel = new ItemmainModel;
        $ItemssubModel = new ItemsubModel;
        $ItemsupModel = new ItemupModel;
        $EvntModel = new EventsModel;
        $EvntCateModel = new EventscateModel;
        $EvntTypeModel = new EventstypeModel;

        $data = [
            'pdf' => $ItemsupModel->RowTypeFile(1,'Upload'),
            'img' => $ItemsupModel->RowTypeFile(2,'Upload'),
            'doc' => $ItemsupModel->RowTypeFile(3,'Upload'),
            'linkurl' => $ItemsupModel->RowTypeFile(4,'Link'),
            'areas' => $areasModel->where('area_code', session()->get('area_code'))->first(),
            'schools' => $schoolsModel->where('sch_code', session()->get('sch_code') )->first(),
            'itemall' => $ItemsModel->getItemAllByMainBySub(),
            "evntcate" => $EvntCateModel->orderBy('id')->findAll(),
            'title' => [
                '1' => 'Dashboard',
                '2' => '',
                '4' => 'สรุปการทำงาน'
            ],
        ];

        echo view('templates/' . session()->get('role') . '/header', $data);
        echo view('templates/' . session()->get('role') . '/sidebar');
        //echo view('templates/' . session()->get('role') . '/navbar');
        echo view(session()->get('role') . '/index');
        echo view('templates/' . session()->get('role') . '/footer');
    }

    public function listUsers()
    {
        $userModel = new UsersModel;
        //$data['users'] = $userModel->orderBy('ID', 'DESC')->findAll();

        $data = [
            "users" => $userModel->orderBy('ID', 'DESC')->findAll(),
            //'areas' => $areasModel->orderBy('id', 'desc')->findAll(),
            //'schools' => $schoolsModel->getSchoolsByArea($user['area_code']),
            'title' => [
                '1' => 'ข้อมูลผู้ใช้งานระบบ',
                '2' => 'เพิ่ม/แก้ไข ผู้ใช้งาน',
            ],
            'url' => [
                '1' => base_url(session()->get('role') . '/listUsers'),
                '2' => base_url(session()->get('role') . '/createUser')
            ]
        ];

        echo view('templates/' . session()->get('role') . '/header', $data);
        echo view('templates/' . session()->get('role') . '/sidebar');
        echo view('templates/' . session()->get('role') . '/navbar');
        echo view(session()->get('role') . '/listUsers');
        echo view('templates/' . session()->get('role') . '/footer');
    }

    public function createUser()
    {
        helper(['form']);

        $userModel = new UsersModel;
        //$data['users'] = $userModel->orderBy('ID', 'DESC')->findAll();

        $data = [
            "users" => $userModel->orderBy('ID', 'DESC')->findAll(),
            //'areas' => $areasModel->orderBy('id', 'desc')->findAll(),
            //'schools' => $schoolsModel->getSchoolsByArea($user['area_code']),
            'title' => [
                '1' => 'เพิ่มผู้ใช้งานใหม่'
            ],
        ];

        echo view('templates/' . session()->get('role') . '/header', $data);
        echo view('templates/' . session()->get('role') . '/sidebar');
        echo view('templates/' . session()->get('role') . '/navbar');
        echo view(session()->get('role') . '/createUser');
        echo view('templates/' . session()->get('role') . '/footer');
    }

    public function storeUser()
    {
        helper(['form']);
        $rules = [
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role ไม่สามารถเว้นว่างได้'
                ]
            ],
            'prefix' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'คำนำหน้า ไม่สามารถเว้นว่างได้'
                ]
            ],
            'firstName' => [
                'rules' => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'ชื่อ ไม่สามารถเว้นว่างได้',
                    'min_length' => 'ชื่อ อย่างน้อย 2 ตัวอักษร',
                    'max_length' => 'ชื่อ ใส่มากสุดได้ 50 ตัวอักษร',
                ]
            ],
            'lastName' => [
                'rules' => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'นามสกุล ไม่สามารถเว้นว่างได้',
                    'min_length' => 'นามสกุล อย่างน้อย 2 ตัวอักษร',
                    'max_length' => 'นามสกุล ใส่มากสุดได้ 50 ตัวอักษร'
                ]
            ],
            'email' => [
                'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'อีเมล ไม่สามารถเว้นว่างได้',
                    'min_length' => 'อีเมล อย่างน้อย 6 ตัวอักษร',
                    'max_length' => 'อีเมล ใส่มากสุดได้ 50 ตัวอักษร',
                    'valid_email' => 'อีเมล รูปแบบไม่ถูกต้อง ไม่สามารถใช้งานได้',
                    'is_unique' => 'อีเมล นี้มีในระบบแล้ว'
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[10]|max_length[20]',
                'errors' => [
                    'required' => 'หมายเลขโทรศัพท์ ไม่สามารถเว้นว่างได้',
                    'min_length' => 'หมายเลขโทรศัพท์ ให้ใส่ 10 หลัก',
                    'max_length' => 'หมายเลขโทรศัพท์ เกินจำนวน'
                ]
            ],
            'idCard' => [
                'rules' => 'required|min_length[13]|max_length[20]',
                'errors' => [
                    'required' => 'เลขบัตร ปชช. ไม่สามารถเว้นว่างได้',
                    'min_length' => 'เลขบัตร ปชช. ใส่ 13 หลัก',
                    'max_length' => 'เลขบัตร ปชช. เกินจำนวน'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[50]',
                'errors' => [
                    'required' => 'รหัสผ่าน ไม่สามารถเว้นว่างได้',
                    'min_length' => 'รหัสผ่าน อย่างน้อย 6 ตัวอักษร',
                    'max_length' => 'รหัสผ่าน ใส่มากสุดได้ 200 ตัวอักษร'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new UsersModel();
            $data = [
                'role' => $this->request->getVar('role'),
                'prefix' => $this->request->getVar('prefix'),
                'firstName' => $this->request->getVar('firstName'),
                'lastName' => $this->request->getVar('lastName'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'idCard' => $this->request->getVar('idCard'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status' => $this->request->getVar('status')
            ];
            $model->save($data);
            return redirect()->to(base_url('/admin/listUsers'))->with('msg', 'เพิ่มผู้ใช้สำเร็จ');
        } else {
            $data['validation'] = $this->validator;

            $data = [
                'title' => [
                    '1' => 'เพิ่มผู้ใช้งาน'
                ],
            ];
            echo view('templates/' . session()->get('role') . '/header', $data);
            echo view('templates/' . session()->get('role') . '/sidebar');
            echo view('templates/' . session()->get('role') . '/navbar');
            echo view(session()->get('role') . '/createUser');
            echo view('templates/' . session()->get('role') . '/footer');
        }
    }

    public function singleUser($id = null)
    {
        helper(['form']);
        $usersModel = new UsersModel;

        //$users = $usersModel->where('ID', session()->get('id'))->first();

        $data = [
            'user_obj' => $usersModel->where('ID', $id)->first(),
            'title' => [
                '1' => 'แก้ไขข้อมูลผู้ใช้งาน'
            ],
        ];

        echo view('templates/' . session()->get('role') . '/header', $data);
        echo view('templates/' . session()->get('role') . '/sidebar');
        echo view('templates/' . session()->get('role') . '/navbar');
        echo view(session()->get('role') . '/editUser');
        echo view('templates/' . session()->get('role') . '/footer');
    }

    public function updateUser()
    {
        $userModel = new UsersModel;
        $id = $this->request->getVar('id');

        //$users = $userModel->where('ID', session()->get('id'))->first();

        $data = [
            'user_obj' => $userModel->where('ID', $id)->first(),
            'title' => [
                '1' => 'ข้อมูลผู้ใช้งาน'
            ],
            'prefix' => $this->request->getVar('prefix'),
            'firstName' => $this->request->getVar('firstName'),
            'lastName' => $this->request->getVar('lastName'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'idCard' => $this->request->getVar('idCard'),
            'role' => $this->request->getVar('role'),
            'status' => $this->request->getVar('status')
        ];
        $userModel->update($id, $data);
        return redirect()->to(base_url('/admin/listUsers'))->with('msg', 'แก้ไขข้อมูลผู้ใช้สำเร็จ');
    }

    public function deleteUser($id = null)
    {
        $userModel = new UsersModel;
        $itemScoreModel = new ItemScoreModel;
        $questionsModel = new QuestionsModel;
        $coursesModel = new CoursesModel;
        $unitsModel = new UnitsModel;
        $evalutionModel = new EvalutionModel;
        $registerCoursesModel = new RegisterCoursesModel;

        $data = [
            'user' => $userModel->where('ID', $id)->delete($id),
            'itemScore' => $itemScoreModel->where('user_id', $id)->delete($id),
            'questions' => $questionsModel->where('user_id', $id)->delete($id),
            'courses' => $coursesModel->where('user_id', $id)->delete($id),
            'units' => $unitsModel->where('user_id', $id)->delete($id),
            'evalution' => $evalutionModel->where('user_id', $id)->delete($id),
            'register' => $registerCoursesModel->where('user_id', $id)->delete($id),
            'title' => [
                '1' => 'ข้อมูลส่วนตัว'
            ]
        ];
        //$data['user'] = $userModel->where('ID', $id)->delete($id);
        //$data['itemScore'] = $itemScoreModel->where('user_id', $id)->delete($id);
        //$data['questions'] = $questionsModel->where('user_id', $id)->delete($id);
        //$data['courses'] = $coursesModel->where('user_id', $id)->delete($id);
        //$data['units'] = $unitsModel->where('user_id', $id)->delete($id);

        return redirect()->to(base_url('/admin/listUsers'))->with('msg', 'ลบข้อมูลผู้ใช้สำเร็จ');
    }

    public function profile()
    {
        //helper(['form']);
        $usersModel = new UsersModel;
        //$areasModel = new AreasModel;
        //$schoolsModel = new SchoolsModel;
        //$courseModel = new CoursesModel;
        //$unitsModel = new UnitsModel;
        //$categorysModel = new CategorysModel;
        //$questionsModel = new QuestionsModel;

        //$data['profile'] = $usersModel->where('ID', session()->get('id'))->first();

        //$users = $usersModel->where('ID', session()->get('id'))->first();

        $data = [
            'profile' => $usersModel->where('ID', session()->get('id'))->first(),
            'title' => [
                '1' => 'ข้อมูลส่วนตัว'
            ],
            'url' => [
                '1' => base_url(session()->get('role') . '/profile'),
            ]
        ];

        echo view('templates/' . session()->get('role') . '/header', $data);
        echo view('templates/' . session()->get('role') . '/sidebar');
        echo view('templates/' . session()->get('role') . '/navbar');
        echo view(session()->get('role') . '/profile');
        echo view('templates/' . session()->get('role') . '/footer');
    }

    public function updateProfile()
    {
        helper(['form']);
        $rules = [
            'prefix' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'คำนำหน้า ไม่สามารถเว้นว่างได้'
                ]
            ],
            'firstName' => [
                'rules' => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'ชื่อ ไม่สามารถเว้นว่างได้',
                    'min_length' => 'ชื่อ อย่างน้อย 2 ตัวอักษร',
                    'max_length' => 'ชื่อ ใส่มากสุดได้ 50 ตัวอักษร',
                ]
            ],
            'lastName' => [
                'rules' => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'นามสกุล ไม่สามารถเว้นว่างได้',
                    'min_length' => 'นามสกุล อย่างน้อย 2 ตัวอักษร',
                    'max_length' => 'นามสกุล ใส่มากสุดได้ 50 ตัวอักษร'
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[10]|max_length[20]',
                'errors' => [
                    'required' => 'หมายเลขโทรศัพท์ ไม่สามารถเว้นว่างได้',
                    'min_length' => 'หมายเลขโทรศัพท์ ให้ใส่ 10 หลัก',
                    'max_length' => 'หมายเลขโทรศัพท์ เกินจำนวน'
                ]
            ],
            'idCard' => [
                'rules' => 'required|min_length[13]|max_length[20]',
                'errors' => [
                    'required' => 'เลขบัตร ปชช. ไม่สามารถเว้นว่างได้',
                    'min_length' => 'เลขบัตร ปชช. ใส่ 13 หลัก',
                    'max_length' => 'เลขบัตร ปชช. เกินจำนวน'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $userModel = new UsersModel;
            $id = session()->get('id');
            $data = [
                'prefix' => $this->request->getVar('prefix'),
                'firstName' => $this->request->getVar('firstName'),
                'lastName' => $this->request->getVar('lastName'),
                'phone' => $this->request->getVar('phone'),
                'idCard' => $this->request->getVar('idCard')
            ];
            $userModel->update($id, $data);
            return redirect()->to(base_url('/admin/profile'))->with('msg', 'แก้ไขข้อมูลส่วนตัวสำเร็จ');
        } else {
            helper(['form']);
            $userModel = new UsersModel;
            //$data['profile'] = $userModel->where('ID', session()->get('id'))->first();
            $data = [
                'profile' => $userModel->where('ID', session()->get('id'))->first(),
                'title' => [
                    '1' => 'แก้ไขข้อมูลส่วนตัว'
                ],
                'url' => [
                    '1' => base_url(session()->get('role') . '/profile'),
                ]
            ];
            $data['validation'] = $this->validator;
            echo view('templates/admin/header', $data);
            echo view('templates/admin/sidebar', $data);
            echo view('templates/admin/navbar', $data);
            echo view('admin/profile', $data);
            echo view('templates/admin/footer', $data);
        }
    }

    public function changePassword()
    {
        helper('form');

        $usersModel = new UsersModel;

        //$users = $usersModel->where('ID', session()->get('id'))->first();

        $data = [
            'profile' => $usersModel->where('ID', session()->get('id'))->first(),
            'title' => [
                '1' => 'เปลี่ยนรหัสผ่าน'
            ],
            'url' => [
                '1' => base_url(session()->get('role') . '/changePassword'),
            ]
        ];

        echo view('templates/' . session()->get('role') . '/header', $data);
        echo view('templates/' . session()->get('role') . '/sidebar');
        echo view('templates/' . session()->get('role') . '/navbar');
        echo view(session()->get('role') . '/changePassword');
        echo view('templates/' . session()->get('role') . '/footer');
    }

    public function updatePassword()
    {
        helper('form');
        $rules = [
            'oldPassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'รหัสผ่านปัจจุบัน ไม่สามารถเว้นว่างได้'
                ]
            ],
            'newPassword' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'รหัสผ่านใหม่ ไม่สามารถเว้นว่างได้',
                    'min_length' => 'รหัสผ่านใหม่ อย่างน้อย 6 ตัวอักษร'
                ]
            ],
            'confPassword' => [
                'rules' => 'required|matches[newPassword]',
                'errors' => [
                    'required' => 'ยืนยันรหัสผ่าน ไม่สามารถเว้นว่างได้',
                    'matches' => 'ยืนยันรหัสผ่านไม่ตรงกัน'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $userModel = new UsersModel;
            $id = session()->get('id');
            $oldPassword = $this->request->getVar('oldPassword');
            $getData = $userModel->where('ID', $id)->first();
            if ($getData) {
                $pass = $getData['password'];
                $verify_password = password_verify($oldPassword, $pass);
                if ($verify_password) {
                    $newPassword = $this->request->getVar('newPassword');
                    $data = [
                        'password' => password_hash($newPassword, PASSWORD_DEFAULT)
                    ];
                    $userModel->update($id, $data);
                    return redirect()->to(base_url('/admin/changePassword'))->with('msg-success', 'เปลี่ยนรหัสผ่านสำเร็จ');
                } else {
                    return redirect()->to(base_url('/admin/changePassword'))->with('msg-error', 'รหัสผ่านปัจจุบันไม่ถูกต้อง');
                }
            }
        } else {
            helper('form');
            $data['validation'] = $this->validator;
            $usersModel = new UsersModel;

            //$users = $usersModel->where('ID', session()->get('id'))->first();

            $data = [
                'profile' => $usersModel->where('ID', session()->get('id'))->first(),
                'title' => [
                    '1' => 'เปลี่ยนรหัสผ่าน'
                ],
                'url' => [
                    '1' => base_url(session()->get('role') . '/changePassword'),
                ]
            ];

            echo view('templates/' . session()->get('role') . '/header', $data);
            echo view('templates/' . session()->get('role') . '/navbar');
            echo view('templates/' . session()->get('role') . '/sidebar');
            echo view(session()->get('role') . '/changePassword');
            echo view('templates/' . session()->get('role') . '/footer');
        }
    }

////////////////////////// item9
    public function Item9($main = null,$sub = null)
    {
            $itemsModel = new ItemModel;
            $itemsubModel = new ItemsubModel;
            
            $subName = $itemsubModel->getItemSubAllByMainBySub($main,$sub);

            $data = [
                'item' => 9,
				'itemall' => $itemsModel->getItemAllByMainBySub($main,$sub),
                'main' => $main,
                'sub' => $sub,
				'gr' => '9',
                'title' => [
                    '1' => 'จัดการระบบ',
                    '2' => 'การเปิดเผยข้อมูล',
                    '3' => $subName['is_category_name'],
                ],                
				'url' => [
                    '1' => "",
                    '2' => base_url(session()->get('role') . '/item9/'),
                    '3' => "",
                ]
            ];

            echo view('templates/' . session()->get('role') . '/header', $data);
            echo view('templates/' . session()->get('role') . '/sidebar');
            echo view('templates/' . session()->get('role') . '/navbar');
            echo view(session()->get('role') . '/item9_ajax');
            echo view('templates/' . session()->get('role') . '/footer');
	}

	public function saveAllItem()
	{
		$itemsModel = new ItemModel;
		$itemsUpModel = new ItemupModel;

		$itemsId = $itemsModel->where('id', $this->request->getVar('iu_id'))->first();

		$iu_typeup = $this->request->getVar('iu_typeup');
		if($iu_typeup=='Upload'):
			$file = $this->request->getFile('file');
			if (isset($file)):
					$iu_link = $file->getRandomName();
					$file->move('uploads/item/', $iu_link);
					//$extension = end(explode('.',$iu_link));
					$ext = explode( ".", $iu_link);
					$extension = $ext[count($ext)-1];
					//$file_name = substr($iu_link,0,strlen($iu_link)-strlen($file_type)); 
					//$extension = "";
			else:
					$iu_link = "";
					$extension = "";
			endif;
			$data = [
				  'iu_area' =>session()->get('area_code'),
				  'iu_school' =>session()->get('sch_code'),
				  'iu_main' =>$itemsId['it_main'],
				  'iu_sub' =>$itemsId['it_sub'],
				  'iu_itemID' =>$itemsId['it_cate'],
				  'iu_topic' =>$this->request->getVar('iu_topic'),
				  'iu_posted' =>session()->get('id'),
				  'iu_post_date' =>date('Y-m-d H:i:s'),
				  'iu_pageview' =>'0',
				  'iu_typeup' =>$iu_typeup,
				  'iu_typefile' =>$extension,
				  'iu_linkcon' =>$iu_link,
				  'iu_status' =>'1',
			];
		else:
			$extension = "";
			$iu_link = $this->request->getVar('iu_linkurl');
			$data = [
				  'iu_area' =>session()->get('area_code'),
				  'iu_school' =>session()->get('sch_code'),
				  'iu_main' =>$itemsId['it_main'],
				  'iu_sub' =>$itemsId['it_sub'],
				  'iu_itemID' =>$itemsId['it_cate'],
				  'iu_topic' =>$this->request->getVar('iu_topic'),
				  'iu_posted' =>session()->get('id'),
				  'iu_post_date' =>date('Y-m-d H:i:s'),
				  'iu_pageview' =>'0',
				  'iu_typeup' =>$iu_typeup,
				  'iu_typefile' =>$extension,
				  'iu_linkcon' =>$iu_link,
				  'iu_status' =>'1',
			];
		endif;

        $up=$itemsUpModel->save($data);
		//$session = session();
		if($up){
			$data_c = [
				'state' => "success",
				'main' => $itemsId['it_main'],
				'sub' => $itemsId['it_sub'],
				'message' => ' เพิ่มข้อมูลสำเร็จ',
				//'message' => $session->setFlashdata('msg', '<i class="fa fa-check-circle"></i> update สำเร็จ'),
			];
		} else {
			$data_c = [
				'state' => "error",
				'main' => $itemsId['it_main'],
				'sub' => $itemsId['it_sub'],
				'message' => 'ไม่สามารถเพิ่มข้อมูลได้',
				//'message' => $session->setFlashdata('error', '<i class="fa fa-alert-circle"></i> ไม่สามารถ update ได้'),
			];
		}
		echo json_encode($data_c);

	}

    public function Find_Item_Ajax($gr = null,$main = null,$sub = null)
    {
		$ItemsModel = new ItemModel;

        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
        /* If we pass any extra data in request from ajax */
        //$value1 = isset($_REQUEST['key1'])?$_REQUEST['key1']:"";

        /* Value we will get from typing in search */
        $search_value = $_REQUEST['search']['value'];
 
        if(!empty($search_value)){
            // count all data
            $total_count = $ItemsModel->getItemAllByMainBySubSearch($main,$sub,$search_value);
            // get per page data
            $data = $ItemsModel->getItemAllByMainBySubSearchLimit($main,$sub,$start,$length,$search_value);
        }else{
            // count all data
            $total_count = $ItemsModel->getItemAllByMainBySub($main,$sub);
            // get per page data
            $data = $ItemsModel->getItemAllByMainBySubLimit($main,$sub,$start,$length);
        }

        $json_data = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);

    }

    public function Item9_detail($main = null,$sub = null,$cate = null)
    {
            $itemsModel = new ItemModel;
            $itemsubModel = new ItemsubModel;
            $itemupModel = new ItemupModel;
            
            $subName = $itemsubModel->getItemSubAllByMainBySub($main,$sub);
			$subNameCate = $itemsModel->getItemByMainBySubByCate($main,$sub,$cate);

            $data = [
                'item' => 9,
                'itemall' => $itemsModel->getItemAllByMainBySub($main,$sub),
				'itemsuball' => $itemupModel->getItemAllByMainBySubByCate($main,$sub,$cate),
                'main' => $main,
                'sub' => $sub,
                'cate' => $cate,
				'gr' => '9',
                'title' => [
                    '1' => 'จัดการระบบ',
                    '2' => 'การเปิดเผยข้อมูล',
                    '3' => $subName['is_category_name'],
                    '4' => $subNameCate['it_topic']
                ],                
				'url' => [
                    '1' => "",
                    '2' => base_url(session()->get('role') . '/item9/'),
                    '3' => base_url(session()->get('role') . '/item9/'.$main.'/'.$sub),
                    '4' => ""
                ]
            ];

            echo view('templates/' . session()->get('role') . '/header', $data);
            echo view('templates/' . session()->get('role') . '/sidebar');
            echo view('templates/' . session()->get('role') . '/navbar');
            echo view(session()->get('role') . '/item9_detail_ajax');
            echo view('templates/' . session()->get('role') . '/footer');
	}

    public function Find_ItemUp_Ajax($gr = null,$main = null,$sub = null,$cate = null)
    {
		$ItemsModel = new ItemModel;
        $ItemupModel = new ItemupModel;

        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
        /* If we pass any extra data in request from ajax */
        //$value1 = isset($_REQUEST['key1'])?$_REQUEST['key1']:"";

        /* Value we will get from typing in search */
        $search_value = $_REQUEST['search']['value'];
 
        if(!empty($search_value)){
            // count all data
            $total_count = $ItemupModel->getItemAllByMainBySubSearch($main,$sub,$cate,$search_value);
            // get per page data
            $data = $ItemupModel->getItemAllByMainBySubSearchLimit($main,$sub,$cate,$start,$length,$search_value);
        }else{
            // count all data
            $total_count = $ItemupModel->getItemAllByMainBySub($main,$sub,$cate);
            // get per page data
            $data = $ItemupModel->getItemAllByMainBySubLimit($main,$sub,$cate,$start,$length);
        }

        $json_data = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);

    }

    public function DelUp_Item($gr= null,$main = null,$sub= null,$cate = null,$area = null,$sch = null,$upid = null)
    {
        $ItemupModel = new ItemupModel;
 
        $up=$ItemupModel->where(['iu_area'=>$area,'iu_school'=>$sch,'id'=>$upid])->delete();
        //$up=$ItemupModel->save($data);
		//$session = session();
		if($up){
			$data_c = [
				'stateDel' => "success",
				'main' => $main,
				'sub' => $sub,
				'message' => 'ลบข้อมูลสำเร็จ',
				//'message' => $session->setFlashdata('msg', '<i class="fa fa-check-circle"></i> update สำเร็จ'),
			];
		} else {
			$data_c = [
				'stateDel' => "error",
				'main' => $main,
				'sub' => $sub,
				'message' => 'ไม่สามารถลบข้อมูลได้',
				//'message' => $session->setFlashdata('error', '<i class="fa fa-alert-circle"></i> ไม่สามารถ update ได้'),
			];
		}
//		echo json_encode($data_c);
        return redirect()->to(base_url('/admin/item9_detail/'.$main.'/'.$sub.'/'.$cate))->with('msg', 'ลบข้อมูลช้สำเร็จ');

    }

    public function Ajax_edit_up($area = null,$sch = null,$upid = null) {
 
        $ItemupModel = new ItemupModel;
        $data = $ItemupModel->ajax_edit_up($area,$sch,$upid);

        echo json_encode($data);
    }

	public function saveEditAllItem()
	{
		$itemsModel = new ItemModel;
		$itemsUpModel = new ItemupModel;

		$itemsId = $itemsModel->where('id', $this->request->getVar('it_id'))->first();

		$iu_typeup = $this->request->getVar('iu_typeup');
		if($iu_typeup=='Upload'):
			$file = $this->request->getFile('file');
			if (isset($file)):
					$iu_link = $file->getRandomName();
					$file->move('uploads/item/', $iu_link);
					//$extension = end(explode('.',$iu_link));
					$ext = explode( ".", $iu_link);
					$extension = $ext[count($ext)-1];
					//$file_name = substr($iu_link,0,strlen($iu_link)-strlen($file_type)); 
					//$extension = "";
			else:
					$iu_link = '';
					$extension = '';
			endif;
			$data = [
				  //'iu_area' =>session()->get('area_code'),
				  //'iu_school' =>session()->get('sch_code'),
				  //'iu_main' =>$itemsId['it_main'],
				  //'iu_sub' =>$itemsId['it_sub'],
				  'iu_itemID' =>$itemsId['it_cate'],
				  'iu_topic' =>$this->request->getVar('iu_topic'),
				  //'iu_posted' =>session()->get('id'),
				  //'iu_post_date' =>date('Y-m-d H:i:s'),
				  //'iu_pageview' =>'0',
				  'iu_typeup' =>$iu_typeup,
				  'iu_typefile' =>$extension,
				  'iu_linkcon' =>$iu_link,
				  //'iu_status' =>'1',
			];
		else:
			$extension = "";
			$iu_link = $this->request->getVar('iu_linkurl');
			$data = [
				  //'iu_area' =>session()->get('area_code'),
				  //'iu_school' =>session()->get('sch_code'),
				  //'iu_main' =>$itemsId['it_main'],
				  //'iu_sub' =>$itemsId['it_sub'],
				  'iu_itemID' =>$itemsId['it_cate'],
				  'iu_topic' =>$this->request->getVar('iu_topic'),
				  //'iu_posted' =>session()->get('id'),
				  //'iu_post_date' =>date('Y-m-d H:i:s'),
				  //'iu_pageview' =>'0',
				  'iu_typeup' =>$iu_typeup,
				  'iu_typefile' =>$extension,
				  'iu_linkcon' =>$iu_link,
				  //'iu_status' =>'1',
			];
		endif;

        $up=$itemsUpModel->update($this->request->getVar('iu_id'),$data);
		//$session = session();
		if($up){
			$data_c = [
				'state' => "success",
				'main' => $itemsId['it_main'],
				'sub' => $itemsId['it_sub'],
				'message' => 'แก้ไขข้อมูลสำเร็จ',
				//'message' => $session->setFlashdata('msg', '<i class="fa fa-check-circle"></i> update สำเร็จ'),
			];
		} else {
			$data_c = [
				'state' => "error",
				'main' => $itemsId['it_main'],
				'sub' => $itemsId['it_sub'],
				'message' => 'ไม่สามารถแ้ไขข้อมูลได้',
				//'message' => $session->setFlashdata('error', '<i class="fa fa-alert-circle"></i> ไม่สามารถ update ได้'),
			];
		}
		echo json_encode($data_c);

	}

////////////////////////// item10
public function Item10($main = null,$sub = null)
{
        $itemsModel = new ItemModel;
        $itemsubModel = new ItemsubModel;
        
        $subName = $itemsubModel->getItemSubAllByMainBySub($main,$sub);

        $data = [
            'item' => 10,
            'itemall' => $itemsModel->getItemAllByMainBySub($main,$sub),
            'main' => $main,
            'sub' => $sub,
            'gr' => '10',
            'title' => [
                '1' => 'จัดการระบบ',
                '2' => 'การป้องกันการทุจริต',
                '3' => $subName['is_category_name'],
            ],                
            'url' => [
                '1' => "",
                '2' => base_url(session()->get('role') . '/item10/'),
                '3' => "",
            ]
        ];

        echo view('templates/' . session()->get('role') . '/header', $data);
        echo view('templates/' . session()->get('role') . '/sidebar');
        echo view('templates/' . session()->get('role') . '/navbar');
        echo view(session()->get('role') . '/item10_ajax');
        echo view('templates/' . session()->get('role') . '/footer');
}

public function Item10_detail($main = null,$sub = null,$cate = null)
{
        $itemsModel = new ItemModel;
        $itemsubModel = new ItemsubModel;
        $itemupModel = new ItemupModel;
        
        $subName = $itemsubModel->getItemSubAllByMainBySub($main,$sub);
        $subNameCate = $itemsModel->getItemByMainBySubByCate($main,$sub,$cate);

        $data = [
            'item' => 10,
            'itemall' => $itemsModel->getItemAllByMainBySub($main,$sub),
            'itemsuball' => $itemupModel->getItemAllByMainBySubByCate($main,$sub,$cate),
            'main' => $main,
            'sub' => $sub,
            'cate' => $cate,
            'gr' => '10',
            'title' => [
                '1' => 'จัดการระบบ',
                '2' => 'การป้องกันการทุจริต',
                '3' => $subName['is_category_name'],
                '4' => $subNameCate['it_topic']
            ],                
            'url' => [
                '1' => "",
                '2' => base_url(session()->get('role') . '/item10/'),
                '3' => base_url(session()->get('role') . '/item10/'.$main.'/'.$sub),
                '4' => ""
            ]
        ];

        echo view('templates/' . session()->get('role') . '/header', $data);
        echo view('templates/' . session()->get('role') . '/sidebar');
        echo view('templates/' . session()->get('role') . '/navbar');
        echo view(session()->get('role') . '/item10_detail_ajax');
        echo view('templates/' . session()->get('role') . '/footer');
}


public function Find_Item_Ajax_Index()
{
    $ItemssubModel = new ItemsubModel;

    $params['draw'] = $_REQUEST['draw'];
    $start = $_REQUEST['start'];
    $length = $_REQUEST['length'];
    /* If we pass any extra data in request from ajax */
    //$value1 = isset($_REQUEST['key1'])?$_REQUEST['key1']:"";

    /* Value we will get from typing in search */
    $search_value = $_REQUEST['search']['value'];

    if(!empty($search_value)){
        // count all data
        $total_count = $ItemssubModel->getItemAllByMainBySubSearch(null,null,$search_value);
        // get per page data
        $data = $ItemssubModel->getItemAllByMainBySubSearchLimit(null,null,$start,$length,$search_value);
    }else{
        // count all data
        $total_count = $ItemssubModel->getItemAllByMainBySub(null,null);
        // get per page data
        $data = $ItemssubModel->getItemAllByMainBySubLimit(null,null,$start,$length);
    }

    $json_data = array(
        "draw" => intval($params['draw']),
        "recordsTotal" => count($total_count),
        "recordsFiltered" => count($total_count),
        "data" => $data   // total data array
    );

    echo json_encode($json_data);

}







}
