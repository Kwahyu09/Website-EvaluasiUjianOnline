@extends('layoutdashboard.main')
@section('container')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
                @if(session()->has('success'))
                <div class="alert alert-success alert-block">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <a href="/{{ $title }}" style="text-decoration: none;">×</a>
                    </button>
                </div>
                @endif
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Akun {{ $title }}</h4>
                  </div>
                  <form action="/{{ $role }}/{{ $post->username }}/update" method="post">
                    @method('put')
                    @csrf
                    <input type="hidden" name="kelas_id" class="form-control" id="kelas_id" required value="{{ old('kelas_id', $kelas_id) }}">
                    <input type="hidden" name="role" class="form-control" id="role" required value="{{ old('role', $role) }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputAddress">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" required value="{{ old('nama', $post->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group">
                            <label for="inputAddress2">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required value="{{ old('username', $post->username) }}">
                            @error('username')
                            <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group">
                            <label for="inputAddress2">Nik</label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" required value="{{ old('nik', $post->nik) }}">
                            @error('nik')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                            @enderror
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" required value="{{ old('email', $post->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            </div>
                            <div class="card-footer mr-3 mb-3 mt-0">
                                <button class="btn btn-primary float-right" type="submit">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection