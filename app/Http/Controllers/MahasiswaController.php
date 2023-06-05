<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\User;

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
            'nik' => 'required|min:9|max:9|unique:App\Models\User',
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
        return view('aktor.edit2', [
            "title" => "Profile",
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

        $validatedData = $request->validate($rules);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::where('id', $user->id)
            ->update($validatedData);
        return redirect('/staff')->with('success', 'Data Berhasil Diubah!');
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
        return redirect('/staff')->with('success', 'Data Berhasil DiHapus!');
    }
}
