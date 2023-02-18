@extends('layoutdashboard.main')
@section('container')
<div class="card">
  <div class="card-body">
    <h5 class="mb-2">Data {{ $title }}</h5>
    <div class="d-flex justify-content-start">
      <a href="/kelas/create" class="btn btn-primary">Tambah Data <i class="bi bi-plus-circle"></i></a>
    </div>
    @if ($post->count())
    <div class="d-flex justify-content-end mb-2">
      <div class="col-md-4">
          <form action="/kelas">
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
        <div class="col">
        @if(session()->has('success'))
          <div class="alert alert-success alert-block">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert"><a href="/kelas" style="text-decoration: none;">×</a></button>
          </div>
        @endif
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Tahun AJaran</th>
                <th scope="col">Prodi</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($post as $pos)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pos->nama_kelas }}</td>
                <td>{{ $pos->tahun_ajaran }}</td>
                <td>{{ $pos->jurusan }}</td>
                <td>
                  <a href="{{ route('kelas.edit', $pos->id) }}" class="badge bg-warning d-inline"><i class="bi bi-pencil-square"></i></a>
                  <form action="/kelas/{kelas}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Apakah Kamu Ingin Menghapus Data Ini?')" type="submit"><i class="bi bi-trash-fill"></i></button>
                  </form>
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
    </div>
  </div>
@endsection
