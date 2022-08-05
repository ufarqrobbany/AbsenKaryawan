<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AbsenModel;

class Admin extends BaseController
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
        if ($this->session->get('role') != 1) {
            return redirect()->to(base_url() . '/user');
        }

        $users = new UserModel();
        $absens = new AbsenModel();
        $data = [
            'title' => 'Absen',
            'absens' => $absens->findAll(),
            'users' => $users->where('role', 2)->findAll(),
            'this_id' => $this->session->get('id_user')
        ];
        return view('/admin/index', $data);
    }

    public function users()
    {
        $keyword = $this->request->getVar('keyword');
        $users = new UserModel();

        $data = [
            'title' => 'User List',
            'users' => $users->findAll(),
            'this_id' => $this->session->get('id_user')
        ];
        return view('/admin/users', $data);
    }

    public function myprofile()
    {
        $users = new UserModel();
        $data = [
            'title' => 'My Profile',
            'this_id' => $this->session->get('id_user')
        ];
        $data['user'] = $users->getUser($data['this_id']);
        return view('/admin/myprofile', $data);
    }

    public function editprofile($id)
    {
        $users = new UserModel();
        $data['title'] = "Edit Profile";
        $data['user'] = $users->where('id_user', $id)->first();

        return view('admin/editprofile', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah User';

        return view('admin/create', $data);
    }

    public function save()
    {
        $users = new UserModel();
        $absen = new AbsenModel();
        $username = $this->request->getVar('username');
        $user = $users->where('username', $username)->first();
        if (!$user) {
            session()->setFlashdata('pesan', 'Data berhasil ditambah');
            $users->save([
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'telp' => $this->request->getVar('telp'),
                'password' => $this->request->getVar('password'),
                'role' => $this->request->getVar('role'),
            ]);

            $newrole = $this->request->getVar('role');

            if ($newrole == 2) {
                $newuser = $users->where('username', $this->request->getVar('username'))->first();
                $absen->save([
                    'id_user' => $newuser['id_user']
                ]);
            }
        } else {
            session()->setFlashdata('pesan', 'Username sudah ada');
            return redirect()->to(base_url() . '/admin/create');
        }

        return redirect()->to(base_url() . '/admin/users');
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->where(['id_user' => $id]);
        $builder->delete();

        $users = new UserModel();
        $users->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url() . '/admin/users');
    }

    public function edit($id)
    {
        $users = new UserModel();
        $data['title'] = 'Edit User';
        $data['user'] = $users->where('id_user', $id)->first();

        return view('admin/edit', $data);
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
                return redirect()->to(base_url() . '/admin/edit/' . $id);
            }
        }

        return redirect()->to(base_url() . '/admin/users');
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
            return redirect()->to(base_url() . '/admin/editprofile/' . $id);
        }

        return redirect()->to(base_url() . '/admin/myprofile');
    }

    public function absensi($id)
    {
        $absens = new AbsenModel();
        $absens->save([
            'id_absen' => $id,
            'tgl1' => $this->request->getVar('tgl1'),
            'tgl2' => $this->request->getVar('tgl2'),
            'tgl3' => $this->request->getVar('tgl3'),
            'tgl4' => $this->request->getVar('tgl4'),
            'tgl5' => $this->request->getVar('tgl5'),
            'tgl6' => $this->request->getVar('tgl6'),
            'tgl7' => $this->request->getVar('tgl7'),
            'tgl8' => $this->request->getVar('tgl8'),
            'tgl9' => $this->request->getVar('tgl9'),
            'tgl10' => $this->request->getVar('tgl10'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate');

        return redirect()->to(base_url() . '/admin');
    }
}
