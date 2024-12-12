<?php

namespace App\Controllers;

use App\Models\RpsModel;
use App\Models\FakultasModel;
use App\Models\JurusanModel;
use Myth\Auth\Models\UserModel;
use App\Models\UserDetailsModel;
use App\Models\DaftarRpsModel;
use App\Models\BapCatatanModel;
use App\Models\BapModel;
use App\Models\MataKuliahModel;
use App\Models\UnsurModel;
use App\Models\ReviewRpsModel;

class GpmController extends BaseController
{
  protected $rpsModel;
  protected $fakultasModel;
  protected $jurusanModel;
  protected $userModel;
  protected $userDetailsModel;
  protected $daftarRpsModel;
  protected $bapCatatanModel;
  protected $bapModel;
  protected $mataKuliahModel;
  protected $unsurModel;
  protected $reviewModel;
  public function __construct()
  {
    $this->rpsModel = new RpsModel();
    $this->fakultasModel = new FakultasModel();
    $this->jurusanModel = new JurusanModel();
    $this->userModel = new UserModel();
    $this->userDetailsModel = new UserDetailsModel();
    $this->daftarRpsModel = new DaftarRpsModel();
    $this->bapModel = new BapModel();
    $this->bapCatatanModel = new BapCatatanModel();
    $this->mataKuliahModel = new MataKuliahModel();
    $this->unsurModel = new UnsurModel();
    $this->reviewModel = new ReviewRpsModel();
  }

  public function dashboard_gpm()
  {
    return view('gpm/dashboard_gpm');
  }

  public function gpm_rps()
  {
    $data['daftarrps'] = $this->daftarRpsModel->findAll();
    $data['mata_kuliah'] = $this->mataKuliahModel->findAll();
    $data['unsur'] = $this->unsurModel->findAll();
    return view('gpm/gpm', $data);
  }

  public function admin()
  {
    return view('dashboard/dashboard_admin');
  }

  public function kajur()
  {
    return view('dashboard/dashboard_kajur');
  }

  public function download($id)
  {
    $rps = $this->daftarRpsModel->find($id);
    if ($rps) {
      return $this->response->download('path/to/files/' . $rps->link_rps, null);
    } else {
      return redirect()->back()->with('error', 'File not found.');
    }
  }

  public function saveReview()
  {
    try {
      // Debug: Tampilkan semua data POST yang diterima
      log_message('debug', 'POST Data: ' . print_r($this->request->getPost(), true));

      $daftarRpsId = $this->request->getPost('daftar_rps_id');
      $statuses = $this->request->getPost('status');
      $catatan = $this->request->getPost('catatan');

      if (!$daftarRpsId || !$statuses) {
        log_message('error', 'Missing required data: daftar_rps_id or statuses');
        return $this->response->setJSON([
          'success' => false,
          'message' => 'Data tidak lengkap'
        ]);
      }

      $userId = user_id(); // Menggunakan helper Myth/Auth untuk mendapatkan ID user
      log_message('debug', 'User ID: ' . $userId);

      foreach ($statuses as $unsurId => $status) {
        $reviewData = [
          'daftar_rps_id' => $daftarRpsId,
          'unsur_id' => $unsurId,
          'review_gpm' => $status,
          'catatan_gpm' => $catatan[$unsurId] ?? '',
          'reviewer_role' => 'gpm',
          'reviewer_id' => $userId,
          'status' => $status // Status final sama dengan review GPM
        ];

        log_message('debug', 'Review Data for unsur ' . $unsurId . ': ' . print_r($reviewData, true));

        // Cek review yang sudah ada
        $existingReview = $this->reviewModel->where([
          'daftar_rps_id' => $daftarRpsId,
          'unsur_id' => $unsurId
        ])->first();

        if ($existingReview) {
          log_message('debug', 'Updating existing review ID: ' . $existingReview->id);
          $this->reviewModel->update($existingReview->id, $reviewData);
        } else {
          log_message('debug', 'Inserting new review');
          $this->reviewModel->insert($reviewData);
        }
      }

      return $this->response->setJSON([
        'success' => true,
        'message' => 'Review berhasil disimpan'
      ]);
    } catch (\Exception $e) {
      log_message('error', 'Error in saveReview: ' . $e->getMessage());
      log_message('error', 'Stack trace: ' . $e->getTraceAsString());

      return $this->response->setJSON([
        'success' => false,
        'message' => 'Terjadi kesalahan: ' . $e->getMessage()
      ]);
    }
  }
}
