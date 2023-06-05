<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\Grup_soal;
use App\Models\Kelas;
use App\Models\Modul;
use App\Http\Requests\StoreUjianRequest;
use App\Http\Requests\UpdateUjianRequest;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ujian.index', [
            "title" => "Ujian",
            "post" => Ujian::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modul = Modul::all();
        $grupsoal = Grup_soal::all();
        $kelas = Kelas::all();

        if(auth()->user()->role == "Ketua"){
            $Modul = Modul::where('user_id', auth()->user()->id)->latest()->filter(request(['search']))->paginate(1000);
            $grupsoal = Grup_soal::where('user_id', auth()->user()->id)->latest()->filter(request(['search']))->paginate(1000);
        }
        return view('ujian.create',[
            "title" => "Ujian",
            "kd_ujian" => uniqid(),
            "modul" => $modul,
            "grup_soal" => $grupsoal,
            "kelas" => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUjianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kd_ujian' => 'required|min:5|max:150',
            'nama_ujian' => 'required|min:5|max:150',
            'kelas' => 'required|max:255',
            'modul' => 'required|max:255',
            'slug' => 'required|min:5|max:50|unique:App\Models\Ujian',
            'grupsoal' => 'required|max:255',
            'acak_soal' => 'required',
            'acak_jawaban' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ]);

        Ujian::create($validatedData);
        return redirect('/ujian')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function show(Ujian $ujian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function edit(Ujian $ujian)
    {
        $modul = Modul::all();  
        $grupsoal = Grup_soal::all();
        $kelas = Kelas::all();

        if(auth()->user()->role == "Ketua"){
            $Modul = Modul::where('user_id', auth()->user()->id)->latest()->filter(request(['search']))->paginate(1000);
            $grupsoal = Grup_soal::where('user_id', auth()->user()->id)->latest()->filter(request(['search']))->paginate(1000);
        }

         return view('ujian.edit',[
            "title" => "Ujian",
            "post" => $ujian,
            "modul" => $modul,
            "grup_soal" => $grupsoal,
            "kelas" => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUjianRequest  $request
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ujian $ujian)
    {
        $rules = [
            'kd_ujian' => 'required|min:5|max:150',
            'nama_ujian' => 'required|min:5|max:150',
            'kelas' => 'required|max:255',
            'modul' => 'required|max:255',
            'grupsoal' => 'required|max:255',
            'acak_soal' => 'required',
            'acak_jawaban' => 'required',
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ];

        if($request->slug != $ujian->slug){
            $rules['slug'] = 'required|min:5|max:50|unique:App\Models\Ujian';
        }

        $validatedData = $request->validate($rules);
        Ujian::where('id', $ujian->id)
            ->update($validatedData);
        return redirect('/ujian')->with('success', 'Data Berhasil DiUbah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ujian $ujian)
    {
        Ujian::destroy($ujian->id);
        return redirect('/ujian')->with('success', 'Data Berhasil DiHapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Ujian::class, 'slug', $request->nama_ujian);
        return response()->json(['slug' => $slug ]);
    }
}
