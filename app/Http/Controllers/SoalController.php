<?php

namespace App\Http\Controllers;

use App\Models\Grup_soal;
use App\Models\Modul;
use App\Models\soal;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Grup_soal $grup_soal)
    {
        return view('grupsoal.soal.soal',[
            "title" => "soal",
            "slug" => $grup_soal->slug,
            "grup" => $grup_soal->nama_grup,
            "post" => $grup_soal->soal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Grup_soal $grup_soal)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $kode_unik = '';
        for ($i = 0; $i < 8; $i++) {
            $kode_unik .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return view('grupsoal.soal.create',[
            "title" => "Soal",
            "slug" => $kode_unik,
            "nama_grup" => $grup_soal->nama_grup,
            "grupsoal_id" => $grup_soal->id,
            "grupsoal_nama" => $grup_soal->nama_grup,
            "modul" => Modul::find($grup_soal->modul_id,['nama_modul']),
            "grupsoal_slug" => $grup_soal->slug
        ]);
    }

    public function createImport(Grup_soal $grup_soal)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $kode_unik = '';
        for ($i = 0; $i < 8; $i++) {
            $kode_unik .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return view('grupsoal.soal.import',[
            "title" => "Soal",
            "slug" => $kode_unik,
            "nama_grup" => $grup_soal->nama_grup,
            "grupsoal_id" => $grup_soal->id,
            "grupsoal_nama" => $grup_soal->nama_grup,
            "modul" => Modul::find($grup_soal->modul_id,['nama_modul']),
            "grupsoal_slug" => $grup_soal->slug
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
            'pertanyaan' => 'required|min:2|max:255',
            'grup_soal_id' => 'required',
            'slug' => 'required|min:3|max:8|unique:App\Models\Soal',
            'gambar' => 'image|file|max:10240',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'opsi_e' => 'required',
            'bobot' => 'required'
        ]);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-soal');
        }

        if($request['jawaban'] == "opsi_a"){
            $validatedData['jawaban'] = $request['opsi_a'];
        }elseif($request['jawaban'] == "opsi_b"){
            $validatedData['jawaban'] = $request['opsi_b'];
        }elseif($request['jawaban'] == "opsi_c"){
            $validatedData['jawaban'] = $request['opsi_c'];
        }elseif($request['jawaban'] == "opsi_d"){
            $validatedData['jawaban'] = $request['opsi_d'];
        }else{
            $validatedData['jawaban'] = $request['opsi_e'];
        }

        soal::create($validatedData);
        return redirect('/soal'.'/'.$request['grupsoal_slug'])->with('success', 'Data Berhasil Ditambahkan!');
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
        return view('grupsoal.soal.edit',[
            "title" => "Soal",
            "grupsoal_slug" => $soal->grup_soal->slug,
            "post" => $soal
        ]);
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
        $rules = [
            'pertanyaan' => 'required|min:2|max:255',
            'grup_soal_id' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'opsi_e' => 'required',
            'bobot' => 'required'
        ];
        
        if($request->slug != $soal->slug){
            $validatedData['slug'] = 'required|min:5|max:50|unique:App\Models\Soal';
        }
        $validatedData = $request->validate($rules);
        if($request['jawaban'] == "opsi_a"){
            $validatedData['jawaban'] = $request['opsi_a'];
        }elseif($request['jawaban'] == "opsi_b"){
            $validatedData['jawaban'] = $request['opsi_b'];
        }elseif($request['jawaban'] == "opsi_c"){
            $validatedData['jawaban'] = $request['opsi_c'];
        }elseif($request['jawaban'] == "opsi_d"){
            $validatedData['jawaban'] = $request['opsi_d'];
        }else{
            $validatedData['jawaban'] = $request['opsi_e'];
        }

        if($request->file('gambar')){
            if($request->oldGambar){
                Storage::delete($request->oldGambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-soal');
        }

        Soal::where('id', $soal->id)
            ->update($validatedData);
        return redirect('/soal'.'/'.$soal->grup_soal->slug)->with('success', 'Data Berhasil DiUbah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(soal $soal)
    {
        if($soal->gambar){
            Storage::delete($soal->gambar);
        }
        soal::destroy($soal->id);
        return back()->with('success', 'Data Berhasil DiHapus!');
    }
}
