<?php

namespace App\Controllers;

use App\Models\RpsModel;

class dosenController extends BaseController
{


  public function dosen()
  {
    return view('dosen/Dashboard_Dosen');
  }
  public function unggah_rps()
  {
    return view('dosen/unggah-rps');
  }

  public function daftar_upload()
  {
    return view('dosen/daftar_upload');
  }

  public function simpan_rps()
  {
    $rpsModel = new RpsModel();

    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules([
      'mataKuliah' => 'required',
      'kode' => 'required',
      'prodi' => 'required',
      'tahun' => 'required',
      'semester' => 'required',
      'kelas' => 'required',
      'rpsLink' => 'required|valid_url',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Ambil data dari request
    $data = [
      'kode_mata_kuliah' => $this->request->getPost('kode'),
      'tahun_ajaran' => $this->request->getPost('tahun'),
      'semester' => $this->request->getPost('semester'),
      'kelas' => $this->request->getPost('kelas'),
      'link_rps' => $this->request->getPost('rpsLink'),
      'jurusan_id' => $this->request->getPost('prodi'),
    ];

    // Simpan ke database
    if ($rpsModel->insert($data)) {
      return redirect()->to(base_url('dosen/daftar_upload'))->with('success', 'RPS berhasil diunggah.');
    } else {
      return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
    }
  }

  public function link_rps()
  {
    return view('dosen/linkRPS');
  }
  public function bap()
  {
    return view('dosen/isi-bap');
  }
  public function feedback()
  {
    return view('dosen/feedback');
  }
}
