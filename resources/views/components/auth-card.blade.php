<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>
    <div class="text-center mb-3">
        <h3 class="text-warning" style="font-weight: bold">Sistem Informasi Evaluasi Ujian</h3>
        <h5 class="text-warning" style="font-weight: bold">Fakultas Kedokteran dan Ilmu Kesehatan</h5>
    </div>

    {{-- <div class="card shadow-sm bg-white rounded">
        <div class="card-body">
            {{ $slot }}
        </div>
    </div> --}}
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
