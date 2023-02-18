@extends('layoutdashboard.main')
@section('container')
    <div class="row">
        <div class="col-lg-8 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                @if(session()->has('succes'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h1 class="h3 mb-3 fw-normal text-center mt-5"><b><div style="text-transform: capitalize;">Tambah Akun {{ $title }}</div></b></h1>
                <main class="form-signin w-100 m-auto">
                    <form action="/{{ $title }}/store" method="post">
                        @csrf
                        <input type="hidden" name="role" id="role" value="{{ $role }}">
                        <label class=" mr-4 ml-4" for="name">Nama</label>
                        <div class="form-floating mb-3 mr-4 ml-4">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" required value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label class="mr-4 ml-4" for="username">Usename</label>
                        <div class="form-floating mb-3 mr-4 ml-4">
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label class=" mr-4 ml-4" for="email">Email address</label>
                        <div class="form-floating mb-3  mr-4 ml-4">
                            <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label class=" mr-4 ml-4" for="Password">Password</label>
                        <div class="form-floating mb-3  mr-4 ml-4">
                            <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="w-40 btn btn-primary mt-3 mb-3  mr-4 ml-4 float-right" type="submit">Tambah Data</button>
                    </form>
                </main>
                </div>
            </div>
        </div>
    </div>
@endsection