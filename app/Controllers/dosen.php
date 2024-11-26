<?php

namespace App\Controllers;

class dosen extends BaseController
{
  public function dosen()
  {
    return view('dosen/Dashboard_Dosen');
  }
  public function unggah_rps()
  {
    return view('dosen/unggah-rps');
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
