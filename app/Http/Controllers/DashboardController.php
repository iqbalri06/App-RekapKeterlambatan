<?php

namespace App\Http\Controllers;

use App\Models\lates;
use App\Models\rayons;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {

        $userIdLogin = Auth::id(); // Gunakan Auth::id() atau metode lain untuk mendapatkan id user yang login

        // Mendapatkan rayon_id berdasarkan id user yang login
        $rayonIdLogin = rayons::where('user_id', $userIdLogin)->value('id');

        // Mendapatkan data murid berdasarkan rayon_id
        $murids = Students::with('rayon')
            ->where('rayon_id', $rayonIdLogin)
            ->get();

        $jmlTelatHarian = Lates::whereHas('student', function ($query) use ($rayonIdLogin) {
            $query->where('rayon_id', $rayonIdLogin);
        })->whereDate('date_time_late', today())
            ->count();

        return view('dashboard.dashboard', compact('murids', 'jmlTelatHarian'));
    }
}
