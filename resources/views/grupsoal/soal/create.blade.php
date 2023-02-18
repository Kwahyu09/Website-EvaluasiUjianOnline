@extends('layoutdashboard.main')
@section('container')
<div class="row">
  <div class="col-lg-8 col-md-6 col-sm-6 col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="text-center my-3">Tambah Data {{ $title }}</h4>
        <form method="POST" action="/soal">
        @csrf
          <div class="mb-3">
            <label for="kd_soal" class="form-label">Kode Soal</label>
            <input type="text" class="form-control @error('kd_soal') is-invalid @enderror" id="kd_soal" name="kd_soal" required value="{{ old('kd_soal') }}">
            @error('kd_soal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="pertanyaan" class="form-label">Pertanyaan</label>
            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" name="pertanyaan" required value="{{ old('pertanyaan') }}">
            @error('pertanyaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required value="{{ old('image') }}">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="kunci" class="form-label">Kunci</label>
            <input type="text" class="form-control @error('kunci') is-invalid @enderror" id="kunci" name="kunci" required value="{{ old('kunci') }}">
            @error('kunci')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="opsi_a" class="form-label">Opsi A</label>
            <input type="text" class="form-control @error('opsi_a') is-invalid @enderror" id="opsi_a" name="opsi_a" required value="{{ old('opsi_a') }}">
            @error('opsi_a')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="opsi_b" class="form-label">Opsi B</label>
            <input type="text" class="form-control @error('opsi_b') is-invalid @enderror" id="opsi_b" name="opsi_b" required value="{{ old('opsi_b') }}">
            @error('opsi_b')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="opsi_c" class="form-label">Opsi C</label>
            <input type="text" class="form-control @error('opsi_c') is-invalid @enderror" id="opsi_c" name="opsi_c" required value="{{ old('opsi_c') }}">
            @error('opsi_c')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="opsi_d" class="form-label">Opsi D</label>
            <input type="text" class="form-control @error('opsi_d') is-invalid @enderror" id="opsi_d" name="opsi_d" required value="{{ old('opsi_d') }}">
            @error('opsi_d')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="int" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" required value="{{ old('bobot') }}">
            @error('bobot')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <button style="float: right" type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
</div>
</div>
@endsection