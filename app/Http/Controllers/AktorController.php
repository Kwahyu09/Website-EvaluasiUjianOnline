<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AktorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_admin()
    {
        return view('aktor.index', [
            "title" => "admin",
            "post" => User::latest()->Filter(request(['search']))->where('role','Admin')->paginate(10)
        ]);
    }

    public function profile_admin()
    {
        return view('aktor.edit', [
            "title" => "Profile Admin",
            "post" => User::latest()->where('role','Admin')->paginate(10)
        ]);
    }

    public function index_staff()
    {
        return view('aktor.index', [
            "title" => "staff",
            "post" => User::latest()->Filter(request(['search']))->where('role','Staf')->paginate(10)
        ]);
    }

    public function index_ketua()
    {
        return view('aktor.index', [
            "title" => "ketua",
            "post" => User::latest()->Filter(request(['search']))->where('role','Ketua')->paginate(10)
        ]);
    }

    // public function index_mahasiswa()
    // {
    //     return view('aktor', [
    //         "title" => "mahasiswa",
    //         "post" => User::latest()->Filter(request(['search']))->where('role','Mahasiswa')->paginate(10)
    //     ]);
    // }

    public function create_staff()
    {
        return view('aktor.create', [
            "title" => "staff",
            "role" => "Staf"
        ]);
    }

    public function store_staff(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|min:2|max:18|unique:App\Models\User',
            'nama' => 'required|max:255|unique:App\Models\User',
            'username' => 'required|min:4|max:255|unique:App\Models\User',
            'role' => 'required|min:4|max:9',
            'email' => 'required|email|max:255|min:4|unique:App\Models\User',
            'password' => 'required|min:5|max:255'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/staff')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function create_ketua()
    {
        return view('aktor.create', [
            "title" => "ketua",
            "role" => "Ketua"
        ]);
    }

    public function store_ketua(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:App\Models\User',
            'username' => 'required|min:4|max:255|unique:App\Models\User',
            'nik' => 'required|min:2|max:18|unique:App\Models\User',
            'role' => 'required|min:4|max:9',
            'email' => 'required|email|max:255|min:4|unique:App\Models\User',
            'password' => 'required|min:5|max:255'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/ketua')->with('success', 'Data Berhasil Ditambahkan!');
    }


    public function create()
    {
        return view('create_akor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = "Admin";
        $kelas_id = "";
        if(auth()->user()->role == "Ketua"){
            $role = "Ketua";
        }elseif(auth()->user()->role == "Staf"){
            $role = "Staf";
        }elseif(auth()->user()->role == "Mahasiswa"){
            $role = "Mahasiswa";
            $kelas_id = auth()->user()->kelas_id;
        }
        return view('aktor.edit', [
            "title" => "Profile",
            "post" => $user,
            "role" => $role,
            "kelas_id" => $kelas_id
        ]);
    }

    public function edit_staf(User $user)
    {
        $kelas_id = "";
        return view('aktor.edit2', [
            "title" => "Staff",
            "post" => $user,
            "role" => "Staf",
            "kelas_id" => $kelas_id
        ]);
    }
    public function edit_ketua(User $user)
    {
        $kelas_id = "";
        return view('aktor.edit2', [
            "title" => "Ketua",
            "post" => $user,
            "role" => "Ketua",
            "kelas_id" => $kelas_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update_admin(Request $request, User $user)
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
        return redirect('/profile'.'/'.$request['username'].'/'.'edit')->with('success', 'Data Berhasil Diubah!');

    }

    public function update_staf(Request $request, User $user)
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
    public function update_ketua(Request $request, User $user)
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
        return redirect('/ketua')->with('success', 'Data Berhasil Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy_staff(User $user)
    {
        User::destroy($user->id);
        return redirect('/staff')->with('success', 'Data Berhasil DiHapus!');
    }
    
    public function destroy_ketua(User $user)
    {
        User::destroy($user->id);
        return redirect('/ketua')->with('success', 'Data Berhasil DiHapus!');
    }
}
