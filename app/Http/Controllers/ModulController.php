<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fakultas.modul.index', [
            "title" => "Modul",
            "post" => Modul::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fakultas.modul.create',[
            "title" => "Modul",
            "post" => User::all()->where('role','Ketua')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kd_modul' => 'required|min:4|max:6|unique:App\Models\modul',
            'nama_modul' => 'required|max:255|unique:App\Models\modul',
            'slug' => 'required',
            'semester' => 'required',
            'sks' => 'required',
            'user_id' => 'required'
        ]);

        modul::create($validatedData);

        return redirect('/modul')->with('success', 'Data Modul Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function show(modul $modul)
    {
        return view('grupsoal.grupsoal2', [
            "title" => "Grup Soal",
            'modul' => $modul->nama_modul,
            'post' => $modul->grup_soal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function edit(modul $modul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modul $modul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function destroy(modul $modul)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Modul::class, 'slug', $request->nama_modul);
        return response()->json(['slug' => $slug ]);
    }
}
