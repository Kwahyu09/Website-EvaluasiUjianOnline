<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>
    <div class="text-center mb-3">
        <h3 style="font-weight: bold; color: yellow; text-shadow: 1px 1px 2px rgba(252, 2, 2, 0.8)">Sistem Informasi Evaluasi Ujian</h3>
        <h5 style="font-weight: bold; color: yellow; text-shadow: 1px 1px 2px rgba(252, 2, 2, 0.8);">Fakultas Kedokteran dan Ilmu Kesehatan</h5>
        <h5 style="font-weight: bold; color: yellow; text-shadow: 1px 1px 2px rgba(252, 2, 2, 0.8);">Universitas Bengkulu</h5>
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
