@extends('layoutdashboard.main')
@section('container')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Data {{ $title }}</h4>
                  </div>
                  <form action="{{ route('dosen.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="hidden" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug') }}">
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" required value="{{ old('nip') }}">
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group">
                            <label for="nama_dos">Nama</label>
                            <input type="text" name="nama_dos" class="form-control @error('nama_dos') is-invalid @enderror" id="nama_dos" required value="{{ old('nama_dos') }}">
                            @error('nama_dos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <select class="custom-select @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" required value="{{ old('jabatan') }}">
                                            <option value="Asisten Ahli">Asisten Ahli</option>
                                            <option value="Lektor">Lektor</option>
                                            <option value="Lektor Kepala">Lektor Kepala</option>
                                            <option value="Guru Besar/Profesor">Guru Besar/Profesor</option>
                                            <option value="">Null</option>
                                        </select>
                                    @error('jabatan')
                                    <div class="invalid-feedback">
                                            {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="gol_regu">Golongan Regu</label>
                                        <select class="custom-select @error('gol_regu') is-invalid @enderror" id="gol_regu" name="gol_regu" required value="{{ old('gol_regu') }}">
                                        <option value="III/a">III/a</option>
                                        <option value="III/b">III/b</option>
                                        <option value="III/c">III/c</option>
                                        <option value="III/d">III/d</option>
                                        <option value="IV/a">IV/a</option>
                                        <option value="IV/b">IV/b</option>
                                        <option value="IV/c">IV/c</option>
                                        <option value="IV/d">IV/d</option>
                                        <option value="IV/e">IV/e</option>
                                        </select>
                                    @error('jabatan')
                                    <div class="invalid-feedback">
                                            {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin : </label>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kel" id="jenis_kel" value="Laki-Laki">
                                <label class="form-check-label" for="jenis_kel">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kel" id="jenis_kel" value="Perempuan">
                                <label class="form-check-label" for="jenis_kel">Perempuan</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="prodi">Prodi</label>
                                    <input type="prodi" name="prodi" class="form-control  @error('prodi') is-invalid @enderror" id="prodi" required>
                                    @error('prodi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            </div>
                            <div class="card-footer mr-3 mb-3 mt-0">
                                <button class="btn btn-primary float-right" type="submit">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<script>
    const nama_dos = document.querySelector('#nama_dos');
    const slug = document.querySelector('#slug');

    nama_dos.addEventListener('change', function(){
        fetch('/dosen/create/checkSlug?nama_dos=' + nama_dos.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection