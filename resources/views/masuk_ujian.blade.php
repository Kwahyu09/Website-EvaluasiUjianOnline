@extends('layoutdashboard.main')
@section('container') 
<div class="row">
    @if ($jam > $ujian->waktu_selesai)
        <div class="d-flex justify-content-center">
            <form action="/selesaiujian" action="post">
                <input type="hidden" name="ujian_id" id="ujian_id" value="{{ $ujian->id }}">
                <input type="hidden" name="nama_mahasiswa" id="nama_mahasiswa" value="{{ Auth::user()->nama }}">
                <input type="hidden" name="npm_mahasiswa" id="npm_mahasiswa" value="{{ Auth::user()->npm }}">
                <button class="btn btn-danger mt-3" type="submit">Selesai Ujian</button>
            </form>
        </div>
    @else
        @if ($soal->count())
        <div class="col-md-7 col-sm-12 mb-3">
            <div class="card">
                <div class="flash-data" data-flashdata="{{ session('success') }}">
                </div>
                <div class="card-body">
                    @foreach ($soal as $s)
                    @php
                        $soal_id = $s->id;
                        $evaluasi_exists = $evaluasi->contains('soal_id', $soal_id);
                    @endphp
                        @if ($evaluasi->count() > 0 && $evaluasi_exists)
                            <form method="post" action="{{ route('ujian-mahasiswa-update', ['id' => $evaluasi->where('soal_id', $soal_id)->first()->id]) }}">
                            <!-- Konten form -->
                            @method('put')
                            @csrf
                        @else
                            <form method="POST" action="{{ route('ujian-mahasiswa-tambah') }}">
                                <!-- Konten form -->
                                @csrf
                        @endif
                        <div class="form-row">
                            <input type="hidden" name="page" id="page" value="{{ $soal->currentPage() }}">
                            <input type="hidden" name="pageAkhir" id="pageAkhir" value="{{ $soal->lastPage() }}">
                            <input type="hidden" name="soal_id" id="soal_id" value="{{ $s->id }}">
                            <input type="hidden" name="skor" id="skor" value="{{ $s->bobot }}">
                            <input type="hidden" name="slug" id="slug" value="{{ $ujian->slug }}">
                            <input type="hidden" name="ujian_id" id="ujian_id" value="{{ $ujian->id }}">
                            <input type="hidden" name="nama_mahasiswa" id="nama_mahasiswa" value="{{ Auth::user()->nama }}">
                            <input type="hidden" name="npm_mahasiswa" id="npm_mahasiswa" value="{{ Auth::user()->npm }}">
                        <div class="col-md-0">
                            <p>{{ $soal->currentPage() }} .</p>
                        </div>
                        <div class="col-md-11">
                        {!! $s->pertanyaan !!}</p>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check mb-2">
                                <input
                                class="form-check-input"
                                type="radio"
                                @foreach($evaluasi as $eval)
                                    @if($eval->soal_id == $s->id && $eval->jawaban == $s->opsi_a)
                                    checked
                                    @endif
                                @endforeach
                                    name="jawaban"
                                    id="jawaban"
                                    value="{{ $s->opsi_a }}">
                                    <label class="form-check-label" for="jawaban">{!! $s->opsi_a !!}</label>
                            </div>
                                <div class="form-check mb-2">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        @foreach($evaluasi as $eval)
                                            @if($eval->soal_id == $s->id && $eval->jawaban == $s->opsi_b)
                                            checked
                                            @endif
                                        @endforeach
                                        name="jawaban"
                                        id="jawaban"
                                        value="{{ $s->opsi_b }}">
                                        <label class="form-check-label" for="jawaban">{!! $s->opsi_b !!}</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="jawaban"
                                        id="jawaban"
                                        @foreach($evaluasi as $eval)
                                            @if($eval->soal_id == $s->id && $eval->jawaban == $s->opsi_c)
                                            checked
                                            @endif
                                        @endforeach
                                        value="{{ $s->opsi_c }}">
                                        <label class="form-check-label" for="jawaban">{!! $s->opsi_c !!}</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="jawaban"
                                        @foreach($evaluasi as $eval)
                                            @if($eval->soal_id == $s->id && $eval->jawaban == $s->opsi_d)
                                            checked
                                            @endif
                                        @endforeach
                                        id="jawaban"
                                        value="{{ $s->opsi_d }}">
                                        <label class="form-check-label" for="jawaban">{!! $s->opsi_d !!}</label>
                                </div>
                                    @error('jawaban')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer mr-3 mb-3 mt-0 d-flex justify-content-center">
                                @if ($evaluasi->count() > 0 && $evaluasi_exists)
                                    <button class="btn btn-warning" id="" type="submit">Ubah Jawaban</button>
                                    </form>
                                @else
                                    <button class="btn btn-primary" type="submit">Tambah Jawaban</button>
                                    </form>
                                @endif
                            </div>
                            @endforeach
                    </div>
                </div>

                <div class="col-md-5 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center mb-3">
                                <h5 class="mt-3">Waktu Pengerjaan Sampai {{ $ujian->waktu_selesai }} </h5>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <label id="clock" style="font-size: 35px; color: #000000; -webkit-text-stroke: 3px #050505;
                                                        text-shadow: 4px 4px 10px #fbfbfb,
                                                        4px 4px 20px #36D6FE,
                                                        4px 4px 30px#021013,
                                                        4px 4px 40px #36D6FE;">
                                </label><br>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $soal->links() }}
                            </div>
                            <div class="d-flex justify-content-center">
                                <form action="/selesaiujian" action="post">
                                    <input type="hidden" name="ujian_id" id="ujian_id" value="{{ $ujian->id }}">
                                    <input type="hidden" name="nama_mahasiswa" id="nama_mahasiswa" value="{{ Auth::user()->nama }}">
                                    <input type="hidden" name="npm_mahasiswa" id="npm_mahasiswa" value="{{ Auth::user()->npm }}">
                                <button class="btn btn-danger mt-3" type="submit">Selesai Ujian</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @else
            <p class="text-center fs-4">Tidak Ada Data
                {{ $title }}</p>
            @endif
        @endif
</div>
@endsection