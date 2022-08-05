<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AbsenModel;


class User extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        // cek session isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to(base_url() . '/home/login');
        }

        // cek role dari session
        if ($this->session->get('role') != 2) {
            return redirect()->to(base_url() . '/admin');
        }

        $absens = new AbsenModel();

        $data['absen'] = $absens->where('id_user', $this->session->get('id_user'))->first();

        $data['title'] = 'Kehadiran';
        return view('/user/index', $data);
    }

    public function myprofile()
    {
        $users = new UserModel();
        $data = [
            'title' => 'My Profile',
            'this_id' => $this->session->get('id_user')
        ];
        $data['user'] = $users->getUser($data['this_id']);
        return view('/user/myprofile', $data);
    }

    public function editprofile($id)
    {
        $users = new UserModel();
        $data['title'] = "Edit Profile";
        $data['user'] = $users->where('id_user', $id)->first();

        return view('user/editprofile', $data);
    }

    public function update($id)
    {
        $users = new UserModel();
        $username = $this->request->getVar('username');
        $user = $users->where('username', $username)->first();
        if (!$user) {
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            $users->save([
                'id_user' => $id,
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'telp' => $this->request->getVar('telp'),
            ]);
        } else {
            if ($user['id_user'] == $id) {
                session()->setFlashdata('pesan', 'Data berhasil diubah');
                $users->save([
                    'id_user' => $id,
                    'nama' => $this->request->getVar('nama'),
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'telp' => $this->request->getVar('telp'),
                ]);
            } else {
                session()->setFlashdata('pesan', 'Username sudah ada');
                return redirect()->to(base_url() . '/user/editprofile/' . $id);
            }
        }

        return redirect()->to(base_url() . '/user/myprofile');
    }

    public function updatepass($id)
    {
        $users = new UserModel();
        $oldpass = $this->request->getVar('oldpass');
        $newpass = $this->request->getVar('newpass');

        $pass = $users->where('id_user', $id)->first();

        if ($oldpass == $pass['password']) {
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            $users->save([
                'id_user' => $id,
                'password' => $newpass
            ]);
        } else {
            session()->setFlashdata('pesanpass', 'Password lama tidak sesuai');
            return redirect()->to(base_url() . '/user/editprofile/' . $id);
        }

        return redirect()->to(base_url() . '/user/myprofile');
    }
}
