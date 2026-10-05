<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Absensi - {{ $extracurricular->name }} | Admin - SMA Negeri 5 Cirebon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f8ff;
            color: #173574;
        }
        .main-gradient {
            background:
                radial-gradient(circle at 95% 5%, rgba(124,92,255,.10), transparent 28%),
                radial-gradient(circle at 5% 25%, rgba(38,145,255,.08), transparent 30%);
        }
        .hero-gradient {
            background:
                radial-gradient(circle at 85% 20%, rgba(170,150,255,.28), transparent 32%),
                linear-gradient(115deg, #e4f6ff 0%, #e5efff 45%, #eee8ff 100%);
        }
        .button-gradient {
            background: linear-gradient(135deg, #3478ee 0%, #6250e8 100%);
        }
        .button-gradient:hover {
            background: linear-gradient(135deg, #2869dc 0%, #5342d4 100%);
        }
        .soft-shadow {
            box-shadow: 0 12px 35px rgba(36,72,135,.07);
        }
        .hero-shadow {
            box-shadow: 0 14px 35px rgba(63,106,190,.08);
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="text-[#173574] main-gradient min-h-screen">

    <div class="max-w-6xl mx-auto p-5 lg:p-8">

        <!-- Tombol Kembali -->
        <div class="mb-5">
            <a href="{{ route('admin.extracurriculars.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-[#7183a5] hover:text-blue-600 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5"/><path d="M12 19l-7-7 7-7"/></svg>
                Kembali ke Daftar Ekstrakurikuler
            </a>
        </div>

        <!-- HERO SECTION -->
        <section class="hero-gradient hero-shadow rounded-2xl lg:rounded-[20px] px-7 py-7 lg:px-9 lg:py-8 relative overflow-hidden mb-6">
            <div class="absolute -right-20 -top-24 w-72 h-72 rounded-full bg-purple-300/20"></div>
            <div class="absolute right-24 -bottom-28 w-64 h-64 rounded-full bg-blue-300/20"></div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div class="flex items-start gap-5">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-300/30 shrink-0 text-white">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-blue-600 mb-1">MANAJEMEN ABSENSI</p>
                        <h2 class="text-2xl lg:text-[30px] font-bold text-[#2864d7]">{{ $extracurricular->name }}</h2>
                        <p class="text-sm lg:text-[15px] text-[#24477f] mt-1">
                            Pembina: <span class="font-semibold">{{ $extracurricular->pembina }}</span>
                        </p>
                    </div>
                </div>

                <a href="{{ route('admin.extracurriculars.attendances.create', $extracurricular->id) }}" class="button-gradient inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl text-white text-sm font-semibold shadow-lg shadow-blue-200/40 transition shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                    Tambah Sesi Pertemuan
                </a>
            </div>
        </section>

        <!-- FLASH MESSAGE -->
        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border border-emerald-200 rounded-2xl px-5 py-4 text-emerald-700 flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-emerald-100 flex items-center justify-center font-bold">✓</div>
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif

        <!-- TABLE CARD -->
        <section class="bg-white rounded-2xl soft-shadow border border-[#edf1f8] overflow-hidden">
            <div class="overflow-x-auto scrollbar-hide">
                <table class="w-full min-w-[900px]">
                    <thead>
                        <tr class="bg-[#f6f8fd] border-b border-[#edf1f8]">
                            <th class="text-left px-6 py-4 text-xs font-semibold text-[#52698f] w-16">No</th>
                            <th class="text-left px-6 py-4 text-xs font-semibold text-[#52698f]">Tanggal Pertemuan</th>
                            <th class="text-left px-6 py-4 text-xs font-semibold text-[#52698f]">Topik / Materi Latihan</th>
                            <th class="text-center px-6 py-4 text-xs font-semibold text-[#52698f]">Jumlah Siswa Diabsen</th>
                            <th class="text-center px-6 py-4 text-xs font-semibold text-[#52698f]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#edf1f8]">
                        @forelse($sessions as $index => $session)
                        <tr class="border-b border-[#edf1f8] hover:bg-[#f9fbff] transition">
                            <td class="px-6 py-5 text-sm font-medium text-[#7284a7]">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-5 font-semibold text-[#173574]">
                                {{ \Carbon\Carbon::parse($session->date)->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-6 py-5 text-[#52698f]">
                                {{ $session->topic ?: '-' }}
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="bg-blue-50 text-blue-700 px-3.5 py-1.5 rounded-full text-xs font-semibold">
                                    {{ $session->attendances()->count() }} Siswa
                                </span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.extracurriculars.attendances.edit', [$extracurricular->id, $session->id]) }}" class="px-3.5 py-2 rounded-lg bg-indigo-50 text-indigo-600 text-xs font-semibold hover:bg-indigo-100 transition">
                                        Kelola Absen
                                    </a>
                                    <form action="{{ route('admin.extracurriculars.attendances.destroy', [$extracurricular->id, $session->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus sesi pertemuan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3.5 py-2 rounded-lg bg-red-50 text-red-500 text-xs font-semibold hover:bg-red-100 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-20 px-6 text-center">
                                <div class="w-20 h-20 rounded-3xl bg-blue-50 flex items-center justify-center mx-auto mb-5 text-blue-500">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <h3 class="font-bold text-lg text-[#173574]">Belum Ada Sesi Absensi</h3>
                                <p class="text-sm text-[#8a9abb] mt-1 mb-6">
                                    Buat sesi pertemuan pertama untuk mulai mencatat kehadiran siswa pada ekstrakurikuler ini.
                                </p>
                                <a href="{{ route('admin.extracurriculars.attendances.create', $extracurricular->id) }}" class="button-gradient inline-flex items-center gap-2 px-5 py-3 rounded-xl text-white text-sm font-semibold">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                                    Tambah Sesi Pertemuan
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

    </div>

</body>
</html>