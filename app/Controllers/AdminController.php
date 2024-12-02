<?php

namespace App\Controllers;

use App\Models\UnsurModel;
use Myth\Auth\Models\UserModel;
use App\Models\UserDetailsModel;
use App\Models\FakultasModel;
use App\Models\AuthGroupsModel;
use App\Models\JurusanModel;
use App\Models\AuthGroupsUsersModel;
use Myth\Auth\Entities\User;


class AdminController extends BaseController
{
    protected $unsur;
    protected $user;
    protected $userdetail;
    protected $fakultas;
    protected $auth;
    protected $auths;
    protected $authgroup;
    protected $jurusan;

    public function __construct()
    {
        $this->unsur = new UnsurModel();
        $this->user = new UserModel();
        $this->userdetail = new UserDetailsModel();
        $this->fakultas = new FakultasModel();
        $this->auth = new User();
        $this->auths = new AuthGroupsModel();
        $this->authgroup = new AuthGroupsUsersModel();
        $this->jurusan = new JurusanModel();
    }

    public function index(): string
    {
        return view('admin-db/admin');
    }

    public function akun(): string
    {
        $data['users'] = $this->user->getUserWithRole();
        return view('admin-db/akun', $data);
    }

    public function rps()
    {
        $data['unsur_rps'] = $this->unsur->findAll();
        return view('admin-db/rps', $data);
    }

    public function tambah()
    {
        // Ambil data fakultas dan jurusan dari model
        $fakultas = $this->fakultas->findAll();  // Mengambil semua data fakultas
        $jurusan = $this->jurusan->findAll();  // Mengambil semua data jurusan
        $roles = $this->auths->findAll();

        return view('admin-db/tambah', [
            'fakultas' => $fakultas,
            'jurusan' => $jurusan,
            'roles' => $roles,
        ]);
    }

    public function adduser()
    {
        // Validasi input
        if (!$this->validate([
            'username' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
            'nama' => 'required',
            'nidn' => 'required',
            'fakultas_id' => 'required',
            'jurusan_id' => 'required',
            'role_id' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Buat user baru dengan entitas Myth\Auth\Entities\User
        $dataUser = new User();
        $dataUser->username = $this->request->getPost('username');
        $dataUser->email = $this->request->getPost('email');
        $dataUser->setPassword($this->request->getPost('password'));  // Hashing password otomatis
        $dataUser->active = 1; // Set user aktif

        // Simpan data ke tabel users melalui model UserModel
        if ($this->user->save($dataUser)) {
            // Ambil ID user yang baru disimpan
            $userId = $this->user->getInsertID();

            // Data untuk tabel users_details
            $dataUserDetails = [
                'user_id' => $userId,
                'nama' => $this->request->getPost('nama'),
                'nidn' => $this->request->getPost('nidn'),
                'fakultas_id' => $this->request->getPost('fakultas_id'),
                'jurusan_id' => $this->request->getPost('jurusan_id'),
            ];

            // Simpan data ke tabel users_details
            if ($this->userdetail->save($dataUserDetails)) {
                // Menambahkan user ke dalam role/group
                $roleId = $this->request->getPost('role_id');
                error_log("Role ID: " . $roleId);
                $dataAuthGroup = [
                    'user_id' => $userId,
                    'group_id' => $roleId,
                ];

                // Simpan data ke tabel auth_groups_users
                if ($this->authgroup->save($dataAuthGroup)) {
                    return redirect()->to('/akun')->with('message', 'Pengguna berhasil ditambahkan');
                } else {
                    return redirect()->back()->withInput()->with('errors', 'Gagal menambahkan pengguna ke grup');
                }
            } else {
                return redirect()->back()->withInput()->with('errors', 'Gagal menambahkan detail pengguna');
            }
        } else {
            return redirect()->back()->withInput()->with('errors', 'Gagal menambahkan pengguna');
        }
    }

    public function tambahrp(): string
    {
        return view('admin-db/tambahrp');
    }
    public function addrp()
    {
        $data = [
            'unsur' => $this->request->getPost('unsur'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        if ($this->validate([
            'unsur' => 'required',
            'keterangan' => 'required'
        ])) {
            // Simpan data ke database
            $this->unsur->save($data);
            // Redirect atau tampilkan pesan sukses
            return redirect()->to('/rps')->with('message', 'Data berhasil disimpan');
        } else {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($id = null)
    {
        // Validasi ID pengguna yang akan diedit
        $user = $this->user->find($id);
        if (!$user) {
            return redirect()->back()->with('errors', 'Pengguna tidak ditemukan');
        }

        $userDetail = $this->userdetail->where('user_id', $id)->first();
        if (!$userDetail) {
            return redirect()->back()->with('errors', 'Detail pengguna tidak ditemukan');
        }

        // Ambil data pengguna berdasarkan ID
        $data = [
            'user' => $user,
            'userdetail' => $userDetail,
            'fakultas' => $this->fakultas->findAll(),  // Mengambil semua data fakultas
            'jurusan' => $this->jurusan->findAll(),    // Mengambil semua data jurusan
            'roles' => $this->auths->findAll()         // Mengambil semua data role
        ];

        return view('admin-db/edit', $data);
    }

    public function updateUser($id = null)
    {
        // Validasi input
        if (!$this->validate([
            'username' => 'required',
            'email' => 'required|valid_email',
            'nama' => 'required',
            'nidn' => 'required',
            'fakultas_id' => 'required',
            'jurusan_id' => 'required',
            'role_id' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data di tabel users
        $dataUser = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
        ];

        $this->user->update($id, $dataUser);

        // Update data di tabel users_details
        $dataUserDetail = [
            'nama' => $this->request->getPost('nama'),
            'nidn' => $this->request->getPost('nidn'),
            'fakultas_id' => $this->request->getPost('fakultas_id'),
            'jurusan_id' => $this->request->getPost('jurusan_id'),
        ];

        $this->userdetail->where('user_id', $id)->set($dataUserDetail)->update();

        // Update role pengguna
        $roleId = $this->request->getPost('role_id');
        $this->authgroup->where('user_id', $id)->set(['group_id' => $roleId])->update();

        return redirect()->to('/akun')->with('message', 'Pengguna berhasil diperbarui');
    }

    public function deleteuser($id = null)
    {
        $this->user->where('id', $id)->delete();
        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/akun')->with('message', 'Data berhasil dihapus');
    }


    public function editrp($id = null)
    {
        $data['unsurs'] = $this->unsur->where('id_unsur', $id)->first();
        return view('admin-db/editrp', $data);
    }

    public function updaterp($id = null)
    {
        $data = [
            'unsur' => $this->request->getPost('unsur'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        if ($this->validate([
            'unsur' => 'required',
            'keterangan' => 'required'
        ])) {
            // Update data berdasarkan ID
            $this->unsur->update($id, $data);

            // Redirect atau tampilkan pesan sukses
            return redirect()->to('/rps')->with('message', 'Data berhasil diperbaharui');
        } else {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function deleterp($id = null)
    {
        $this->unsur->where('id_unsur', $id)->delete();
        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/rps')->with('message', 'Data berhasil dihapus');
    }

    public function profil(): string
    {
        return view('admin-db/profil');
    }

    public function notif(): string
    {
        return view('admin-db/notif');
    }
}
