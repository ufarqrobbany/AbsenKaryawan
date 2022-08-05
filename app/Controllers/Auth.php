<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        // konek database
        $this->userModel = new UserModel();

        // load validation
        $this->validation = \Config\Services::validation();

        // load session
        $this->session = \Config\Services::session();
    }

    public function valid_login()
    {
        // ambil data
        $data = $this->request->getPost();

        // ambil data user di database
        $user = $this->userModel->where('username', $data['username'])->first();

        // cek username
        if ($user) {
            // cek pass
            if ($user['password'] != $data['password']) {
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to(base_url() . '/home/login');
            } else {
                $sessLogin = [
                    'isLogin' => true,
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                ];
                $this->session->set($sessLogin);
                if ($this->session->get('role') != 1) {
                    return redirect()->to(base_url() . '/user');
                } else {
                    return redirect()->to(base_url() . '/admin');
                }
            }
        } else {
            session()->setFlashdata('username', 'Username tidak ditemukan');
            return redirect()->to(base_url() . '/home/login');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url() . '/home/login');
    }
}
