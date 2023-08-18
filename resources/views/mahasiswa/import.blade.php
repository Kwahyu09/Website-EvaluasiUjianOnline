@extends('layoutdashboard.main')
@section('container')
<div class="card">
    <div class="card-body">
        <h4 class="mt-3 mb-3">Import Data {{ $title }}</h4>
        <form method="post" action="/mahasiswa/import_excel" enctype="multipart/form-data">
            @csrf
            <label>Pilih file excel</label>
            <div class="flash-data" data-flashdata="{{ session('success') }}">
            </div>
            <div class="form-group">
                <input type="file" name="file" required="required"></div>
                <div class="d-flex justify-content-start mb-3">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
                <label>Berikut contoh Format kolom pada exel</label><br>
                <label>Catatan:</label><br>
                <label>1. kelas_id yang mau diimport harus sama dengan kelas_id yang ditampilkan di tabel ini</label><br>
                <label> 2. role yang diisi harus : <b>Mahasiswa</b></label><br>
                <label> 3. Kolom diexel harus berformat seperti tabel berikut, Misal Kolom A pada exel berisi nilai kelas id dan seterusnya</label>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">kelas_id</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Usename</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $kelas_id }}</td>
                            <td>G1A020089</td>
                            <td>Mawar Melati</td>
                            <td>mawaar123</td>
                            <td>Mahasiswa</td>
                            <td>mawar@gmail.com</td>
                            <td>password</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
@endsection