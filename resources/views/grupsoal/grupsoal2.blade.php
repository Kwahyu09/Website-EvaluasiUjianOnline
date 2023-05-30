@extends('layoutdashboard.main')@section('container')
<h5>Data
    {{ $title }}
    Modul
    {{ $modul }}</h5>
    <div class="d-flex justify-content-start mb-4 mt-3">
      <div class="d-flex justify-content-start">
        <a href="/grupsoal/create/{{ $slug }}" class="btn btn-primary">Tambah Data
          <i class="bi bi-plus-circle"></i>
        </a>
      </div>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success alert-block">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <a href="/{{ $title }}" style="text-decoration: none;">×</a>
            </button>
        </div>
    @endif
    @if ($post->count())
<div class="container">
    <div class="row">
        @foreach ($post as $pos)
        <div class="col-md-3">
            <a class="text-decoration-none" href="/soal/{{ $pos->slug }}">
                <div class="card shadow mb-4">
                    <div class="card-body text-center text-dark">
                        <div class="card-text my-2">
                            <h6></h6>
                            <br>
                            <h5>{{ $pos->nama_grup }}</h5>
                        </div>
                    </div>
                    <!-- ./card-text -->
                    <div class="card-footer">
                        <div class="row align-items-center justify-content-between text-dark">
                            <div class="col-auto">
                                <a href="/soal/{{ $pos->slug }}" class="btn btn-primary stretched-link">Lihat Soal</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="text-center fs-4">Tidak Ada Data
    {{ $title }}</p>
@endif
<div class="d-flex justify-content-end"></div>

@endsection