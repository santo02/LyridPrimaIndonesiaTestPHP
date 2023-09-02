<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class LoginController extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Login Page',
        ];
        return view('login', $data);
    }

    public function Login()
    {
        $users = new Users();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Find users with the matching username
        $dataUsers = $users->where('username', $username)->findAll();

        if ($dataUsers) {
            foreach ($dataUsers as $dataUser) {
                // Check each user's password
                if (password_verify($password, $dataUser['password'])) {
                    session()->set([
                        'username' => $dataUser['username'],
                        'name' => $dataUser['name'],
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to(base_url('/dashboard'));
                }
            }
        }

        session()->setFlashdata('error', 'Username & Password Salah');
        return redirect()->back();
    }


    function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
