<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class Register extends Controller {

    public function index() {
        helper(['form']);
        $data = [
            'title' => [
                '1' => 'ลงทะเบียน'
            ]
        ];
        echo view('frontend/register', $data);
    }
 
    public function save() {
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
            ],
            'confPassword' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'รหัสผ่านไม่ตรงกัน'
                ]
            ]
        ];
        
        if($this->validate($rules)) {
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
                'status' => '1'
            ];
            $model->save($data);
            return redirect()->to(base_url().'/login')->with('registed', 'ลงทะเบียนสำเร็จแล้ว ท่านสามารถเข้าสู่ระบบได้ทันที');
        } else {
            $data = [
                'title' => 'ลงทะเบียน',
                'validation' => $this->validator
            ];
            echo view('frontend/register', $data);
        }
    }

}