<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modul;
use App\Models\soal;
use App\Models\Grup_soal;

class GrupsoalController extends Controller
{
    public function index()
    {
        return view('grupsoal.grupsoal', [
            "title" => "grupsoal",
            "post" => modul::latest()->filter(request(['search','modul']))->paginate(8)
        ]);
    }

    public function show(Grup_soal $grup_soal)
    {
        return view('grupsoal.soal.soal',[
            "title" => "soal",
            "slug" => $grup_soal->slug,
            "grup" => $grup_soal->nama_grup,
            "post" => $grup_soal->soal,
            "soal" => soal::latest()->filter(request(['search','modul']))->paginate(6)
        ]);
    }
}
