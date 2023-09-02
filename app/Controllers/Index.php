<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Index extends BaseController
{
    public function index()
    {
        $data['title']  = 'Hallo Dunia !';
        $data['msg']    = 'Selamat datang di halaman index';
		return view('layout/index',$data);
    }
}
