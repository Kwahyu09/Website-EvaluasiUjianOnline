<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Http\Requests\StoreevaluasiRequest;
use App\Http\Requests\UpdateevaluasiRequest;
use App\Models\Ujian;

class EvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        return view('evaluasiujian', [
            "title" => "Evaluasi Ujian",
            "post" => Ujian::latest()->filter(request(['search','ujian']))->paginate(10)
        ]);
    }
    public function index()
    {
        return view('evaluasi', [
            "title" => "Evaluasi",
            "post" => Evaluasi::latest()->paginate(10)
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
     * @param  \App\Http\Requests\StoreevaluasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreevaluasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\evaluasi  $evaluasi
     * @return \Illuminate\Http\Response
     */
    public function show(evaluasi $evaluasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\evaluasi  $evaluasi
     * @return \Illuminate\Http\Response
     */
    public function edit(evaluasi $evaluasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateevaluasiRequest  $request
     * @param  \App\Models\evaluasi  $evaluasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateevaluasiRequest $request, evaluasi $evaluasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\evaluasi  $evaluasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(evaluasi $evaluasi)
    {
        //
    }
}
