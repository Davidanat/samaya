<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Penerimaan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard', [
        ]);
    }
}
