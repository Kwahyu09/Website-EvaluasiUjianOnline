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
        return view('aktor', [
            "title" => "admin",
            "post" => User::latest()->Filter(request(['search']))->where('role','Admin')->paginate(10)
        ]);
    }

    public function index_staff()
    {
        return view('aktor', [
            "title" => "staff",
            "post" => User::latest()->Filter(request(['search']))->where('role','Staf')->paginate(10)
        ]);
    }

    public function index_ketua()
    {
        return view('aktor', [
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
        return view('create_aktor', [
            "title" => "staff",
            "role" => "Staf"
        ]);
    }

    public function store_staff(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:App\Models\User',
            'username' => 'required|min:4|max:255|unique:App\Models\User',
            'role' => 'required|min:4|max:9',
            'email' => 'required|email:dns|max:255|min:4|unique:App\Models\User',
            'password' => 'required|min:5|max:255'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/staff')->with('success', 'Data Berhasil Ditambahkan!');;
    }

    public function create_ketua()
    {
        return view('create_aktor', [
            "title" => "ketua",
            "role" => "Ketua"
        ]);
    }

    public function store_ketua(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:App\Models\User',
            'username' => 'required|min:4|max:255|unique:App\Models\User',
            'role' => 'required|min:4|max:9',
            'email' => 'required|email:dns|max:255|min:4|unique:App\Models\User',
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
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
}
