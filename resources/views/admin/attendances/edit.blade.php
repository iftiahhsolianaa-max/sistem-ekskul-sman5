<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Kehadiran Siswa | Admin - SMA Negeri 5 Cirebon</title>
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
            <a href="{{ route('admin.extracurriculars.attendances.index', $extracurricular->id) }}" class="inline-flex items-center gap-2 text-sm font-medium text-[#7183a5] hover:text-blue-600 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5"/><path d="M12 19l-7-7 7-7"/></svg>
                Kembali ke Daftar Sesi Absensi
            </a>
        </div>

        <!-- HERO SECTION -->
        <section class="hero-gradient hero-shadow rounded-2xl lg:rounded-[20px] px-7 py-7 lg:px-9 lg:py-8 relative overflow-hidden mb-6">
            <div class="absolute -right-20 -top-24 w-72 h-72 rounded-full bg-purple-300/20"></div>
            <div class="absolute right-24 -bottom-28 w-64 h-64 rounded-full bg-blue-300/20"></div>

            <div class="relative z-10">
                <div class="flex items-start gap-5">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg shadow-blue-300/30 shrink-0 text-white">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012-2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-blue-600 mb-1">REKAP ABSENSI SISWA</p>
                        <h2 class="text-2xl lg:text-[30px] font-bold text-[#2864d7]">{{ $extracurricular->name }}</h2>
                        <p class="text-sm lg:text-[15px] text-[#24477f] mt-1">
                            Tanggal Pertemuan: <span class="font-semibold">{{ \Carbon\Carbon::parse($session->date)->translatedFormat('d F Y') }}</span>
                            @if($session->topic)
                                | Topik: <span class="italic">{{ $session->topic }}</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FLASH MESSAGE -->
        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border border-emerald-200 rounded-2xl px-5 py-4 text-emerald-700 flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-emerald-100 flex items-center justify-center font-bold">✓</div>
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif

        <!-- FORM & TABLE CARD -->
        <form action="{{ route('admin.extracurriculars.attendances.update', ['extracurricular' => $extracurricular->id, 'attendance' => $session->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <section class="bg-white rounded-2xl soft-shadow border border-[#edf1f8] overflow-hidden mb-6">
                <div class="overflow-x-auto scrollbar-hide">
                    <table class="w-full min-w-[700px]">
                        <thead>
                            <tr class="bg-[#f6f8fd] border-b border-[#edf1f8]">
                                <th class="text-left px-6 py-4 text-xs font-semibold text-[#52698f] w-16">No</th>
                                <th class="text-left px-6 py-4 text-xs font-semibold text-[#52698f]">Nama Siswa</th>
                                <th class="text-center px-6 py-4 text-xs font-semibold text-[#52698f] w-64">Status Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#edf1f8]">
                            @forelse($session->attendances as $index => $attendance)
                            <tr class="border-b border-[#edf1f8] hover:bg-[#f9fbff] transition">
                                <td class="px-6 py-5 text-sm font-medium text-[#7284a7]">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center shrink-0 text-[#173574] font-semibold text-xs">
                                            {{ strtoupper(substr($attendance->user->name ?? 'S', 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-[#173574]">
                                                {{ $attendance->user->name ?? 'Siswa Tidak Ditemukan' }}
                                            </p>
                                            <p class="text-xs text-[#8a9abb]">
                                                {{ $attendance->user->email ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <select name="statuses[{{ $attendance->id }}]" class="w-full h-[42px] px-4 rounded-xl bg-[#f4f7fd] border border-transparent text-sm font-medium text-[#173574] focus:outline-none focus:ring-2 focus:ring-blue-200">
                                        <option value="hadir" {{ $attendance->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                        <option value="izin" {{ $attendance->status == 'izin' ? 'selected' : '' }}>Izin</option>
                                        <option value="sakit" {{ $attendance->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                        <option value="alpa" {{ $attendance->status == 'alpa' ? 'selected' : '' }}>Alpa</option>
                                    </select>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="py-16 px-6 text-center">
                                    <div class="w-16 h-16 rounded-3xl bg-blue-50 flex items-center justify-center mx-auto mb-4 text-blue-500">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    </div>
                                    <h3 class="font-bold text-base text-[#173574]">Belum Ada Siswa Terdaftar</h3>
                                    <p class="text-xs text-[#8a9abb] mt-1 max-w-sm mx-auto">
                                        Belum ada siswa yang mendaftar atau berstatus disetujui (diterima) pada ekstrakurikuler ini.
                                    </p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            @if($session->attendances->count() > 0)
            <div class="flex items-center justify-end gap-3">
                <a href="{{ route('admin.extracurriculars.attendances.index', $extracurricular->id) }}" class="px-5 py-3 rounded-xl text-sm font-medium text-[#7183a5] hover:bg-gray-200/50 transition">
                    Batal
                </a>
                <button type="submit" class="button-gradient inline-flex items-center gap-2 px-6 py-3 rounded-xl text-white text-sm font-semibold shadow-lg shadow-blue-200/40 transition">
                    Simpan Perubahan Absensi
                </button>
            </div>
            @endif

        </form>

    </div>

</body>
</html>