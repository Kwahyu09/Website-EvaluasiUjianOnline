@extends('layoutdashboard.main')
@section('container')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Data {{ $title }} {{ $nama_grup }}</h4>
                  </div>
                  <form action="/soal/store" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-4">
                                        <div class="col-md-2">
                                            <input type="hidden" name="kd_soal" id="kd_soal" value="{{ $kd_soal }}">
                                            <input type="hidden" name="slug" id="slug" value="{{ $kd_soal }}">
                                            <input type="hidden" name="grupsoal_id" id="grupsoal_id" value="{{ $grupsoal_id }}">
                                            <h5 class="card-title">Pertanyaan</h5>
                                        </div>
                                        <div class="col-md-10 mb-4">
                                            <input id="pertanyaan" type="hidden" name="pertanyaan">
                                            <trix-editor input="pertanyaan"></trix-editor>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Opsi A</h5>
                                        </div>
                                        <div class="col-md-10 mb-4">
                                            <input id="opsi_a" type="hidden" name="opsi_a">
                                            <trix-editor input="opsi_a"></trix-editor>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Opsi B</h5>
                                        </div>
                                        <div class="col-md-10 mb-4">
                                            <input id="opsi_b" type="hidden" name="opsi_b">
                                            <trix-editor input="opsi_b"></trix-editor>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Opsi C</h5>
                                        </div>
                                        <div class="col-md-10 mb-4">
                                            <input id="opsi_c" type="hidden" name="opsi_c">
                                            <trix-editor input="opsi_c"></trix-editor>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Opsi D</h5>
                                        </div>
                                        <div class="col-md-10 mb-2">
                                            <input id="opsi_d" type="hidden" name="opsi_d">
                                            <trix-editor input="opsi_d"></trix-editor>
                                        </div>
                                    </div>
                        <div class="row mb-4">
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Jawaban</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="custom-select" id="jawaban" name="jawaban">
                                            <option value="opsi_a">Opsi A</option>
                                            <option value="opsi_b">Opsi B</option>
                                            <option value="opsi_c">Opsi C</option>
                                            <option value="opsi_d">Opsi D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Bobot</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" value="{{ old('bobot') }}" required>
                                            <?php
                                            for ($i = 1; $i <= 100; $i++){
                                            ?><option value="<?= $i ?>"><?= $i ?></option>
                                            <?php
                                                }
                                            ?>
                                            </select>
                                            @error('bobot')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end section -->
                                    <div class="card-footer mr-3 mb-3 mt-0">
                                        <button class="btn btn-primary float-right" type="submit">Tambah</button>
                                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script>
    const nama_modul = document.querySelector('#nama_modul');
    const nama_grup = document.querySelector('#nama_grup');
    const slug_modul = document.querySelector('#slug_modul');
    const slug = document.querySelector('#slug');
    
    nama_grup.addEventListener('change', function(){
        fetch('/grupsoal/create/'+ slug_modul.value +'/checkSlug?nama_grup=' + nama_grup.value+ ' ' +nama_modul.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection