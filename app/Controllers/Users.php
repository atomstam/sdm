<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Users extends Controller {

    public function index() {
        $model = new UsersModel();
        $data = [
                'users' => $model->getUsers(),
                'title' => 'ผู้ใช้งานทั้งหมด'
                ];
        echo view('templates/header', $data);
        echo view('admin/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($id = null) {
        $model = new UsersModel();
        $data['users'] = $model->getUsers($id);
    }
}