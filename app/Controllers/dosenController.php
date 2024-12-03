<?php

namespace App\Controllers;

use App\Models\RpsModel;
use App\Models\FakultasModel;
use App\Models\JurusanModel;
use Myth\Auth\Models\UserModel;
use App\Models\UserDetailsModel;

class dosenController extends BaseController
{
  protected $rpsModel;
  protected $fakultas;
  protected $jurusan;
  protected $user;
  protected $userdetail;
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->rpsModel = new RPSModel();
    $this->fakultas = new FakultasModel();
    $this->jurusan = new JurusanModel();
    $this->user = new UserModel();
    $this->userdetail = new UserDetailsModel();
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
    return view('dosen/daftar_upload');
  }

  public function simpan_rps()
  {
    // Validate input
    $validationRules = [
      'mataKuliah' => 'required',
      'kode' => 'required',
      'prodi' => 'required',
      'tahun' => 'required',
      'semester' => 'required',
      'kelas' => 'required',
      'rpsLink' => 'required|valid_url'
    ];

    if (!$this->validate($validationRules)) {
      // If validation fails, return to form with errors
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Get user details
    $user_id = user()->id;

    // Prepare data for insertion
    $data = [
      'mata_kuliah' => $this->request->getPost('mataKuliah'),
      'kode_mata_kuliah' => $this->request->getPost('kode'),
      'prodi' => $this->request->getPost('prodi'),
      'kelas' => $this->request->getPost('kelas'),
      'tahun_ajaran' => $this->request->getPost('tahun'),
      'semester' => $this->request->getPost('semester'),
      'rps_link' => $this->request->getPost('rpsLink'),
      'tanggal_upload' => date('Y-m-d H:i:s'),
      'user_id' => $user_id
    ];

    // Insert data into database
    if ($this->rpsModel->insert($data)) {
      // Redirect to daftar upload with success message
      return redirect()->to('/dosen/daftar_upload')->with('success', 'RPS berhasil diupload');
    } else {
      // Handle insertion error
      return redirect()->back()->with('error', 'Gagal mengupload RPS');
    }
  }

  // public function link_rps()
  // {
  //   // Get RPS data for the current user
  //   $user_id = user()->id;
  //   $data['rps'] = $this->rpsModel->where('user_id', $user_id)->findAll();

  //   // Convert objects to arrays
  //   $data['rps'] = array_map(function ($item) {
  //     return (array)$item;
  //   }, $data['rps']);
  //   return view('dosen/linkRPS', $data);
  // }

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
}
