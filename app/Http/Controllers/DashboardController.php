<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:ver.dashboard')->only('dashboard');
    }

    public function dashboard()
    {

        return view('dashboard');
    }
}
