<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AlreadyLoggedin implements FilterInterface {
    public function before(RequestInterface $request, $arguments = null) {
        //if user not logged in
        if(session()->get('logged_in')) {
            if (session()->get('role') == "admin") {
				return redirect()->to(base_url('admin'));
			}

        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        //Do somthing

    }
}