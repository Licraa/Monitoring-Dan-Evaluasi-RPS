<?php

namespace App\Controllers;

class gpm extends BaseController
{
    public function index(): string
    {
        return view('gpm/dashboard_gpm');
    }
}
