<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modul;
use App\Models\soal;
use App\Models\Grup_soal;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class GrupsoalController extends Controller
{
    public function index()
    {
        $post = Modul::latest()->filter(request(['search','modul']))->paginate(8);

        if(auth()->user()->role == "Ketua"){
            $post = Modul::where('user_id', auth()->user()->id)->latest()->filter(request(['search','modul']))->paginate(8);
        }
        return view('grupsoal.grupsoal', [
            "title" => "grupsoal",
            "post" => $post
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

    public function index_grup(Modul $modul)
    {
        return view('grupsoal.grupsoal2', [
            "title" => "Grup Soal",
            'modul' => $modul->nama_modul,
            'slug' => $modul->slug,
            'post' => $modul->grup_soal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Modul $modul)
    {
        return view('grupsoal.create',[
            "title" => "Grup Soal",
            "modul_id" => $modul->id,
            "nama_modul" => $modul->nama_modul,
            "slug_modul" => $modul->slug

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
            'user_id' => 'required',
            'modul_id' => 'required',
            'nama_grup' => 'required|min:4|max:255',
            'slug' => 'required|min:4|max:255|unique:App\Models\Modul'
        ]);

        Grup_soal::create($validatedData);

        return redirect('/grupsoal'.'/'.$request->slug_modul)->with('success', 'Data Grup Berhasil Ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Grup_soal::class, 'slug', $request->nama_grup);
        return response()->json(['slug' => $slug ]);
    }
}
