<?php

namespace App\Controllers;

use App\Models\RpsModel;
use App\Models\FakultasModel;
use App\Models\JurusanModel;
use Myth\Auth\Models\UserModel;
use App\Models\UserDetailsModel;
use App\Models\DaftarRpsModel;

class dosenController extends BaseController
{
  protected $rpsModel;
  protected $fakultas;
  protected $jurusan;
  protected $user;
  protected $userdetail;
  protected $db;
  protected $daftarRps;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->rpsModel = new RPSModel();
    $this->fakultas = new FakultasModel();
    $this->jurusan = new JurusanModel();
    $this->user = new UserModel();
    $this->userdetail = new UserDetailsModel();
    $this->daftarRps = new DaftarRpsModel();
  }

  public function dosen()
  {
    return view('dosen/Dashboard_Dosen');
  }

  public function unggah_rps()
  {
    // Get data for dropdowns
    $data['prodi'] = $this->jurusan->findAll(); // Get full jurusan data
    $data['tahun_ajaran'] = $this->getTahunAjaran();
    $data['rps'] = $this->getRpsData();

    // Get mata kuliah data grouped by jurusan and convert to array
    $mataKuliahQuery = $this->db->table('mata_kuliah')
      ->select('mata_kuliah.kode_mk, mata_kuliah.nama_mk, mata_kuliah.id_jurusan')
      ->join('jurusan', 'jurusan.id = mata_kuliah.id_jurusan')
      ->get();

    $data['mata_kuliah'] = $mataKuliahQuery ? $mataKuliahQuery->getResultArray() : [];

    // Convert prodi to array if it's not already
    $data['prodi'] = array_map(function ($item) {
      return is_object($item) ? (array)$item : $item;
    }, $data['prodi']);

    return view('dosen/unggah-rps', $data);
  }

  private function getTahunAjaran()
  {
    $currentYear = date('Y');
    $years = [];
    for ($i = 0; $i < 5; $i++) {
      $years[] = ($currentYear - $i) . '/' . ($currentYear - $i + 1);
    }
    return $years;
  }

  private function getRpsData()
  {
    // Initialize empty data structure
    return [
      [
        'mata_kuliah' => '',
        'kode_mata_kuliah' => '',
        'prodi' => '',
        'tahun_ajaran' => '',
        'semester' => '',
        'kelas' => ''
      ]
    ];
  }

  public function daftar_upload()
  {
    // Get current user ID
    $userId = user_id();

    // Get data for dropdowns
    $data['prodi'] = $this->jurusan->findAll();
    $data['mata_kuliah'] = $this->db->table('mata_kuliah')
      ->select('mata_kuliah.*, jurusan.nama_jurusan')
      ->join('jurusan', 'jurusan.id = mata_kuliah.id_jurusan')
      ->get()->getResult();

    // Get RPS list for current user only
    $data['rps_list'] = $this->db->table('daftar_rps')
      ->select('daftar_rps.*, mata_kuliah.nama_mk, jurusan.nama_jurusan')
      ->join('mata_kuliah', 'mata_kuliah.kode_mk = daftar_rps.kode_mk')
      ->join('jurusan', 'jurusan.id = daftar_rps.jurusan_id')
      ->where('daftar_rps.user_id', $userId)
      ->get()->getResult();

    return view('dosen/daftar_upload', $data);
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

  // Add new method to get mata kuliah by jurusan
  public function getMataKuliahByJurusan($jurusanId)
  {
    $mataKuliahQuery = $this->db->table('mata_kuliah')
      ->select('kode_mk, nama_mk')
      ->where('id_jurusan', $jurusanId)
      ->get();

    $mataKuliah = $mataKuliahQuery ? $mataKuliahQuery->getResultArray() : [];

    return $this->response->setJSON($mataKuliah);
  }

  // Tambah method untuk menyimpan RPS
  public function simpan_rps()
  {
    if (!$this->validate([
      'kode_mk' => 'required',
      'jurusan_id' => 'required',
      'kelas' => 'required',
      'link_rps' => 'required|valid_url'
    ])) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $data = [
      'user_id' => user_id(),
      'kode_mk' => $this->request->getPost('kode_mk'),
      'jurusan_id' => $this->request->getPost('jurusan_id'),
      'kelas' => $this->request->getPost('kelas'),
      'link_rps' => $this->request->getPost('link_rps')
    ];

    if ($this->daftarRps->save($data)) {
      return redirect()->to('dosen/daftar_upload')->with('message', 'RPS berhasil disimpan');
    }

    return redirect()->back()->withInput()->with('error', 'Gagal menyimpan RPS');
  }

  // Tambah method untuk menghapus RPS
  public function hapus_rps($id)
  {
    $userId = user_id();
    $existingRps = $this->daftarRps->where('id', $id)
      ->where('user_id', $userId)
      ->first();

    if (!$existingRps) {
      return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan']);
    }

    if ($this->daftarRps->delete($id)) {
      return $this->response->setJSON(['success' => true]);
    }
    return $this->response->setJSON(['success' => false]);
  }

  // Tambah method untuk mendapatkan detail RPS
  public function get_rps($id)
  {
    $userId = user_id();
    $rps = $this->daftarRps->where('id', $id)
      ->where('user_id', $userId)
      ->first();

    if (!$rps) {
      return $this->response->setJSON(['error' => 'Data tidak ditemukan']);
    }

    return $this->response->setJSON($rps);
  }

  // Tambah method untuk update RPS
  public function update_rps($id)
  {
    if (!$this->validate([
      'kode_mk' => 'required',
      'jurusan_id' => 'required',
      'kelas' => 'required',
      'link_rps' => 'required|valid_url'
    ])) {
      return $this->response->setJSON(['success' => false, 'errors' => $this->validator->getErrors()]);
    }

    $userId = user_id();
    $existingRps = $this->daftarRps->where('id', $id)
      ->where('user_id', $userId)
      ->first();

    if (!$existingRps) {
      return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan']);
    }

    $data = [
      'kode_mk' => $this->request->getPost('kode_mk'),
      'jurusan_id' => $this->request->getPost('jurusan_id'),
      'kelas' => $this->request->getPost('kelas'),
      'link_rps' => $this->request->getPost('link_rps')
    ];

    if ($this->daftarRps->update($id, $data)) {
      return $this->response->setJSON(['success' => true]);
    }

    return $this->response->setJSON(['success' => false]);
  }
}
