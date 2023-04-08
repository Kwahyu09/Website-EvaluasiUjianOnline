@extends('layoutdashboard.main')@section('container')
<div class="card">
  <div class="card-body">
    <h5>Data {{ $title }}</h5>
    @if ($post->count())
    <div class="d-flex justify-content-end mb-2">
      <div class="col-md-4">
        {{-- <form action="/grupsoal2">
          @if (request('grup_soal'))
          <input type="hidden" name="grup_soal" value="{{ request('grup_soal') }}">
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">Search</button>
            </div>
          </div>
        </form> --}}
      </div>
    </div>
    <div class="container">
      <div class="row">
        @foreach ($post as $pos)
        <div class="col-md-4 mb-3">
          <div class="card" style="width: 18rem;">
            <img src="https://source.unsplash.com/500x250?{{ $pos->nama_ujian }}" class="card-img-top" alt="{{ $pos->nama_ujian }}">
            <div class="card-body">
              <h6 class="card-title mb-2">{{ $pos->nama_ujian }}</h6>
              <a href="/evaluasi" class="btn btn-primary stretched-link">Lihat Evaluasi</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @else
      <p class="text-center fs-4">No Data Ujian</p>
    @endif
    <div class="d-flex justify-content-end">
      {{ $post->links() }}
    </div>
  </div>
</div>
@endsection