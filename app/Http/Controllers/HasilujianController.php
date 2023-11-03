<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\Evaluasi;
use App\Models\HasilUjian;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ujian = Ujian::latest()->paginate(1000);

        if(auth()->user()->role == "Ketua"){
            $ujian = Ujian::where('user_id', auth()->user()->id)->latest();
        }
        return view('hasilujian_admin', [
            "title" => "Hasil Ujian",
            "ujian" => $ujian
        ]);
    }
    public function hasil(Request $request)
    {
        $id_ujian = $request->ujian_id;
        $hasil_ujian = HasilUjian::where('ujian_id',$id_ujian)->get();
        $ujian = Ujian::find($id_ujian);

        return view('hasilujian', [
            "title" => "Hasil Ujian",
            "hasil" => $hasil_ujian,
            "ujian" => $ujian
        ]);
    }

    //cetak
    public function cetak(Request $request)
    {
        // Logika pencetakan
        $id_ujian = $request->ujian_id;
        $hasil_ujian = HasilUjian::where('ujian_id',$id_ujian)->get();
        $ujian = Ujian::find($id_ujian);

        return view('cetak', [
            "hasil" => $hasil_ujian,
            "ujian" => $ujian
        ]);
    }
    public function hasil_ujianmhs(){
        return view('hasil_ujian',  [
            "title" => "Ujian Mahasiswa",
            "total" => session('hasilmahasiswa')
        ]);
    }
    public function selesai_ujian(Request $request)
    {
        $validatedData = $request->validate([
            'ujian_id' => 'required',
            'totalbobot' => 'required',
            'nama_mahasiswa' => 'required',
            'npm_mahasiswa' => 'required'
        ]);

        $totalbobot = $request['totalbobot'];
        $nilaimhs = Evaluasi::where('ujian_id', $request->ujian_id)
                        ->where('npm_mahasiswa', $request->npm_mahasiswa)
                       ->sum('skor');
        $nilai = ($nilaimhs / $totalbobot) * 100;
        // Use number_format to format the number with up to 2 decimal places
        $nilaiFormatted = number_format($nilai, 2);

        // Remove trailing zeros and the decimal point if there are no decimal places
        $validatedData['nilai'] = rtrim(rtrim($nilaiFormatted, '0'), '.'); 

        HasilUjian::create($validatedData);
        // Setel sesi 'ujian_selesai' menjadi true
        session()->put('ujian_selesai', true);

        return redirect()->route('hasil-ujian')->with('hasilmahasiswa', $validatedData['nilai'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
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
     * @param  \App\Http\Requests\StoreUjianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ujian $ujian)
    {
        //
    }
}
