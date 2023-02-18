<?php

namespace App\Http\Controllers;

use App\Models\modul;
use Illuminate\Http\Request;

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
            "post" => modul::latest()->filter(request(['search']))->paginate(10)
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
            "title" => "Modul"
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
            'semester' => 'required',
            'sks' => 'required'
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
        //
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
}
