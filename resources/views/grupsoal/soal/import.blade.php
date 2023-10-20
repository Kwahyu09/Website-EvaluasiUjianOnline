@extends('layoutdashboard.main')
@section('container')
<div class="card">
    <div class="card-body">
        <h4 class="mt-3 mb-3">Import Data {{ $title }}</h4>
        <form method="post" action="/soal/import_excel" enctype="multipart/form-data">
            @csrf
            <label>Pilih file excel</label>
            <div class="form-group">
                <div class="mb-3">
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="file" required>
                </div>
            </div>
                <div class="d-flex justify-content-start mb-3">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
                <label>Berikut contoh Format kolom pada exel</label><br>
                <label>Catatan:</label><br>
                <label>1. nilai Grup_Soal_id yang mau diimport harus sama dengan Grup_Soal_Id yang ditampilkan di tabel ini</label><br>
                <label>2. Slug tidak boleh sama dengan data slug yang lain/ bersifat unik minimal 3 dan maksimal 8 karakter</label><br>
                <label>3. Kolom diexel harus berformat seperti tabel berikut, Misal Kolom A pada exel berisi slug dan seterusnya</label>
                <div class="table-responsive">
                <table class="table table-striped" id="sortable-table">
                    <thead>
                        <tr>
                            <th>Slug</th>
                            <th>Grup_Soal_Id</th>
                            <th>Pertanyaan</th>
                            <th>Opsi A</th>
                            <th>Opsi B</th>
                            <th>Opsi C</th>
                            <th>Opsi D</th>
                            <th>Opsi E</th>
                            <th>Jawaban</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>i5jn27d</td>
                            <td>{{ $grupsoal_id }}</td>
                            <td>Etika berasal dari Bahasa Yunani, yaitu</td>
                            <td>Ethus</td>
                            <td>Ethas</td>
                            <td>Ethis</td>
                            <td>Ethos</td>
                            <td>Ethes</td>
                            <td>Ethos</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </form>
    </div>
@endsection