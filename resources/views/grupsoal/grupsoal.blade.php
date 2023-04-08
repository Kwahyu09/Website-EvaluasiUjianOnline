@extends('layoutdashboard.main')
@section('container')
<div class="card">
  <div class="card-body">
    <h5>Data {{ $title }} Berdasarkan Modul</h5>
    @if ($post->count())
    <div class="d-flex justify-content-end mb-2">
      <div class="col-md-4">
        <form action="/grupsoal">
          @if (request('modul'))
          <input type="hidden" name="modul" value="{{ request('modul') }}">
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="container">
      <div class="row">
        @foreach ($post as $pos)
        <div class="col-md-4 mb-3">
          <div class="card" style="width: 18rem;">
            <img src="https://source.unsplash.com/500x250/?{{ $pos->nama_modul }}" class="card-img-top" alt="{{ $pos->nama_modul }}">
            <div class="card-body">
              <h6 class="card-title mb-2">{{ $pos->nama_modul }}</h6>
              <small class="text-muted">
              <p class="card-text mb-2">Semester : {{ $pos->semester }}, Jumlah Sks : {{ $pos->sks }} &nbsp;&nbsp; {{ $pos->created_at->diffForHumans() }} </p>
              </small>
              <a href="/grupsoal2" class="btn btn-primary stretched-link">Lihat Grup Soal</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @else
      <p class="text-center fs-4">Tidak Ditemukan Data Modul</p>
    @endif
    <div class="d-flex justify-content-end">
      {{ $post->links() }}
    </div>
  </div>
</div>
@endsection