<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CoursesModel;
use App\Models\UnitsModel;
use App\Models\RegisterCoursesModel;
use App\Models\EvalutionModel;
use App\Models\CheckLearnModel;

class Courses extends Controller
{
    public function index()
    {
        return view('frontend/index');
    }

    public function listCourse($page = 1)
    {
        helper(['function']);
        $courseModel = new CoursesModel;
        $data = [
            'course' => $courseModel->where('c_status', '1')->orderBy('id', 'desc')->paginate(9),
            'pager' => $courseModel->pager,
            'title' => [
                '1' => 'หลักสูตรทั้งหมด'
            ]
        ];
        return view('frontend/listcourse', $data);
    }

    public function getCourse($id = null)
    {
        helper(['function']);
        $courseModel = new CoursesModel;
        $unitsModel = new UnitsModel;
        $registerCourseModel = new RegisterCoursesModel;

        $course_item = $courseModel->getCourses($id);

        //update view
        $data_view = [
            'c_view' => $course_item['c_view'] + 1
        ];
        $courseModel->where('id', $id)->set($data_view)->update();

        $course_registed = $registerCourseModel->where('c_id', $id)->countAllResults();

        $data = [
            'course_item' => $course_item,
            'course_registed' => $course_registed,
            'unit_item' => $unitsModel->where('course_id', $id)->orderby('unit_number', 'ASC')->findall(),
            'title' => [
                '1' => 'หลักสูตร',
                '2' => $course_item['c_name']
            ],
            'url' => [
                '1' => base_url('course')
            ]
        ];
        return view('frontend/getcourse', $data);
    }

    // การสมัครหลักสูตร
    public function registerCourse($c_id = null)
    {
        $registerCourseModel = new RegisterCoursesModel;

        if (!session()->get('logged_in')) {
            $ses_data = [
                'rc_c_id' => $c_id,
                'loadRegisPage' => TRUE
            ];
            session()->set($ses_data);
            return redirect()->to(base_url('login'))->with('msg', '<i class="fe fe-alert-circle"></i> กรุณาเข้าสู่ระบบก่อน');
        } else {

            //ตรวจสอบว่า User ที่ Login นี้ เคยสมัครหลักสูตรนี้หรือยัง
            $whereData = [
                'user_id' => session()->get('id'),
                'c_id' => $c_id
            ];
            $regisStatus = $registerCourseModel->where($whereData)->countAllResults();
            if ($regisStatus > 0) {
                return redirect()->to(base_url('getcourse/' . $c_id))->with('registed', '<i class="fe fe-alert-circle"></i> คุณได้สมัครหลักสูตรนี้แล้ว');
            } else {
                $data = [
                    'user_id' => session()->get('id'),
                    'c_id' => $c_id,
                    'datetime_regis' => date('Y-m-d H:i:s')
                ];
                $registerCourseModel->set($data)->insert();
                return redirect()->to(base_url(session()->get('role') . '/registedCourse'))->with('success', '<i class="fe-check-circle fs-16"></i> ลงทะเบียนสำเร็จแล้ว เริ่มเรียนกันได้เลย');
            }
        }
    }

    // แสดงหลักสูตรที่สมัครแล้ว (ในหน้า เข้าเรียน)
    public function registedCourse()
    {
        $registerCourseModel = new RegisterCoursesModel;
        $evalutionModel = new EvalutionModel;
        $checkLearnModel = new CheckLearnModel;

        $course = $registerCourseModel->getRegistedCourse(session()->get('id'));

        //ตรวจสอบความก้าวหน้าของการเรียน
        $wherePretest = [
            'user_id' => session()->get('id'),
            'type' => 'pretest'
        ];
        $pretest = $evalutionModel->where($wherePretest)->findall();

        $wherePosttest = [
            'user_id' => session()->get('id'),
            'type' => 'posttest'
        ];
        $posttest = $evalutionModel->where($wherePosttest)->findall();

        //นับบทเรียนที่เรียนแล้ว
        $countLearned = $checkLearnModel->where('user_id', session()->get('id'))->findall();

        $data = [
            'registed' => $course,
            'pretest' => $pretest,
            'posttest' => $posttest,
            'countLearned' => $countLearned,
            'title' => [
                '1' => 'หลักสูตรที่สมัคร'
            ]
        ];
        return view(session()->get('role') . '/registedCourse', $data);
    }
}
