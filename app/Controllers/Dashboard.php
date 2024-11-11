<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashBoard');
        // return redirect()->to(base_url('login'));
    }
}
