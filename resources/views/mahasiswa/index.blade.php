@extends('layoutdashboard.main') @section('container')
<div class="card">
    <div class="card-body">
        <h5 class="mb-2">Kelas {{ $title }} {{ $kelas }}</h5>
        <div class="d-flex justify-content-start">
            <a href="/mahasiswa/create/{{ $kelas }}" class="btn btn-primary">
                <span class="fe fe-plus-circle fe-12 mr-2"></span>Tambah
            </a>
        </div>
        @if ($post->count())
        <div class="d-flex justify-content-end mb-2">
            <div class="col-md-4">
                <form action="/{{ $title }}">
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Cari.."
                            name="search"
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-success alert-block">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <a href="/{{ $title }}" style="text-decoration: none;">×</a>
                    </button>
                </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Usename</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $pos)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pos->nik }}</td>
                            <td>{{ $pos->nama }}</td>
                            <td>{{ $pos->username }}</td>
                            <td>{{ $pos->email }}</td>
                            <td>
                                <a
                                    href="/mahasiswa/{{ $pos->username }}/edit"
                                    class="btn btn-primary btn-action mr-1"
                                    data-toggle="tooltip"
                                    title="Ubah">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="/mahasiswa/{{ $pos->id }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-action" data-toggle="tooltip"
                                    title="Hapus" onclick="return confirm('Yakin Data Ini Dihapus ?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <p class="text-center fs-4">Tidak Ada Data
            {{ $title }}</p>
        @endif
    </div>
</div>
@endsection