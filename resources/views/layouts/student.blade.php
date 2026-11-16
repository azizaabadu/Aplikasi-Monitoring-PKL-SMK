<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'PKL.ID — Dashboard Siswa')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
  </style>
</head>
<body class="bg-[#F4F7FA] text-slate-800 antialiased">
  <div class="min-h-screen flex">

    <!-- INCLUDE SIDEBAR -->
    @include('layouts.partials.sidebar')

    <!-- MAIN WRAPPER -->
    <div class="flex-1 lg:pl-64 flex flex-col min-w-0">
      
      <!-- INCLUDE TOP HEADER -->
      @include('layouts.partials.header')

      <!-- KONTEN UTAMA HALAMAN -->
      <main class="p-4 sm:p-8 max-w-7xl w-full mx-auto space-y-6">
        @yield('content')
      </main>

    </div>
  </div>
</body>
</html>