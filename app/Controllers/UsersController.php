<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class UsersController extends BaseController
{
    public function index()
    {
        $users = new Users();

        $data = [
            'title' => 'Users Page',
            'users' => $users->where('role', 'user')->findAll()
        ];
        return view('user/users', $data);
    }



    public function edit($id)
    {
        $user  = new Users();

        $getById = $user->getById($id)->getRow();

        if (isset($getById)) {
            $data['users'] = $getById;
            $data['title']  = 'Edit ' . $getById->name;

            return view('user/edit-users', $data);
        } else {

            echo '<script>
                    alert("user dengan  ' . $id . ' Tidak ditemukan");
                    window.location="' . base_url('user/all') . '"
                </script>';
        }
    }

    public function update()
    {
        $model = new users();
        $id = $this->request->getPost('id');
        $data = array(
            'name' => $this->request->getPost('nama'),
            'username'=> $this->request->getPost('username'),
            'alamat'  => $this->request->getPost('alamat'),
        );
        $model->editUser($data, $id);
        echo '<script>
                alert("Sukses Edit Data users");
                window.location="' . base_url('users/all') . '"
            </script>';
    }

    public function delete($id)
    {
        $model = new Users();
        $getById = $model->getById($id)->getRow();
        if (isset($getById)) {
            $model->deleteUser($id);
            echo '<script>
                    alert("Berhasil menghapus user");
                    window.location="' . base_url('users/all') . '"
                </script>';
        } else {

            echo '<script>
                    alert("Hapus Gagal !, ID user ' . $id . ' Tidak ditemukan");
                    window.location="' . base_url('users/all') . '"
                </script>';
        }
    }
}
