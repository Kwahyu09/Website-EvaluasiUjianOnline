<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fakultas.kelas.index', [
            "title" => "Kelas",
            "post" => Kelas::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fakultas.kelas.create',[
            "title" => "Kelas"
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
            'nama_kelas' => 'required|max:255',
            'tahun_ajaran' => 'required|min:4|max:4',
            'slug' => 'required|max:255|unique:App\Models\Kelas',
            'jurusan' => 'required|max:255'
        ]);

        Kelas::create($validatedData);

        return redirect('/kelas')->with('success', 'Data Kelas Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        return view('mahasiswa.index',[
            'title' => 'Mahasiswa',
            'kelas' => $kelas->slug,
            'post' => $kelas->user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        return view('fakultas.kelas.edit', [
            "title" => "Kelas",
            "post" => $kelas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $rules = [
            'nama_kelas' => 'required|max:255',
            'tahun_ajaran' => 'required|min:4|max:4',
            'jurusan' => 'required|max:255'
        ];

        if($request->slug != $kelas->slug){
            $rules['slug'] = 'required|max:255|unique:App\Models\Kelas';
        }

        $validatedData = $request->validate($rules);
        Kelas::where('id', $kelas->id)
            ->update($validatedData);
        return redirect('/kelas')->with('success', 'Data Berhasil DiUbah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        Kelas::destroy($kelas->id);
        return redirect('/kelas')->with('success', 'Data Berhasil DiHapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kelas::class, 'slug', $request->nama_kelas);
        return response()->json(['slug' => $slug ]);
    }

    public function kelas_siswa()
    {
        return view('mahasiswa.kelas',[
            "title" => "Kelas Mahasiswa",
            "slug" => "kelasmahasiswa",
            "post" => Kelas::latest()->filter(request(['search']))->paginate(8)
        ]);
    }
}
