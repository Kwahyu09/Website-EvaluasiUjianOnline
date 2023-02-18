@extends('layoutdashboard.main')
@section('container')
<div class="row">
  <div class="col-lg-8 col-md-6 col-sm-6 col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="text-center my-3 mr-4 ml-4">Tambah Data {{ $title }}</h4>
        <form method="POST" action="/kelas">
        @csrf
          <div class="mb-3 mr-4 ml-4">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" required value="{{ old('nama_kelas') }}">
            @error('nama_kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3 mr-4 ml-4">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
            <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran" name="tahun_ajaran" required value="{{ old('tahun_ajaran') }}">
            @error('tahun_ajaran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3 mr-4 ml-4">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" required value="{{ old('jurusan') }}">
            @error('jurusan')
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