@extends('layoutdashboard.main') 
@section('container')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-2">Data Evaluasi Soal</h5>
                <label>{!! $datasoal->pertanyaan !!}</label>
                    <form action="">
                        <input type="hidden" class="label-input" value="{!! $datasoal->opsi_a !!}">
                        <input type="hidden" class="label-input" value="{!! $datasoal->opsi_b !!}">
                        <input type="hidden" class="label-input" value="{!! $datasoal->opsi_c !!}">
                        <input type="hidden" class="label-input" value="{!! $datasoal->opsi_d !!}">
                        <input type="hidden" class="data-input" value="{{ $opsia }}">
                        <input type="hidden" class="data-input" value="{{ $opsib }}">
                        <input type="hidden" class="data-input" value="{{ $opsic }}">
                        <input type="hidden" class="data-input" value="{{ $opsid }}">
                    </form>
                <h6 class="d-inline-flex">Jawaban :  {!! $datasoal->jawaban !!}</h6>
            </div>
        </div>
        <div>
            <canvas id="chartContainer" width="400" height="400"></canvas>
        </div>
        @if ($soal->count())
        <div class="row mt-3">
            <div class="col-12">
                <div class="flash-data" data-flashdata="{{ session('success') }}">
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped" id="sortable-table">
                                <thead>
                                <tr style="background-color: lightslategray;">
                                    <th style="width: 50px">No</th>
                                    <th>Npm Mahasiswa</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Jawaban</th>
                                    <th>Skor</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($soal as $s)
                                    <tr>
                                        <td style="width: 50px">{{ $loop->iteration }}</td>
                                        <td>{{ $s->npm_mahasiswa }}</td>
                                        <td>{{ $s->nama_mahasiswa }}</td>
                                        <td>{!! $s->jawaban !!}</td>
                                        <td>{{ $s->skor }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
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
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
      var ctx = document.getElementById("chartContainer").getContext("2d");

      // Mengambil elemen input type hidden untuk data dan label
      var dataInputs = document.getElementsByClassName("data-input");
      var labelInputs = document.getElementsByClassName("label-input");

      // Mendapatkan data dan label dari input type hidden
      var data = [];
      var labels = [];

      for (var i = 0; i < dataInputs.length; i++) {
        data.push(dataInputs[i].value);
        labels.push(labelInputs[i].getAttribute("value"));
      }

      // Membuat objek diagram batang
      var barChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: labels,
          datasets: [{
            data: data,
            backgroundColor: "rgba(0, 123, 255, 0.5)",
            borderColor: "rgba(0, 123, 255, 1)",
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
  </script>
@endsection