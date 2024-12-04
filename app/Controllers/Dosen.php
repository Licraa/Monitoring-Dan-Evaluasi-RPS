<?php

namespace App\Controllers;

use App\Models\BapModel;
use App\Models\BapCatatanModel;

class Dosen extends BaseController
{
  public function getBapDetails($bapId)
  {
    try {
      $bapModel = new \App\Models\BapModel();
      $reviewNotesModel = new \App\Models\BapCatatanModel();

      $bap = $bapModel->find($bapId);

      if (!$bap) {
        return $this->response->setJSON([
          'success' => false,
          'message' => 'BAP tidak ditemukan'
        ]);
      }

      $reviewNotes = $reviewNotesModel->where('bap_id', $bapId)->findAll();

      return $this->response->setJSON([
        'success' => true,
        'bap' => $bap,
        'review_notes' => $reviewNotes
      ]);
    } catch (\Exception $e) {
      log_message('error', 'Error in getBapDetails: ' . $e->getMessage());
      return $this->response->setJSON([
        'success' => false,
        'message' => 'Terjadi kesalahan server'
      ]);
    }
  }
}
