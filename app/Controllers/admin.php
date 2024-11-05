<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        return view('admin-db/admin');
    }

    public function akun(): string
    {
        return view('admin-db/akun');
    }

    public function rps(): string
    {
        return view('admin-db/rps');
    }

    public function tambah(): string
    {
        return view('admin-db/tambah');
    }

    public function edit(): string
    {
        return view('admin-db/edit');
    }

    public function tambahrp(): string
    {
        return view('admin-db/tambahrp');
    }

    public function editrp(): string
    {
        return view('admin-db/editrp');
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
