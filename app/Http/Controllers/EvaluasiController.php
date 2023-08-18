<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Grup_soal;
use App\Http\Requests\UpdateevaluasiRequest;
use App\Models\Ujian;
use App\Models\Soal;
use Illuminate\Http\Request;


class EvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('evaluasiujian', [
            "title" => "Evaluasi Ujian",
            "post" => Ujian::latest()->filter(request(['search','ujian']))->paginate(100)
        ]);
    }
    public function soalEvaluasi(Request $request)
    {
        $id_ujian = $request->id_ujian;
        $ujian = Ujian::find($id_ujian);
        
        $slug = $ujian->grupsoal;
        $grup = Grup_soal::where('slug', $slug)->get();
        $id_grup = $grup[0]['id'];
        $soal = Soal::latest()->where('grup_soal_id',$id_grup)->paginate(1000);
        return view('evaluasi', [
            "title" => "Evaluasi",
            "soal" => $soal,
            "ujian" => $ujian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreevaluasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'soal_id' => 'required',
            'ujian_id' => 'required',
            'nama_mahasiswa' => 'required|max:255',
            'npm_mahasiswa' => 'required',
            'jawaban' => 'required'
        ]);
        $soal = Soal::find($request->soal_id);
        if($request->jawaban == $soal->jawaban){
            $validatedData['skor'] = $request->skor;
        }else{
            $validatedData['skor'] = 0;
        }
        
        // Ambil nomor halaman selanjutnya
        evaluasi::create($validatedData);
        $nextPage = $request->page + 1;
        if($request->page === $request->pageAkhir ){
            return back();
        }else{
            return redirect('/masuk-ujian'.'/'.$request->slug.'?page='.$nextPage);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\evaluasi  $evaluasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id_ujian = $request->ujian_id;
        $id_soal = $request->soal_id;

        $soal = Soal::find($id_soal);
        $eval = Evaluasi::where('ujian_id',$id_ujian)->where('soal_id',$id_soal)->get();
        
        $opsi_a = Evaluasi::where('ujian_id',$id_ujian)->where('soal_id',$id_soal)->where('jawaban',$soal->opsi_a)->count();
        $opsi_b = Evaluasi::where('ujian_id',$id_ujian)->where('soal_id',$id_soal)->where('jawaban',$soal->opsi_b)->count();
        $opsi_c = Evaluasi::where('ujian_id',$id_ujian)->where('soal_id',$id_soal)->where('jawaban',$soal->opsi_c)->count();
        $opsi_d = Evaluasi::where('ujian_id',$id_ujian)->where('soal_id',$id_soal)->where('jawaban',$soal->opsi_d)->count();
      
    
        return view('evaluasiSoal', [
            "title" => "Evaluasi Ujian",
            "soal" => $eval,
            "opsia" => $opsi_a,
            "opsib" => $opsi_b,
            "opsic" => $opsi_c,
            "opsid" => $opsi_d,
            "datasoal" => $soal
        ]);
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
    public function update(Request $request, $id)
    {
        $rules = [
            'soal_id' => 'required',
            'ujian_id' => 'required',
            'nama_mahasiswa' => 'required|max:255',
            'npm_mahasiswa' => 'required',
            'jawaban' => 'required'
        ];
        
        $validatedData = $request->validate($rules);

        $soal = Soal::find($request->soal_id);
        if($request->jawaban == $soal->jawaban){
            $validatedData['skor'] = $request->skor;
        }else{
            $validatedData['skor'] = 0;
        }

        evaluasi::where('id', $id)->update($validatedData);

        return back()->with('success', 'Jawaban Berhasil Diubah!');
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
