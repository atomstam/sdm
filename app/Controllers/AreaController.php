<?php namespace App\Controllers;

use App\Models\AreasModel;
use App\Models\SchoolsModel;
use App\Models\CoursesModel;
use App\Models\CategorysModel;
use App\Models\UnitsModel;
use App\Models\QuestionsModel;
use App\Models\UsersModel;
use App\Models\ItemModel;
use App\Models\ItemScoreModel;
use App\Models\EvalutionModel;
use App\Models\RegisterCoursesModel;
use App\Models\CheckLearnModel;

use CodeIgniter\Controller;

class AreaController extends Controller {


  public function __construct()
  {
    helper(['function', 'form']);
  }

  public function index($area_code = null)
  {
    $usersModel = new UsersModel;
    $areasModel = new AreasModel;
    $schoolsModel = new SchoolsModel;

    $user = $usersModel->where('ID', session()->get('id'))->first();

    $data = [
      'user' => $user,
      'areas' => $areasModel->orderBy('id', 'desc')->findAll(),
      'schools' => $schoolsModel->getSchoolsByArea($user['area_code']),
      'title' => [
        '1' => 'Dashboard'
      ],
    ];

    echo view(session()->get('role') . '/index', $data);
  }

  public function updateProfile()
  {
    helper(array('form'));
    $rules = array(
      'prefix'    => array(
        'rules'  => 'required',
        'errors' => array(
          'required' => 'คำนำหน้า ไม่สามารถเว้นว่างได้',
        ),
      ),
      'firstName' => array(
        'rules'  => 'required|min_length[2]|max_length[50]',
        'errors' => array(
          'required'   => 'ชื่อ ไม่สามารถเว้นว่างได้',
          'min_length' => 'ชื่อ อย่างน้อย 2 ตัวอักษร',
          'max_length' => 'ชื่อ ใส่มากสุดได้ 50 ตัวอักษร',
        ),
      ),
      'lastName'  => array(
        'rules'  => 'required|min_length[2]|max_length[50]',
        'errors' => array(
          'required'   => 'นามสกุล ไม่สามารถเว้นว่างได้',
          'min_length' => 'นามสกุล อย่างน้อย 2 ตัวอักษร',
          'max_length' => 'นามสกุล ใส่มากสุดได้ 50 ตัวอักษร',
        ),
      ),
      'phone'     => array(
        'rules'  => 'required|min_length[10]|max_length[20]',
        'errors' => array(
          'required'   => 'หมายเลขโทรศัพท์ ไม่สามารถเว้นว่างได้',
          'min_length' => 'หมายเลขโทรศัพท์ ให้ใส่ 10 หลัก',
          'max_length' => 'หมายเลขโทรศัพท์ เกินจำนวน',
        ),
      ),
      'idCard'    => array(
        'rules'  => 'required|min_length[13]|max_length[20]',
        'errors' => array(
          'required'   => 'เลขบัตร ปชช. ไม่สามารถเว้นว่างได้',
          'min_length' => 'เลขบัตร ปชช. ใส่ 13 หลัก',
          'max_length' => 'เลขบัตร ปชช. เกินจำนวน',
        ),
      ),
    );

    if ($this->validate($rules)) {
      $userModel = new UsersModel;
      $id = session()->get('id');

      if ($this->request->getFile('imageProfile') != '') {
        $file = $this->request->getFile('imageProfile');
        $imageProfile = $file->getRandomName();
        $data = [
          'imageProfile' => $imageProfile
        ];

        $file_old = $userModel->where('id', $id)->first();
        @unlink('uploads/profile/' . $file_old['imageProfile']);

        if ($file->move('uploads/profile/', $imageProfile)) {

          // thumnail images path
          //$thumbnail_path = "thumbnails";

          // resizing image
          // \Config\Services::image()->withFile('uploads/profile/' . $imageProfile)
          //   ->resize(200, 200, false, 'auto')
          //   ->save('uploads/profile/' . $imageProfile);

          \Config\Services::image()
            ->withFile('uploads/profile/' . $imageProfile)
            ->fit(200, 200, 'center')
            ->save('uploads/profile/' . $imageProfile);

        }


        $userModel->where('id', $id)->set($data)->update();

        $remove_data = [
          'imageProfile'
        ];
        session()->remove($remove_data);
        session()->set($data);
      }

      $data = array(
        'prefix'    => $this->request->getVar('prefix'),
        'firstName' => $this->request->getVar('firstName'),
        'lastName'  => $this->request->getVar('lastName'),
        'phone'     => $this->request->getVar('phone'),
        'idCard'    => $this->request->getVar('idCard'),
        'sch_code'  => $this->request->getVar('sch_code'),
        'area_code' => $this->request->getVar('area_code'),
        'facebook'  => $this->request->getVar('facebook'),
        'line_id'   => $this->request->getVar('line_id')
      );

      $remove_data = [
        'firstName',
        'lastName',
        'email',
        'phone'
      ];
      session()->remove($remove_data);
      $ses_data = [
        'firstName' => $this->request->getVar('firstName'),
        'lastName' => $this->request->getVar('lastName'),
        'email' => $this->request->getVar('email'),
        'phone' => $this->request->getVar('phone')
      ];
      session()->set($ses_data);

      $userModel->update($id, $data);

      return redirect()->to(base_url(session()->get('role') . ''))->with('msg', '<i class="fe fe-check-circle fs-16"></i> ปรับปรุงข้อมูลส่วนตัวสำเร็จ');
    } else {
      helper(array('form'));
      $userModel = new UsersModel;

      $data = [
        'user' => $userModel->where('ID', session()->get('id'))->first(),
        'validation' => $this->validator,
        'title' => [
          '1' => 'Dashboard คุณครู'
        ],

      ];

      echo view(session()->get('role') . '/index', $data);
    }
  }

  public function createCourse()
  {

    $categoryModel = new CategorysModel;

    $data = [
      'category' => $categoryModel->findall(),
      'title' => [
        '1' => 'สร้างหลักสูตรใหม่'
      ]
    ];

    echo view(session()->get('role') . '/createCourse', $data);
  }

  public function saveCourse()
  {
    $rules = [
      'c_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ชื่อหลักสูตร ไม่สามารถเว้นว่างได้'
        ]
      ],
      'c_type' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ประเภทของหลักสูตร ไม่สามารถเว้นว่างได้'
        ]
      ],
      'c_numberUnit' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'จำนวนหน่วย ไม่สามารถเว้นว่างได้',
          'numeric' => 'จำนวนหน่วย เป็นตัวเลขเท่านั้น'
        ]
      ],
      'c_detail' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'รายละเอียด ไม่สามารถเว้นว่างได้'
        ]
      ]
    ];

    if ($this->validate($rules)) {
      $CoursesModel = new CoursesModel;
      $id = session()->get('id');

      if ($this->request->getFile('c_cover') != '') {

        $file = $this->request->getFile('c_cover');
        $c_cover = $file->getRandomName(); 
        if($file->move('uploads/course/', $c_cover)){

          // resizing image
          \Config\Services::image()->withFile('uploads/course/' . $c_cover)
            ->fit(740, 440, 'center')
            ->save('uploads/course/' . $c_cover);

        }
        $data = [
          'c_cover' => $c_cover
        ];
      } else {

        $c_cover = '';
      }

      $data = [
        'c_name' => $this->request->getVar('c_name'),
        'c_type' => $this->request->getVar('c_type'),
        'c_numberUnit' => $this->request->getVar('c_numberUnit'),
        'c_detail' => $this->request->getVar('c_detail'),
        'c_cover' => $c_cover,
        'c_status' => $this->request->getVar('c_status'),
        'c_created' => date('Y-m-d H:i:s'),
        'c_award' => 0,
        'c_confirm' => 1,
        'user_id' => $id
      ];

      $CoursesModel->save($data);
      return redirect()->to(base_url(session()->get('role') . '/manageMyCourses'))->with('msg', '<i class="fe fe-check-circle fs-16"></i> เพิ่มหลักสูตรสำเร็จ สามารถปรับปรุงข้อมูลหน่วยต่อได้');
    } else {

      $categoryModel = new CategorysModel;

      $data = [
        'category' => $categoryModel->findall(),
        'validation' => $this->validator,
        'title' => [
          '1' => 'สร้างหลักสูตรใหม่'
        ]

      ];

      echo view(session()->get('role') . '/createCourse', $data);
    }
  }

  public function manageMyCourses()
  {
    $coursesModel = new CoursesModel;

    $data = [
      'courses' => $coursesModel->listCourses(session()->get('id')),
      'title' => [
        '1' => 'หลักสูตรที่ฉันสร้าง'
      ]
    ];

    echo view(session()->get('role') . '/manageMyCourses', $data);
  }

  public function getSchools()
  {
    $schoolsModel = new SchoolsModel;
    // $area_code = $this->input->post('area_code', true);
    $area_code = json_decode($_POST["area_code"]);

    // $data = $schoolsModel->where('area_code', $area_code)->orderBy('sch_code', 'desc')->findAll();
    $data = $schoolsModel->getSchoolsByArea($area_code);

    echo json_encode($data);
  }

  public function manageUnits($course_id = null)
  {
    $unitsModel = new unitsModel;
    $coursesModel = new CoursesModel;

    $data = [
      'units' => $unitsModel->listUnits(session()->get('id'), $course_id),
      'course' => $coursesModel->where('id', $course_id)->first(),
      'course_id' => $course_id,
      'title' => [
        '1' => 'หลักสูตรที่ฉันสร้าง',
        '2' => 'บทเรียนในหลักสูตร'
      ],
      'url' => [
        '1' => base_url(session()->get('role') . '/manageMyCourses')
      ]
    ];

    echo view(session()->get('role') . '/manageUnits', $data);
  }

  public function createUnit($course_id = null)
  {
    $coursesModel = new CoursesModel;
    $data['course'] = $coursesModel->where('id', $course_id)->first();

    $data = [
      'course' => $coursesModel->where('id', $course_id)->first(),
      'title' => [
        '1' => 'หลักสูตรที่ฉันสร้าง',
        '2' => 'บทเรียนในหลักสูตร',
        '3' => 'สร้างบทเรียน'
      ],
      'url' => [
        '1' => base_url(session()->get('role') . '/manageMyCourses'),
        '2' => base_url(session()->get('role') . '/manageUnits/' . $course_id)
      ]
    ];

    echo view(session()->get('role') . '/createUnit', $data);
  }

  public function saveUnit()
  {
    $rules = [
      'unit_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ชื่อหน่วย ไม่สามารถเว้นว่างได้'
        ]
      ],
      'unit_number' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'ลำดับของหน่วยการเรียนรู้ ไม่สามารถเว้นว่างได้',
          'numeric' => 'ลำดับของหน่วยการเรียนรู้ ต้องเป็นตัวเลขเท่านั้น'
        ]
      ],
      'unit_vdo' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ลิ้งค์ VDO (จาก YouTube) ไม่สามารถเว้นว่างได้'
        ]
      ],
      'unit_status' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'สถานะ ไม่สามารถเว้นว่างได้'
        ]
      ]
    ];

    if ($this->validate($rules)) {
      $UnitsModel = new UnitsModel;
      $id = session()->get('id');

      if ($this->request->getFile('unit_document') != '') {

        $file = $this->request->getFile('unit_document');
        $unit_document = $file->getRandomName();
        $file->move('uploads/units/documents/', $unit_document);
        $data = [
          'unit_document' => $unit_document
        ];
      } else {

        $unit_document = '';
      }

      $data = [
        'unit_name' => $this->request->getVar('unit_name'),
        'unit_detail' => $this->request->getVar('unit_detail'),
        'unit_number' => $this->request->getVar('unit_number'),
        'unit_vdo' => $this->request->getVar('unit_vdo'),
        'unit_status' => $this->request->getVar('unit_status'),
        'unit_document' => $unit_document,
        'user_id' => $id,
        'course_id' => $this->request->getVar('course_id'),
        'unit_numLearning' => 0,
        'unit_view' => 0,
        'unit_created' => date('Y-m-d H:i:s')

      ];

      $UnitsModel->save($data);
      return redirect()->to(base_url(session()->get('role') . '/manageUnits/' . $this->request->getVar('course_id')))->with('msg', '<i class="fe fe-check-circle fs-16"></i> เพิ่มบทเรียนสำเร็จ');
    } else {

      $coursesModel = new CoursesModel;

      $data = [
        'course' => $coursesModel->where('id', $this->request->getVar('course_id'))->first(),
        'validation' => $this->validator,
        'title' => [
          '1' => 'หลักสูตรที่ฉันสร้าง',
          '2' => 'บทเรียนในหลักสูตร',
          '3' => 'สร้างบทเรียน'
        ],
        'url' => [
          '1' => base_url(session()->get('role') . '/manageMyCourses'),
          '2' => base_url(session()->get('role') . '/manageUnits/' . $this->request->getVar('course_id'))
        ]
      ];

      echo view(session()->get('role') . '/createUnit', $data);
    }
  }

  public function manageQuestions($course_id = null)
  {
    $questionsModel = new questionsModel;
    $coursesModel = new CoursesModel;

    $data = [
      'questions' => $questionsModel->listQuestions(session()->get('id'), $course_id),
      'course' => $coursesModel->where('id', $course_id)->first(),
      'course_id' => $course_id,
      'title' => [
        '1' => 'หลักสูตรที่ฉันสร้าง',
        '2' => 'ข้อสอบ'
      ],
      'url' => [
        '1' => base_url(session()->get('role') . '/manageMyCourses')
      ]
    ];

    echo view(session()->get('role') . '/manageQuestions', $data);
  }

  public function createQuestion($course_id = null)
  {
    $coursesModel = new CoursesModel;
    $questionModel = new QuestionsModel;

    $whereQuestion = [
      'c_id' => $course_id,
      'user_id' => session()->get('id')
    ];
    $questions = $questionModel->where($whereQuestion)->findAll();

    $data = [
      'course' => $coursesModel->where('id', $course_id)->first(),
      'questions' => $questions,
      'title' => [
        '1' => 'หลักสูตรที่ฉันสร้าง',
        '2' => 'ข้อสอบ',
        '3' => 'สร้างข้อสอบ'
      ],
      'url' => [
        '1' => base_url(session()->get('role') . '/manageMyCourses'),
        '2' => base_url(session()->get('role') . '/manageQuestions/' . $course_id)
      ]
    ];

    echo view(session()->get('role') . '/createQuestion', $data);
  }

  public function saveQuestion()
  {
    $rules = [
      'cit_num' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'ข้อที่ ไม่สามารถเว้นว่างได้',
          'numeric' => 'ข้อที่ ต้องเป็นตัวเลขเท่านั้น'
        ]
      ],
      'cit_title' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'คำถาม ไม่สามารถเว้นว่างได้'
        ]
      ],
      'cit_item1' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ตัวเลือกที่ 1 ไม่สามารถเว้นว่างได้'
        ]
      ],
      'cit_item2' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ตัวเลือกที่ 2 ไม่สามารถเว้นว่างได้'
        ]
      ],
      'cit_item3' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ตัวเลือกที่ 3 ไม่สามารถเว้นว่างได้'
        ]
      ],
      'cit_item4' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ตัวเลือกที่ 4 ไม่สามารถเว้นว่างได้'
        ]
      ],
      'cit_answer' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'คำตอบ ไม่สามารถเว้นว่างได้'
        ]
      ]
    ];

    if ($this->validate($rules)) {
      $questionsModel = new questionsModel;

      $whereAdded = [
        'cit_num' => $this->request->getVar('cit_num'),
        'c_id' => $this->request->getVar('course_id'),
        'user_id' => session()->get('id')
      ];

      //ตรวจสอบว่าข้อนี้มีการสร้างหรือยัง ถ้ายังให้เพิ่มเข้าทันที
      $chkAdded = $questionsModel->where($whereAdded)->countAllresults();
      if($chkAdded == 0){

        $data = [
          'cit_num' => $this->request->getVar('cit_num'),
          'cit_title' => $this->request->getVar('cit_title'),
          'cit_item1' => $this->request->getVar('cit_item1'),
          'cit_item2' => $this->request->getVar('cit_item2'),
          'cit_item3' => $this->request->getVar('cit_item3'),
          'cit_item4' => $this->request->getVar('cit_item4'),
          'cit_answer' => $this->request->getVar('cit_answer'),
          'user_id' => session()->get('id'),
          'c_id' => $this->request->getVar('course_id'),
          'cit_view' => 0,
          'cit_posted' => 1,
          'cit_status' => $this->request->getVar('cit_status'),
          'cit_file' => '',
          'cit_posted_date' => date('Y-m-d H:i:s'),
  
        ];
  
        $questionsModel->save($data);
        return redirect()->to(base_url(session()->get('role') . '/manageQuestions/' . $this->request->getVar('course_id')))->with('msg', '<i class="fe fe-check-circle fs-16"></i> เพิ่มข้อสอบสำเร็จ');

      }else{

        return redirect()->to(base_url(session()->get('role') . '/createQuestion/' . $this->request->getVar('course_id')))->with('error', '<i class="fe fe-alert-circle fs-16"></i> ข้อสอบข้อที่ '.$this->request->getVar('cit_num').' นี้มีในระบบแล้ว');

      }

      
    } else {

      $coursesModel = new CoursesModel;
      $questionModel = new QuestionsModel;

      $whereQuestion = [
        'c_id' => $this->request->getVar('course_id'),
        'user_id' => session()->get('id')
      ];
      $questions = $questionModel->where($whereQuestion)->findAll();

      $data = [
        'course' => $coursesModel->where('id', $this->request->getVar('course_id'))->first(),
        'validation' => $this->validator,
        'questions' => $questions,
        'title' => [
          '1' => 'หลักสูตรที่ฉันสร้าง',
          '2' => 'ข้อสอบ',
          '3' => 'สร้างข้อสอบ'
        ],
        'url' => [
          '1' => base_url(session()->get('role') . '/manageMyCourses'),
          '2' => base_url(session()->get('role') . '/manageQuestions/' . $this->request->getVar('course_id'))
        ]
      ];

      echo view(session()->get('role') . '/createQuestion', $data);
    }
  }

  public function editCourse($c_id = null)
  {
    $coursesModel = new CoursesModel;
    $categoryModel = new CategorysModel;

    $data = [
      'course' => $coursesModel->where('id', $c_id)->first(),
      'category' => $categoryModel->findall(),
      'title' => [
        '1' => 'หลักสูตรที่ฉันสร้าง',
        '2' => 'แก้ไขหลักสูตร'
      ],
      'url' => [
        '1' => base_url(session()->get('role') . '/manageMyCourses')
      ]
    ];

    echo view(session()->get('role') . '/editCourse', $data);
  }

  public function updateCourse()
  {
    $rules = [
      'c_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ชื่อหลักสูตร ไม่สามารถเว้นว่างได้'
        ]
      ],
      'c_type' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ประเภทของหลักสูตร ไม่สามารถเว้นว่างได้'
        ]
      ],
      'c_numberUnit' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'จำนวนหน่วย ไม่สามารถเว้นว่างได้',
          'numeric' => 'จำนวนหน่วย เป็นตัวเลขเท่านั้น'
        ]
      ],
      'c_detail' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'รายละเอียด ไม่สามารถเว้นว่างได้'
        ]
      ]
    ];

    if ($this->validate($rules)) {
      $CoursesModel = new CoursesModel;
      $id = session()->get('id');

      if ($this->request->getFile('c_cover') != '') {
        $file = $this->request->getFile('c_cover');
        $c_cover = $file->getRandomName();
        $data = [
          'c_cover' => $c_cover
        ];

        $file_old = $CoursesModel->find($this->request->getVar('c_id'));
        if ($file_old['c_cover'] != '') {
          @unlink('uploads/course/' . $file_old['c_cover']);
        }

        if($file->move('uploads/course/', $c_cover)){

        \Config\Services::image()->withFile('uploads/course/' . $c_cover)
            ->fit(740, 440, 'center')
            ->save('uploads/course/' . $c_cover);
            
        }

        $CoursesModel->where('id', $this->request->getVar('c_id'))->set($data)->update();
      }

      $data = [
        'c_name' => $this->request->getVar('c_name'),
        'c_type' => $this->request->getVar('c_type'),
        'c_numberUnit' => $this->request->getVar('c_numberUnit'),
        'c_detail' => $this->request->getVar('c_detail'),
        'c_status' => $this->request->getVar('c_status'),
        'c_update' => date('Y-m-d H:i:s')
      ];

      $CoursesModel->where('id', $this->request->getVar('c_id'))->set($data)->update();
      return redirect()->to(base_url(session()->get('role') . '/editCourse/' . $this->request->getVar('c_id')))->with('msg', '<i class="fe fe-check-circle fs-16"></i> แก้ไขหลักสูตรสำเร็จ สามารถเพิ่ม หรือปรับปรุงข้อมูลหน่วยต่อได้');
    } else {
      $coursesModel = new CoursesModel;
      $categoryModel = new CategorysModel;

      $data = [
        'course' => $coursesModel->where('id', $this->request->getVar('c_id'))->first(),
        'category' => $categoryModel->findall(),
        'validation' => $this->validator,
        'title' => [
          '1' => 'หลักสูตรที่ฉันสร้าง',
          '2' => 'แก้ไขหลักสูตร'
        ],
        'url' => [
          '1' => base_url(session()->get('role') . '/manageMyCourses')
        ]
      ];

      echo view(session()->get('role') . '/editCourse', $data);
    }
  }

  public function editUnit($unit_id = null)
  {
    $coursesModel = new CoursesModel;
    $UnitsModel = new UnitsModel;

    $unit = $UnitsModel->where('id', $unit_id)->first();

    $data = [
      'unit' => $unit,
      'course' => $coursesModel->where('id', $unit['course_id'])->first(),
      'title' => [
        '1' => 'หลักสูตรที่ฉันสร้าง',
        '2' => 'บทเรียนในหลักสูตร',
        '3' => 'แก้ไขหน่วยการเรียนรู้'
      ],
      'url' => [
        '1' => base_url(session()->get('role') . '/manageMyCourses'),
        '2' => base_url(session()->get('role') . '/manageUnits/' . $unit['course_id'])
      ]
    ];

    echo view(session()->get('role') . '/editUnit', $data);
  }

  public function updateUnit()
  {
    $rules = [
      'unit_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ชื่อหน่วย ไม่สามารถเว้นว่างได้'
        ]
      ],
      'unit_number' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'ลำดับของหน่วยการเรียนรู้ ไม่สามารถเว้นว่างได้',
          'numeric' => 'ลำดับของหน่วยการเรียนรู้ ต้องเป็นตัวเลขเท่านั้น'
        ]
      ],
      'unit_vdo' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ลิ้งค์ VDO (จาก YouTube) ไม่สามารถเว้นว่างได้'
        ]
      ],
      'unit_status' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'สถานะ ไม่สามารถเว้นว่างได้'
        ]
      ]
    ];

    if ($this->validate($rules)) {
      $UnitsModel = new UnitsModel;

      if ($this->request->getFile('unit_document') != '') {
        $file = $this->request->getFile('unit_document');
        $unit_document = $file->getRandomName();
        $data = [
          'unit_document' => $unit_document
        ];

        $file_old = $UnitsModel->where('id', $this->request->getVar('id'))->first();
        if ($file_old['unit_document'] != '') {
          @unlink('uploads/units/documents/' . $file_old['unit_document']);
        }

        $file->move('uploads/units/documents/', $unit_document);
        $UnitsModel->where('id', $this->request->getVar('id'))->set($data)->update();
      }

      $data = [
        'unit_name' => $this->request->getVar('unit_name'),
        'unit_detail' => $this->request->getVar('unit_detail'),
        'unit_number' => $this->request->getVar('unit_number'),
        'unit_vdo' => $this->request->getVar('unit_vdo'),
        'unit_status' => $this->request->getVar('unit_status'),
        'unit_updated' => date('Y-m-d H:i:s')
      ];

      $UnitsModel->where('id', $this->request->getVar('id'))->set($data)->update();
      return redirect()->to(base_url(session()->get('role') . '/editUnit/' . $this->request->getVar('id')))->with('msg', '<i class="fe fe-check-circle fs-16"></i> แก้ไขบทเรียนสำเร็จ');
    } else {

      $UnitsModel = new UnitsModel;
      $coursesModel = new CoursesModel;

      $unit = $UnitsModel->where('id', $this->request->getVar('id'))->first();

      $data = [
        'unit' => $unit,
        'course' => $coursesModel->where('id', $unit['course_id'])->first(),
        'validation' => $this->validator,
        'title' => [
          '1' => 'หลักสูตรที่ฉันสร้าง',
          '2' => 'บทเรียนในหลักสูตร',
          '3' => 'แก้ไขหน่วยการเรียนรู้'
        ],
        'url' => [
          '1' => base_url(session()->get('role') . '/manageMyCourses'),
          '2' => base_url(session()->get('role') . '/manageUnits/' . $unit['course_id'])
        ]
      ];

      echo view(session()->get('role') . '/editUnit', $data);
    }
  }

  public function deleteUnit($id = null)
  {
    $UnitsModel = new UnitsModel;
    $check_role = $UnitsModel->find($id);
    if ($check_role) {
      if ($check_role['user_id'] != session()->get('id')) {
        return redirect()->to(base_url(session()->get('role') . '/manageMyCourses/'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย คุณไม่มีสิทธิ์ในการทำรายการดังกล่าว');
      } else {
        $c_id = $check_role['course_id'];
        @unlink('uploads/units/documents/' . $check_role['unit_document']);
        $UnitsModel->where('id', $id)->delete();
        return redirect()->to(base_url(session()->get('role') . '/manageUnits/' . $c_id))->with('msg', '<i class="fe fe-check-circle"></i> ลบข้อมูลสำเร็จ');
      }
    } else {
      return redirect()->to(base_url(session()->get('role') . '/manageMyCourses/'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย ไม่มีรายการดังกล่าว');
    }
  }

  public function editQuestion($cit_id = null)
  {
    $coursesModel = new CoursesModel;
    $questionsModel = new questionsModel;

    $question = $questionsModel->where('cit_id', $cit_id)->first();

    $data = [
      'question' => $question,
      'course' => $coursesModel->where('id', $question['c_id'])->first(),
      'title' => [
        '1' => 'หลักสูตรที่ฉันสร้าง',
        '2' => 'ข้อสอบ',
        '3' => 'แก้ไขข้อสอบ'
      ],
      'url' => [
        '1' => base_url(session()->get('role') . '/manageMyCourses'),
        '2' => base_url(session()->get('role') . '/manageQuestions/' . $question['c_id'])
      ]
    ];

    echo view(session()->get('role') . '/editQuestion', $data);
  }

  public function updateQuestion()
  {
    $rules = [
      'cit_num' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'ข้อที่ ไม่สามารถเว้นว่างได้',
          'numeric' => 'ข้อที่ ต้องเป็นตัวเลขเท่านั้น'
        ]
      ],
      'cit_title' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'คำถาม ไม่สามารถเว้นว่างได้'
        ]
      ],
      'cit_item1' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ตัวเลือกที่ 1 ไม่สามารถเว้นว่างได้'
        ]
      ],
      'cit_item2' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ตัวเลือกที่ 2 ไม่สามารถเว้นว่างได้'
        ]
      ],
      'cit_item3' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ตัวเลือกที่ 3 ไม่สามารถเว้นว่างได้'
        ]
      ],
      'cit_item4' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'ตัวเลือกที่ 4 ไม่สามารถเว้นว่างได้'
        ]
      ],
      'cit_answer' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'คำตอบ ไม่สามารถเว้นว่างได้'
        ]
      ]
    ];

    if ($this->validate($rules)) {
      $questionsModel = new questionsModel;
      $data = [
        'cit_num' => $this->request->getVar('cit_num'),
        'cit_title' => $this->request->getVar('cit_title'),
        'cit_item1' => $this->request->getVar('cit_item1'),
        'cit_item2' => $this->request->getVar('cit_item2'),
        'cit_item3' => $this->request->getVar('cit_item3'),
        'cit_item4' => $this->request->getVar('cit_item4'),
        'cit_answer' => $this->request->getVar('cit_answer'),
        'cit_status' => $this->request->getVar('cit_status')

      ];

      $questionsModel->where('cit_id', $this->request->getVar('cit_id'))->set($data)->update();
      return redirect()->to(base_url(session()->get('role') . '/editQuestion/' . $this->request->getVar('cit_id')))->with('msg', '<i class="fe fe-check-circle fs-16"></i> แก้ไขข้อสอบสำเร็จ');
    } else {

      $questionsModel = new questionsModel;
      $coursesModel = new CoursesModel;

      $question = $questionsModel->where('cit_id', $this->request->getVar('cit_id'))->first();

      $data = [
        'question' => $question,
        'course' => $coursesModel->where('id', $question['c_id'])->first(),
        'validation' => $this->validator,
        'title' => [
          '1' => 'หลักสูตรที่ฉันสร้าง',
          '2' => 'ข้อสอบ',
          '3' => 'แก้ไขข้อสอบ'
        ],
        'url' => [
          '1' => base_url(session()->get('role') . '/manageMyCourses'),
          '2' => base_url(session()->get('role') . '/manageQuestions/' . $question['c_id'])
        ]
      ];

      echo view(session()->get('role') . '/editQuestion', $data);
    }
  }

  public function deleteQuestion($id = null)
  {
    $questionsModel = new questionsModel;
    $check_role = $questionsModel->find($id);
    if ($check_role) {
      if ($check_role['user_id'] != session()->get('id')) {
        return redirect()->to(base_url(session()->get('role') . '/manageMyCourses/'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย คุณไม่มีสิทธิ์ในการทำรายการดังกล่าว');
      } else {
        $c_id = $check_role['c_id'];
        $questionsModel->where('cit_id', $id)->delete();
        return redirect()->to(base_url(session()->get('role') . '/manageQuestions/' . $c_id))->with('msg', '<i class="fe fe-check-circle"></i> ลบข้อมูลสำเร็จ');
      }
    } else {
      return redirect()->to(base_url(session()->get('role') . '/manageMyCourses/'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย ไม่มีรายการดังกล่าว');
    }
  }

  public function deleteCoverCourse($id = null)
  {
    $coursesModel = new CoursesModel;
    $check_role = $coursesModel->find($id);
    if ($check_role) {
      if ($check_role['user_id'] != session()->get('id')) {
        return redirect()->to(base_url(session()->get('role') . '/manageMyCourses'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย คุณไม่มีสิทธิ์ในการทำรายการดังกล่าว');
      } else {
        $data = [
          'c_cover' => ''
        ];
        if ($check_role['c_cover'] != '') {
          @unlink('uploads/course/' . $check_role['c_cover']);
        }
        $coursesModel->where('id', $id)->set($data)->update();
        return redirect()->to(base_url(session()->get('role') . '/editCourse/' . $id))->with('msg', '<i class="fe fe-check-circle"></i> ลบรูปภาพสำเร็จ');
      }
    } else {
      return redirect()->to(base_url(session()->get('role') . '/manageMyCourses'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย ไม่มีรายการดังกล่าว');
    }
  }

  public function deleteDocumentUnit($id = null)
  {
    $unitsModel = new unitsModel;
    $check_role = $unitsModel->find($id);
    if ($check_role) {
      if ($check_role['user_id'] != session()->get('id')) {
        return redirect()->to(base_url(session()->get('role') . '/manageMyCourses'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย คุณไม่มีสิทธิ์ในการทำรายการดังกล่าว');
      } else {
        $data = [
          'unit_document' => ''
        ];
        if ($check_role['unit_document'] != '') {
          @unlink('uploads/units/documents/' . $check_role['unit_document']);
        }
        $unitsModel->where('id', $id)->set($data)->update();
        return redirect()->to(base_url(session()->get('role') . '/editUnit/' . $id))->with('msg', '<i class="fe fe-check-circle"></i> ลบเอกสารสำเร็จ');
      }
    } else {
      return redirect()->to(base_url(session()->get('role') . '/manageMyCourses'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย ไม่มีรายการดังกล่าว');
    }
  }

  public function deleteCourse($id = null)
  {
    $courseModel = new CoursesModel;
    $unitModel = new UnitsModel;
    $questionModel = new QuestionsModel;

    $check_role = $courseModel->find($id);
    if ($check_role) {

      if ($check_role['user_id'] != session()->get('id')) {

        return redirect()->to(base_url(session()->get('role') . '/manageMyCourses'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย คุณไม่มีสิทธิ์ในการทำรายการดังกล่าว');
      } else {

        $c_id = $check_role['id'];

        //Delete Question of Course
        $questionModel->where('c_id', $id)->delete();

        //Delete Document in Unit of Course
        $units = $unitModel->where('course_id', $id)->find();
        foreach ($units as $unit_item) {
          if (!empty($unit_item['unit_document'])) {
            if (@unlink('uploads/units/documents/' . $unit_item['unit_document'])) {
            }
          }
        }

        //Delete Unit of Course
        $unitModel->where('course_id', $id)->delete();

        //Delete Cover Course
        if (!empty($check_role['c_cover'])) {
          if (@unlink('uploads/course/' . $check_role['c_cover'])) {
          }
        }

        //Delete Course
        $courseModel->delete($id);

        return redirect()->to(base_url(session()->get('role') . '/manageMyCourses'))->with('msg', '<i class="fe fe-check-circle"></i> ลบหลักสูตรสำเร็จ');
      }
    } else {

      return redirect()->to(base_url(session()->get('role') . '/manageMyCourses'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย ไม่มีรายการดังกล่าว');
    }
  }

  public function changePassword()
  {

    helper(['form']);
    $data = [
      'title' => [
        '1' => 'เปลี่ยนรหัสผ่าน'
      ]
    ];
    echo view(session()->get('role') . '/changePassword', $data);
  }

  public function updatePassword()
  {
    helper(['form']);
    $rules = [
      'old_password' => [
        'rules' => 'trim|required|min_length[6]|max_length[50]',
        'errors' => [
          'required' => 'รหัสผ่าน ไม่สามารถเว้นว่างได้',
          'min_length' => 'รหัสผ่าน อย่างน้อย 6 ตัวอักษร',
          'max_length' => 'รหัสผ่าน ใส่มากสุดได้ 50 ตัวอักษร'
        ]
      ],
      'new_password' => [
        'rules' => 'trim|required|min_length[6]|max_length[50]',
        'errors' => [
          'required' => 'รหัสผ่าน ไม่สามารถเว้นว่างได้',
          'min_length' => 'รหัสผ่าน อย่างน้อย 6 ตัวอักษร',
          'max_length' => 'รหัสผ่าน ใส่มากสุดได้ 50 ตัวอักษร'
        ]
      ],
      'conf_password' => [
        'rules' => 'trim|required|matches[new_password]',
        'errors' => [
          'matches' => 'การยืนยันรหัสผ่านใหม่ ไม่ตรงกัน'
        ]
      ]
    ];

    if ($this->validate($rules)) {
      $usermodel = new UsersModel();

      //$hashed_oldpassword = password_hash($this->request->getVar('old_password'), PASSWORD_DEFAULT);

      $chkPassword = $usermodel->changePassword($this->request->getVar('old_password'), session()->get('id'));

      if ($chkPassword) {
        $data = [
          'password' => password_hash($this->request->getVar('new_password'), PASSWORD_DEFAULT)
        ];
        $usermodel->where('ID', session()->get('id'))->set($data)->update();
        return redirect()->to(base_url('/' . session()->get('role') . '/changePassword'))->with('success', '<i class="fe fe-check-circle fs-16"></i> เปลี่ยนรหัสผ่านสำเร็จแล้ว');
      } else {
        return redirect()->to(base_url('/' . session()->get('role') . '/changePassword'))->with('error', '<i class="fe fe-alert-circle fs-16"></i> รหัสผ่านปัจจุบันไม่ถูกต้อง');
      }
    } else {

      helper(['form']);
      $data = [
        'title' => [
          '1' => 'เปลี่ยนรหัสผ่าน',
        ],
        'validation' => $this->validator
      ];
      echo view(session()->get('role') . '/changePassword', $data);
    }
  }

/////////////////////////////////// config Area


    public function listUsers()
    {
        $userModel = new UsersModel;
        //$data['users'] = $userModel->orderBy('ID', 'DESC')->findAll();
		$areasModel = new AreasModel;
		$schoolsModel = new SchoolsModel;

        $data = [
            "users" => $userModel->getUsersByArea(session()->get('area_code')),
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

		echo view(session()->get('role') . '/listUsers', $data);

    }

    public function createUser()
    {
        helper(['form']);

        $userModel = new UsersModel;
		$areasModel = new AreasModel;
		$schoolsModel = new SchoolsModel;
        //$data['users'] = $userModel->orderBy('ID', 'DESC')->findAll();

        $data = [
			'areas' => $areasModel->orderBy('id', 'desc')->findAll(),
			'schools' => $schoolsModel->getSchoolsByArea(session()->get('area_code')),
            "users" => $userModel->orderBy('ID', 'DESC')->findAll(),
            //'areas' => $areasModel->orderBy('id', 'desc')->findAll(),
            //'schools' => $schoolsModel->getSchoolsByArea($user['area_code']),
            'title' => [
                '1' => 'เพิ่มผู้ใช้งานใหม่'
            ],
        ];

		echo view(session()->get('role') . '/createUser', $data);

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
                'sch_code' => $this->request->getVar('sch_code'),
                'area_code' => $this->request->getVar('area_code'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'idCard' => $this->request->getVar('idCard'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status' => $this->request->getVar('status')
            ];
            $model->save($data);
            return redirect()->to(base_url(session()->get('role') . '/listUsers'))->with('msg', 'เพิ่มผู้ใช้สำเร็จ');
        } else {
            $data['validation'] = $this->validator;
			helper(['form']);

			$userModel = new UsersModel;
			$areasModel = new AreasModel;
			$schoolsModel = new SchoolsModel;
			//$data['users'] = $userModel->orderBy('ID', 'DESC')->findAll();

			$data = [
				'areas' => $areasModel->orderBy('id', 'desc')->findAll(),
				'schools' => $schoolsModel->getSchoolsByArea(session()->get('area_code')),
				"users" => $userModel->orderBy('ID', 'DESC')->findAll(),
				//'areas' => $areasModel->orderBy('id', 'desc')->findAll(),
				//'schools' => $schoolsModel->getSchoolsByArea($user['area_code']),
				'title' => [
					'1' => 'เพิ่มผู้ใช้งานใหม่'
				],
			];
			echo view(session()->get('role') . '/createUser', $data);

        }
    }

    public function singleUser($id = null)
    {
        helper(['form']);
        $usersModel = new UsersModel;
		$areasModel = new AreasModel;
		$schoolsModel = new SchoolsModel;
        //$data['users'] = $userModel->orderBy('ID', 'DESC')->findAll();

        $data = [
			'areas' => $areasModel->orderBy('id', 'desc')->findAll(),
			'schools' => $schoolsModel->getSchoolsByArea(session()->get('area_code')),
            'user_obj' => $usersModel->where('ID', $id)->first(),
            'title' => [
                '1' => 'แก้ไขข้อมูลผู้ใช้งาน'
            ],
        ];

		echo view(session()->get('role') . '/editUser', $data);

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
            'sch_code' => $this->request->getVar('sch_code'),
            'area_code' => $this->request->getVar('area_code'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'idCard' => $this->request->getVar('idCard'),
            'role' => $this->request->getVar('role'),
            'status' => $this->request->getVar('status')
        ];
        $userModel->update($id, $data);
        return redirect()->to(base_url(session()->get('role') . '/listUsers'))->with('msg', 'แก้ไขข้อมูลผู้ใช้สำเร็จ');
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

		$check_role = $userModel->find($id);
		if ($check_role['area_code']==session()->get('area_code')) {
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
		}

        return redirect()->to(base_url(session()->get('role') . '/listUsers'))->with('msg', 'ลบข้อมูลผู้ใช้สำเร็จ');
    }


  public function manageAreaCourses()
  {
    $coursesModel = new CoursesModel;

    $data = [
      'courses' => $coursesModel->listAreaCourses(session()->get('area_code')),
      'title' => [
        '1' => 'หลักสูตรทั้งหมดของเขตฯ'
      ]
    ];

    echo view(session()->get('role') . '/manageAreaCourses', $data);
  }


    public function getAreaCourses($id = false, $unit_id = false)
    {
        helper(['function']);
        $courseModel = new CoursesModel;
        $unitModel = new UnitsModel;
        $evalutionModel = new EvalutionModel;
        $checkLearnModel = new CheckLearnModel;

        //$check_role = $courseModel->RowAreaCoursesByID($id,session()->get('area_code'));

        //if ($check_role) {

        $course_item = $courseModel->getCourses($id);

        if(!$unit_id){

        $whereUnits = [
           'course_id' => $id, 
           'unit_status' => 1
        ];
        $units = $unitModel->where($whereUnits)->orderby('unit_number', 'ASC')->findall();

        // ตรวจสอบว่าเรียนแล้วหรือยัง ใส่ Sidebar
        $wheerLearned = [
            //'user_id' => session()->get('id'),
            'course_id' => $course_id
        ];
        $learned = $checkLearnModel->where($wheerLearned)->findAll();

        $data = [
            'units' => $units,
            'learned' => $learned,
            'course' => $courseModel->listCoursesByCid($id),
            'course_item' => $course_item,
            'unit_item' => $unitModel->where('course_id', $id)->orderby('unit_number', 'ASC')->findall(),
            'title' => [
                '1' => 'หลักสูตร',
                '2' => 'รายละเอียดหลักสูตร'
            ],
            'url' => [
                '1' => base_url(session()->get('role') . '/manageAreaCourses')
            ]
        ];
		
		} else {

        $whereUnits = [
             'course_id' => $id, 
             'unit_status' => 1
        ];
        $units = $unitModel->where($whereUnits)->findall();

        $whereUnit = [
           'id' => $unit_id,
           'course_id' => $id,
           'unit_status' => 1
        ];
        $unit = $unitModel->where($whereUnit)->first();

        // ตรวจสอบว่าเรียนแล้วหรือยัง ใส่ Sidebar
        $wheerLearned = [
            //'user_id' => session()->get('id'),
            'course_id' => $course_id
        ];
        $learned = $checkLearnModel->where($wheerLearned)->findAll();

        $data = [
            'units' => $units,
            'unit' => $unit,
            'unit_id' => $unit_id,
            'learned' => $learned,
            'course' => $courseModel->listCoursesByCid($id),
            'course_item' => $course_item,
            'unit_item' => $unitModel->where('course_id', $id)->orderby('unit_number', 'ASC')->findall(),
            'title' => [
                '1' => 'หลักสูตร',
                '2' => 'รายละเอียดหลักสูตร'
            ],
            'url' => [
                '1' => base_url(session()->get('role') . '/manageAreaCourses')
            ]
        ];
		
		}

		echo view(session()->get('role') . '/getAreacourse', $data);

      //  } else {
		//	$data = [
		//		'area_code' => $check_role['area_code'],
		//	];
            //return redirect()->to(base_url(session()->get('role') . '/manageAreaCourses',$data))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย ไม่มีรายการดังกล่าว');
		//	echo view(session()->get('role') . '/manageAreaCourses', $data);
        //}

		}


    public function Areapretest($id = false)
    {
        $RegisterCoursesModel = new RegisterCoursesModel;
        $evalutionModel = new EvalutionModel;
        $courseModel = new CoursesModel;
        $unitModel = new UnitsModel;
        $questionModel = new QuestionsModel;
        $checkLearnModel = new CheckLearnModel;

        $course_item = $courseModel->getCourses($id);
        $course = $courseModel->find($id);

                $whereUnits = [
                    'course_id' => $id, 
                    'unit_status' => 1
                ];
                $units = $unitModel->where($whereUnits)->findall();

                $whereQuestion = [
                    'c_id' => $id,
                    'cit_status' => 1
                ];
                $pretest = $questionModel->where($whereQuestion)->findAll();

                //$score = $evalutionModel->where($wherePretest)->first();
                $countQuestion = $questionModel->where('c_id', $id)->countAllResults();

				$whereUnits = [
				   'course_id' => $id, 
				   'unit_status' => 1
				];
				$units = $unitModel->where($whereUnits)->orderby('unit_number', 'ASC')->findall();

				// ตรวจสอบว่าเรียนแล้วหรือยัง ใส่ Sidebar
				$wheerLearned = [
					'user_id' => session()->get('id'),
					'course_id' => $id
				];
				$learned = $checkLearnModel->where($wheerLearned)->findAll();


                $data = [
                    //'course' => $course,
                    'units' => $units,
                    'pretest' => $pretest,
                    'score_f' => $countQuestion,
					'units' => $units,
					'learned' => $learned,
					'course' => $courseModel->listCoursesByCid($id),
					'course_item' => $course_item,
					'unit_item' => $unitModel->where('course_id', $id)->orderby('unit_number', 'ASC')->findall(),
                    'title' => [
                        '1' => 'แบบทดสอบ Pretest',
                        '2' => $course['c_name'],
                        '3' => 'แบบทดสอบก่อนเรียน'
                        ],
                    'url' => [
                        '1' => base_url(session()->get('role').'/manageAreaCourses'),
                        '2' => base_url('getAreaCourses/'.$id),
                        ]
                    ];

                return view(session()->get('role') . '/Areapretest', $data); 

	}



    public function Areaposttest($id = false)
    {
        $RegisterCoursesModel = new RegisterCoursesModel;
        $evalutionModel = new EvalutionModel;
        $courseModel = new CoursesModel;
        $unitModel = new UnitsModel;
        $questionModel = new QuestionsModel;
        $checkLearnModel = new CheckLearnModel;

        $course_item = $courseModel->getCourses($id);
        $course = $courseModel->find($id);

                $whereUnits = [
                    'course_id' => $id, 
                    'unit_status' => 1
                ];
                $units = $unitModel->where($whereUnits)->findall();

                $whereQuestion = [
                        'c_id' => $id,
                        'cit_status' => 1
                ];
                $posttest = $questionModel->where($whereQuestion)->findAll();

                //$score = $evalutionModel->where($wherePretest)->first();
                $countQuestion = $questionModel->where('c_id', $id)->countAllResults();

				$whereUnits = [
				   'course_id' => $id, 
				   'unit_status' => 1
				];
				$units = $unitModel->where($whereUnits)->orderby('unit_number', 'ASC')->findall();

				// ตรวจสอบว่าเรียนแล้วหรือยัง ใส่ Sidebar
				$wheerLearned = [
					'user_id' => session()->get('id'),
					'course_id' => $id
				];
				$learned = $checkLearnModel->where($wheerLearned)->findAll();

                $data = [
                    //'course' => $course,
                    'units' => $units,
                    'posttest' => $posttest,
                    'score_f' => $countQuestion,
					'units' => $units,
					'learned' => $learned,
					'course' => $courseModel->listCoursesByCid($id),
					'course_item' => $course_item,
					'unit_item' => $unitModel->where('course_id', $id)->orderby('unit_number', 'ASC')->findall(),
                    'title' => [
                        '1' => 'แบบทดสอบ Posttest',
                        '2' => $course['c_name'],
                        '3' => 'แบบทดสอบหลังเรียน'
                        ],
                    'url' => [
                        '1' => base_url(session()->get('role').'/manageAllCourses'),
                        '2' => base_url('getAllCourses/'.$id),
                        ]
                    ];

				return view(session()->get('role') . '/Areaposttest', $data); 

    }



    public function editAreaCourse($c_id = null)
    {
        $coursesModel = new CoursesModel;
        $categoryModel = new CategorysModel;

        $usersModel = new UsersModel;
        //$users = $usersModel->where('ID', session()->get('id'))->first();

        $data = [
            'user_obj' => $usersModel->findall(),
            'course' => $coursesModel->where('id', $c_id)->first(),
            'category' => $categoryModel->findall(),
            'title' => [
                '1' => 'แก้ไขหลักสูตร',
                '2' => 'แก้ไขหลักสูตร'
            ],
            'url' => [
                '1' => base_url(session()->get('role') . '/manageAllCourses')
            ]
        ];

        echo view(session()->get('role') . '/editAreaCourse', $data);
    }

    public function updateAreaCourse()
    {
        $rules = [
            'user_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ชื่อผู้สร้างหลักสูตร'
                ]
            ],
            'c_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ชื่อหลักสูตร ไม่สามารถเว้นว่างได้'
                ]
            ],
            'c_type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ประเภทของหลักสูตร ไม่สามารถเว้นว่างได้'
                ]
            ],
            'c_numberUnit' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'จำนวนหน่วย ไม่สามารถเว้นว่างได้',
                    'numeric' => 'จำนวนหน่วย เป็นตัวเลขเท่านั้น'
                ]
            ],
            'c_detail' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'รายละเอียด ไม่สามารถเว้นว่างได้'
                ]
            ],

        ];

        if ($this->validate($rules)) {
            $CoursesModel = new CoursesModel;
            //$id = session()->get('id');

            if ($this->request->getFile('c_cover') != '') {
                $file = $this->request->getFile('c_cover');
                $c_cover = $file->getRandomName();
                $data = [
                    'c_cover' => $c_cover
                ];

                $file_old = $CoursesModel->find($this->request->getVar('c_id'));
                if ($file_old['c_cover'] != '') {
                    @unlink('uploads/course/' . $file_old['c_cover']);
                }

                $file->move('uploads/course/', $c_cover);
                $CoursesModel->where('id', $this->request->getVar('c_id'))->set($data)->update();
            }

            $data = [
                'c_name' => $this->request->getVar('c_name'),
                'c_type' => $this->request->getVar('c_type'),
                'c_numberUnit' => $this->request->getVar('c_numberUnit'),
                'c_detail' => $this->request->getVar('c_detail'),
                'c_status' => $this->request->getVar('c_status'),
                'c_update' => date('Y-m-d H:i:s'),
                'c_confirm' => $this->request->getVar('c_confirm'),
            ];

            $CoursesModel->where('id', $this->request->getVar('c_id'))->set($data)->update();
            //return redirect()->to(base_url(session()->get('role') . '/editCourse/' . $this->request->getVar('c_id')))->with('msg', '<i class="fe fe-check-circle fs-16"></i> แก้ไขหลักสูตรสำเร็จ สามารถเพิ่ม หรือปรับปรุงข้อมูลหน่วยต่อได้');
            return redirect()->to(base_url(session()->get('role') . '/manageAreaCourses/'))->with('msg', '<i class="fe fe-check-circle fs-16"></i> แก้ไขหลักสูตรสำเร็จ ');
        } else {
            $coursesModel = new CoursesModel;
            $categoryModel = new CategorysModel;
            $usersModel = new UsersModel;

            $data = [
                'user_obj' => $usersModel->findall(),
                'course' => $coursesModel->where('id', $this->request->getVar('c_id'))->first(),
                'category' => $categoryModel->findall(),
                'validation' => $this->validator,
                'title' => [
                    '1' => 'หลักสูตรที่สร้าง',
                    '2' => 'แก้ไขหลักสูตร'
                ],
                'url' => [
                    '1' => base_url(session()->get('role') . '/manageAllCourses')
                ]
            ];

            echo view(session()->get('role') . '/editAreaCourse', $data);

        }
    }


    public function deleteAreaCourse($id = null)
    {
        $courseModel = new CoursesModel;
        $unitModel = new UnitsModel;
        $questionModel = new QuestionsModel;
        $itemScoreModel = new ItemScoreModel;
        $evalutionModel = new EvalutionModel;
        $registerCoursesModel = new RegisterCoursesModel;

        $check_role = $courseModel->find($id);
        if ($check_role) {

            //if ($check_role['user_id'] != session()->get('id')) {

            //  return redirect()->to(base_url(session()->get('role') . '/manageAllCourses'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย คุณไม่มีสิทธิ์ในการทำรายการดังกล่าว');
            // } else {

            $c_id = $check_role['id'];

            //Delete Question of Course
            $questionModel->where('c_id', $id)->delete();

            //Delete Document in Unit of Course
            $units = $unitModel->where('course_id', $id)->find();
            foreach ($units as $unit_item) {
                if (!empty($unit_item['unit_document'])) {
                    if (@unlink('uploads/units/documents/' . $unit_item['unit_document'])) {
                    }
                }
            }

            //Delete Unit of Course
            $unitModel->where('course_id', $id)->delete();

            //Delete Cover Course
            if (!empty($check_role['c_cover'])) {
                if (@unlink('uploads/course/' . $check_role['c_cover'])) {
                }
            }

            //Delete Course
            $courseModel->delete($id);
            //Delete itemScore
            $itemScoreModel->where('cr_course', $id)->delete($id);
            //Delete evalution
            $evalutionModel->where('course_id', $id)->delete($id);
            //Delete register
            $registerCoursesModel->where('c_id', $id)->delete($id);

            return redirect()->to(base_url(session()->get('role') . '/manageAreaCourses'))->with('msg', '<i class="fe fe-check-circle"></i> ลบหลักสูตรสำเร็จ');
            // }
        } else {

            return redirect()->to(base_url(session()->get('role') . '/manageAreaCourses'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย ไม่มีรายการดังกล่าว');
        }
    }

  public function confirmAreaCourses()
  {
    $coursesModel = new CoursesModel;

    $data = [
      'courses' => $coursesModel->listConfirmAreaCourses(session()->get('area_code')),
      'title' => [
        '1' => 'หลักสูตรรออนุมัติของเขตฯ'
      ]
    ];

    echo view(session()->get('role') . '/confirmAreaCourses', $data);
  }


	public function upstatusCourse($cid = null)
	{
		$coursesModel = new CoursesModel;

		$Up = $coursesModel->find($cid);

		if($Up['c_confirm'] !="1"){
			$data = [
				'c_confirm' => "1"
			];
		} else {
			$data = [
				'c_confirm' => "0"
			];
		}
		
		$up=$coursesModel->where('id', $cid)->set($data)->update();
		
		$session = session();
		if($up){
			$data_c = [
				'state' => "success",
				'message' => $session->setFlashdata('msg', '<i class="fe fe-check-circle"></i> update สำเร็จ'),
			];
		} else {
			$data_c = [
				'state' => "error",
				'message' => $session->setFlashdata('error', '<i class="fe fe-alert-circle"></i> ไม่สามารถ update ได้'),
			];
		}
		//echo $session->setFlashdata('msg', '<i class="fe fe-check-circle"></i> update สำเร็จ');
		echo json_encode($data_c);

	}






}
