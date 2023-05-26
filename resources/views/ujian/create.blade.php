@extends('layoutdashboard.main')
@section('container')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Data {{ $title }}</h4>
                  </div>
                  <div class="card-body">
                  <form action="{{ route('ujian.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_ujian">Nama {{ $title }}</label>
                                        <input
                                            type="text"
                                            name="nama_ujian"
                                            class="form-control @error('nama_ujian') is-invalid @enderror"
                                            id="nama_ujian"
                                            required="required"
                                            value="{{ old('nama_ujian') }}">
                                        @error('nama_ujian')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input
                                            type="text"
                                            name="slug"
                                            class="form-control @error('slug') is-invalid @enderror"
                                            id="slug" readonly>
                                        @error('slug')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="modul">Modul</label>
                                        <select class="custom-select" id="modul" name="modul">
                                            @foreach ($modul as $m)
                                            <option value="{{ $m->nama_modul }}">{{ $m->nama_modul }}</option>
                                            @endforeach
                                            </select>
                                        @error('modul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="grup_soal">Grup Soal</label>
                                        <select class="custom-select" id="grup_soal" name="grup_soal">
                                            @foreach ($grup_soal as $grup)
                                            <option value="{{ $grup->slug }}">{{ $grup->nama_grup }}</option>
                                            @endforeach
                                            </select>
                                        @error('grup_soal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select class="custom-select" id="kelas" name="kelas">
                                            @foreach ($kelas as $k)
                                            <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                                            @endforeach
                                            </select>
                                        @error('grup_soal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="from-group">
                                        <div class="form-check-inline mt-2">
                                            <label for="acak_soal">Acak Soal : </label>
                                        </div>
                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="acak_soal" id="acak_soal" value="Y">
                                            <label class="form-check-label" for="acak_soal">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="acak_soal" id="acak_soal" value="T">
                                            <label class="form-check-label" for="acak_soal">Tidak</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check-inline mt-2">
                                            <label for="acak_jawaban">Acak Jawaban : </label>
                                        </div>
                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="acak_jawaban" id="acak_jawaban" value="Y">
                                            <label class="form-check-label" for="acak_jawaban">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="acak_jawaban" id="acak_jawaban" value="T">
                                            <label class="form-check-label" for="acak_jawaban">Tidak</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu_mulai">Waktu Mulai</label>
                                        <div class="row">
                                                <div class="col-md-7">
                                                    <input
                                                        type="datetime-local"
                                                        name="waktu_mulai"
                                                        class="form-control  @error('waktu_mulai') is-invalid @enderror"
                                                        id="waktu_mulai"
                                                        required="required"
                                                        value="{{ old('waktu_mulai') }}">
                                                </div>
                                            </div>
                                        @error('waktu_mulai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu_selesai">Waktu Selesai</label>
                                        <div class="row">
                                                <div class="col-md-7">
                                                    <input
                                                        type="datetime-local"
                                                        name="waktu_selesai"
                                                        class="form-control  @error('waktu_selesai') is-invalid @enderror"
                                                        id="waktu_selesai"
                                                        required="required"
                                                        value="{{ old('waktu_selesai') }}">
                                                </div>
                                            </div>
                                        @error('waktu_selesai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="card-footer mr-3 mb-3 mt-0">
                                        <button class="btn btn-primary float-right" type="submit">Tambah</button>
                                    </div>
                                </form>
                            </div>
                  </div>
            </div>
        </div>

<script>
    const nama_ujian = document.querySelector('#nama_ujian');
    const slug = document.querySelector('#slug');

    nama_ujian.addEventListener('change', function(){
        fetch('/ujian/create/checkSlug?nama_ujian=' + nama_ujian.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection