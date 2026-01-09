<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        return view('userConfig.dashboard');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
