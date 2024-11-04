<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->getUserWithRole();
        return view('admin/user_list', $data);
    }

    public function create()
    {
        return view('admin/user_create');
    }

    public function store()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email')
        ];
        
        $this->userModel->addUser($data);

        // Here you should also assign a role using Myth Auth
        // ...

        return redirect()->to('/admin/users');
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        return view('admin/user_edit', $data);
    }

    public function update($id)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email')
        ];

        $this->userModel->updateUser($id, $data);

        // Here you should also update the role if necessary
        // ...

        return redirect()->to('/admin/users');
    }

    public function delete($id)
    {
        $this->userModel->deleteUser($id);
        return redirect()->to('/admin/users');
    }
}
