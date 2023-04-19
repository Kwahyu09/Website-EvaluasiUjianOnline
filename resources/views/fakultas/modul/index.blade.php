@extends('layoutdashboard.main') @section('container')
<div class="card">
    <div class="card-body">
        <h5 class="mb-2">Data
            {{ $title }}</h5>
        <div class="d-flex justify-content-start">
            <a href="/modul/create" class="btn btn-primary">Tambah Data
                <i class="bi bi-plus-circle"></i>
            </a>
        </div>
        @if ($post->count())
        <div class="d-flex justify-content-end mb-2">
            <div class="col-md-4">
                <form action="/modul">
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
                        <a href="/modul" style="text-decoration: none;">×</a>
                    </button>
                </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Modul</th>
                            <th scope="col">Nama Modul</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Sks</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $pos)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pos->kd_modul }}</td>
                            <td>{{ $pos->nama_modul }}</td>
                            <td>{{ $pos->semester }}</td>
                            <td>{{ $pos->sks }}</td>
                            <td>
                                <a
                                    href="/{{ $title }}/{{ $pos->id }}"
                                    class="btn btn-primary btn-action mr-1"
                                    data-toggle="tooltip"
                                    title="Ubah">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a
                                    href="/{{ $title }}/{{ $pos->id }}"
                                    class="btn btn-danger btn-action"
                                    data-toggle="tooltip"
                                    title="Hapus"
                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                    data-confirm-yes="alert('Deleted')">
                                    <i class="fas fa-trash"></i>
                                </a>
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
        <div class="d-flex justify-content-end">
            {{ $post->links() }}
        </div>
    </div>
</div>
@endsection