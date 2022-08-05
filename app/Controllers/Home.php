<?php

namespace App\Controllers;

class Home extends BaseController
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
        if ($this->session->get('role') == 1) {
            return redirect()->to(base_url() . '/admin');
        } elseif ($this->session->get('role') == 2) {
            return redirect()->to(base_url() . '/user');
        }
    }

    public function login()
    {
        return view('/auth/login');
    }
}
