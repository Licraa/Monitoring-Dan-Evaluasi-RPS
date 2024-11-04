<?php

namespace App\Controllers;

class dosen extends BaseController
{
    public function index(): string
    {
        return view('dashboard/dashboard_Dosen');
    }
}
