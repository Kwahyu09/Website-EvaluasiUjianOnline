@extends('layoutdashboard.main')
@section('container')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Ubah Data {{ $title }}</h4>
                  </div>
                  <form action="/soal/{{ $post->slug }}/update" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="row mb-4">
                                        <input type="hidden" name="kode_soal" id="kode_soal" value="{{ $post->kode_soal }}">
                                        <input type="hidden" name="slug" id="slug" value="{{ $post->slug }}">
                                        <input type="hidden" name="grup_soal_id" id="grup_soal_id" value="{{ $post->grup_soal_id }}">
                                        <div class="col-md-2">
                                            <h5 class="card-title">Pertanyaan</h5>
                                        </div>
                                        <div class="col-md-10 mb-4">
                                            @error('pertanyaan')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input id="pertanyaan" type="hidden" name="pertanyaan" value="{{ old('pertanyaan',$post->pertanyaan) }}">
                                            <trix-editor input="pertanyaan"></trix-editor>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Opsi A</h5>
                                        </div>
                                        <div class="col-md-10 mb-4">
                                            @error('opsi_a')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input id="opsi_a" type="hidden" name="opsi_a" value="{{ old('opsi_a',$post->opsi_a) }}">
                                            <trix-editor input="opsi_a"></trix-editor>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Opsi B</h5>
                                        </div>
                                        <div class="col-md-10 mb-4">
                                            @error('opsi_b')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input id="opsi_b" type="hidden" name="opsi_b" value="{{ old('opsi_b',$post->opsi_b) }}">
                                            <trix-editor input="opsi_b"></trix-editor>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Opsi C</h5>
                                        </div>
                                        <div class="col-md-10 mb-4">
                                            @error('opsi_c')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input id="opsi_c" type="hidden" name="opsi_c" value="{{ old('opsi_c',$post->opsi_c) }}">
                                            <trix-editor input="opsi_c"></trix-editor>
                                        </div>
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Opsi D</h5>
                                        </div>
                                        <div class="col-md-10 mb-2">
                                            @error('opsi_d')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input id="opsi_d" type="hidden" name="opsi_d" value="{{ old('opsi_d',$post->opsi_d) }}">
                                            <trix-editor input="opsi_d"></trix-editor>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Jawaban</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="custom-select" id="jawaban" name="jawaban">
                                                @if($post->jawaban ==  $post->opsi_a)
                                                    <option value="opsi_a" selected>Opsi A</option>
                                                    <option value="opsi_b">Opsi B</option>
                                                    <option value="opsi_c">Opsi C</option>
                                                    <option value="opsi_d">Opsi D</option>
                                                @elseif($post->jawaban ==  $post->opsi_b))
                                                    <option value="opsi_a">Opsi A</option>
                                                    <option value="opsi_b" selected>Opsi B</option>
                                                    <option value="opsi_c">Opsi C</option>
                                                    <option value="opsi_d">Opsi D</option>
                                                @elseif($post->jawaban ==  $post->opsi_c)
                                                    <option value="opsi_a">Opsi A</option>
                                                    <option value="opsi_b">Opsi B</option>
                                                    <option value="opsi_c" selected>Opsi C</option>
                                                    <option value="opsi_d">Opsi D</option>
                                                @elseif($post->jawaban ==  $post->opsi_d)
                                                    <option value="opsi_a">Opsi A</option>
                                                    <option value="opsi_b">Opsi B</option>
                                                    <option value="opsi_c">Opsi C</option>
                                                    <option value="opsi_d" selected>Opsi D</option>
                                                @else
                                                    <option value="opsi_a">Opsi A</option>
                                                    <option value="opsi_b">Opsi B</option>
                                                    <option value="opsi_c">Opsi C</option>
                                                    <option value="opsi_d">Opsi D</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-2">
                                            <h5 class="card-title mt-2">Bobot</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="custom-select @error('bobot') is-invalid @enderror" id="bobot" name="bobot" value="{{ old('bobot') }}" required>
                                            <?php
                                            for ($i = 1; $i <= 100; $i++){ ?>
                                                @if(old('bobot',$post->bobot)  == $i )
                                                    <option value="<?= $i ?>" selected><?= $i ?></option>
                                                @else
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                @endif
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
                                        <button class="btn btn-primary float-right" type="submit">Ubah</button>
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