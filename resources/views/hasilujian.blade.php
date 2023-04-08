@extends('layoutdashboard.main')
@section('container') 
<div class = "card" > <div class="card-body">
    <div class="row align-items-center my-4">
        <div class="col">
            <button type="button" class="btn btn-info">
                <span class="fe fe-printer fe-12 mr-2"></span>Cetak</button>
        </div>
        <div class="col-auto">
            <form class="form-inline mr-auto searchform text-muted">
                <input
                    class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted"
                    type="search"
                    placeholder="Cari..."
                    aria-label="Search"></form>
            </div>
        </div>
        <br>
            <h4>Hasil Ujian mata pelajaran
            </h4>
            <h5>Kelas : 10
            </h5>
            <br>
                <!-- table -->
                <table class="table table-hover table-borderless border-v text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama Siswa</th>
                            <th>Skor Akhir</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="accordion-toggle collapsed"
                            id="c-2474"
                            data-toggle="collapse"
                            data-parent="#c-2474"
                            href="#collap-2474">
                            <td>1</td>
                            <td>78375189300728</td>
                            <td>Muhammad Riski</td>
                            <td>90</td>
                            <td>Lulus</td>
                        </tr>
                        <tr
                            class="accordion-toggle collapsed"
                            id="c-2474"
                            data-toggle="collapse"
                            data-parent="#c-2474"
                            href="#collap-2474">
                            <td>2</td>
                            <td>95289300754538</td>
                            <td>Mawar Puspita</td>
                            <td>95</td>
                            <td>Lulus</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection