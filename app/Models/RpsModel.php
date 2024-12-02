<?php

namespace App\Models;

use CodeIgniter\Model;

class RpsModel extends Model
{
  protected $table = 'daftar_rps'; // Nama tabel
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'kode_mata_kuliah',
    'tahun_ajaran',
    'semester',
    'kelas',
    'link_rps',
    'jurusan_id',
  ];
  protected $useTimestamps = true; // Aktifkan created_at & updated_at otomatis
}
