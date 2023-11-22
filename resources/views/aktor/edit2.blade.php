@extends('layoutdashboard.main')
@section('container')
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="flash-data" data-flashdata="{{ session('success') }}">
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Edit Akun {{ $title }}</h4>
            </div>
            <form action="/{{ $role }}/{{ $post->username }}/update" method="post">
                @method('put')
                @csrf
                <input type="hidden" name="kelas_id" class="form-control" id="kelas_id" required
                    value="{{ old('kelas_id', $kelas_id) }}">
                <input type="hidden" name="role" class="form-control" id="role" required
                    value="{{ old('role', $role) }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputAddress">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" required value="{{ old('nama', $post->nama) }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" required value="{{ old('username', $post->username) }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @if($role == "Staf")
                    <div class="form-group">
                        <label for="inputAddress2">NIK</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            required value="{{ old('nik', $post->nik) }}">
                        @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @elseif($role == "Ketua")
                    <div class="form-group">
                        <label for="inputAddress2">NIP</label>
                        <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip"
                            required value="{{ old('nip', $post->nip) }}">
                        @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @elseif($role == "Mahasiswa")
                    <div class="form-group">
                        <label for="inputAddress2">NPM</label>
                        <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror" id="npm"
                            required value="{{ old('npm', $post->npm) }}">
                        @error('npm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                                id="email" required value="{{ old('email', $post->email) }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" name="password"
                                class="form-control  @error('password') is-invalid @enderror" id="password" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer mb-3 mt-0">
                        <a class="ml-1 btn btn-danger float-right" href="/{{ $title }}">Batal</a>
                        <button class="btn btn-primary float-right" type="submit">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection