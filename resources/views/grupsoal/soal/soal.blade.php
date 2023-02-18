@extends('layoutdashboard.main')
@section('container')
<h5 class="mb-2">Data {{ $title }}</h5>
<div class="d-flex justify-content-start">
  <a href="/soal/create" class="btn btn-primary">Tambah Data <i class="bi bi-plus-circle"></i></a>
</div>
@if ($post->count())
<div class="d-flex justify-content-end mb-2">
  <div class="col-md-4">
    <form action="/soal">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Soal</th>
            <th scope="col">Pertanyaan</th>
            <th scope="col">Image</th>
            <th scope="col">Kunci</th>
            <th scope="col">Opsi A</th>
            <th scope="col">Opsi B</th>
            <th scope="col">Opsi C</th>
            <th scope="col">Opsi D</th>
            <th scope="col">Bobot</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($post as $pos)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pos->kode_soal }}</td>
            <td>{{ $pos->pertanyaan }}</td>
            <td>{{ $pos->image }}</td>
            <td>{{ $pos->kunci }}</td>
            <td>{{ $pos->opsi_a }}</td>
            <td>{{ $pos->opsi_b }}</td>
            <td>{{ $pos->opsi_c }}</td>
            <td>{{ $pos->opsi_d }}</td>
            <td>{{ $pos->bobot }}</td>
            <td>
              <a href="/{{ $title }}/{{ $pos->id }}" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
              <a href="/{{ $title }}/{{ $pos->id }}" class="badge bg-danger"><i class="bi bi-trash-fill"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
  </div>
</div>
@else
  <p class="text-center fs-4">Tidak Ada Data {{ $title }}</p>
@endif
<div class="d-flex justify-content-end">
  {{ $post->links() }}
</div>
@endsection