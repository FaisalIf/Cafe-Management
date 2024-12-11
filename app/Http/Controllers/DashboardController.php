<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Admin Dashboard
    public function adminDashboard()
    {
        return view('dashboards.admin');
    }

    // User Dashboard
    public function userDashboard()
    {
        return view('dashboards.user');
    }
}
