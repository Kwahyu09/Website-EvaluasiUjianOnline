@extends('layoutdashboard.main') @section('container')
<div class="card">
    <div class="card-body">
        <h5 class="mb-2">Data
            {{ $title }}
            Berdasarkan
            {{ $grup }}</h5>
        <div class="d-flex justify-content-start mb-3 mt-3">
            <a href="/soal/create/{{ $slug }}" class="btn btn-primary">Tambah Data <i class="bi bi-plus-circle"></i>
            </a>
        </div>
        @if ($post->count())
        <div class="d-flex justify-content-end mb-2">
            <div class="col-md-4">
                <form action="/soal/{{ $slug }}">
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
            <div class="col-12">
                @if(session()->has('success'))
                <div class="alert alert-success alert-block">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <a href="/dosen" style="text-decoration: none;">×</a>
                    </button>
                </div>
                @endif
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped" id="sortable-table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th>Kode Soal</th>
                                        <th>Pertanyaan</th>
                                        <th>Kunci</th>
                                        <th>Opsi A</th>
                                        <th>Opsi B</th>
                                        <th>Opsi C</th>
                                        <th>Opsi D</th>
                                        <th>Jawaban</th>
                                        <th>Bobot</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tr>
                                    @foreach ($post as $pos)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pos->kode_soal }}</td>
                                        <td>{{ $pos->pertanyaan }}</td>
                                        <td>{{ $pos->kunci }}</td>
                                        <td>{{ $pos->opsi_a }}</td>
                                        <td>{{ $pos->opsi_b }}</td>
                                        <td>{{ $pos->opsi_c }}</td>
                                        <td>{{ $pos->opsi_d }}</td>
                                        <td>{{ $pos->jawaban }}</td>
                                        <td>{{ $pos->bobot }}</td>
                                        <td>
                                            <div class="justify-content-start">
                                            <a
                                                href="/{{ $title }}/{{ $pos->id }}"
                                                class="btn btn-primary btn-action mr-1"
                                                data-toggle="tooltip"
                                                title="Ubah">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            </div>
                                            <div class="justify-content-end"></div>
                                            <a
                                                href="/{{ $title }}/{{ $pos->id }}"
                                                class="btn btn-danger btn-action"
                                                data-toggle="tooltip"
                                                title="Hapus"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <p class="text-center fs-4">Tidak Ada Data
                {{ $title }}</p>
            @endif
            <div class="d-flex justify-content-end"></div>
        </div>
    </div>
    @endsection