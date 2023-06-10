<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Evaluasi;
use App\Models\Grup_soal;
use App\Models\HasilUjian;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa', [
            "title" => "mahasiswa",
            "post" => User::latest()->Filter(request(['search']))->where('role','Mahasiswa')->paginate(10)
        ]);
    }
    public function mahasiswa_index()
    {
        return view('mahasiswa', [
            "title" => "mahasiswa",
            "post" => User::latest()->Filter(request(['search']))->where('role','Mahasiswa')->paginate(10)
        ]);
    }
    public function ujian_index()
    {
        $kelas = Auth::user()->kelas;
        $ujian = Ujian::where('kelas', $kelas->slug)->get();

        return view('mahasiswa_ujian', [
            "title" => "Ujian Mahasiswa",
            "post" => $ujian,
        ]);
    }
    public function ujian_masuk(Ujian $ujian)
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $jam = $date->format('H:i:s');

        $slug = $ujian->grupsoal;
        $grup = Grup_soal::where('slug', $slug)->get();
        $id_grup = $grup[0]['id'];
        $soal = Soal::latest()->where('grup_soal_id',$id_grup)->paginate(100);

        $npm = Auth::user()->npm;
        $evaluasi = Evaluasi::where('ujian_id', $ujian->id)->where('npm_mahasiswa',$npm)->get();
        return view('masuk_ujian',  [
            "title" => "Ujian Mahasiswa",
            "soal" => $soal,
            "ujian" => $ujian,
            "jam" => $jam,
            "tanggal" => $tanggal,
            "evaluasi" => $evaluasi
        ]);
    }

    public function ujian_data(Request $request)
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $jam = $date->format('H:i:s');


        $request->validate([
            'id_modul' => 'required',
            'kd_ujian' => 'required'
        ]);
        $idModul = $request->id_modul;
        $kode = $request->kd_ujian;
        
        $ujian = Ujian::find($idModul);
        $hasil = HasilUjian::pluck('ujian_id')->toArray();
        $npm = HasilUjian::pluck('npm_mahasiswa')->toArray();
        if ($kode == $ujian->kd_ujian) {
            if($ujian->tanggal === $tanggal && $ujian->waktu_mulai <= $jam && $ujian->waktu_selesai >= $jam){
                if(in_array($ujian->id, $hasil) && in_array(auth()->user()->npm, $npm)){
                    return back()->with('success', 'Anda Sudah Mengerjakan Ujian');
                }else{
                    return view('data_ujian', [
                        "title" => "Ujian Mahasiswa",
                        "post" => $ujian
                        ]);
                }
            }else {
            return back()->with('success', 'Waktu Ujian Belum dimulai');
         }
        }
        else {
            return back()->with('success', 'Kode Ujian Salah');
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kelas $kelas)
    {
        return view('mahasiswa.create', [
            "title" => "Mahasiswa",
            "role" => "Mahasiswa",
            "kelas_id" => $kelas->id,
            "slug_kelas" => $kelas->slug
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMahasiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'kelas_id' => 'required',
            'npm' => 'required|min:9|max:9|unique:App\Models\User',
            'nama' => 'required|max:255',
            'username' => 'required|min:4|max:255|unique:App\Models\User',
            'role' => 'required|min:4|max:9',
            'email' => 'required|email|max:255|min:4|unique:App\Models\User',
            'password' => 'required|min:5|max:255'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/kelas'.'/'.$request->slug_kelas)->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('aktor.edit3', [
            "title" => "Mahasiswa",
            "post" => $user,
            "role" => $user->role,
            "kelas_id" => $user->kelas_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nama' => 'required|max:255',
            'role' => 'required|min:4|max:9',
            'password' => 'required|min:5|max:255'
        ];

        if($request->nik != $user->nik){
            $rules['nik'] = 'required|min:2|max:18|unique:App\Models\User';
        }
        if($request->username != $user->username){
            $rules['username'] = 'required|min:4|max:255|unique:App\Models\User';
        }
        if($request->email != $user->email){
            $rules['email'] = 'required|email:dns|max:255|min:4|unique:App\Models\User';
        }

        $slug = $user->kelas->slug;

        $validatedData = $request->validate($rules);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::where('id', $user->id)
            ->update($validatedData);
        return redirect('/kelas'.'/'.$slug)->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return back()->with('success', 'Data Berhasil DiHapus!');
    }
}
