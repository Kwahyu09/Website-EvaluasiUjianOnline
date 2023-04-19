<?php

namespace App\Http\Controllers;

use App\Models\soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grupsoal.soal.soal', [
            "title" => "Soal",
            "soalslug" => "grup_soal",
            "post" => soal::latest()->filter(request(['search']))->paginate(10)
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(soal $soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, soal $soal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(soal $soal)
    {
        //
    }
}
