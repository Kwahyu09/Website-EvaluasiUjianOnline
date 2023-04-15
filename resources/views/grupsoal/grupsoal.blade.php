@extends('layoutdashboard.main') 
@section('container')
<h5>Data
    {{ $title }}
    Berdasarkan Modul</h5>
@if ($post->count())
<div class="d-flex justify-content-end mb-2">
    <div class="col-md-4">
        <form action="/grupsoal">
            @if (request('modul'))
            <input type="hidden" name="modul" value="{{ request('modul') }}">
            @endif
            <div class="input-group mb-3">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Search.."
                    name="search"
                    value="{{ request('search') }}">
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
        <div class="col-md-3">
            <a class="text-decoration-none" href="/grupsoal/{{ $pos->slug }}">
                <div class="card shadow mb-4">
                    <div class="card-body text-center text-dark">
                        <div class="card-text my-2">
                            <h6>Modul</h6>
                            <br>
                            <h5>{{ $pos->nama_modul }}</h5>
                            <br>
                        </div>
                    </div>
                    <!-- ./card-text -->
                    <div class="card-footer">
                        <div class="row align-items-center justify-content-between text-dark">
                            <div class="col-auto">
                                <h6>Semester :
                                    {{ $pos->semester }}
                                    , Sks :
                                    {{ $pos->sks }}</h6>
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
<p class="text-center fs-4">Tidak Ditemukan Data Modul</p>
@endif
<div class="d-flex justify-content-end">
    {{ $post->links() }}
</div>
@endsection