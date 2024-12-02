<?php

namespace App\Controllers;

use App\Models\RpsModel;
use CodeIgniter\Controller;

class UnggahRpsController extends Controller
{
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
      return redirect()->to(base_url('rps'))->with('success', 'RPS berhasil diunggah.');
    } else {
      return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
    }
  }
}
