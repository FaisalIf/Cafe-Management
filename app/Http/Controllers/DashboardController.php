<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        // Fetch highlighted items by joining the menuitems and dailyhighlights tables
        $highlightedItems = DB::table('menuitems')
            ->join('dailyhighlights', 'menuitems.item_id', '=', 'dailyhighlights.item_id')
            ->select('menuitems.*')
            ->get();

        return view('dashboards.user', [
            'highlightedItems' => $highlightedItems
        ]);
    }
}