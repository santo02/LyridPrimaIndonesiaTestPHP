<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class AddPegawaiController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Tambah Pegawai Page',
        ];
        return view('pegawai/add-pegawai', $data);
    }

    public function store()
    {

        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'Nama Harus diisi',
                    'min_length' => 'Nama Minimal 3 Karakter',
                    'max_length' => 'Nama Maksimal 20 Karakter',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 3 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,300]|mime_in[foto,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'foto harus diupload',
                    'max_size' => 'ukuran maksimal foto adalah 300KB',
                    'mime_in' => 'Hanya JPG & JPEG yang boleh',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'konfirmasi_password' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        // Handle the file upload
        $photo = $this->request->getFile('foto');

        $newName = $photo->getRandomName();
        $photo->move(ROOTPATH . 'public/uploads', $newName);

        $users = new Users();
        $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('name'),
            'role' => 'pegawai',
            'alamat' => $this->request->getVar('alamat'),
            'foto' => 'uploads/' . $newName, 

        ]);
        return redirect()->to('/pegawai/all');
    }
}
