<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\JadwalPeriksa;
use App\Models\Dokter;

class HomeController extends Controller
{
    public function index()
    {
        $ret = [
            "jadwal" => JadwalPeriksa::query()
                        ->select("jadwal_periksa.*", "dokter.nama as nama_dokter", "poli.nama_poli")
                        ->join("dokter", "jadwal_periksa.id_dokter", "=", "dokter.id")
                        ->join("poli", "dokter.id_poli", "=", "poli.id")
                        ->where("jadwal_periksa.aktif", 'Y')
                        ->get(),
        ];

        return view('welcome', $ret);
    }
}
