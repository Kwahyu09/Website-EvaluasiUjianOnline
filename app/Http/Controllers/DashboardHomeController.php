<?php

namespace App\Http\Controllers;

use App\Models\soal;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Modul;
use App\Models\Ujian;
use App\Models\Grup_soal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staf = User::where('role', 'Staf')->count();
        $ketua = User::where('role', 'Ketua')->count();
        $dosen = Dosen::count();
        $mahasiswa = User::where('role', 'Mahasiswa')->count();
        $kelas = Kelas::count();
        $modul = Modul::count();
        $grupsoal = Grup_soal::count();
        $soal = soal::count();
        $ujian = Ujian::count();
        return view('home', [
            "nama" => "Krisna Wahyudi",
            "title" => "Home",
            "dosen" => $dosen,
            "staf" => $staf,
            "ketua" => $ketua,
            "kelas" => $kelas,
            "mahasiswa" => $mahasiswa,
            "modul" => $modul,
            "grupsoal" => $grupsoal,
            "soal" => $soal,
            "ujian" => $ujian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

}
