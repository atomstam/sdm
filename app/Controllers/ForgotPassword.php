<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ForgotPassword extends Controller {

    public function index() {
        helper(['form']);
        $data = [
            'title' => [
                '1' => 'ลืมรหัสผ่าน'
            ]
        ];
        echo view('frontend/forgotPassword', $data);
    }

    public function forgot()
    {
        helper(['form']);
        $rules = [
            'forgot_email' => [
              'rules' => 'required',
              'errors' => [
                'required' => 'อีเมล ไม่สามารถเว้นว่างได้'
              ]
            ]
        ];
      
        if ($this->validate($rules)) {

            $userModel = new UsersModel;
            $chk_email = $userModel->asArray()->where('email', $this->request->getVar('forgot_email'))->countAllResults();
            if($chk_email == 1){
                
                $user = $userModel->where('email', $this->request->getVar('forgot_email'))->first();
                $token = md5($this->request->getVar('forgot_email')).rand(10,9999);
                $expFormat = mktime(
                    date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
                );
                $expDate = date("Y-m-d H:i:s",$expFormat);
                $data = [
                    'reset_link_token' => $token,
                    'exp_date' => $expDate
                ];

                $userModel->where('email', $this->request->getVar('forgot_email'))->set($data)->update();

                $link = "<a href=".base_url('reset_password/'.$this->request->getVar('forgot_email').'/'.$token).">คลิกที่นี่เพื่อสร้างรหัสผ่านใหม่</a>";

                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->CharSet =  "utf-8";
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'sldlobec@gmail.com';                     //SMTP username
                    $mail->Password   = 'fnhzcrkugacclslj';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465; 

                    //Recipients
                    $mail->setFrom('sldlobec@gmail.com', 'SLDL สำนักงานกองทุนเพื่อโครงการอาหารกลางวัน');
                    $mail->addAddress($user['email'], $user['prefix'].$user['firstName'].' '.$user['lastName']);     //Add a recipient
                    // $mail->addAddress('chaiyot.jarates@gmail.com');               //Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    $mail->FromName='SLDL สำนักงานกองทุนเพื่อโครงการอาหารกลางวัน';
                    $mail->Subject  =  'Reset Password';
                    $mail->IsHTML(true);
                    $mail->Body    = 'กรุณาสร้างรหัสผ่านใหม่ตามลิ้งก์นี้ => '.$link.'';
                    if($mail->Send())
                    {
                        return redirect()->to(base_url().'/forgotPassword')->with('sent', 'เราได้ส่งลิ้งก์เพื่อการตั้งรหัสผ่านใหม่ไปทางอีเมลของท่านแล้ว (หากไม่พบในกล่องข้อความ ให้ตรวจสอบในอีเมลขยะ)');
                    }
                    else
                    {
                    echo "Mail Error - >".$mail->ErrorInfo;
                    }

                    
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            

            }else{
                return redirect()->to(base_url('forgotPassword'))->with('error', '<i class="fe fe-alert-circle"></i> ขออภัย ไม่พบบัญชีอีเมลนี้ในระบบ');
            }

        } else {

            $data = [
                'validation' => $this->validator,
                'title' => [
                '1' => 'ลืมรหัสผ่าน'
                ]
            ];
        
            echo view('frontend/forgotPassword', $data);
        }
    }

    public function reset_password($email = null, $token = null)
    {
        $userModel = new UsersModel;
        $wheredb = [
            'email' => $email,
            'reset_link_token' => $token
        ];
        $row_user = $userModel->where($wheredb)->countAllResults();
        $curDate = date("Y-m-d H:i:s");

        if($row_user == 1){
            $user = $userModel->where($wheredb)->first();
            if($user['exp_date'] >= $curDate){
                helper(['form']);
                $data = [
                    'title' => [
                        '1' => 'สร้างรหัสผ่านใหม่'
                    ],
                    'email' => $email,
                    'reset_link_token' => $token
                ];
                echo view('frontend/createNewPassword', $data);
            }

        }
    }

    public function saveNewPassword(){
        helper(['form']);
        $rules = [
            'new_pass' => [
                'rules' => 'required|min_length[6]|max_length[50]',
                'errors' => [
                    'required' => 'รหัสผ่าน ไม่สามารถเว้นว่างได้',
                    'min_length' => 'รหัสผ่าน อย่างน้อย 6 ตัวอักษร',
                    'max_length' => 'รหัสผ่าน ใส่มากสุดได้ 50 ตัวอักษร'
                ]
            ],
            'conf_password' => [
                'rules' => 'matches[new_pass]',
                'errors' => [
                    'matches' => 'รหัสผ่านไม่ตรงกัน'
                ]
            ]
        ];
        
        if($this->validate($rules)) {
            $model = new UsersModel();
            $data = [
                'password' => password_hash($this->request->getVar('new_pass'), PASSWORD_DEFAULT),
                'reset_link_token' => '',
                'exp_date' => '0000-00-00 00:00:00'
            ];
            $model->where('email', $this->request->getVar('email'))->set($data)->update();
            return redirect()->to(base_url().'/login')->with('registed', '<i class="fe fe-check-circle fs-16"></i> สร้างรหัสผ่านใหม่สำเร็จแล้ว สามารถเข้าสู่ระบบได้ทันที');
        } else { 

            $userModel = new UsersModel;
            $wheredb = [
                'email' => $this->request->getVar('email'),
                'reset_link_token' => $this->request->getVar('reset_link_token')
            ];
            $row_user = $userModel->where($wheredb)->countAllResults();
            $curDate = date("Y-m-d H:i:s");

            if($row_user == 1){
                $user = $userModel->where($wheredb)->first();
                if($user['exp_date'] >= $curDate){
                    helper(['form']);
                    $data = [
                        'title' => [
                            '1' => 'สร้างรหัสผ่านใหม่'
                        ],
                        'email' => $this->request->getVar('email'),
                        'reset_link_token' => $this->request->getVar('reset_link_token'),
                        'validation' => $this->validator
                    ];
                    echo view('frontend/createNewPassword', $data);
                }

            }
        }
    }

}