<?php namespace App\Controllers;

use CodeIgniter\Controller;
// use App\Models\UsersModel;

class CkUploadImgController extends Controller {

    public function store() {

        if ($this->request->getFile('uploadck') != '') {

            $file = $this->request->getFile('uploadck');
            $imageProfile = $file->getRandomName();
    
            if($file->move('uploads/ckeditor/', $imageProfile)){
                \Config\Services::image()->withFile('uploads/ckeditor/' . $imageProfile)
						->resize(100, 300, true, 'height')
						->save('uploads/ckeditor/' . $imageProfile);
            }

        }

        return $this->response->setJson([
            'url' => base_url('uploads/ckeditor/'.$imageProfile)
        ]);
    }
 
    
}