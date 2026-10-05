<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa | Admin - SMA Negeri 5 Cirebon</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f8ff;
        }

        .sidebar-gradient {
            background:
                radial-gradient(
                    circle at 20% 15%,
                    rgba(255,255,255,.16) 0,
                    rgba(255,255,255,0) 32%
                ),
                linear-gradient(
                    160deg,
                    #21499c 0%,
                    #285bc0 42%,
                    #4b55c9 72%,
                    #6846c8 100%
                );
        }

        .main-gradient {
            background:
                radial-gradient(
                    circle at 95% 5%,
                    rgba(124,92,255,.10),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 5% 25%,
                    rgba(38,145,255,.08),
                    transparent 30%
                );
        }

        .hero-gradient {
            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(170,150,255,.28),
                    transparent 32%
                ),
                linear-gradient(
                    115deg,
                    #e4f6ff 0%,
                    #e5efff 45%,
                    #eee8ff 100%
                );
        }

        .button-gradient {
            background: linear-gradient(
                135deg,
                #3478ee 0%,
                #6250e8 100%
            );
        }

        .button-gradient:hover {
            background: linear-gradient(
                135deg,
                #2869dc 0%,
                #5342d4 100%
            );
        }

        .sidebar-active {
            background: rgba(255,255,255,.17);
            box-shadow:
                inset 0 1px 0 rgba(255,255,255,.08),
                0 8px 25px rgba(25,55,130,.12);
        }

        .soft-shadow {
            box-shadow:
                0 12px 35px rgba(36,72,135,.07);
        }

        .hero-shadow {
            box-shadow:
                0 14px 35px rgba(63,106,190,.08);
        }

        .sidebar-wave {
            position: absolute;
            left: -90px;
            bottom: 130px;
            width: 430px;
            height: 250px;
            background: rgba(255,255,255,.08);
            border-radius: 55% 45% 0 0;
            transform: rotate(-12deg);
        }

        .sidebar-wave-2 {
            position: absolute;
            left: -80px;
            bottom: -70px;
            width: 450px;
            height: 270px;
            background: rgba(119,91,225,.28);
            border-radius: 55% 45% 0 0;
            transform: rotate(-9deg);
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


<body class="text-[#173574]">

<div class="min-h-screen flex">


    {{-- ===================================================== --}}
    {{-- SIDEBAR --}}
    {{-- ===================================================== --}}

    <aside
        id="sidebar"
        class="sidebar-gradient fixed lg:static inset-y-0 left-0 z-50
        w-[298px] text-white flex flex-col
        transform -translate-x-full lg:translate-x-0
        transition-transform duration-300 overflow-hidden"
    >

        <div class="sidebar-wave"></div>
        <div class="sidebar-wave-2"></div>


        {{-- LOGO --}}
        <div class="relative z-10 px-7 pt-6 pb-7">

            <a
                href="{{ url('/admin/dashboard') }}"
                class="flex items-center gap-4"
            >

                <div
                    class="w-[50px] h-[50px] rounded-2xl
                    bg-white/15 backdrop-blur-sm
                    flex items-center justify-center
                    border border-white/20"
                >

                    <img
                        src="{{ asset('images/logo-sman5.png') }}"
                        alt="Logo SMA Negeri 5 Cirebon"
                        class="w-[42px] h-[42px] object-contain"
                    >

                </div>

                <div>

                    <h1 class="font-bold text-[18px] leading-tight">
                        SMAN 5 Cirebon
                    </h1>

                    <p class="text-[12px] text-white/80 mt-1">
                        Raih Prestasi, Bangun Masa Depan
                    </p>

                </div>

            </a>

        </div>


        {{-- MENU --}}
        <nav class="relative z-10 px-4 space-y-2 flex-1">


            {{-- DASHBOARD --}}
            <a
                href="{{ url('/admin/dashboard') }}"
                class="flex items-center gap-4 px-4 py-3.5 rounded-2xl
                text-white/90 hover:bg-white/10 transition"
            >

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                >
                    <path d="M3 10.5L12 3l9 7.5"/>
                    <path d="M5 9.5V21h14V9.5"/>
                    <path d="M9 21v-6h6v6"/>
                </svg>

                <span class="text-[15px] font-medium">
                    Dashboard
                </span>

            </a>


            {{-- DATA SISWA AKTIF --}}
            <a
                href="{{ url('/admin/students') }}"
                class="sidebar-active flex items-center gap-4 px-4 py-3.5 rounded-2xl
                text-white transition"
            >

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                >
                    <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M22 21v-2a4 4 0 00-3-3.87"/>
                    <path d="M16 3.13a4 4 0 010 7.75"/>
                </svg>

                <span class="text-[15px] font-semibold">
                    Data Siswa
                </span>

            </a>


            {{-- EKSTRAKURIKULER --}}
            <a
                href="{{ url('/admin/extracurriculars') }}"
                class="flex items-center gap-4 px-4 py-3.5 rounded-2xl
                text-white/90 hover:bg-white/10 transition"
            >

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                >
                    <path d="M12 3l2.3 4.7L19 9l-3.5 3.4.8 4.8L12 15l-4.3 2.2.8-4.8L5 9l4.7-1.3L12 3z"/>
                </svg>

                <span class="text-[15px] font-medium">
                    Ekstrakurikuler
                </span>

            </a>


            {{-- PENDAFTARAN --}}
            <a
                href="{{ url('/admin/registrations') }}"
                class="flex items-center gap-4 px-4 py-3.5 rounded-2xl
                text-white/90 hover:bg-white/10 transition"
            >

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                >
                    <path d="M6 2h12v20H6z"/>
                    <path d="M9 6h6"/>
                    <path d="M9 10h6"/>
                    <path d="M9 14h4"/>
                </svg>

                <span class="text-[15px] font-medium">
                    Pendaftaran
                </span>

            </a>


            {{-- PERIODE --}}
            <a
                href="{{ url('/admin/registration-periods') }}"
                class="flex items-center gap-4 px-4 py-3.5 rounded-2xl
                text-white/90 hover:bg-white/10 transition"
            >

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                >
                    <rect x="3" y="4" width="18" height="18" rx="2"/>
                    <path d="M16 2v4"/>
                    <path d="M8 2v4"/>
                    <path d="M3 10h18"/>
                </svg>

                <span class="text-[15px] font-medium">
                    Periode Pendaftaran
                </span>

            </a>


            {{-- LAPORAN --}}
            <a
                href="{{ url('/admin/registrations/export') }}"
                class="flex items-center gap-4 px-4 py-3.5 rounded-2xl
                text-white/90 hover:bg-white/10 transition"
            >

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                >
                    <path d="M4 4h16v16H4z"/>
                    <path d="M8 8h8"/>
                    <path d="M8 12h8"/>
                    <path d="M8 16h5"/>
                </svg>

                <span class="text-[15px] font-medium">
                    Laporan
                </span>

            </a>


            {{-- PROFIL --}}
            <a
                href="{{ url('/profil') }}"
                class="flex items-center gap-4 px-4 py-3.5 rounded-2xl
                text-white/90 hover:bg-white/10 transition"
            >

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                >
                    <circle cx="12" cy="12" r="9"/>
                    <circle cx="12" cy="9" r="3"/>
                    <path d="M6.5 19c1.2-2.4 3.1-3.6 5.5-3.6s4.3 1.2 5.5 3.6"/>
                </svg>

                <span class="text-[15px] font-medium">
                    Profil
                </span>

            </a>


            {{-- GALERI --}}
            <a
                href="{{ url('/galeri') }}"
                class="flex items-center gap-4 px-4 py-3.5 rounded-2xl
                text-white/90 hover:bg-white/10 transition"
            >

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                >
                    <rect x="3" y="4" width="18" height="16" rx="2"/>
                    <circle cx="8.5" cy="9" r="1.5"/>
                    <path d="M21 15l-5-5L5 20"/>
                </svg>

                <span class="text-[15px] font-medium">
                    Galeri
                </span>

            </a>


            {{-- INFORMASI --}}
            <a
                href="{{ url('/informasi') }}"
                class="flex items-center gap-4 px-4 py-3.5 rounded-2xl
                text-white/90 hover:bg-white/10 transition"
            >

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                >
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 11v5"/>
                    <path d="M12 8h.01"/>
                </svg>

                <span class="text-[15px] font-medium">
                    Informasi
                </span>

            </a>

        </nav>


        {{-- SIDEBAR FOOTER --}}
        <div class="relative z-10 px-6 py-7 mt-auto">

            <div class="border-t border-white/15 pt-6 text-center">

                <p class="text-[14px] font-medium text-white/90">
                    SMA Negeri 5 Cirebon
                </p>

                <p class="text-[11px] text-white/60 mt-1">
                    Disiplin • Unggul • Berkarakter
                </p>

            </div>

        </div>

    </aside>


    {{-- OVERLAY --}}
    <div
        id="sidebarOverlay"
        class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"
        onclick="toggleSidebar()"
    ></div>


    {{-- ===================================================== --}}
    {{-- MAIN --}}
    {{-- ===================================================== --}}

    <div class="flex-1 min-w-0">


        {{-- TOPBAR --}}
        <header
            class="h-[72px] bg-white border-b border-[#e9eef8]
            flex items-center justify-between px-5 lg:px-8
            sticky top-0 z-30"
        >

            <div class="flex items-center gap-5 flex-1">

                <button
                    onclick="toggleSidebar()"
                    class="lg:hidden text-[#173574]"
                >

                    <svg
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M4 6h16"/>
                        <path d="M4 12h16"/>
                        <path d="M4 18h16"/>
                    </svg>

                </button>


                <div class="hidden lg:block">

                    <svg
                        class="w-6 h-6 text-[#163b7c]"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M4 6h16"/>
                        <path d="M4 12h16"/>
                        <path d="M4 18h16"/>
                    </svg>

                </div>


                <div class="relative w-full max-w-[490px]">

                    <svg
                        class="absolute left-4 top-1/2 -translate-y-1/2
                        w-5 h-5 text-[#a9b8d4]"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <circle cx="11" cy="11" r="7"/>
                        <path d="M20 20l-4-4"/>
                    </svg>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari siswa..."
                        class="w-full h-[42px] rounded-xl
                        bg-[#f4f7fd]
                        border border-transparent
                        pl-11 pr-4
                        text-sm text-[#173574]
                        placeholder:text-[#a7b5d0]
                        focus:outline-none
                        focus:ring-2
                        focus:ring-blue-200"
                    >

                </div>

            </div>


            <div class="flex items-center gap-5">

                <button class="relative text-[#163b7c]">

                    <svg
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M18 8a6 6 0 00-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                        <path d="M10 21h4"/>
                    </svg>

                    <span
                        class="absolute -right-1 -top-1
                        w-2.5 h-2.5 rounded-full
                        bg-red-500 border-2 border-white"
                    ></span>

                </button>


                <div class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-full
                        bg-[#e9effb]
                        flex items-center justify-center"
                    >

                        <svg
                            class="w-7 h-7 text-[#173574]"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <circle cx="12" cy="8" r="4"/>
                            <path d="M4 21c.5-4.5 3.2-7 8-7s7.5 2.5 8 7"/>
                        </svg>

                    </div>

                    <div class="hidden sm:block">

                        <p class="text-sm font-semibold text-[#173574]">
                            Administrator
                        </p>

                    </div>

                    <svg
                        class="hidden sm:block w-4 h-4 text-[#173574]"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path d="M6 9l6 6 6-6"/>
                    </svg>

                </div>

            </div>

        </header>


        {{-- ================================================= --}}
        {{-- CONTENT --}}
        {{-- ================================================= --}}

        <main class="main-gradient min-h-[calc(100vh-72px)] p-5 lg:p-7">


            {{-- HERO --}}
            <section
                class="hero-gradient hero-shadow
                rounded-2xl lg:rounded-[20px]
                px-7 py-7 lg:px-9 lg:py-8
                relative overflow-hidden mb-6"
            >

                <div
                    class="absolute -right-20 -top-24
                    w-72 h-72 rounded-full
                    bg-purple-300/20"
                ></div>

                <div
                    class="absolute right-24 -bottom-28
                    w-64 h-64 rounded-full
                    bg-blue-300/20"
                ></div>


                <div class="relative z-10">

                    <div class="flex items-start gap-5">

                        <div
                            class="w-14 h-14 rounded-2xl
                            bg-gradient-to-br from-blue-500 to-blue-600
                            flex items-center justify-center
                            shadow-lg shadow-blue-300/30 shrink-0"
                        >

                            <svg
                                class="w-7 h-7 text-white"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M22 21v-2a4 4 0 00-3-3.87"/>
                                <path d="M16 3.13a4 4 0 010 7.75"/>
                            </svg>

                        </div>


                        <div>

                            <p class="text-sm font-semibold text-blue-600 mb-1">
                                DATA MASTER
                            </p>

                            <h2
                                class="text-2xl lg:text-[30px]
                                font-bold text-[#2864d7]"
                            >
                                Data Siswa
                            </h2>

                            <p class="text-sm lg:text-[15px] text-[#24477f] mt-1">
                                Kelola data siswa yang terdaftar pada
                                E-Ekstrakurikuler SMA Negeri 5 Cirebon.
                            </p>

                        </div>

                    </div>


                    <p class="mt-6 max-w-3xl text-sm leading-6 text-[#365889]">
                        Data yang ditampilkan meliputi nama siswa, NIS,
                        kelas, jurusan, email, serta informasi pendaftaran
                        ekstrakurikuler.
                    </p>

                </div>

            </section>


            {{-- FLASH SUCCESS --}}
            @if(session('success'))

                <div
                    class="mb-6 rounded-2xl
                    bg-emerald-50 border border-emerald-100
                    px-5 py-4 flex items-start gap-3"
                >

                    <div
                        class="w-9 h-9 rounded-xl bg-emerald-100
                        flex items-center justify-center shrink-0"
                    >

                        <svg
                            class="w-5 h-5 text-emerald-600"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path d="M5 12l4 4L19 6"/>
                        </svg>

                    </div>

                    <div>

                        <p class="font-semibold text-emerald-700">
                            Berhasil
                        </p>

                        <p class="text-sm text-emerald-600 mt-0.5">
                            {{ session('success') }}
                        </p>

                    </div>

                </div>

            @endif


            {{-- FLASH ERROR --}}
            @if(session('error'))

                <div
                    class="mb-6 rounded-2xl
                    bg-red-50 border border-red-100
                    px-5 py-4 flex items-start gap-3"
                >

                    <div
                        class="w-9 h-9 rounded-xl bg-red-100
                        flex items-center justify-center shrink-0"
                    >

                        <svg
                            class="w-5 h-5 text-red-600"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path d="M6 6l12 12"/>
                            <path d="M18 6L6 18"/>
                        </svg>

                    </div>

                    <div>

                        <p class="font-semibold text-red-700">
                            Terjadi Kesalahan
                        </p>

                        <p class="text-sm text-red-600 mt-0.5">
                            {{ session('error') }}
                        </p>

                    </div>

                </div>

            @endif


            {{-- ================================================= --}}
            {{-- DATA SISWA --}}
            {{-- ================================================= --}}

            <section
                class="bg-white rounded-2xl soft-shadow
                border border-[#edf1f8] overflow-hidden"
            >


                {{-- HEADER --}}
                <div
                    class="px-6 py-5
                    border-b border-[#edf1f8]
                    flex flex-col lg:flex-row
                    lg:items-center lg:justify-between gap-4"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="w-11 h-11 rounded-xl
                            bg-indigo-50
                            flex items-center justify-center"
                        >

                            <svg
                                class="w-5 h-5 text-indigo-600"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M22 21v-2a4 4 0 00-3-3.87"/>
                                <path d="M16 3.13a4 4 0 010 7.75"/>
                            </svg>

                        </div>


                        <div>

                            <h3 class="font-bold text-lg text-[#173574]">
                                Daftar Siswa
                            </h3>

                            <p class="text-xs text-[#8a9abb] mt-1">
                                {{ $students->total() }} siswa terdaftar
                            </p>

                        </div>

                    </div>


                    {{-- SEARCH --}}
                    <form
                        method="GET"
                        action="{{ url('/admin/students') }}"
                        class="w-full lg:w-auto"
                    >

                        <div class="relative">

                            <svg
                                class="absolute left-3.5 top-1/2
                                -translate-y-1/2
                                w-4 h-4 text-[#9aabc8]"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <circle cx="11" cy="11" r="7"/>
                                <path d="M20 20l-4-4"/>
                            </svg>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Cari nama / NIS..."
                                class="w-full lg:w-[280px]
                                h-[42px] rounded-xl
                                bg-[#f5f8fd]
                                border border-[#e7edf7]
                                pl-10 pr-4
                                text-sm
                                focus:outline-none
                                focus:ring-2
                                focus:ring-blue-200"
                            >

                        </div>

                    </form>

                </div>


                {{-- TABLE --}}
                <div class="overflow-x-auto scrollbar-hide">

                    <table
                        id="studentTable"
                        class="w-full min-w-[1050px]"
                    >

                        <thead>

                            <tr
                                class="bg-[#f6f8fd]
                                border-b border-[#edf1f8]"
                            >

                                <th
                                    class="text-left px-6 py-4
                                    text-xs font-semibold text-[#52698f]"
                                >
                                    No
                                </th>

                                <th
                                    class="text-left px-6 py-4
                                    text-xs font-semibold text-[#52698f]"
                                >
                                    Siswa
                                </th>

                                <th
                                    class="text-left px-6 py-4
                                    text-xs font-semibold text-[#52698f]"
                                >
                                    NIS
                                </th>

                                <th
                                    class="text-left px-6 py-4
                                    text-xs font-semibold text-[#52698f]"
                                >
                                    Kelas
                                </th>

                                <th
                                    class="text-left px-6 py-4
                                    text-xs font-semibold text-[#52698f]"
                                >
                                    Jurusan
                                </th>

                                <th
                                    class="text-left px-6 py-4
                                    text-xs font-semibold text-[#52698f]"
                                >
                                    Email
                                </th>

                                <th
                                    class="text-center px-6 py-4
                                    text-xs font-semibold text-[#52698f]"
                                >
                                    Pendaftaran
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($students as $student)

                                <tr
                                    class="student-row
                                    border-b border-[#edf1f8]
                                    hover:bg-[#f9fbff] transition"
                                >

                                    {{-- NO --}}
                                    <td class="px-6 py-4 text-sm text-[#7183a5]">

                                        {{ $students->firstItem() + $loop->index }}

                                    </td>


                                    {{-- SISWA --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-10 h-10 rounded-xl
                                                bg-gradient-to-br
                                                from-blue-100 to-indigo-100
                                                flex items-center justify-center
                                                text-blue-600 font-bold"
                                            >

                                                {{ strtoupper(substr($student->name, 0, 1)) }}

                                            </div>

                                            <div>

                                                <p
                                                    class="font-semibold
                                                    text-sm text-[#173574]"
                                                >
                                                    {{ $student->name }}
                                                </p>

                                                <p
                                                    class="text-xs text-[#8a9abb]
                                                    mt-0.5"
                                                >
                                                    Siswa
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- NIS --}}
                                    <td class="px-6 py-4">

                                        <span
                                            class="text-sm font-medium
                                            text-[#52698f]"
                                        >
                                            {{ $student->nis ?? '-' }}
                                        </span>

                                    </td>


                                    {{-- KELAS --}}
                                    <td class="px-6 py-4">

                                        @if($student->kelas)

                                            <span
                                                class="inline-flex
                                                px-3 py-1.5 rounded-lg
                                                bg-blue-50 text-blue-600
                                                text-xs font-semibold"
                                            >
                                                {{ $student->kelas }}
                                            </span>

                                        @else

                                            <span class="text-sm text-[#9aabc8]">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- JURUSAN --}}
                                    <td class="px-6 py-4">

                                        <span
                                            class="text-sm font-medium
                                            text-[#52698f]"
                                        >
                                            {{ $student->jurusan ?? '-' }}
                                        </span>

                                    </td>


                                    {{-- EMAIL --}}
                                    <td class="px-6 py-4">

                                        <span
                                            class="text-sm text-[#52698f]"
                                        >
                                            {{ $student->email }}
                                        </span>

                                    </td>


                                    {{-- PENDAFTARAN --}}
                                    <td class="px-6 py-4 text-center">

                                        @php
                                            $jumlahPendaftaran =
                                                $student->registrations_count ?? 0;
                                        @endphp


                                        @if($jumlahPendaftaran > 0)

                                            <span
                                                class="inline-flex items-center gap-1.5
                                                px-3 py-1.5 rounded-full
                                                bg-indigo-50 text-indigo-600
                                                text-xs font-semibold"
                                            >

                                                <span
                                                    class="w-1.5 h-1.5
                                                    rounded-full
                                                    bg-indigo-500"
                                                ></span>

                                                {{ $jumlahPendaftaran }} Pendaftaran

                                            </span>

                                        @else

                                            <span
                                                class="inline-flex items-center gap-1.5
                                                px-3 py-1.5 rounded-full
                                                bg-slate-50 text-slate-500
                                                text-xs font-semibold"
                                            >

                                                Belum Mendaftar

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        class="px-6 py-16 text-center"
                                    >

                                        <div
                                            class="w-16 h-16 rounded-2xl
                                            bg-blue-50
                                            flex items-center justify-center
                                            mx-auto mb-4"
                                        >

                                            <svg
                                                class="w-8 h-8 text-blue-500"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                viewBox="0 0 24 24"
                                            >
                                                <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/>
                                                <circle cx="9" cy="7" r="4"/>
                                            </svg>

                                        </div>

                                        <p
                                            class="font-semibold
                                            text-[#173574]"
                                        >
                                            Data Siswa Tidak Ditemukan
                                        </p>

                                        <p
                                            class="text-xs
                                            text-[#8a9abb] mt-1"
                                        >
                                            Belum ada siswa yang sesuai
                                            dengan pencarian.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- PAGINATION --}}
                @if($students->hasPages())

                    <div
                        class="px-6 py-5
                        border-t border-[#edf1f8]
                        flex flex-col sm:flex-row
                        items-center justify-between gap-4"
                    >

                        <p class="text-xs text-[#8a9abb]">

                            Menampilkan
                            <span class="font-semibold text-[#52698f]">
                                {{ $students->firstItem() ?? 0 }}
                            </span>
                            -
                            <span class="font-semibold text-[#52698f]">
                                {{ $students->lastItem() ?? 0 }}
                            </span>

                            dari

                            <span class="font-semibold text-[#52698f]">
                                {{ $students->total() }}
                            </span>

                            siswa

                        </p>


                        <div class="flex items-center gap-2">

                            @if($students->onFirstPage())

                                <span
                                    class="w-9 h-9 rounded-lg
                                    bg-[#f3f6fb]
                                    text-[#b0bdd2]
                                    flex items-center justify-center"
                                >
                                    ‹
                                </span>

                            @else

                                <a
                                    href="{{ $students->previousPageUrl() }}"
                                    class="w-9 h-9 rounded-lg
                                    bg-[#f3f6fb]
                                    text-[#52698f]
                                    flex items-center justify-center
                                    hover:bg-blue-50 hover:text-blue-600"
                                >
                                    ‹
                                </a>

                            @endif


                            @foreach($students->getUrlRange(
                                max(1, $students->currentPage() - 2),
                                min($students->lastPage(), $students->currentPage() + 2)
                            ) as $page => $url)

                                @if($page == $students->currentPage())

                                    <span
                                        class="w-9 h-9 rounded-lg
                                        button-gradient
                                        text-white
                                        flex items-center justify-center
                                        text-xs font-semibold"
                                    >
                                        {{ $page }}
                                    </span>

                                @else

                                    <a
                                        href="{{ $url }}"
                                        class="w-9 h-9 rounded-lg
                                        bg-[#f3f6fb]
                                        text-[#52698f]
                                        flex items-center justify-center
                                        text-xs font-semibold
                                        hover:bg-blue-50
                                        hover:text-blue-600"
                                    >
                                        {{ $page }}
                                    </a>

                                @endif

                            @endforeach


                            @if($students->hasMorePages())

                                <a
                                    href="{{ $students->nextPageUrl() }}"
                                    class="w-9 h-9 rounded-lg
                                    bg-[#f3f6fb]
                                    text-[#52698f]
                                    flex items-center justify-center
                                    hover:bg-blue-50 hover:text-blue-600"
                                >
                                    ›
                                </a>

                            @else

                                <span
                                    class="w-9 h-9 rounded-lg
                                    bg-[#f3f6fb]
                                    text-[#b0bdd2]
                                    flex items-center justify-center"
                                >
                                    ›
                                </span>

                            @endif

                        </div>

                    </div>

                @endif

            </section>


            {{-- INFO --}}
            <section
                class="mt-6 rounded-2xl
                bg-gradient-to-r from-blue-50 to-indigo-50
                border border-blue-100 p-5"
            >

                <div class="flex items-start gap-4">

                    <div
                        class="w-10 h-10 rounded-xl
                        bg-blue-100
                        flex items-center justify-center
                        shrink-0"
                    >

                        <svg
                            class="w-5 h-5 text-blue-600"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <circle cx="12" cy="12" r="9"/>
                            <path d="M12 11v5"/>
                            <path d="M12 8h.01"/>
                        </svg>

                    </div>

                    <div>

                        <h4 class="font-semibold text-[#173574]">
                            Informasi Data Siswa
                        </h4>

                        <p class="text-sm text-[#52698f] mt-1 leading-6">
                            Data siswa digunakan untuk proses pendaftaran
                            ekstrakurikuler dan validasi administrasi.
                            Pastikan informasi NIS, kelas, jurusan, dan email
                            siswa sudah sesuai.
                        </p>

                    </div>

                </div>

            </section>

        </main>


        {{-- FOOTER --}}
        <footer
            class="bg-white border-t border-[#edf1f8]
            px-6 py-5"
        >

            <div class="text-center text-xs text-[#94a2ba]">

                © {{ date('Y') }}
                E-Ekstrakurikuler
                SMA Negeri 5 Cirebon

            </div>

        </footer>

    </div>

</div>


<script>

    function toggleSidebar() {

        const sidebar =
            document.getElementById('sidebar');

        const overlay =
            document.getElementById('sidebarOverlay');

        sidebar.classList.toggle('-translate-x-full');

        overlay.classList.toggle('hidden');

    }


    // Search realtime pada tabel
    const searchInput =
        document.getElementById('searchInput');

    if (searchInput) {

        searchInput.addEventListener('input', function () {

            const keyword =
                this.value.toLowerCase();

            document
                .querySelectorAll('.student-row')
                .forEach(function (row) {

                    row.style.display =
                        row.innerText
                            .toLowerCase()
                            .includes(keyword)
                            ? ''
                            : 'none';

                });

        });

    }

</script>

</body>
</html>