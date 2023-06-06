@extends('layoutdashboard.main')
@section('container') 
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Data Ujian</h3>
                <div class="form-group">
                    <label for="nama_ujian">Nama Ujian : Ulangan Harian</label>
                    <br>
                        <label for="nama_ujian">Kelas : XII Nautika Kapal Penangkap Ikan</label>
                        <br>
                            <label for="nama_ujian">Tanggal : 2023-03-20</label>
                            <br>
                                <label for="nama_ujian">Waktu Mulai : 13:00:00</label>
                                <br>
                                    <label for="nama_ujian">Waktu Selesai : 14:00:00</label>
                                </div>
                                <div class="card-footer mr-3 mb-3 mt-0">
                                    <a href="/masuk-ujian" class="btn btn-primary float-right" type="submit">Mulai Ujian</a>
                                </div>
                                <!-- end section -->
                            </div>
                            <!-- .col-12 -->
                        </div>
                        <!-- .row -->
                    </div>
                </div>
@endsection