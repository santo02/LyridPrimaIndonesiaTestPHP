<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class DashboardController extends BaseController
{
    public function index()

    {
        $userModel = new Users();

        // Count users with the role 'user'
        $userCount = $userModel->where('role', 'user')->countAllResults();
        $pegawaiCount = $userModel->where('role', 'pegawai')->countAllResults();
        

        $data = [
            'title' => 'Dashboard Page',
            'userCount' => $userCount,
            'pegawaiCount' => $pegawaiCount,
        ];

        return view('dashboard', $data);
    }
}
