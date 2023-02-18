@extends('layoutdashboard.main')
@section('container')
<div class="row">
  <div class="col-lg-8 col-md-6 col-sm-6 col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="text-center my-3 mr-4 ml-4">Tambah Data {{ $title }}</h4>
        <form method="POST" action="/modul">
        @csrf
          <div class="mb-3 mr-4 ml-4">
            <label for="kd_modul" class="form-label">Kode Modul</label>
            <input type="text" class="form-control @error('kd_modul') is-invalid @enderror" id="kd_modul" name="kd_modul" required value="{{ old('kd_modul') }}">
            @error('kd_modul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3 mr-4 ml-4">
            <label for="nama_modul" class="form-label">Nama Modul</label>
            <input type="text" class="form-control @error('nama_modul') is-invalid @enderror" id="nama_modul" name="nama_modul" required value="{{ old('nama_modul') }}">
            @error('nama_modul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3 mr-4 ml-4">
            <label for="semester" class="form-label">Semester</label>
            <select class="form-select" id="semester" name="semester">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
            @error('semester')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3 mr-4 ml-4">
            <label for="sks" class="form-label">Sks</label>
            <select class="form-select" id="sks" name="sks">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
            @error('sks')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <button style="float: right" type="submit" class="btn btn-primary mr-4 ml-4">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection