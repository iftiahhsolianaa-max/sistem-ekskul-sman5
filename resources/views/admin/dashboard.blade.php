<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin | SMA Negeri 5 Cirebon</title>

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


            {{-- DASHBOARD AKTIF --}}
            <a
                href="{{ url('/admin/dashboard') }}"
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
                    <path d="M3 10.5L12 3l9 7.5"/>
                    <path d="M5 9.5V21h14V9.5"/>
                    <path d="M9 21v-6h6v6"/>
                </svg>

                <span class="text-[15px] font-semibold">
                    Dashboard
                </span>

            </a>


            {{-- DATA SISWA --}}
            <a
                href="{{ url('/admin/students') }}"
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
                    <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M22 21v-2a4 4 0 00-3-3.87"/>
                    <path d="M16 3.13a4 4 0 010 7.75"/>
                </svg>

                <span class="text-[15px] font-medium">
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
                    <circle cx="12" cy="11" r="2"/>
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


        {{-- FOOTER SIDEBAR --}}
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


        {{-- TOP NAVBAR --}}
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


                {{-- SEARCH --}}
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
                        placeholder="Cari dashboard..."
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


            {{-- RIGHT --}}
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


                {{-- ADMIN PROFILE + DROPDOWN --}}
                <div class="relative" id="adminMenuWrapper">

                    <button
                        type="button"
                        onclick="toggleAdminMenu()"
                        class="flex items-center gap-3 rounded-xl px-2 py-1.5
                        hover:bg-[#f4f7fd] transition"
                    >

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

                        <div class="hidden sm:block text-left">

                            <p class="text-sm font-semibold text-[#173574]">
                                Administrator
                            </p>

                        </div>

                        <svg
                            id="adminMenuArrow"
                            class="hidden sm:block w-4 h-4 text-[#173574] transition-transform duration-200"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path d="M6 9l6 6 6-6"/>
                        </svg>

                    </button>

                    {{-- DROPDOWN ADMIN --}}
                    <div
                        id="adminMenu"
                        class="hidden absolute right-0 top-full mt-3 w-52
                        bg-white rounded-2xl border border-[#edf1f8]
                        shadow-[0_15px_40px_rgba(36,72,135,.15)]
                        overflow-hidden z-50"
                    >

                        <div class="px-4 py-3 border-b border-[#edf1f8]">
                            <p class="text-xs text-[#8a9abb]">
                                Masuk sebagai
                            </p>

                            <p class="text-sm font-semibold text-[#173574] mt-1">
                                Administrator
                            </p>
                        </div>

                        <a
                            href="{{ url('/profil') }}"
                            class="flex items-center gap-3 px-4 py-3
                            text-sm text-[#52698f]
                            hover:bg-[#f6f8fd] transition"
                        >
                            <svg
                                class="w-5 h-5 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <circle cx="12" cy="12" r="9"/>
                                <circle cx="12" cy="9" r="3"/>
                                <path d="M6.5 19c1.2-2.4 3.1-3.6 5.5-3.6s4.3 1.2 5.5 3.6"/>
                            </svg>

                            Profil
                        </a>

                        <div class="border-t border-[#edf1f8]"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                class="w-full flex items-center gap-3 px-4 py-3
                                text-sm text-red-500
                                hover:bg-red-50 transition text-left"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                >
                                    <path d="M10 17l5-5-5-5"/>
                                    <path d="M15 12H3"/>
                                    <path d="M21 19V5a2 2 0 00-2-2h-6"/>
                                </svg>

                                Logout
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </header>


        {{-- ================================================= --}}
        {{-- CONTENT --}}
        {{-- ================================================= --}}

        <main class="main-gradient min-h-[calc(100vh-72px)] p-5 lg:p-7">


            {{-- HERO DASHBOARD --}}
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
                                <path d="M3 13h8V3H3v10z"/>
                                <path d="M13 21h8V11h-8v10z"/>
                                <path d="M13 3h8v4h-8z"/>
                                <path d="M3 17h8v4H3z"/>
                            </svg>

                        </div>


                        <div>

                            <p class="text-sm font-semibold text-blue-600 mb-1">
                                ADMIN PANEL
                            </p>

                            <h2
                                class="text-2xl lg:text-[30px]
                                font-bold text-[#2864d7]"
                            >
                                Dashboard Admin
                            </h2>

                            <p class="text-sm lg:text-[15px] text-[#24477f] mt-1">
                                Kelola dan pantau seluruh aktivitas E-Ekstrakurikuler
                                SMA Negeri 5 Cirebon.
                            </p>

                        </div>

                    </div>


                    <p class="mt-6 max-w-3xl text-sm leading-6 text-[#365889]">
                        Pantau data siswa, ekstrakurikuler, pendaftaran siswa,
                        serta status validasi melalui dashboard administrasi.
                    </p>

                </div>

            </section>


            {{-- ================================================= --}}
            {{-- STATISTIK --}}
            {{-- ================================================= --}}

            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">


                {{-- TOTAL SISWA --}}
                <div
                    class="bg-white rounded-2xl p-5 soft-shadow
                    border border-[#edf1f8]"
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-[#7183a5]">
                                Total Siswa
                            </p>

                            <p class="text-3xl font-bold text-blue-600 mt-2">
                                {{ $totalSiswa }}
                            </p>

                            <p class="text-xs text-[#8a9abb] mt-1">
                                Siswa terdaftar
                            </p>

                        </div>

                        <div
                            class="w-12 h-12 rounded-2xl
                            bg-blue-50
                            flex items-center justify-center"
                        >

                            <svg
                                class="w-6 h-6 text-blue-600"
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

                    </div>

                </div>


                {{-- TOTAL EKSKUL --}}
                <div
                    class="bg-white rounded-2xl p-5 soft-shadow
                    border border-[#edf1f8]"
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-[#7183a5]">
                                Ekstrakurikuler
                            </p>

                            <p class="text-3xl font-bold text-indigo-600 mt-2">
                                {{ $totalEkskul }}
                            </p>

                            <p class="text-xs text-[#8a9abb] mt-1">
                                Ekskul tersedia
                            </p>

                        </div>

                        <div
                            class="w-12 h-12 rounded-2xl
                            bg-indigo-50
                            flex items-center justify-center"
                        >

                            <svg
                                class="w-6 h-6 text-indigo-600"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path d="M12 3l2.3 4.7L19 9l-3.5 3.4.8 4.8L12 15l-4.3 2.2.8-4.8L5 9l4.7-1.3L12 3z"/>
                            </svg>

                        </div>

                    </div>

                </div>


                {{-- PENDAFTARAN --}}
                <div
                    class="bg-white rounded-2xl p-5 soft-shadow
                    border border-[#edf1f8]"
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-[#7183a5]">
                                Pendaftaran
                            </p>

                            <p class="text-3xl font-bold text-purple-600 mt-2">
                                {{ $totalPendaftaran }}
                            </p>

                            <p class="text-xs text-[#8a9abb] mt-1">
                                Total pendaftaran
                            </p>

                        </div>

                        <div
                            class="w-12 h-12 rounded-2xl
                            bg-purple-50
                            flex items-center justify-center"
                        >

                            <svg
                                class="w-6 h-6 text-purple-600"
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

                        </div>

                    </div>

                </div>


                {{-- PENDING --}}
                <div
                    class="bg-white rounded-2xl p-5 soft-shadow
                    border border-[#edf1f8]"
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-[#7183a5]">
                                Menunggu Validasi
                            </p>

                            <p class="text-3xl font-bold text-amber-500 mt-2">
                                {{ $totalPending }}
                            </p>

                            <p class="text-xs text-[#8a9abb] mt-1">
                                Perlu diperiksa
                            </p>

                        </div>

                        <div
                            class="w-12 h-12 rounded-2xl
                            bg-amber-50
                            flex items-center justify-center"
                        >

                            <svg
                                class="w-6 h-6 text-amber-500"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M12 7v5l3 2"/>
                            </svg>

                        </div>

                    </div>

                </div>

            </section>


            {{-- ================================================= --}}
            {{-- STATUS PENDAFTARAN --}}
            {{-- ================================================= --}}

            <section
                class="bg-white rounded-2xl soft-shadow
                border border-[#edf1f8] overflow-hidden mb-6"
            >

                <div
                    class="px-6 py-5 border-b border-[#edf1f8]
                    flex items-center justify-between"
                >

                    <div>

                        <h3 class="font-bold text-lg text-[#173574]">
                            Status Pendaftaran
                        </h3>

                        <p class="text-xs text-[#8a9abb] mt-1">
                            Ringkasan status pendaftaran siswa.
                        </p>

                    </div>

                    <a
                        href="{{ url('/admin/registrations') }}"
                        class="text-xs font-semibold text-blue-600 hover:text-blue-700"
                    >
                        Lihat Semua →
                    </a>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-3">


                    {{-- DITERIMA --}}
                    <div
                        class="px-6 py-6
                        border-b md:border-b-0 md:border-r
                        border-[#edf1f8]"
                    >

                        <div class="flex items-center gap-4">

                            <div
                                class="w-11 h-11 rounded-xl
                                bg-emerald-50
                                flex items-center justify-center"
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

                                <p class="text-sm text-[#7183a5]">
                                    Diterima
                                </p>

                                <p class="text-2xl font-bold text-emerald-600">
                                    {{ $totalDiterima }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- PENDING --}}
                    <div
                        class="px-6 py-6
                        border-b md:border-b-0 md:border-r
                        border-[#edf1f8]"
                    >

                        <div class="flex items-center gap-4">

                            <div
                                class="w-11 h-11 rounded-xl
                                bg-amber-50
                                flex items-center justify-center"
                            >

                                <svg
                                    class="w-5 h-5 text-amber-500"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                >
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M12 7v5l3 2"/>
                                </svg>

                            </div>

                            <div>

                                <p class="text-sm text-[#7183a5]">
                                    Pending
                                </p>

                                <p class="text-2xl font-bold text-amber-500">
                                    {{ $totalPending }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- DITOLAK --}}
                    <div class="px-6 py-6">

                        <div class="flex items-center gap-4">

                            <div
                                class="w-11 h-11 rounded-xl
                                bg-red-50
                                flex items-center justify-center"
                            >

                                <svg
                                    class="w-5 h-5 text-red-500"
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

                                <p class="text-sm text-[#7183a5]">
                                    Ditolak
                                </p>

                                <p class="text-2xl font-bold text-red-500">
                                    {{ $totalDitolak }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </section>


            {{-- ================================================= --}}
            {{-- EKSKUL + PENDAFTARAN TERBARU --}}
            {{-- ================================================= --}}

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-6">


                {{-- STATISTIK EKSKUL --}}
                <section
                    class="bg-white rounded-2xl soft-shadow
                    border border-[#edf1f8] overflow-hidden"
                >

                    <div
                        class="px-6 py-5 border-b border-[#edf1f8]
                        flex items-center justify-between"
                    >

                        <div>

                            <h3 class="font-bold text-lg text-[#173574]">
                                Statistik Ekstrakurikuler
                            </h3>

                            <p class="text-xs text-[#8a9abb] mt-1">
                                Jumlah siswa yang diterima pada setiap ekskul.
                            </p>

                        </div>

                        <a
                            href="{{ url('/admin/extracurriculars') }}"
                            class="text-xs font-semibold text-blue-600"
                        >
                            Kelola →
                        </a>

                    </div>


                    @if($statistikEkskul->count() > 0)

                        <div class="p-6 space-y-5">

                            @foreach($statistikEkskul as $ekskul)

                                @php
                                    $accepted = $ekskul->accepted_count ?? 0;

                                    $quota = max((int) $ekskul->quota, 1);

                                    $percentage = min(
                                        100,
                                        round(($accepted / $quota) * 100)
                                    );
                                @endphp

                                <div>

                                    <div class="flex items-center justify-between mb-2">

                                        <div>

                                            <p class="text-sm font-semibold text-[#173574]">
                                                {{ $ekskul->name }}
                                            </p>

                                            <p class="text-xs text-[#8a9abb] mt-0.5">
                                                {{ $accepted }} siswa diterima
                                            </p>

                                        </div>

                                        <span class="text-xs font-semibold text-[#52698f]">
                                            {{ $accepted }}/{{ $ekskul->quota }}
                                        </span>

                                    </div>


                                    <div
                                        class="w-full h-2.5
                                        bg-[#edf1f8] rounded-full overflow-hidden"
                                    >

                                        <div
                                            class="h-2.5 rounded-full
                                            bg-gradient-to-r
                                            from-blue-500 to-indigo-500"
                                            style="width: {{ $percentage }}%"
                                        ></div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="py-16 text-center">

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
                                    <path d="M12 3l2.3 4.7L19 9l-3.5 3.4.8 4.8L12 15l-4.3 2.2.8-4.8L5 9l4.7-1.3L12 3z"/>
                                </svg>

                            </div>

                            <p class="font-semibold text-[#173574]">
                                Belum Ada Data
                            </p>

                            <p class="text-xs text-[#8a9abb] mt-1">
                                Belum ada data ekstrakurikuler.
                            </p>

                        </div>

                    @endif

                </section>


                {{-- PENDAFTARAN TERBARU --}}
                <section
                    class="bg-white rounded-2xl soft-shadow
                    border border-[#edf1f8] overflow-hidden"
                >

                    <div
                        class="px-6 py-5 border-b border-[#edf1f8]
                        flex items-center justify-between"
                    >

                        <div>

                            <h3 class="font-bold text-lg text-[#173574]">
                                Pendaftaran Terbaru
                            </h3>

                            <p class="text-xs text-[#8a9abb] mt-1">
                                Aktivitas pendaftaran siswa terbaru.
                            </p>

                        </div>

                        <a
                            href="{{ url('/admin/registrations') }}"
                            class="text-xs font-semibold text-blue-600"
                        >
                            Lihat Semua →
                        </a>

                    </div>


                    @if($pendaftaranTerbaru->count() > 0)

                        <div class="overflow-x-auto scrollbar-hide">

                            <table class="w-full min-w-[600px]">

                                <thead>

                                    <tr
                                        class="bg-[#f6f8fd]
                                        border-b border-[#edf1f8]"
                                    >

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
                                            Ekstrakurikuler
                                        </th>

                                        <th
                                            class="text-center px-6 py-4
                                            text-xs font-semibold text-[#52698f]"
                                        >
                                            Status
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @foreach($pendaftaranTerbaru as $pendaftaran)

                                        <tr
                                            class="border-b border-[#edf1f8]
                                            hover:bg-[#f9fbff] transition"
                                        >

                                            <td class="px-6 py-4">

                                                <p
                                                    class="text-sm font-semibold
                                                    text-[#173574]"
                                                >
                                                    {{ $pendaftaran->user->name }}
                                                </p>

                                                <p
                                                    class="text-xs text-[#8a9abb]
                                                    mt-1"
                                                >
                                                    {{ $pendaftaran->created_at->format('d/m/Y H:i') }}
                                                </p>

                                            </td>


                                            <td class="px-6 py-4">

                                                <p
                                                    class="text-sm text-[#52698f]
                                                    font-medium"
                                                >
                                                    {{ $pendaftaran->extracurricular->name }}
                                                </p>

                                            </td>


                                            <td class="px-6 py-4 text-center">

                                                @if($pendaftaran->status === 'Diterima')

                                                    <span
                                                        class="inline-flex items-center gap-1.5
                                                        px-3 py-1.5 rounded-full
                                                        bg-emerald-50 text-emerald-600
                                                        text-xs font-semibold"
                                                    >

                                                        <span
                                                            class="w-1.5 h-1.5 rounded-full
                                                            bg-emerald-500"
                                                        ></span>

                                                        Diterima

                                                    </span>

                                                @elseif($pendaftaran->status === 'Ditolak')

                                                    <span
                                                        class="inline-flex items-center gap-1.5
                                                        px-3 py-1.5 rounded-full
                                                        bg-red-50 text-red-600
                                                        text-xs font-semibold"
                                                    >

                                                        <span
                                                            class="w-1.5 h-1.5 rounded-full
                                                            bg-red-500"
                                                        ></span>

                                                        Ditolak

                                                    </span>

                                                @else

                                                    <span
                                                        class="inline-flex items-center gap-1.5
                                                        px-3 py-1.5 rounded-full
                                                        bg-amber-50 text-amber-600
                                                        text-xs font-semibold"
                                                    >

                                                        <span
                                                            class="w-1.5 h-1.5 rounded-full
                                                            bg-amber-500"
                                                        ></span>

                                                        Pending

                                                    </span>

                                                @endif

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        <div class="py-16 text-center">

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
                                    <path d="M6 2h12v20H6z"/>
                                    <path d="M9 6h6"/>
                                    <path d="M9 10h6"/>
                                    <path d="M9 14h4"/>
                                </svg>

                            </div>

                            <p class="font-semibold text-[#173574]">
                                Belum Ada Pendaftaran
                            </p>

                            <p class="text-xs text-[#8a9abb] mt-1">
                                Belum ada siswa yang mendaftar.
                            </p>

                        </div>

                    @endif

                </section>

            </div>


            {{-- ================================================= --}}
            {{-- QUICK ACTION --}}
            {{-- ================================================= --}}

            <section
                class="bg-white rounded-2xl soft-shadow
                border border-[#edf1f8] overflow-hidden mb-6"
            >

                <div class="px-6 py-5 border-b border-[#edf1f8]">

                    <h3 class="font-bold text-lg text-[#173574]">
                        Akses Cepat
                    </h3>

                    <p class="text-xs text-[#8a9abb] mt-1">
                        Akses fitur administrasi dengan cepat.
                    </p>

                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">


                    {{-- SISWA --}}
                    <a
                        href="{{ url('/admin/students') }}"
                        class="px-6 py-6
                        border-b sm:border-r
                        border-[#edf1f8]
                        hover:bg-[#f9fbff] transition"
                    >

                        <div
                            class="w-11 h-11 rounded-xl
                            bg-blue-50
                            flex items-center justify-center mb-4"
                        >

                            <svg
                                class="w-5 h-5 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                            </svg>

                        </div>

                        <p class="text-sm font-semibold text-[#173574]">
                            Data Siswa
                        </p>

                        <p class="text-xs text-[#8a9abb] mt-1">
                            Kelola data siswa.
                        </p>

                        <p class="text-xs font-semibold text-blue-600 mt-4">
                            Buka →
                        </p>

                    </a>


                    {{-- EKSKUL --}}
                    <a
                        href="{{ url('/admin/extracurriculars') }}"
                        class="px-6 py-6
                        border-b lg:border-r
                        border-[#edf1f8]
                        hover:bg-[#f9fbff] transition"
                    >

                        <div
                            class="w-11 h-11 rounded-xl
                            bg-indigo-50
                            flex items-center justify-center mb-4"
                        >

                            <svg
                                class="w-5 h-5 text-indigo-600"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path d="M12 3l2.3 4.7L19 9l-3.5 3.4.8 4.8L12 15l-4.3 2.2.8-4.8L5 9l4.7-1.3L12 3z"/>
                            </svg>

                        </div>

                        <p class="text-sm font-semibold text-[#173574]">
                            Ekstrakurikuler
                        </p>

                        <p class="text-xs text-[#8a9abb] mt-1">
                            Kelola data ekskul.
                        </p>

                        <p class="text-xs font-semibold text-blue-600 mt-4">
                            Buka →
                        </p>

                    </a>


                    {{-- PENDAFTARAN --}}
                    <a
                        href="{{ url('/admin/registrations') }}"
                        class="px-6 py-6
                        border-b sm:border-r lg:border-b-0
                        border-[#edf1f8]
                        hover:bg-[#f9fbff] transition"
                    >

                        <div
                            class="w-11 h-11 rounded-xl
                            bg-purple-50
                            flex items-center justify-center mb-4"
                        >

                            <svg
                                class="w-5 h-5 text-purple-600"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                            >
                                <path d="M6 2h12v20H6z"/>
                                <path d="M9 6h6"/>
                                <path d="M9 10h6"/>
                            </svg>

                        </div>

                        <p class="text-sm font-semibold text-[#173574]">
                            Pendaftaran
                        </p>

                        <p class="text-xs text-[#8a9abb] mt-1">
                            Validasi pendaftaran siswa.
                        </p>

                        <p class="text-xs font-semibold text-blue-600 mt-4">
                            Buka →
                        </p>

                    </a>


                    {{-- PERIODE --}}
                    <a
                        href="{{ url('/admin/registration-periods') }}"
                        class="px-6 py-6
                        hover:bg-[#f9fbff] transition"
                    >

                        <div
                            class="w-11 h-11 rounded-xl
                            bg-emerald-50
                            flex items-center justify-center mb-4"
                        >

                            <svg
                                class="w-5 h-5 text-emerald-600"
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

                        </div>

                        <p class="text-sm font-semibold text-[#173574]">
                            Periode Pendaftaran
                        </p>

                        <p class="text-xs text-[#8a9abb] mt-1">
                            Atur jadwal pendaftaran.
                        </p>

                        <p class="text-xs font-semibold text-blue-600 mt-4">
                            Buka →
                        </p>

                    </a>

                </div>

            </section>


            {{-- INFO --}}
            <section
                class="rounded-2xl
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
                            Informasi Dashboard
                        </h4>

                        <p class="text-sm text-[#52698f] mt-1 leading-6">
                            Gunakan dashboard ini untuk memantau data siswa,
                            mengelola ekstrakurikuler, memvalidasi pendaftaran,
                            dan mengatur periode pendaftaran.
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

    function toggleAdminMenu() {

        const menu =
            document.getElementById('adminMenu');

        const arrow =
            document.getElementById('adminMenuArrow');

        menu.classList.toggle('hidden');

        arrow.classList.toggle('rotate-180');

    }

    document.addEventListener('click', function(event) {

        const wrapper =
            document.getElementById('adminMenuWrapper');

        const menu =
            document.getElementById('adminMenu');

        const arrow =
            document.getElementById('adminMenuArrow');

        if (wrapper && !wrapper.contains(event.target)) {

            menu.classList.add('hidden');

            arrow.classList.remove('rotate-180');

        }

    });

</script>

</body>
</html>