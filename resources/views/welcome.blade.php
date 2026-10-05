<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Akademik | SMAN 5 Cirebon</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Poppins -->
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

        /* SIDEBAR */
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

        /* SHADOW */
        .soft-shadow {
            box-shadow:
                0 12px 30px rgba(40,73,145,.08);
        }

        .hero-shadow {
            box-shadow:
                0 20px 45px rgba(40,73,145,.10);
        }

        /* BUTTON */
        .button-gradient {
            background:
                linear-gradient(
                    135deg,
                    #3478ee 0%,
                    #6250e8 100%
                );
        }

        .button-gradient:hover {
            background:
                linear-gradient(
                    135deg,
                    #2869dc 0%,
                    #5342d4 100%
                );
        }

        /* MAIN */
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

        /* HERO */
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

        /* CARD EKSKUL */
        .catalog-gradient {
            background:
                radial-gradient(
                    circle at 15% 10%,
                    rgba(255,255,255,.15),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #3478ee 0%,
                    #285bc0 55%,
                    #6250e8 100%
                );
        }
    </style>
</head>


<body class="text-slate-800 antialiased min-h-screen flex">


    <!-- ===================================================== -->
    <!-- SIDEBAR -->
    <!-- ===================================================== -->

    <aside
        class="sidebar-gradient fixed left-0 top-0 z-50 hidden h-screen w-[298px] overflow-hidden text-white lg:block"
    >

        <div class="relative h-full px-5 py-6 flex flex-col">


            <!-- LOGO SEKOLAH -->
            <div class="mb-8 flex items-center gap-3 px-2">

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/95 p-2 shadow-lg"
                >

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

                    <p
                        class="mt-1 text-[10px] font-medium uppercase tracking-[0.12em] text-blue-100"
                    >
                        Portal E-Ekstrakurikuler
                    </p>

                </div>

            </div>


            <!-- MENU TITLE -->
            <div
                class="mb-5 px-2 text-[10px] font-semibold uppercase tracking-[0.18em] text-blue-100/80"
            >
                Menu Utama
            </div>


            <!-- MENU -->
            <nav class="space-y-2">


                <!-- HOME -->
                <a
                    href="{{ url('/home') }}"
                    class="font-medium hover:bg-white/10 flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] transition"
                >

                    <span class="w-6 text-center">
                        ⌂
                    </span>

                    <span>
                        Home
                    </span>

                </a>


                <!-- PROFIL -->
                <a
                    href="{{ url('/profil') }}"
                    class="font-medium hover:bg-white/10 flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] transition"
                >

                    <span class="w-6 text-center">
                        🏫
                    </span>

                    <span>
                        Profil
                    </span>

                </a>


                <!-- AKADEMIK AKTIF -->
                <a
                    href="{{ url('/') }}"
                    class="sidebar-active font-semibold flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] transition"
                >

                    <span class="w-6 text-center">
                        📚
                    </span>

                    <span>
                        Akademik
                    </span>

                </a>


                <!-- GALERI -->
                <a
                    href="{{ url('/galeri') }}"
                    class="font-medium hover:bg-white/10 flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] transition"
                >

                    <span class="w-6 text-center">
                        🖼️
                    </span>

                    <span>
                        Galeri
                    </span>

                </a>


                <!-- INFORMASI -->
                <a
                    href="{{ url('/informasi') }}"
                    class="font-medium hover:bg-white/10 flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] transition"
                >

                    <span class="w-6 text-center">
                        ℹ️
                    </span>

                    <span>
                        Informasi
                    </span>

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



    <!-- ===================================================== -->
    <!-- MAIN AREA -->
    <!-- ===================================================== -->

    <div class="flex-1 min-w-0 lg:ml-[298px]">


        <!-- ================================================= -->
        <!-- HEADER -->
        <!-- ================================================= -->

        <header
            class="h-[72px] bg-white border-b border-[#e9eef8] flex items-center justify-between px-5 lg:px-8 sticky top-0 z-30"
        >


            <!-- TITLE -->
            <div>

                <p
                    class="text-[10px] font-semibold uppercase tracking-[0.18em] text-[#8a9abb]"
                >
                    HALAMAN AKADEMIK
                </p>

                <h1
                    class="text-[20px] font-extrabold text-[#111b36] leading-tight"
                >
                    Akademik
                </h1>

            </div>


            <!-- KANAN HEADER -->
            <div class="flex items-center gap-3">


                @if (Route::has('login'))

                    @auth

                        <!-- SUDAH LOGIN -->
                        <a
                            href="{{ url('/dashboard') }}"
                            class="button-gradient text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-lg shadow-blue-200/40"
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
                                class="button-gradient text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-lg shadow-blue-200/40"
                            >
                                Register
                            </a>

                        @endif

                    @endauth

                @endif


                <!-- KEMBALI HOME -->
                <a
                    href="{{ url('/home') }}"
                    class="button-gradient text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-lg shadow-blue-200/40"
                >
                    ← Kembali ke Home
                </a>

            </div>

        </header>



        <!-- ================================================= -->
        <!-- CONTENT -->
        <!-- ================================================= -->

        <main
            class="main-gradient min-h-[calc(100vh-72px)] px-5 lg:px-7 py-6"
        >


            <!-- ================================================= -->
            <!-- HERO -->
            <!-- ================================================= -->

            <section
                class="hero-gradient rounded-[20px] px-6 py-6 mb-6 hero-shadow border border-white/80"
            >

                <span
                    class="inline-flex items-center px-3.5 py-1.5 rounded-full bg-white/80 text-indigo-600 text-xs font-semibold shadow-sm mb-3"
                >
                    Katalog Ekstrakurikuler
                </span>


                <h2
                    class="text-2xl lg:text-3xl font-extrabold text-slate-900"
                >
                    Pilihan Ekstrakurikuler
                </h2>


                <p class="mt-2 text-sm text-slate-600">
                    Temukan kegiatan ekstrakurikuler yang sesuai dengan minat
                    dan bakat siswa.
                </p>

            </section>



            <!-- ================================================= -->
            <!-- SEARCH + FILTER -->
            <!-- ================================================= -->

            <section
                class="bg-white rounded-2xl p-4 soft-shadow border border-slate-100 mb-6"
            >

                <form
                    method="GET"
                    action="{{ url('/') }}"
                    class="w-full flex flex-col md:flex-row justify-between items-center gap-4"
                >


                    <!-- SEARCH -->
                    <div class="w-full md:flex-1">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari kode, nama, pembina, ketua, atau deskripsi..."
                            class="w-full px-4 py-3 bg-[#f6f8fd] border border-[#e2e8f4] rounded-xl text-sm placeholder:text-[#8a9abb] focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        >

                    </div>


                    <!-- FILTER STATUS -->
                    <div
                        class="flex items-center gap-3 w-full md:w-auto"
                    >

                        <select
                            name="status"
                            class="bg-[#f6f8fd] border border-[#e2e8f4] px-4 py-3 rounded-xl text-sm font-semibold text-[#52698f] focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        >

                            <option
                                value="Aktif"
                                {{ request('status', 'Aktif') === 'Aktif' ? 'selected' : '' }}
                            >
                                Aktif
                            </option>

                            <option
                                value="Semua"
                                {{ request('status') === 'Semua' ? 'selected' : '' }}
                            >
                                Semua
                            </option>

                        </select>


                        <!-- TOMBOL FILTER -->
                        <button
                            type="submit"
                            class="button-gradient text-white px-6 py-3 rounded-xl text-sm font-semibold shadow-lg shadow-blue-200/40 hover:opacity-95 transition cursor-pointer"
                        >
                            Filter
                        </button>

                    </div>

                </form>

            </section>



            <!-- ================================================= -->
            <!-- HASIL PENCARIAN -->
            <!-- ================================================= -->

            @if(request('search'))

                <div
                    class="mb-5 flex flex-wrap items-center justify-between gap-3"
                >

                    <p class="text-sm text-slate-500">

                        Hasil pencarian untuk:

                        <span class="font-bold text-indigo-600">
                            "{{ request('search') }}"
                        </span>

                    </p>


                    <a
                        href="{{ url('/') }}"
                        class="text-xs font-semibold text-indigo-600 hover:text-indigo-800"
                    >
                        Reset pencarian
                    </a>

                </div>

            @endif



            <!-- ================================================= -->
            <!-- CARD EKSTRAKURIKULER -->
            <!-- ================================================= -->

            <div
                class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5"
            >


                @forelse($extracurriculars as $ekskul)


                    <!-- CARD -->
                    <div
                        class="bg-white rounded-2xl border border-slate-100 soft-shadow overflow-hidden flex flex-col group hover:-translate-y-1 transition-all duration-300"
                    >


                        <!-- BAGIAN ATAS -->
                        <div
                            class="relative h-44 catalog-gradient flex items-center justify-center overflow-hidden"
                        >

                            <div
                                class="absolute inset-0 bg-slate-900/10"
                            ></div>


                            <!-- NAMA -->
                            <span
                                class="relative text-white font-extrabold text-xl tracking-wider uppercase z-10 text-center px-4"
                            >
                                {{ $ekskul->name }}
                            </span>


                            <!-- STATUS -->
                            <span
                                class="absolute top-3 right-3 bg-slate-900/70 text-white text-xs font-semibold px-3 py-1.5 rounded-full border border-white/20"
                            >
                                Aktif
                            </span>


                            <!-- ICON -->
                            <div
                                class="absolute -bottom-6 left-6 w-14 h-14 bg-white rounded-2xl shadow-md border-2 border-slate-100 flex items-center justify-center text-indigo-600 font-extrabold text-xl"
                            >
                                {{ strtoupper(substr($ekskul->name, 0, 2)) }}
                            </div>

                        </div>



                        <!-- BAGIAN BAWAH -->
                        <div
                            class="p-6 pt-8 flex-grow flex flex-col justify-between"
                        >

                            <div>


                                <!-- KATEGORI -->
                                <span
                                    class="text-xs font-semibold text-indigo-600 uppercase tracking-widest"
                                >
                                    {{ $ekskul->name }}
                                </span>


                                <!-- JUDUL -->
                                <h4
                                    class="text-lg font-bold text-slate-900 mt-1 mb-2"
                                >
                                    {{ $ekskul->name }}
                                </h4>


                                <!-- DESKRIPSI -->
                                <p
                                    class="text-slate-500 text-xs leading-relaxed mb-6"
                                >
                                    {{ $ekskul->description }}
                                </p>

                            </div>



                            <div>


                                <!-- INFO JADWAL -->
                                <div
                                    class="flex items-center gap-3 border-t border-slate-100 pt-4 mb-4"
                                >

                                    <div
                                        class="w-8 h-8 rounded-full bg-indigo-50 flex items-center justify-center text-xs font-semibold text-indigo-600"
                                    >
                                        📅
                                    </div>


                                    <div>

                                        <p
                                            class="text-[10px] text-slate-400 font-semibold uppercase"
                                        >
                                            Jadwal
                                        </p>

                                        <p
                                            class="text-xs font-semibold text-slate-800"
                                        >
                                            {{ $ekskul->schedule }}
                                        </p>

                                    </div>

                                </div>



                                <!-- TOMBOL DAFTAR -->
                                @auth

                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="block text-center button-gradient text-white font-semibold py-3 rounded-xl text-xs shadow-md shadow-indigo-500/20 hover:opacity-95 transition"
                                    >
                                        Gabung & Daftar
                                    </a>

                                @else

                                    <a
                                        href="{{ route('login') }}"
                                        class="block text-center button-gradient text-white font-semibold py-3 rounded-xl text-xs shadow-md shadow-indigo-500/20 hover:opacity-95 transition"
                                    >
                                        Login untuk Mendaftar
                                    </a>

                                @endauth

                            </div>

                        </div>

                    </div>


                @empty


                    <!-- TIDAK ADA DATA -->
                    <div
                        class="col-span-full bg-white rounded-2xl border border-slate-100 soft-shadow py-16 text-center"
                    >

                        <div class="text-4xl mb-4">
                            🔍
                        </div>


                        <h3
                            class="text-lg font-bold text-slate-900"
                        >
                            Data tidak ditemukan
                        </h3>


                        <p
                            class="text-sm text-slate-500 mt-2"
                        >
                            Tidak ada ekstrakurikuler yang sesuai dengan
                            pencarian
                            @if(request('search'))
                                "{{ request('search') }}"
                            @endif
                        </p>


                        <a
                            href="{{ url('/') }}"
                            class="inline-block mt-5 button-gradient text-white px-5 py-2.5 rounded-xl text-sm font-semibold"
                        >
                            Tampilkan Semua
                        </a>

                    </div>

                @endforelse

            </div>

        </main>



        <!-- ================================================= -->
        <!-- FOOTER -->
        <!-- ================================================= -->

        <footer
            class="border-t border-[#e9eef8] bg-white px-5 lg:px-8 py-6"
        >

            <div
                class="flex flex-col md:flex-row justify-between items-center gap-2 text-xs text-[#8a9abb]"
            >

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