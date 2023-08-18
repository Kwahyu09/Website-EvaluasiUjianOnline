@extends('layoutdashboard.main')
@section('container')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Ubah Data {{ $title }}</h4>
                  </div>
                  <div class="card-body">
                  <form action="/ujian/{{ $post->slug }}/update" method="POST">
                    @method('put')
                                    @csrf
                                    <input
                                        type="hidden"
                                        name="kd_ujian"
                                        class="form-control @error('kd_ujian') is-invalid @enderror"
                                        id="kd_ujian" value="{{ $post->kd_ujian }}">
                                    <input
                                        type="hidden"
                                        name="user_id"
                                        class="form-control @error('user_id') is-invalid @enderror"
                                        id="user_id" value="{{ old('user_id') }}">
                                    <div class="form-group">
                                        <label for="nama_ujian">Nama {{ $title }}</label>
                                        <input
                                            type="text"
                                            name="nama_ujian"
                                            class="form-control @error('nama_ujian') is-invalid @enderror"
                                            id="nama_ujian"
                                            required="required"
                                            value="{{ old('nama_ujian',$post->nama_ujian) }}">
                                        @error('nama_ujian')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="hidden"
                                            name="slug"
                                            class="form-control @error('slug') is-invalid @enderror"
                                            id="slug" readonly value="{{ old('slug',$post->slug) }}">
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
                                                @if(old('modul',$post->modul)  == $m->nama_modul )
                                                    <option value="{{ $m->nama_modul }}" selected>{{ $m->nama_modul }}</option>
                                                @else
                                                    <option value="{{ $m->nama_modul }}">{{ $m->nama_modul }}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        @error('modul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="grupsoal">Grup Soal</label>
                                        <select class="custom-select" id="grupsoal" name="grupsoal">
                                            @foreach ($grup_soal as $grup)
                                                @if(old('grupsoal', $post->grupsoal)  == $grup->slug )
                                                    <option value="{{ $grup->slug }}" selected>{{ $grup->slug }}</option>
                                                @else
                                                    <option value="{{ $grup->slug }}">{{ $grup->slug }}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        @error('grupsoal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select class="custom-select" id="kelas" name="kelas">
                                            @foreach ($kelas as $k)
                                                @if(old('kelas', $post->kelas)  == $k->slug )
                                                    <option value="{{ $k->slug }}" selected>{{ $k->slug }}</option>
                                                @else
                                                    <option value="{{ $k->slug }}">{{ $k->slug }}</option>
                                                @endif
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
                                            <input class="form-check-input" type="radio" name="acak_soal" id="acak_soal" value="Y" <?php if($post->acak_soal =='Y') echo 'checked'?>>
                                            <label class="form-check-label" for="acak_soal">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="acak_soal" id="acak_soal" value="T" <?php if($post->acak_soal =='T') echo 'checked'?>>
                                            <label class="form-check-label" for="acak_soal">Tidak</label>
                                        </div>
                                        @error('acak_soal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check-inline mt-2">
                                            <label for="acak_jawaban">Acak Jawaban : </label>
                                        </div>
                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="acak_jawaban" id="acak_jawaban" value="Y" <?php if($post->acak_jawaban =='Y') echo 'checked'?>>
                                            <label class="form-check-label" for="acak_jawaban">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="acak_jawaban" id="acak_jawaban" value="T" <?php if($post->acak_jawaban =='T') echo 'checked'?>>
                                            <label class="form-check-label" for="acak_jawaban">Tidak</label>
                                        </div>
                                        @error('acak_jawaban')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="tanggal">Tanggal</label>
                                                <input
                                                                type="date"
                                                                name="tanggal"
                                                                class="form-control  @error('tanggal') is-invalid @enderror"
                                                                id="tanggal"
                                                                required="required"
                                                                value="{{ old('tanggal',$post->tanggal) }}">
                                                @error('grup_soal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <label for="waktu_mulai">Waktu Mulai</label>
                                                    <input
                                                    type="time"
                                                    name="waktu_mulai"
                                                    class="form-control  @error('waktu_mulai') is-invalid @enderror"
                                                    id="waktu_mulai"
                                                    required="required"
                                                    value="{{ old('waktu_mulai',$post->waktu_mulai) }}">
                                                    @error('waktu_mulai')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="waktu_selesai">Waktu Selesai</label>
                                                    <input
                                                        type="time"
                                                        name="waktu_selesai"
                                                        class="form-control  @error('waktu_selesai') is-invalid @enderror"
                                                        id="waktu_selesai"
                                                        required="required"
                                                        value="{{ old('waktu_selesai',$post->waktu_selesai) }}">
                                                        @error('waktu_selesai')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card-footer mr-3 mb-3 mt-0">
                                        <button class="btn btn-primary float-right" type="submit">Ubah</button>
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