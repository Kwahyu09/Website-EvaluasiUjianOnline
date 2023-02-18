@extends('layoutdashboard.main')
@section('container')
<div class="row">
  <div class="col-lg-8">
    <h4 class="text-center my-3">Tambah Data {{ $title }}</h4>
    <form method="POST" action="/grupsoal2">
    @csrf
    <input type="hidden" class="form-control" id="modul_id" name="modul_id" value=1>
      <div class="mb-3">
        <label for="nama_grup" class="form-label">Nama Grup</label>
        <input type="text" class="form-control @error('nama_grup') is-invalid @enderror" id="nama_grup" name="nama_grup" required value="{{ old('nama_grup') }}">
        @error('nama_grup')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>
</div>
@endsection