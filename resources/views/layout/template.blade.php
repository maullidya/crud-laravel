<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaduan</title>
  </head>
  <body class="bg-light">
    <main class="container">
{{-- @include('komponen.pesan') --}}
@include ('layout.header')
@yield('konten')
@include ('layout.sidebar')
@include ('layout.footer')

    </main>
  </body>
</html>