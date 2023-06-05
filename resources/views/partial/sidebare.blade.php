<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <img src="{{ asset('backend/assets/img/logounib.png') }}" width="50"><br><h6>FKIK UNIB</h6>
      <a href="/">Evaluasi Ujian</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/">Eval</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Menu</li>
      <li class="{{ Request::is('/') ? 'active' : '' }}">
        <a href="/" class="nav-link"><i class="fas fa-fire"></i><span>Home</span></a>
      </li>
      @if (Auth::user()->role == 'Admin')
      <li class="{{ Request::is('staff*') || Request::is('ketua*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manajemen Akun</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link " href="/staff">Staff</a></li>
          <li><a class="nav-link" href="/ketua">Ketua</a></li>
        </ul>
      </li>
      @endif
      @if(Auth::user()->role == 'Staf')
      <li class="{{ Request::is('staff*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manajemen Akun</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/ketua">Ketua</a></li>
        </ul>
      </li>
      @endif
      @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Staf')
    <li class="{{ Request::is('dosen*') ||Request::is('kelas*') || Request::is('mahasiswa*') || Request::is('modul*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Fakultas</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/dosen">Dosen</a></li>
          <li><a class="nav-link" href="/kelas">Kelas</a></li>
          <li><a class="nav-link" href="/kelasmahasiswa">Mahasiswa</a></li>
          <li><a class="nav-link" href="/modul">Modul</a></li>
        </ul>
    </li>
      @endif
      @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Ketua')
      <li class="{{ Request::is('grupsoal*') || Request::is('grupsoal2*') || Request::is('soal*') ? 'active' : '' }}">
        <a href="/grupsoal"  data-toggle="nav-link"><i class="far fa-file"></i><span>Soal</span></a>
    </li>
    <li class="{{ Request::is('ujian*') ? 'active' : '' }}">
        <a href="/ujian"  data-toggle="nav-link"><i class="far fa-file"></i> <span>Ujian</span></a>
    </li>
    <li class="{{ Request::is('hasilujian*') ? 'active' : '' }}">
        <a href="/hasilujian"  data-toggle="nav-link"><i class="far fa-file"></i> <span>Hasil Ujian</span></a>
    </li>
    <li class="{{ Request::is('evaluasi*') ? 'active' : '' }}">
        <a href="/evaluasis"  data-toggle="nav-link"><i class="far fa-file"></i><span>Evaluasi</span></a>
    </li>
      @endif
    </ul>
  </aside>