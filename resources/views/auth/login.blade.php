<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk · {{ config('app.name', 'Monitoring PKL SMK') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <main class="mx-auto flex min-h-screen w-full max-w-md items-center px-5 py-12">
        <section class="w-full rounded-2xl bg-white p-8 shadow-xl shadow-slate-900/5">
            <div class="mb-8 space-y-2">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-indigo-600">Monitoring PKL SMK</p>
                <h1 class="text-3xl font-bold tracking-tight">Masuk ke akun</h1>
                <p class="text-sm leading-6 text-slate-600">Gunakan username dan kata sandi yang diberikan administrator.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800" role="alert">
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                @csrf
                <div class="space-y-2">
                    <label for="username" class="text-sm font-medium text-slate-700">Username</label>
                    <input id="username" name="username" type="text" value="{{ old('username') }}" required autofocus autocomplete="username"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/15">
                </div>

                <div class="space-y-2">
                    <label for="password" class="text-sm font-medium text-slate-700">Kata sandi</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/15">
                </div>

                <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" name="remember" value="1" class="size-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                    Ingat saya
                </label>

                <button type="submit" class="w-full rounded-lg bg-indigo-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/25">
                    Masuk
                </button>
            </form>
        </section>
    </main>
</body>
</html>
