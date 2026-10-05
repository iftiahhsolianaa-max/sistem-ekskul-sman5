<!DOCTYPE html>
<html lang="id">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>Dashboard Siswa - Ekstrakurikuler</title>
 
    <script src="https://cdn.tailwindcss.com"></script>
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >
 
    <style>
        * {
            box-sizing: border-box;
        }
 
        html {
            scroll-behavior: smooth;
        }
 
        body {
            font-family: 'Poppins', sans-serif;
            color: #1c2b88;
            -webkit-font-smoothing: antialiased;
            background:
                radial-gradient(circle at 100% 100%, rgba(124, 92, 255, .12), transparent 34%),
                radial-gradient(circle at 0% 100%, rgba(52, 120, 238, .12), transparent 30%),
                radial-gradient(circle at 92% 0%, rgba(124, 92, 255, .08), transparent 28%),
                linear-gradient(180deg, #f1f6ff 0%, #f6f8ff 100%);
            background-color: #f5f8ff;
        }
 
        /* ---------- Gradient biru -> ungu ---------- */
        .grad-hero {
            background:
                radial-gradient(circle at 78% 30%, rgba(255, 255, 255, .14), transparent 34%),
                linear-gradient(100deg, #1f6fe6 0%, #3a63e2 42%, #5b5ce8 74%, #7c5cf0 100%);
            box-shadow: 0 18px 45px rgba(70, 90, 220, .25);
        }
 
        .grad-button {
            background: linear-gradient(135deg, #3478ee 0%, #6250e8 100%);
        }
 
        .grad-button:hover {
            background: linear-gradient(135deg, #2869dc 0%, #5342d4 100%);
        }
 
        .grad-bar {
            background: linear-gradient(90deg, #3478ee 0%, #6846c8 100%);
        }
 
        .grad-soft {
            background: linear-gradient(135deg, #eaf2ff 0%, #f0ecff 100%);
        }
 
        /* ---------- Card ---------- */
        .card {
            background: #ffffff;
            border: 1px solid #edf1fb;
            border-radius: 28px;
            box-shadow: 0 12px 35px rgba(60, 90, 180, .08);
        }
 
        .card-hover {
            transition: transform .25s ease, box-shadow .25s ease;
        }
 
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 45px rgba(60, 90, 200, .15);
        }
 
        /* ---------- Judul section (dipakai semua section) ---------- */
        .section-title {
            font-size: 22px;
            font-weight: 700;
            color: #1c2b88;
            line-height: 1.25;
        }
 
        .section-subtitle {
            font-size: 14px;
            color: #5b6b9a;
            margin-top: 2px;
        }
 
        .icon-box {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 16px;
        }
 
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
 
 
<body class="min-h-screen flex flex-col">
 
@php
    /*
    |--------------------------------------------------------------------------
    | DATA UTAMA (variable dari controller tidak diubah)
    |--------------------------------------------------------------------------
    | $myRegistrations  -> pendaftaran milik siswa yang login
    | $extracurriculars -> seluruh ekstrakurikuler
    */
 
    $user = auth()->user();
 
    $total    = $myRegistrations->count();
    $accepted = $myRegistrations->where('status', 'Diterima')->count();
    $pending  = $myRegistrations->where('status', 'Pending')->count();
    $rejected = $myRegistrations->where('status', 'Ditolak')->count();
 
    // Jumlah siswa "Diterima" per ekskul (1 query, bukan 1 query per card)
    $acceptedCounts = \App\Models\Registration::where('status', 'Diterima')
        ->selectRaw('extracurricular_id, COUNT(*) as total')
        ->groupBy('extracurricular_id')
        ->pluck('total', 'extracurricular_id');
 
    // ID ekskul yang sudah pernah didaftar siswa ini
    $registeredIds = $myRegistrations->pluck('extracurricular_id');
 
    // Pendaftaran aktif (Pending + Diterima) untuk batas maksimal 2 ekskul
    $currentCount = $myRegistrations
        ->whereIn('status', ['Pending', 'Diterima'])
        ->count();
 
    $maxReached = $currentCount >= 2;
@endphp
 
 
{{-- ===================================================== --}}
{{-- NAVBAR --}}
{{-- ===================================================== --}}
 
<nav class="bg-white sticky top-0 z-50 border-b border-[#edf1fb] shadow-[0_6px_24px_rgba(60,90,180,.06)]">
 
    <div class="w-full max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16">
 
        <div class="h-[76px] lg:h-[94px] flex items-center justify-between gap-3">
 
            {{-- Logo & nama sekolah --}}
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 lg:gap-5 min-w-0">
 
                <img
                    src="{{ asset('images/logo-sman5.png') }}"
                    alt="Logo SMAN 5 Cirebon"
                    class="w-12 h-12 lg:w-[68px] lg:h-[68px] object-contain shrink-0"
                >
 
                <div class="min-w-0">
                    <h1 class="font-bold text-[17px] lg:text-[24px] leading-tight text-[#1c2b88] truncate">
                        SMAN 5 Cirebon
                    </h1>
 
                    <p class="text-[12px] lg:text-[15px] text-[#3f5fb8] mt-0.5 truncate">
                        Pendaftaran Ekstrakurikuler
                    </p>
                </div>
 
            </a>
 
 
            {{-- Profil siswa + Logout --}}
            <div class="flex items-center gap-3 lg:gap-5 shrink-0">
 
                <div class="flex items-center gap-3 min-w-0">
 
                    <div class="w-10 h-10 lg:w-[50px] lg:h-[50px] rounded-full bg-[#e6eeff] text-[#2f6df0] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 21v-1a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v1"/>
                        </svg>
                    </div>
 
                    <div class="leading-tight min-w-0">
                        <p class="flex items-center gap-1.5 font-bold text-[13px] lg:text-[17px] text-[#1c2b88]">
                            <span class="truncate max-w-[80px] sm:max-w-[200px]">{{ $user->name }}</span>
                            <svg class="w-4 h-4 text-[#5b6b9a] shrink-0 hidden sm:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/>
                            </svg>
                        </p>
 
                        <p class="text-[11px] lg:text-[14px] text-[#5b6b9a] truncate max-w-[110px] sm:max-w-[200px]">
                            NIS: {{ $user->nis ?? '-' }}
                        </p>
                    </div>
 
                </div>
 
 
                <form method="POST" action="{{ route('logout') }}">
 
                    @csrf
 
                    <button
                        type="submit"
                        class="h-10 lg:h-[50px] px-4 lg:px-6 rounded-[14px] grad-button text-white text-[13px] lg:text-[16px] font-semibold
                        shadow-[0_10px_25px_rgba(80,80,220,.28)] transition inline-flex items-center gap-2"
                    >
                        <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 17l5-5-5-5"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12H9"/>
                        </svg>
 
                        <span>Logout</span>
                    </button>
 
                </form>
 
            </div>
 
        </div>
 
    </div>
 
</nav>
 
 
{{-- ===================================================== --}}
{{-- CONTENT --}}
{{-- ===================================================== --}}
 
<main class="flex-1 w-full max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 py-8 lg:py-[42px] space-y-8 lg:space-y-9">
 
 
    {{-- ================================================= --}}
    {{-- FLASH MESSAGE --}}
    {{-- ================================================= --}}
 
    @if (session('success'))
        <div class="rounded-2xl bg-emerald-50 border border-emerald-200 px-5 py-4 text-emerald-700 shadow-[0_8px_24px_rgba(16,185,129,.08)]">
            <div class="flex items-center gap-3">
                <div class="icon-box w-10 h-10 bg-emerald-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
 
                <p class="text-[14px] font-medium">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    @endif
 
 
    @if (session('error'))
        <div class="rounded-2xl bg-rose-50 border border-rose-200 px-5 py-4 text-rose-700 shadow-[0_8px_24px_rgba(244,63,94,.08)]">
            <div class="flex items-center gap-3">
                <div class="icon-box w-10 h-10 bg-rose-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v5M12 16.5h.01"/>
                    </svg>
                </div>
 
                <p class="text-[14px] font-medium">
                    {{ session('error') }}
                </p>
            </div>
        </div>
    @endif
 
 
    {{-- ================================================= --}}
    {{-- HERO --}}
    {{-- ================================================= --}}
 
    <section>
 
        <div class="grad-hero relative overflow-hidden rounded-[28px] px-7 py-9 sm:px-10 lg:pl-[62px] lg:py-0 lg:min-h-[235px] flex items-center">
 
            {{-- Dekorasi lingkaran halus --}}
            <div class="absolute -left-24 -top-24 w-72 h-72 rounded-full bg-white/[.06]"></div>
            <div class="absolute right-[30%] -bottom-32 w-80 h-80 rounded-full bg-white/[.06]"></div>
 
            {{-- Teks --}}
            <div class="relative z-10 max-w-[760px] lg:pr-[360px]">
 
                <p class="text-white/95 text-[16px] lg:text-[19px] font-medium mb-1.5">
                    Selamat datang 👋
                </p>
 
                <h2 class="text-white text-[32px] sm:text-[40px] lg:text-[46px] font-bold leading-tight mb-3 break-words">
                    Halo, {{ $user->name }}!
                </h2>
 
                <p class="text-white/95 text-[14px] sm:text-[15px] lg:text-[17px] leading-relaxed">
                    Pilih kegiatan ekstrakurikuler yang kamu minati
                    dan kembangkan bakatmu bersama SMAN 5 Cirebon.
                </p>
 
            </div>
 
 
            {{-- Ilustrasi gedung sekolah --}}
            <svg
                class="absolute right-2 bottom-0 w-[300px] lg:w-[470px] h-auto hidden md:block"
                viewBox="0 0 470 250"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
            >
                {{-- lingkaran latar --}}
                <circle cx="235" cy="140" r="118" fill="#ffffff" fill-opacity=".10"/>
 
                {{-- awan --}}
                <g fill="#9db8fb" fill-opacity=".85">
                    <ellipse cx="72" cy="100" rx="30" ry="12"/>
                    <ellipse cx="92" cy="90" rx="20" ry="14"/>
                    <ellipse cx="55" cy="93" rx="14" ry="10"/>
                </g>
                <g fill="#b8c2fd" fill-opacity=".9">
                    <ellipse cx="410" cy="58" rx="32" ry="12"/>
                    <ellipse cx="428" cy="46" rx="20" ry="14"/>
                    <ellipse cx="392" cy="50" rx="14" ry="10"/>
                </g>
 
                {{-- daun kiri --}}
                <path d="M96 232C60 210 52 168 72 132c26 18 40 60 24 100z" fill="#3d6fe6"/>
                <path d="M110 232C92 200 96 160 126 132c14 34 6 72-16 100z" fill="#5b8cf5"/>
 
                {{-- daun kanan --}}
                <path d="M374 232c36-22 44-64 24-100-26 18-40 60-24 100z" fill="#3d6fe6"/>
                <path d="M360 232c18-32 14-72-16-100-14 34-6 72 16 100z" fill="#5b8cf5"/>
 
                {{-- bayangan tanah --}}
                <ellipse cx="235" cy="238" rx="190" ry="9" fill="#4a3fc4" fill-opacity=".35"/>
 
                {{-- sayap kiri --}}
                <rect x="112" y="156" width="80" height="78" fill="#a9c4fb"/>
                <rect x="106" y="146" width="92" height="12" rx="3" fill="#3d6be0"/>
 
                {{-- sayap kanan --}}
                <rect x="278" y="156" width="80" height="78" fill="#a9c4fb"/>
                <rect x="272" y="146" width="92" height="12" rx="3" fill="#3d6be0"/>
 
                {{-- blok tengah --}}
                <rect x="178" y="112" width="114" height="122" fill="#c8d8ff"/>
 
                {{-- atap tengah --}}
                <polygon points="166,114 235,62 304,114" fill="#3d6be0"/>
                <polygon points="182,112 235,73 288,112" fill="#5a86f2"/>
 
                {{-- bendera --}}
                <line x1="235" y1="62" x2="235" y2="32" stroke="#e8eeff" stroke-width="2.5"/>
                <polygon points="235,32 262,40 235,48" fill="#e8eeff"/>
 
                {{-- jam --}}
                <circle cx="235" cy="94" r="12" fill="#ffffff"/>
                <circle cx="235" cy="94" r="12" stroke="#3d6be0" stroke-width="2.5"/>
                <path d="M235 87v7l5 3" stroke="#3d6be0" stroke-width="2" stroke-linecap="round"/>
 
                {{-- jendela tengah --}}
                <g fill="#3f6fe0">
                    <rect x="190" y="126" width="22" height="18" rx="2"/>
                    <rect x="224" y="126" width="22" height="18" rx="2"/>
                    <rect x="258" y="126" width="22" height="18" rx="2"/>
                    <rect x="190" y="154" width="22" height="18" rx="2"/>
                    <rect x="258" y="154" width="22" height="18" rx="2"/>
                </g>
 
                {{-- jendela sayap kiri --}}
                <g fill="#3f6fe0">
                    <rect x="120" y="168" width="16" height="16" rx="2"/>
                    <rect x="146" y="168" width="16" height="16" rx="2"/>
                    <rect x="120" y="196" width="16" height="16" rx="2"/>
                    <rect x="146" y="196" width="16" height="16" rx="2"/>
                </g>
 
                {{-- jendela sayap kanan --}}
                <g fill="#3f6fe0">
                    <rect x="308" y="168" width="16" height="16" rx="2"/>
                    <rect x="334" y="168" width="16" height="16" rx="2"/>
                    <rect x="308" y="196" width="16" height="16" rx="2"/>
                    <rect x="334" y="196" width="16" height="16" rx="2"/>
                </g>
 
                {{-- pintu --}}
                <path d="M221 234v-38a14 14 0 0 1 28 0v38z" fill="#2b4fc4"/>
                <line x1="235" y1="182" x2="235" y2="234" stroke="#c8d8ff" stroke-width="1.5"/>
 
                {{-- tangga --}}
                <rect x="208" y="230" width="54" height="7" rx="2" fill="#8fb0f7"/>
            </svg>
 
        </div>
 
    </section>
 
 
    {{-- ================================================= --}}
    {{-- DATA SISWA --}}
    {{-- ================================================= --}}
 
    <section>
 
        <div class="card px-5 py-6 sm:px-8 sm:py-7">
 
            <div class="flex items-center gap-4 mb-6">
 
                <div class="icon-box w-12 h-12 bg-[#e6eeff] text-[#2f6df0]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 21v-1a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v1"/>
                    </svg>
                </div>
 
                <h3 class="section-title">Data Siswa</h3>
 
            </div>
 
 
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-5">
 
                {{-- Nama --}}
                <div class="bg-[#f4f7ff] rounded-[20px] px-5 py-5 flex items-center gap-4">
 
                    <div class="icon-box w-[60px] h-[60px] rounded-[18px] bg-[#dce8ff] text-[#2f6df0]">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 21v-1a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v1"/>
                        </svg>
                    </div>
 
                    <div class="min-w-0">
                        <p class="text-[14px] lg:text-[15px] text-[#5b6b9a]">Nama</p>
                        <p class="text-[17px] lg:text-[19px] font-bold text-[#1c2b88] mt-0.5 break-words">
                            {{ $user->name }}
                        </p>
                    </div>
 
                </div>
 
 
                {{-- NIS --}}
                <div class="bg-[#f4f7ff] rounded-[20px] px-5 py-5 flex items-center gap-4">
 
                    <div class="icon-box w-[60px] h-[60px] rounded-[18px] bg-[#e6e2ff] text-[#5b4bdc]">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="5" width="18" height="14" rx="3"/>
                            <circle cx="9" cy="11" r="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 16c.5-1.5 1.5-2 3-2s2.5.5 3 2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4M14 14h3"/>
                        </svg>
                    </div>
 
                    <div class="min-w-0">
                        <p class="text-[14px] lg:text-[15px] text-[#5b6b9a]">NIS</p>
                        <p class="text-[17px] lg:text-[19px] font-bold text-[#1c2b88] mt-0.5 break-words">
                            {{ $user->nis ?? '-' }}
                        </p>
                    </div>
 
                </div>
 
 
                {{-- Email --}}
                <div class="bg-[#f4f7ff] rounded-[20px] px-5 py-5 flex items-center gap-4">
 
                    <div class="icon-box w-[60px] h-[60px] rounded-[18px] bg-[#dce8ff] text-[#2f6df0]">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="5" width="18" height="14" rx="3"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.5 7.5l8.5 6 8.5-6"/>
                        </svg>
                    </div>
 
                    <div class="min-w-0">
                        <p class="text-[14px] lg:text-[15px] text-[#5b6b9a]">Email</p>
                        <p class="text-[17px] lg:text-[19px] font-bold text-[#1c2b88] mt-0.5 break-all">
                            {{ $user->email }}
                        </p>
                    </div>
 
                </div>
 
            </div>
 
        </div>
 
    </section>
 
 
    {{-- ================================================= --}}
    {{-- STATISTIK --}}
    {{-- ================================================= --}}
 
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 lg:gap-6">
 
        {{-- Total --}}
        <div class="card card-hover !rounded-[22px] px-6 py-6 flex items-start gap-5">
            <div class="icon-box w-[60px] h-[60px] rounded-[18px] bg-[#dfe4ff] text-[#4a63e8]">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="5" width="18" height="16" rx="3"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 3v4M16 3v4M3 10h18M8 14h2M14 14h2M8 17.5h2"/>
                </svg>
            </div>
 
            <div>
                <p class="text-[15px] lg:text-[16px] text-[#5b6b9a]">Total</p>
                <p class="text-[36px] lg:text-[40px] font-bold text-[#1e2f9a] leading-none mt-1.5">{{ $total }}</p>
            </div>
        </div>
 
 
        {{-- Diterima --}}
        <div class="card card-hover !rounded-[22px] px-6 py-6 flex items-start gap-5">
            <div class="icon-box w-[60px] h-[60px] rounded-[18px] bg-[#d6f5e7] text-[#10b981]">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.5 12.5l2.5 2.5 4.5-5"/>
                </svg>
            </div>
 
            <div>
                <p class="text-[15px] lg:text-[16px] text-[#5b6b9a]">Diterima</p>
                <p class="text-[36px] lg:text-[40px] font-bold text-[#0f9d76] leading-none mt-1.5">{{ $accepted }}</p>
            </div>
        </div>
 
 
        {{-- Pending --}}
        <div class="card card-hover !rounded-[22px] px-6 py-6 flex items-start gap-5">
            <div class="icon-box w-[60px] h-[60px] rounded-[18px] bg-[#ffebc9] text-[#f59e0b]">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 2"/>
                </svg>
            </div>
 
            <div>
                <p class="text-[15px] lg:text-[16px] text-[#5b6b9a]">Pending</p>
                <p class="text-[36px] lg:text-[40px] font-bold text-[#f59e0b] leading-none mt-1.5">{{ $pending }}</p>
            </div>
        </div>
 
 
        {{-- Ditolak --}}
        <div class="card card-hover !rounded-[22px] px-6 py-6 flex items-start gap-5">
            <div class="icon-box w-[60px] h-[60px] rounded-[18px] bg-[#ffdde5] text-[#e8365d]">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18"/>
                </svg>
            </div>
 
            <div>
                <p class="text-[15px] lg:text-[16px] text-[#5b6b9a]">Ditolak</p>
                <p class="text-[36px] lg:text-[40px] font-bold text-[#e0245e] leading-none mt-1.5">{{ $rejected }}</p>
            </div>
        </div>
 
    </section>
 
 
    {{-- ================================================= --}}
    {{-- KETENTUAN PENDAFTARAN --}}
    {{-- ================================================= --}}
 
    <section>
 
        <div class="grad-soft border border-[#e2eaff] rounded-[28px] px-6 py-6 sm:px-8 shadow-[0_12px_35px_rgba(60,90,180,.08)]">
 
            <div class="flex items-start gap-4">
 
                <div class="icon-box w-12 h-12 bg-[#e6e2ff] text-[#5b4bdc]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 11v5M12 7.5h.01"/>
                    </svg>
                </div>
 
                <div>
 
                    <p class="text-[17px] font-bold text-[#1c2b88]">
                        Ketentuan Pendaftaran
                    </p>
 
                    <p class="text-[14px] lg:text-[15px] text-[#4a5f8c] mt-1.5 leading-relaxed">
                        Setiap siswa dapat memilih maksimal
                        <strong class="text-[#285bc0]">2 ekstrakurikuler</strong>.
                        Pendaftaran yang masih berstatus
                        <strong class="text-[#6846c8]">Pending</strong>
                        dapat dibatalkan.
                    </p>
 
                </div>
 
            </div>
 
        </div>
 
    </section>
 
 
    {{-- ================================================= --}}
    {{-- RIWAYAT PENDAFTARAN --}}
    {{-- ================================================= --}}
 
    <section id="riwayat-pendaftaran" class="scroll-mt-28">
 
        <div class="mb-5 flex items-center gap-4">
 
            <div class="icon-box w-12 h-12 bg-[#e6eeff] text-[#2f6df0]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/>
                    <rect x="9" y="3" width="6" height="4" rx="1"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16h4"/>
                </svg>
            </div>
 
            <div>
                <h3 class="section-title">Riwayat Pendaftaran</h3>
                <p class="section-subtitle">Daftar ekstrakurikuler yang telah kamu pilih.</p>
            </div>
 
        </div>
 
 
        @if ($myRegistrations->count() > 0)
 
            <div class="card overflow-hidden">
 
                <div class="overflow-x-auto">
 
                    <table class="w-full min-w-[720px] text-[14px]">
 
                        <thead class="bg-[#f4f7ff] border-b border-[#e8eefb]">
 
                            <tr class="text-[12px] uppercase tracking-wide text-[#5b6b9a]">
                                <th class="px-6 py-4 text-left font-semibold">Ekstrakurikuler</th>
                                <th class="px-6 py-4 text-left font-semibold">Jadwal</th>
                                <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                                <th class="px-6 py-4 text-left font-semibold">Status</th>
                                <th class="px-6 py-4 text-left font-semibold">Aksi</th>
                            </tr>
 
                        </thead>
 
 
                        <tbody class="divide-y divide-[#eef2fc]">
 
                            @foreach ($myRegistrations as $registration)
 
                                <tr class="hover:bg-[#f8faff] transition">
 
                                    <td class="px-6 py-5">
                                        <p class="font-semibold text-[#1c2b88]">
                                            {{ $registration->extracurricular->name }}
                                        </p>
                                    </td>
 
 
                                    <td class="px-6 py-5 text-[#5b6b9a]">
                                        {{ $registration->extracurricular->schedule }}
                                    </td>
 
 
                                    <td class="px-6 py-5 text-[#5b6b9a] whitespace-nowrap">
                                        {{ $registration->created_at->format('d M Y') }}
                                    </td>
 
 
                                    <td class="px-6 py-5">
 
                                        @if ($registration->status === 'Diterima')
 
                                            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-[12px] font-semibold">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                Diterima
                                            </span>
 
                                        @elseif ($registration->status === 'Ditolak')
 
                                            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-rose-50 text-rose-700 text-[12px] font-semibold">
                                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                                Ditolak
                                            </span>
 
                                        @else
 
                                            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-50 text-amber-700 text-[12px] font-semibold">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                                Pending
                                            </span>
 
                                        @endif
 
                                    </td>
 
 
                                    <td class="px-6 py-5">
 
                                        @if ($registration->status === 'Pending')
 
                                            <form
                                                action="{{ route('registration.cancel', $registration->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin membatalkan pendaftaran ini?')"
                                            >
 
                                                @csrf
                                                @method('DELETE')
 
                                                <button
                                                    type="submit"
                                                    class="h-10 px-5 rounded-[12px] bg-rose-50 text-rose-600 text-[13px] font-semibold
                                                    border border-rose-100 hover:bg-rose-100 transition"
                                                >
                                                    Batalkan
                                                </button>
 
                                            </form>
 
                                        @else
 
                                            <span class="text-[#b4c0da]">-</span>
 
                                        @endif
 
                                    </td>
 
                                </tr>
 
                            @endforeach
 
                        </tbody>
 
                    </table>
 
                </div>
 
            </div>
 
        @else
 
            <div class="card p-10 text-center">
 
                <div class="icon-box w-16 h-16 mx-auto rounded-[20px] bg-[#e6eeff] text-[#2f6df0] mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/>
                        <rect x="9" y="3" width="6" height="4" rx="1"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16h4"/>
                    </svg>
                </div>
 
                <h4 class="font-bold text-[17px] text-[#1c2b88]">
                    Belum ada pendaftaran
                </h4>
 
                <p class="text-[14px] text-[#5b6b9a] mt-1">
                    Silakan pilih ekstrakurikuler yang kamu minati.
                </p>
 
            </div>
 
        @endif
 
    </section>
 
 
    {{-- ================================================= --}}
    {{-- PILIHAN EKSTRAKURIKULER --}}
    {{-- ================================================= --}}
 
    <section id="pilihan-ekskul" class="scroll-mt-28">
 
        <div class="mb-5 flex items-center gap-4">
 
            <div class="icon-box w-12 h-12 bg-[#e6e2ff] text-[#5b4bdc]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l2.3 4.7L19 9l-3.5 3.4.8 4.8L12 15l-4.3 2.2.8-4.8L5 9l4.7-1.3L12 3z"/>
                </svg>
            </div>
 
            <div>
                <h3 class="section-title">Pilihan Ekstrakurikuler</h3>
                <p class="section-subtitle">Pilih kegiatan yang sesuai dengan minat dan bakatmu.</p>
            </div>
 
        </div>
 
 
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 sm:gap-6">
 
            @forelse ($extracurriculars as $extracurricular)
 
                @php
                    $acceptedCount = (int) ($acceptedCounts[$extracurricular->id] ?? 0);
 
                    $quota = $extracurricular->quota ?? 30;
 
                    $isFull = $acceptedCount >= $quota;
 
                    $alreadyRegistered = $registeredIds->contains($extracurricular->id);
 
                    $percent = min(($acceptedCount / max($quota, 1)) * 100, 100);
                @endphp
 
 
                <div class="card card-hover p-6 flex flex-col">
 
                    {{-- Header --}}
                    <div class="flex items-start gap-4">
 
                        <div class="icon-box w-[52px] h-[52px] rounded-[16px] bg-[#dce8ff] text-[#2f6df0]">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l2.3 4.7L19 9l-3.5 3.4.8 4.8L12 15l-4.3 2.2.8-4.8L5 9l4.7-1.3L12 3z"/>
                            </svg>
                        </div>
 
                        <div class="min-w-0 flex-1">
                            <h4 class="text-[18px] font-bold text-[#1c2b88] leading-snug break-words">
                                {{ $extracurricular->name }}
                            </h4>
 
                            @if ($isFull)
                                <span class="inline-flex mt-1.5 px-2.5 py-0.5 rounded-full bg-rose-50 text-rose-600 text-[11px] font-semibold">
                                    Kuota Penuh
                                </span>
                            @else
                                <span class="inline-flex mt-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-600 text-[11px] font-semibold">
                                    Tersedia
                                </span>
                            @endif
                        </div>
 
                    </div>
 
 
                    {{-- Deskripsi --}}
                    <p class="text-[14px] text-[#5b6b9a] leading-relaxed mt-4 min-h-[63px] line-clamp-3">
                        {{ $extracurricular->description }}
                    </p>
 
 
                    {{-- Jadwal --}}
                    <div class="mt-5 flex items-center gap-3 rounded-[18px] bg-[#f4f7ff] px-4 py-3.5">
 
                        <div class="icon-box w-10 h-10 rounded-[12px] bg-white text-[#2f6df0]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="9"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 2"/>
                            </svg>
                        </div>
 
                        <div class="min-w-0">
                            <p class="text-[11px] uppercase tracking-wide font-semibold text-[#8a9bc0]">Jadwal</p>
                            <p class="text-[14px] font-semibold text-[#1c2b88] break-words">
                                {{ $extracurricular->schedule }}
                            </p>
                        </div>
 
                    </div>
 
 
                    {{-- Kuota --}}
                    <div class="mt-5">
 
                        <div class="flex justify-between items-center text-[13px] mb-2">
                            <span class="text-[#5b6b9a] font-medium">Kuota</span>
                            <span class="font-semibold text-[#1c2b88]">
                                {{ $acceptedCount }} / {{ $quota }}
                            </span>
                        </div>
 
                        <div class="w-full bg-[#e8eefb] rounded-full h-2.5 overflow-hidden">
                            <div
                                class="{{ $isFull ? 'bg-rose-400' : 'grad-bar' }} h-2.5 rounded-full"
                                style="width: {{ $percent }}%"
                            ></div>
                        </div>
 
                    </div>
 
 
                    {{-- Tombol --}}
                    <div class="mt-auto pt-6">
 
                        @if ($alreadyRegistered)
 
                            <button
                                disabled
                                class="w-full h-[50px] rounded-[14px] bg-[#eef2fc] text-[#9aabcc] text-[15px] font-semibold cursor-not-allowed"
                            >
                                Sudah Terdaftar
                            </button>
 
                        @elseif ($maxReached)
 
                            <button
                                disabled
                                class="w-full h-[50px] rounded-[14px] bg-[#eef2fc] text-[#9aabcc] text-[15px] font-semibold cursor-not-allowed"
                            >
                                Maksimal 2 Ekskul
                            </button>
 
                        @elseif ($isFull)
 
                            <button
                                disabled
                                class="w-full h-[50px] rounded-[14px] bg-rose-50 text-rose-400 text-[15px] font-semibold cursor-not-allowed"
                            >
                                Kuota Penuh
                            </button>
 
                        @else
 
                            <form
                                action="{{ route('daftar.ekskul', $extracurricular->id) }}"
                                method="POST"
                            >
 
                                @csrf
 
                                <button
                                    type="submit"
                                    class="w-full h-[50px] rounded-[14px] grad-button text-white text-[15px] font-semibold
                                    shadow-[0_10px_25px_rgba(80,80,220,.28)] transition"
                                >
                                    Daftar Sekarang
                                </button>
 
                            </form>
 
                        @endif
 
                    </div>
 
                </div>
 
            @empty
 
                <div class="card p-10 text-center md:col-span-2 xl:col-span-3">
 
                    <h4 class="font-bold text-[17px] text-[#1c2b88]">
                        Belum ada ekstrakurikuler
                    </h4>
 
                    <p class="text-[14px] text-[#5b6b9a] mt-1">
                        Ekstrakurikuler akan tampil di sini setelah ditambahkan oleh admin.
                    </p>
 
                </div>
 
            @endforelse
 
        </div>
 
    </section>
 
</main>
 
 
{{-- ===================================================== --}}
{{-- FOOTER --}}
{{-- ===================================================== --}}
 
<footer class="bg-white border-t border-[#edf1fb] mt-6">
 
    <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 py-8 text-center">
 
        <p class="font-semibold text-[15px] text-[#1c2b88]">
            SMAN 5 Cirebon
        </p>
 
        <p class="text-[13px] text-[#5b6b9a] mt-1">
            Sistem Pendaftaran Ekstrakurikuler Berbasis Web
        </p>
 
        <p class="text-[12px] text-[#9aabcc] mt-3">
            &copy; {{ date('Y') }} SMA Negeri 5 Cirebon
        </p>
 
    </div>
 
</footer>
 
</body>
 
</html>
