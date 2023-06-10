@extends('layoutdashboard.main')
@section('container') 
<div class="row">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="card">
            <div class="card-body"> 
                <h3 class="text-center mt-5 mb-3">Selamat {{ auth()->user()->nama }}</h3>
                <h3 class="text-center mt-3 mb-5">Skor Ujian Anda :</h3>
                <h1 class="text-center mt-5 mb-5">{{ $total }}</h1>
                <div class="mt-3 mb-5 d-flex justify-content-center">
                    <a href="ujian-mahasiswa" class="btn btn-primary">Tutup</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection