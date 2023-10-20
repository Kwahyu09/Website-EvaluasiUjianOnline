<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fakultas.dosen.index', [
            "title" => "Dosen",
            "post" => Dosen::latest()->filter(request(['search']))->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fakultas.dosen.create', [
            "title" => "Dosen"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDosenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|min:16|max:18|unique:App\Models\Dosen',
            'nama_dos' => 'required|min:3|max:60',
            'slug' => 'required|unique:App\Models\Dosen',
            'jabatan' => 'max:50',
            'gol_regu' => 'max:50',
            'jenis_kel' => 'required|min:4|max:9',
            'prodi' => 'required|min:3|max:50',
            'email' => 'required|email|max:60|min:6|unique:App\Models\Dosen'
        ]);
        
        Dosen::create($validatedData);
        return redirect('/dosen')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        return view('fakultas.dosen.edit', [
            "title" => "Dosen",
            "post" => $dosen,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDosenRequest  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $rules = [
            'nama_dos' => 'required|min:3|max:255',
            'jabatan' => 'max:255',
            'gol_regu' => 'max:255',
            'jenis_kel' => 'required|min:4|max:9',
            'prodi' => 'required|min:3|max:50'
        ];

        if($request->nip != $dosen->nip){
            $rules['nip'] = 'required|min:16|max:18|unique:App\Models\Dosen';
        }
        if($request->slug != $dosen->slug){
            $rules['slug'] = 'required|unique:App\Models\Dosen';
        }
        if($request->email != $dosen->email){
            $rules['email'] = 'required|email|max:60|min:6|unique:App\Models\Dosen';
        }

        $validatedData = $request->validate($rules);
        Dosen::where('id', $dosen->id)
            ->update($validatedData);
        return redirect('/dosen')->with('success', 'Data Berhasil DiUbah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        Dosen::destroy($dosen->id);
        return redirect('/dosen')->with('success', 'Data Berhasil DiHapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Dosen::class, 'slug', $request->nama_dos);
        return response()->json(['slug' => $slug ]);
    }
}
