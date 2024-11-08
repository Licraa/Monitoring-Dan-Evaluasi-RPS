<?php

namespace App\Controllers;

use App\Models\UnsurModel;

class Admin extends BaseController
{
    protected $unsur;
    
    public function __construct(){
        $this->unsur = new UnsurModel();
    }

    public function index(): string
    {
        return view('admin-db/admin');
    }

    public function akun(): string
    {
        return view('admin-db/akun');
    }

    public function rps()
    {
        $data ['unsur_rps'] = $this ->unsur->findAll();
        return view('admin-db/rps', $data);
    }

    public function tambah()
    {
        return view('admin-db/tambah');
    }

    public function tambahrp(): string
    {
        return view('admin-db/tambahrp');
    }
    public function addrp()
    {
        $data = [
            'unsur' => $this->request->getPost('unsur'),
            'keterangan'=> $this->request->getPost('keterangan')
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
    public function edit(): string
    {
        return view('admin-db/edit');
    }

    
    public function editrp($id = null): string
    {
        $data ['unsurs'] = $this ->unsur->where('id_unsur', $id)->first();
        return view('admin-db/editrp', $data);
    }

    public function updaterp(): string
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
