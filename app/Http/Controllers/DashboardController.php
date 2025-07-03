<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin.dashboard'); // resources/views/admin/dashboard.blade.php
    }

    public function siswa_dashboard()
    {
        return view('siswa.dashboard'); 
    }


}
