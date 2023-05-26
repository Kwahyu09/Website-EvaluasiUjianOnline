<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="{{ asset('backend/assets/img/logounib.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  {{-- Trik EDITOR --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style>

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('backend/js', new Date());

    gtag('config', 'UA-94034622-3');
    </script>

    <title>evaluasi-ujian | {{ $title }}</title>
</head>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
          @include('partial.navbar')
          <div class="main-sidebar sidebar-style-2">
            @include('partial.sidebare')
          </div>

          <!-- Main Content -->
          <div class="main-content">
            <section class="section">
              <div class="section-header">
                <h3>Fakultas Kedokteran dan Ilmu Kesehatan UNIB</h3>
              </div>
                <div class="container">
                    @yield('container')
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
      <!-- General JS Scripts -->
      <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
      <script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
      <script src="{{ asset('backend/assets/modules/tooltip.js') }}"></script>
      <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
      <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
      <script src="{{ asset('backend/assets/js/stisla.js') }}"></script>
      <!-- Page Specific JS File -->
      <script src="{{ asset('backend/assets/js/page/index-0.js') }}"></script>
      <!-- Template JS File -->
      <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
      <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    </body>
    </html>