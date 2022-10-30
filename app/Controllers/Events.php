<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Events extends Controller {

    public function index() {
        helper(['form']);
        $data = [
            'title' => [
                '1' => 'ปฏิทินเวรยาม'
            ]
        ];
        echo view('frontend/evnt', $data);
    }




}