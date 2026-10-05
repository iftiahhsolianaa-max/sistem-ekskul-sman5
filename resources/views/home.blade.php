<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | SMAN 5 Cirebon</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
                    circle at 20% 10%,
                    rgba(255,255,255,.13),
                    transparent 25%
                ),
                linear-gradient(
                    180deg,
                    #21499c 0%,
                    #285bc0 42%,
                    #4b55c9 72%,
                    #6846c8 100%
                );
        }

        .sidebar-active {
            background: rgba(255,255,255,.14);
            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,.08);
        }

        .soft-shadow {
            box-shadow: 0 12px 30px rgba(40,73,145,.08);
        }

        .hero-shadow {
            box-shadow: 0 20px 45px rgba(40,73,145,.10);
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

        .main-gradient {
            background:
                radial-gradient(
                    circle at 10% 0%,
                    rgba(96,165,250,.10),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 90% 15%,
                    rgba(129,140,248,.10),
                    transparent 30%
                ),
                #f5f8ff;
        }

        .hero-gradient {
            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(255,255,255,.95),
                    transparent 32%
                ),
                radial-gradient(
                    circle at 85% 10%,
                    rgba(165,180,252,.35),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #eef6ff 0%,
                    #eef0ff 52%,
                    #f5f0ff 100%
                );
        }

        @media (max-width: 1023px) {
            .mobile-menu {
                display: block;
            }
        }
    </style>
</head>

<body class="text-slate-800 antialiased min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="sidebar-gradient fixed left-0 top-0 z-50 hidden h-screen w-[298px] overflow-hidden text-white lg:block">

        <div class="relative h-full px-5 py-6 flex flex-col">

            <!-- LOGO -->
            <div class="mb-8 flex items-center gap-3 px-2">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/95 p-2 shadow-lg">

                    <img
                        src="{{ asset('images/logo-sman5.png') }}"
                        alt="Logo SMAN 5 Cirebon"
                        class="h-full w-full object-contain"
                    >

                </div>

                <div>
                    <h1 class="text-[16px] font-extrabold leading-tight">
                        SMAN 5 CIREBON
                    </h1>

                    <p class="mt-1 text-[10px] font-medium uppercase tracking-[0.12em] text-blue-100">
                        Portal E-Ekstrakurikuler
                    </p>
                </div>

            </div>

            <!-- MENU TITLE -->
            <div class="mb-5 px-2 text-[10px] font-semibold uppercase tracking-[0.18em] text-blue-100/80">
                Menu Utama
            </div>

            <!-- MENU -->
            <nav class="space-y-2">

                <!-- HOME -->
                <a
                    href="{{ url('/home') }}"
                    class="sidebar-active font-semibold flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] transition"
                >
                    <span class="w-6 text-center">⌂</span>
                    <span>Home</span>
                </a>

                <!-- PROFIL -->
                <a
                    href="{{ url('/profil') }}"
                    class="font-medium hover:bg-white/10 flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] transition"
                >
                    <span class="w-6 text-center">🏫</span>
                    <span>Profil</span>
                </a>

                <!-- AKADEMIK -->
                <a
                    href="{{ url('/') }}"
                    class="font-medium hover:bg-white/10 flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] transition"
                >
                    <span class="w-6 text-center">📚</span>
                    <span>Akademik</span>
                </a>

                <!-- GALERI -->
                <a
                    href="{{ url('/galeri') }}"
                    class="font-medium hover:bg-white/10 flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] transition"
                >
                    <span class="w-6 text-center">🖼️</span>
                    <span>Galeri</span>
                </a>

                <!-- INFORMASI -->
                <a
                    href="{{ url('/informasi') }}"
                    class="font-medium hover:bg-white/10 flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] transition"
                >
                    <span class="w-6 text-center">ℹ️</span>
                    <span>Informasi</span>
                </a>

            </nav>

            <!-- SIDEBAR FOOTER -->
            <div class="relative z-10 px-2 py-7 mt-auto">

                <div class="border-t border-white/15 pt-6 text-center">

                    <p class="text-[14px] font-medium text-white/90">
                        SMA Negeri 5 Cirebon
                    </p>

                    <p class="text-[11px] text-white/60 mt-1">
                        Disiplin • Unggul • Berkarakter
                    </p>

                </div>

            </div>

        </div>

    </aside>


    <!-- MAIN AREA -->
    <div class="flex-1 min-w-0 lg:ml-[298px]">

        <!-- HEADER -->
        <header class="h-[72px] bg-white border-b border-[#e9eef8] flex items-center justify-between px-5 lg:px-8 sticky top-0 z-30">

            <!-- PAGE TITLE -->
            <div>

                <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-[#8a9abb]">
                    HALAMAN UTAMA
                </p>

                <h1 class="text-[20px] font-extrabold text-[#111b36] leading-tight">
                    Home SMAN 5 Cirebon
                </h1>

            </div>


            <!-- LOGIN / REGISTER -->
            <div class="flex items-center gap-3">

                @if (Route::has('login'))

                    @auth

                        <!-- USER SUDAH LOGIN -->
                        <a
                            href="{{ url('/dashboard') }}"
                            class="button-gradient text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-lg shadow-blue-200/40 hover:opacity-95 transition"
                        >
                            Dashboard
                        </a>

                    @else

                        <!-- LOGIN -->
                        <a
                            href="{{ route('login') }}"
                            class="px-5 py-2.5 rounded-xl text-sm font-semibold text-indigo-600 border border-indigo-100 bg-white hover:bg-indigo-50 transition"
                        >
                            Login
                        </a>

                        <!-- REGISTER -->
                        @if (Route::has('register'))

                            <a
                                href="{{ route('register') }}"
                                class="button-gradient text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-lg shadow-blue-200/40 hover:opacity-95 transition"
                            >
                                Register
                            </a>

                        @endif

                    @endauth

                @endif

            </div>

        </header>


        <!-- MAIN CONTENT -->
        <main class="main-gradient min-h-[calc(100vh-72px)] px-5 lg:px-7 py-7">

            <!-- HERO -->
            <section class="hero-gradient rounded-[20px] px-7 py-8 lg:px-9 lg:py-9 hero-shadow border border-white/80">

                <div class="max-w-4xl">

                    <!-- BADGE -->
                    <span class="inline-flex items-center px-3.5 py-1.5 rounded-full bg-white/80 text-indigo-600 text-xs font-semibold shadow-sm mb-4">

                        <span class="w-2 h-2 rounded-full bg-indigo-500 mr-2"></span>

                        Portal E-Ekstrakurikuler

                    </span>


                    <!-- TITLE -->
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight">

                        Selamat Datang di
                        <span class="text-indigo-600">
                            SMAN 5 Cirebon
                        </span>

                    </h2>


                    <!-- DESCRIPTION -->
                    <p class="mt-4 text-sm lg:text-base text-slate-600 leading-relaxed max-w-2xl">

                        Selamat datang di portal E-Ekstrakurikuler
                        SMAN 5 Cirebon. Temukan berbagai informasi
                        sekolah dan pilihan kegiatan ekstrakurikuler
                        yang dapat mendukung minat, bakat, serta
                        pengembangan diri siswa.

                    </p>


                    <!-- BUTTONS -->
                    <div class="mt-7 flex flex-wrap gap-3">

                        <a
                            href="{{ url('/') }}"
                            class="button-gradient text-white font-semibold px-6 py-3 rounded-xl shadow-lg shadow-indigo-500/20 hover:opacity-95 transition"
                        >
                            Lihat Katalog Ekstrakurikuler →
                        </a>

                        <a
                            href="{{ url('/profil') }}"
                            class="bg-white text-indigo-600 font-semibold px-6 py-3 rounded-xl border border-indigo-100 hover:bg-indigo-50 transition"
                        >
                            Tentang Sekolah
                        </a>

                    </div>

                </div>

            </section>


            <!-- QUICK ACCESS -->
            <section class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-5">

                <!-- EKSTRAKURIKULER -->
                <a
                    href="{{ url('/') }}"
                    class="bg-white rounded-2xl p-6 soft-shadow border border-slate-100 hover:-translate-y-1 transition"
                >

                    <div class="w-11 h-11 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl mb-4">
                        🎯
                    </div>

                    <h3 class="font-bold text-slate-900 text-lg">
                        Ekstrakurikuler
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Lihat berbagai pilihan ekstrakurikuler
                        dan informasi pendaftaran siswa.
                    </p>

                    <span class="inline-block mt-4 text-xs font-semibold text-indigo-600">
                        Lihat katalog →
                    </span>

                </a>


                <!-- PROFIL -->
                <a
                    href="{{ url('/profil') }}"
                    class="bg-white rounded-2xl p-6 soft-shadow border border-slate-100 hover:-translate-y-1 transition"
                >

                    <div class="w-11 h-11 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl mb-4">
                        🏫
                    </div>

                    <h3 class="font-bold text-slate-900 text-lg">
                        Profil Sekolah
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Kenali profil dan informasi umum
                        SMA Negeri 5 Cirebon.
                    </p>

                    <span class="inline-block mt-4 text-xs font-semibold text-indigo-600">
                        Lihat profil →
                    </span>

                </a>


                <!-- INFORMASI -->
                <a
                    href="{{ url('/informasi') }}"
                    class="bg-white rounded-2xl p-6 soft-shadow border border-slate-100 hover:-translate-y-1 transition"
                >

                    <div class="w-11 h-11 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl mb-4">
                        ℹ️
                    </div>

                    <h3 class="font-bold text-slate-900 text-lg">
                        Informasi
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Temukan informasi dan panduan
                        penggunaan portal E-Ekstrakurikuler.
                    </p>

                    <span class="inline-block mt-4 text-xs font-semibold text-indigo-600">
                        Lihat informasi →
                    </span>

                </a>

            </section>


            <!-- CTA LOGIN -->
            @guest

                <section class="mt-6 rounded-2xl bg-white border border-slate-100 soft-shadow p-6 lg:p-7">

                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-widest text-indigo-600">
                                Sudah siap bergabung?
                            </p>

                            <h3 class="mt-1 text-xl font-extrabold text-slate-900">
                                Daftar ekstrakurikuler secara online
                            </h3>

                            <p class="mt-2 text-sm text-slate-500">
                                Login jika sudah memiliki akun atau buat akun baru untuk melakukan pendaftaran.
                            </p>

                        </div>


                        <div class="flex flex-wrap gap-3">

                            <a
                                href="{{ route('login') }}"
                                class="px-5 py-2.5 rounded-xl text-sm font-semibold text-indigo-600 border border-indigo-100 hover:bg-indigo-50 transition"
                            >
                                Login
                            </a>

                            @if (Route::has('register'))

                                <a
                                    href="{{ route('register') }}"
                                    class="button-gradient text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-lg shadow-blue-200/40"
                                >
                                    Register
                                </a>

                            @endif

                        </div>

                    </div>

                </section>

            @endguest

        </main>


        <!-- FOOTER -->
        <footer class="border-t border-[#e9eef8] bg-white px-5 lg:px-8 py-6">

            <div class="flex flex-col md:flex-row justify-between items-center gap-2 text-xs text-[#8a9abb]">

                <p>
                    © {{ date('Y') }} SMAN 5 Cirebon.
                    Semua hak dilindungi.
                </p>

                <p>
                    Portal E-Ekstrakurikuler
                </p>

            </div>

        </footer>

    </div>

</body>
</html>