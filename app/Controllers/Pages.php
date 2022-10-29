<?php namespace App\Controllers;

use App\Models\AreasModel;
use App\Models\SchoolsModel;
use App\Models\UsersModel;
use App\Models\ItemModel;
use App\Models\ItemcatModel;
use App\Models\ItemmainModel;
use App\Models\ItemsubModel;
use App\Models\ItemupModel;
use App\Models\CommModel;
use App\Models\ChatModel;

use CodeIgniter\Controller;

class Pages extends Controller {

    public function __construct()
    {
        $segments = new \CodeIgniter\HTTP\URI();
        $segments = current_url(true);
        helper(['function', 'form']);
        $session = session();
        $session->set('area_code',lang('Constant.area_code'));
        $session->set('sch_code',lang('Constant.sch_code'));

    }

    public function index() {
        $usersModel = new UsersModel;
        $areasModel = new AreasModel;
        $schoolsModel = new SchoolsModel;
        $ItemsModel = new ItemModel;
        $ItemscatModel = new ItemcatModel;
        $ItemsmainModel = new ItemmainModel;
        $ItemssubModel = new ItemsubModel;
        $ItemsupModel = new ItemupModel;

        $data = [
			//'users' => $usersModel->where('status', '1')->orderBy('id', 'desc')->findAll(5),
            'pdf' => $ItemsupModel->RowTypeFile(1,'Upload'),
            'img' => $ItemsupModel->RowTypeFile(2,'Upload'),
            'doc' => $ItemsupModel->RowTypeFile(3,'Upload'),
            'linkurl' => $ItemsupModel->RowTypeFile(4,'Link'),
            'item_1' => $ItemsModel->getItemAllByMainBySub(1,1),
            'item_2' => $ItemsModel->getItemAllByMainBySub(1,2),
            'item_3' => $ItemsModel->getItemAllByMainBySub(1,3),
            'item_4' => $ItemsModel->getItemAllByMainBySub(1,4),
            'item_5' => $ItemsModel->getItemAllByMainBySub(1,5),
            'item_6' => $ItemsModel->getItemAllByMainBySub(2,1),
            'item_7' => $ItemsModel->getItemAllByMainBySub(2,2),
            'itemsub' => $ItemssubModel->getItemAllByMainBySub(),
            //'course' => $courseModel->where('c_status', '1')->orderBy('id', 'desc')->findAll(6),
            //'pager' => $courseModel->pager,
            'title' => 'หน้าหลัก'
        ];

        echo view('frontend/index',$data);
        
    }

    public function view($page = 'home') {
        if (!is_file(APPPATH.'/Views/'.$page.'.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);
        echo view('templates/frontend/header', $data);
        echo view('frontend/'.$page, $data);
        echo view('templates/frontend/footer', $data);

    }

    public function Item9_detail($main = null,$sub = null,$cate = null) {
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

        echo view('templates/frontend/header', $data);
        echo view('frontend/item9_detail_ajax');
        echo view('templates/frontend/footer');
        
    }

    public function Item10_detail($main = null,$sub = null,$cate = null) {
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

        echo view('templates/frontend/header', $data);
        echo view('frontend/item10_detail_ajax');
        echo view('templates/frontend/footer');
        
    }

    public function Complaint() {

            $data = [
                'title' => [
                    '1' => 'รับเรื่องร้องเรียน',
                ],                
				'url' => [
                    '1' => '',
                ]
            ];

        echo view('templates/frontend/header', $data);
        echo view('frontend/complaint');
        echo view('templates/frontend/footer');
        
    }

	public function SaveComm()
	{
		$commModel = new CommModel;

		$data = [
			  'com_area' =>session()->get('area_code'),
			  'com_school' =>session()->get('sch_code'),
			  'com_name' =>$this->request->getVar('name'),
			  'com_cardid' =>$this->request->getVar('cardid'),
			  'com_address' =>$this->request->getVar('address'),
			  'com_phone' =>$this->request->getVar('phone'),
			  'com_email' =>$this->request->getVar('email'),
			  'com_subject' =>$this->request->getVar('subject'),
			  'com_message' =>$this->request->getVar('message'),
			  'com_post_date' =>date('Y-m-d H:i:s'),
			  'com_view' =>'0',
			  'com_status' =>'1'
		];

        $up=$commModel->save($data);
		$session = session();
		if($up){
			$data_c = [
				'state' => "success",
				'main' => $itemsId['it_main'],
				'sub' => $itemsId['it_sub'],
				'message' => 'ส่งข้อมูลสำเร็จ',
				//'message' => $session->setFlashdata('msg', '<i class="fa fa-check-circle"></i> update สำเร็จ'),
			];
		} else {
			$data_c = [
				'state' => "error",
				'main' => $itemsId['it_main'],
				'sub' => $itemsId['it_sub'],
				'message' => 'ไม่สามารถส่งข้อมูลได้',
				//'message' => $session->setFlashdata('error', '<i class="fa fa-alert-circle"></i> ไม่สามารถ update ได้'),
			];
		}
		echo json_encode($data_c);

	}

    public function Chat() {

        $chatModel = new ChatModel;

		$data = [
			'title' => [
				'1' => 'ถามตอบ',
			],                
			'url' => [
		        '1' => '',
            ]
		];

        echo view('templates/frontend/header', $data);
        echo view('frontend/chat');
        echo view('templates/frontend/footer');
        
    }

    public function Ajax_Chat() {

		$session = session();
        $chatModel = new ChatModel;

		if($session->get('id')){
			$data_ses = [
				'ses_user_id' =>1,
				'user1_name' =>$session->get('sch_code'),
				'user2' =>2,
				'user2_name' =>'บุคคลทั่วไป',
			];
		} else {
			$data_ses = [
				'ses_user_id' =>2,
				'user1_name' =>'บุคคลทั่วไป',
				'user2' =>1,
				'user2_name' =>'Admin',
			];
		}
		$session->set($data_ses);

		$data = [
	        'title' => [
			    '1' => 'ถามตอบ',
            ],                
			'url' => [
				'1' => '',
			]
        ];

        echo json_encode($data);
        
    }


	public function SaveChat()
	{
        $chatModel = new ChatModel;

		$data = [
			  'chat_area' =>session()->get('area_code'),
			  'chat_code' =>session()->get('sch_code'),
			  'chat_msg' =>$this->request->getVar('msg'),
			  'chat_user1' =>$this->request->getVar('ses_user_id'),
			  'user1_name' =>$this->request->getVar('user1_name'),
			  'chat_user2' =>$this->request->getVar('ses_user_id'),
			  'user2_name' =>$this->request->getVar('user1_name'),
			  'ip' =>$this->request->getIPAddress(),
			  'chat_datetime' => date('Y-m-d H:i:s')
		];

        $up=$chatModel->save($data);
		$session = session();
		if($up){
			$data_c = [
				'state' => "success",
				'message' => 'ส่งข้อมูลสำเร็จ',
				//'message' => $session->setFlashdata('msg', '<i class="fa fa-check-circle"></i> update สำเร็จ'),
			];
		} else {
			$data_c = [
				'state' => "error",
				'message' => 'ไม่สามารถส่งข้อมูลได้',
				//'message' => $session->setFlashdata('error', '<i class="fa fa-alert-circle"></i> ไม่สามารถ update ได้'),
			];
		}
		echo json_encode($data_c);

	}



}