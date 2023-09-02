<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class PegawaiController extends BaseController
{
    public function index()
    {
        $users = new Users();

        $data = [
            'title' => 'Pegawai Page',
            'users' => $users->where('role', 'pegawai')->findAll()
        ];
        return view('pegawai/pegawai', $data);
    }

    public function edit($id)
    {
        $user  = new Users();

        $getById = $user->getById($id)->getRow();

        if (isset($getById)) {
            $data['users'] = $getById;
            $data['title']  = 'Edit ' . $getById->name;

            return view('pegawai/edit-pegawai', $data);
        } else {

            echo '<script>
                    alert("Pegawai dengan  ' . $id . ' Tidak ditemukan");
                    window.location="' . base_url('pegawai/all') . '"
                </script>';
        }
    }

    public function update()
    {
        $model = new Users();
        $id = $this->request->getPost('id');

        // Validate the form data including the new photo upload
        if (!$this->validate([
            
            'new_foto' => [
                'rules' => 'uploaded[new_foto]|max_size[new_foto,300]|mime_in[new_foto,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'foto harus diupload',
                    'max_size' => 'ukuran maksimal foto adalah 300KB',
                    'mime_in' => 'Hanya JPG & JPEG yang boleh',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        // Handle the new photo upload if provided
        $newPhoto = $this->request->getFile('new_foto');
        if ($newPhoto->isValid() && !$newPhoto->hasMoved()) {
            // Generate a unique name for the new photo
            $newName = $newPhoto->getRandomName();
            // Move the new photo to the uploads directory
            $newPhoto->move(ROOTPATH . 'public/uploads', $newName);
            // Update the user data in the database with the new photo path or name

        }
        $data = array(
            'name' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'alamat'  => $this->request->getPost('alamat'),
            'foto'  => 'uploads/' . $newName,
        );

        // Update the user data in the database
        $model->editUser($data, $id);

        echo '<script>
                alert("Sukses Edit Data Pegawai");
                window.location="' . base_url('pegawai/all') . '"
            </script>';
    }



    public function delete($id)
    {
        $model = new Users();
        $getById = $model->getById($id)->getRow();
        if (isset($getById)) {
            $model->deleteUser($id);
            echo '<script>
                    alert("Berhasil menghapus pegawai");
                    window.location="' . base_url('pegawai/all') . '"
                </script>';
        } else {

            echo '<script>
                    alert("Hapus Gagal !, ID user ' . $id . ' Tidak ditemukan");
                    window.location="' . base_url('pegawai/all') . '"
                </script>';
        }
    }
}
