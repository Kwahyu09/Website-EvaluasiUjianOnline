@extends('layoutdashboard.main')
@section('container')
<h5 class="mb-2">Data {{ $title }}</h5>
<div class="d-flex justify-content-start">
  <a href="/ujian/create" class="btn btn-primary">Tambah Data <i class="bi bi-plus-circle"></i></a>
</div>
@if ($post->count())
<div class="d-flex justify-content-end mb-2">
  <div class="col-md-4">
    <form action="/ujian">
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
  <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode Ujian</th>
          <th scope="col">Nama Ujian</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Waktu Mulai</th>
          <th scope="col">Waktu Selesai</th>
          <th scope="col">Nama Modul</th>
          <th scope="col">Nama Kelas</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($post as $pos)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pos->kd_ujian }}</td>
          <td>{{ $pos->nama_ujian }}</td>
          <td>{{ $pos->tanggal }}</td>
          <td>{{ $pos->waktu_mulai }}</td>
          <td>{{ $pos->waktu_selesai }}</td>
          <td>{{ $pos->modul->nama_modul }}</td>
          <td>{{ $pos->kelas->nama_kelas }}</td>
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