<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Siswa - E-Ekstrakurikuler SMAN 5 Cirebon</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    {{-- ================= NAVBAR ================= --}}
    <nav class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                {{-- Logo --}}
                <a href="/" class="flex items-center gap-3">
                    <img
                        src="{{ asset('images/logo-sman5.png') }}"
                        alt="Logo SMAN 5 Cirebon"
                        class="w-12 h-12 object-contain"
                    >

                    <div>
                        <h1 class="font-extrabold text-slate-900 text-lg">
                            E-Ekstrakurikuler
                        </h1>

                        <p class="text-xs text-slate-500">
                            SMAN 5 Cirebon
                        </p>
                    </div>
                </a>

                {{-- User --}}
                <div class="flex items-center gap-4">

                    <div class="hidden sm:block text-right">
                        <p class="text-sm font-bold text-slate-800">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs text-slate-500">
                            Siswa
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="hidden sm:block px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-slate-100 transition"
                        >
                            Logout
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </nav>


    {{-- ================= CONTENT ================= --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-8 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-green-100 flex items-center justify-center">
                        ✓
                    </div>

                    <div>
                        <p class="font-bold">Berhasil</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-8 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-700">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-red-100 flex items-center justify-center">
                        !
                    </div>

                    <div>
                        <p class="font-bold">Perhatian</p>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif


        {{-- ================= HERO ================= --}}
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-600 text-white p-8 md:p-10 mb-10">

            <div class="relative z-10 max-w-3xl">

                <p class="text-blue-100 font-semibold text-sm mb-2">
                    DASHBOARD SISWA
                </p>

                <h2 class="text-3xl md:text-4xl font-extrabold leading-tight">
                    Halo, {{ Auth::user()->name }}! 👋
                </h2>

                <p class="mt-4 text-blue-100 max-w-2xl leading-relaxed">
                    Selamat datang di portal E-Ekstrakurikuler SMAN 5 Cirebon.
                    Pilih kegiatan ekstrakurikuler yang sesuai dengan minat dan bakat kamu.
                </p>

            </div>

            {{-- Decorative --}}
            <div class="absolute -right-20 -top-20 w-72 h-72 bg-white/10 rounded-full"></div>
            <div class="absolute -right-10 -bottom-32 w-80 h-80 bg-white/10 rounded-full"></div>

        </section>


        {{-- ================= DATA SISWA ================= --}}
        <section class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10">

            {{-- Nama --}}
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500 mb-2">
                    Nama Siswa
                </p>

                <p class="font-bold text-lg text-slate-800">
                    {{ Auth::user()->name }}
                </p>
            </div>

            {{-- NIS --}}
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500 mb-2">
                    NIS
                </p>

                <p class="font-bold text-lg text-slate-800">
                    {{ Auth::user()->nis ?? '-' }}
                </p>
            </div>

            {{-- Email --}}
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500 mb-2">
                    Email
                </p>

                <p class="font-bold text-lg text-slate-800 break-all">
                    {{ Auth::user()->email }}
                </p>
            </div>

        </section>


        {{-- ================= STATISTIK ================= --}}
        @php
            $totalRegistrations = $myRegistrations->count();

            $acceptedRegistrations = $myRegistrations
                ->where('status', 'Diterima')
                ->count();

            $pendingRegistrations = $myRegistrations
                ->where('status', 'Pending')
                ->count();

            $rejectedRegistrations = $myRegistrations
                ->where('status', 'Ditolak')
                ->count();
        @endphp

        <section class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">

            {{-- Total --}}
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-sm text-slate-500">
                    Total Pendaftaran
                </p>

                <p class="text-3xl font-extrabold text-blue-600 mt-2">
                    {{ $totalRegistrations }}
                </p>
            </div>

            {{-- Diterima --}}
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-sm text-slate-500">
                    Diterima
                </p>

                <p class="text-3xl font-extrabold text-green-600 mt-2">
                    {{ $acceptedRegistrations }}
                </p>
            </div>

            {{-- Pending --}}
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-sm text-slate-500">
                    Menunggu
                </p>

                <p class="text-3xl font-extrabold text-yellow-500 mt-2">
                    {{ $pendingRegistrations }}
                </p>
            </div>

            {{-- Ditolak --}}
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-sm text-slate-500">
                    Ditolak
                </p>

                <p class="text-3xl font-extrabold text-red-500 mt-2">
                    {{ $rejectedRegistrations }}
                </p>
            </div>

        </section>


        {{-- ================= RIWAYAT PENDAFTARAN ================= --}}
        <section class="mb-12">

            <div class="flex items-center justify-between mb-5">
                <div>
                    <p class="text-sm font-semibold text-blue-600">
                        RIWAYAT
                    </p>

                    <h3 class="text-2xl font-extrabold text-slate-900">
                        Pendaftaran Saya
                    </h3>
                </div>
            </div>

            @if ($myRegistrations->count() > 0)

                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">

                    <div class="overflow-x-auto">

                        <table class="w-full text-sm">

                            <thead class="bg-slate-50 border-b border-slate-200">

                                <tr>
                                    <th class="text-left px-6 py-4 font-bold text-slate-600">
                                        Ekstrakurikuler
                                    </th>

                                    <th class="text-left px-6 py-4 font-bold text-slate-600">
                                        Jadwal
                                    </th>

                                    <th class="text-left px-6 py-4 font-bold text-slate-600">
                                        Status
                                    </th>
                                </tr>

                            </thead>

                            <tbody class="divide-y divide-slate-100">

                                @foreach ($myRegistrations as $registration)

                                    <tr class="hover:bg-slate-50 transition">

                                        <td class="px-6 py-4">
                                            <p class="font-bold text-slate-800">
                                                {{ $registration->extracurricular->name }}
                                            </p>
                                        </td>

                                        <td class="px-6 py-4 text-slate-500">
                                            {{ $registration->extracurricular->schedule }}
                                        </td>

                                        <td class="px-6 py-4">

                                            @if ($registration->status === 'Diterima')

                                                <span class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold">
                                                    Diterima
                                                </span>

                                            @elseif ($registration->status === 'Ditolak')

                                                <span class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold">
                                                    Ditolak
                                                </span>

                                            @else

                                                <span class="inline-flex px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold">
                                                    Pending
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            @else

                <div class="bg-white border border-dashed border-slate-300 rounded-2xl p-10 text-center">

                    <div class="text-4xl mb-3">
                        📚
                    </div>

                    <h4 class="font-bold text-lg text-slate-800">
                        Belum ada pendaftaran
                    </h4>

                    <p class="text-sm text-slate-500 mt-1">
                        Silakan pilih ekstrakurikuler yang ingin kamu ikuti.
                    </p>

                </div>

            @endif

        </section>


        {{-- ================= EKSTRAKURIKULER ================= --}}
        <section>

            <div class="mb-6">

                <p class="text-sm font-semibold text-blue-600">
                    PILIHAN KEGIATAN
                </p>

                <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900">
                    Ekstrakurikuler
                </h3>

                <p class="text-slate-500 mt-2">
                    Pilih kegiatan yang sesuai dengan minat dan bakat kamu.
                </p>

            </div>


            @if ($extracurriculars->count() > 0)

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach ($extracurriculars as $extracurricular)

                        @php
                            $acceptedCount = $extracurricular->registrations()
                                ->where('status', 'Diterima')
                                ->count();

                            $isFull = $acceptedCount >= $extracurricular->quota;

                            $alreadyRegistered = $myRegistrations
                                ->where('extracurricular_id', $extracurricular->id)
                                ->count() > 0;
                        @endphp


                        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden hover:shadow-lg transition duration-300">

                            {{-- Card Header --}}
                            <div class="bg-gradient-to-br from-blue-600 to-indigo-600 p-6 text-white">

                                <div class="flex items-start justify-between gap-4">

                                    <div>

                                        <p class="text-blue-100 text-xs font-semibold uppercase tracking-wider">
                                            Ekstrakurikuler
                                        </p>

                                        <h4 class="text-2xl font-extrabold mt-1">
                                            {{ $extracurricular->name }}
                                        </h4>

                                    </div>

                                    <div class="w-12 h-12 rounded-2xl bg-white/15 flex items-center justify-center text-2xl">
                                        🎯
                                    </div>

                                </div>

                            </div>


                            {{-- Card Content --}}
                            <div class="p-6">

                                {{-- Deskripsi --}}
                                <p class="text-sm text-slate-600 leading-relaxed min-h-[70px]">
                                    {{ $extracurricular->description }}
                                </p>


                                {{-- Jadwal --}}
                                <div class="mt-5 flex items-start gap-3">

                                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                                        🗓
                                    </div>

                                    <div>
                                        <p class="text-xs text-slate-400">
                                            Jadwal
                                        </p>

                                        <p class="text-sm font-semibold text-slate-700">
                                            {{ $extracurricular->schedule }}
                                        </p>
                                    </div>

                                </div>


                                {{-- Kuota --}}
                                <div class="mt-4 flex items-start gap-3">

                                    <div class="w-9 h-9 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">
                                        👥
                                    </div>

                                    <div class="flex-1">

                                        <p class="text-xs text-slate-400">
                                            Kuota Pendaftar
                                        </p>

                                        <div class="flex items-center justify-between gap-3">

                                            <p class="text-sm font-bold
                                                {{ $isFull ? 'text-red-600' : 'text-slate-700' }}">
                                                {{ $acceptedCount }} / {{ $extracurricular->quota }} siswa
                                            </p>

                                            @if ($isFull)

                                                <span class="text-xs font-bold text-red-600">
                                                    PENUH
                                                </span>

                                            @else

                                                <span class="text-xs font-semibold text-green-600">
                                                    Tersedia
                                                </span>

                                            @endif

                                        </div>


                                        {{-- Progress Bar --}}
                                        <div class="mt-2 w-full h-2 bg-slate-100 rounded-full overflow-hidden">

                                            @php
                                                $percentage = $extracurricular->quota > 0
                                                    ? min(100, ($acceptedCount / $extracurricular->quota) * 100)
                                                    : 100;
                                            @endphp

                                            <div
                                                class="h-full rounded-full
                                                {{ $isFull ? 'bg-red-500' : 'bg-blue-600' }}"
                                                style="width: {{ $percentage }}%"
                                            ></div>

                                        </div>

                                    </div>

                                </div>


                                {{-- Tombol --}}
                                <div class="mt-6">

                                    @if ($alreadyRegistered)

                                        <button
                                            type="button"
                                            disabled
                                            class="w-full py-3 rounded-xl bg-slate-100 text-slate-400 font-bold cursor-not-allowed"
                                        >
                                            ✓ Sudah Terdaftar
                                        </button>

                                    @elseif ($isFull)

                                        <button
                                            type="button"
                                            disabled
                                            class="w-full py-3 rounded-xl bg-red-50 text-red-500 font-bold cursor-not-allowed"
                                        >
                                            Kuota Penuh
                                        </button>

                                    @else

                                        <form
                                            method="POST"
                                            action="{{ route('daftar.ekskul', $extracurricular->id) }}"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold transition shadow-sm hover:shadow-md"
                                            >
                                                Daftar Sekarang
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-10 text-center">

                    <div class="text-4xl mb-3">
                        📋
                    </div>

                    <h4 class="font-bold text-lg text-slate-800">
                        Belum ada ekstrakurikuler
                    </h4>

                    <p class="text-sm text-slate-500 mt-1">
                        Data ekstrakurikuler belum tersedia.
                    </p>

                </div>

            @endif

        </section>

    </main>


    {{-- ================= FOOTER ================= --}}
    <footer class="mt-16 border-t border-slate-200 bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <div class="flex flex-col md:flex-row items-center justify-between gap-4">

                <div class="flex items-center gap-3">

                    <img
                        src="{{ asset('images/logo-sman5.png') }}"
                        alt="Logo SMAN 5 Cirebon"
                        class="w-10 h-10 object-contain"
                    >

                    <div>
                        <p class="font-bold text-slate-800">
                            SMAN 5 Cirebon
                        </p>

                        <p class="text-xs text-slate-500">
                            E-Ekstrakurikuler
                        </p>
                    </div>

                </div>

                <p class="text-sm text-slate-500 text-center">
                    © {{ date('Y') }} SMAN 5 Cirebon. E-Ekstrakurikuler.
                </p>

            </div>

        </div>

    </footer>

</body>
</html>