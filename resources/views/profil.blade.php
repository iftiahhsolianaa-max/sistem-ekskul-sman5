<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil | Admin - SMA Negeri 5 Cirebon</title>

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
                radial-gradient(circle at 15% 10%, rgba(255,255,255,.16), transparent 24%),
                linear-gradient(160deg, #21499c 0%, #285bc0 38%, #4b55c9 72%, #6846c8 100%);
        }

        .main-gradient {
            background:
                radial-gradient(circle at 90% 5%, rgba(99,102,241,.06), transparent 25%),
                radial-gradient(circle at 15% 90%, rgba(59,130,246,.05), transparent 28%),
                #f5f8ff;
        }

        .hero-gradient {
            background:
                radial-gradient(circle at 85% 15%, rgba(99,102,241,.14), transparent 30%),
                radial-gradient(circle at 10% 90%, rgba(59,130,246,.12), transparent 32%),
                linear-gradient(135deg, #edf5ff 0%, #f3f1ff 100%);
        }

        .button-gradient {
            background: linear-gradient(135deg, #3478ee 0%, #6250e8 100%);
        }

        .button-gradient:hover {
            background: linear-gradient(135deg, #2869dc 0%, #5342d4 100%);
        }

        .sidebar-active {
            background: rgba(255,255,255,.14);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.08);
        }

        .soft-shadow {
            box-shadow: 0 12px 30px rgba(40, 73, 145, .08);
        }

        .hero-shadow {
            box-shadow: 0 20px 45px rgba(40, 73, 145, .10);
        }
    </style>
</head>

<body class="text-slate-800 antialiased">

    <!-- SIDEBAR -->
    <aside class="sidebar-gradient fixed left-0 top-0 z-50 hidden h-screen w-[298px] overflow-hidden text-white lg:block">
        <div class="relative h-full px-5 py-6">

            <div class="mb-8 flex items-center gap-3 px-2">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/95 p-2 shadow-lg">
                    <img src="{{ asset('images/logo-sman5.png') }}" alt="Logo SMAN 5 Cirebon" class="h-full w-full object-contain">
                </div>

                <div>
                    <h1 class="text-[16px] font-extrabold leading-tight">SMAN 5 CIREBON</h1>
                    <p class="mt-1 text-[10px] font-medium uppercase tracking-[0.12em] text-blue-100">
                        Portal E-Ekstrakurikuler
                    </p>
                </div>
            </div>

            <div class="mb-5 px-2 text-[10px] font-semibold uppercase tracking-[0.18em] text-blue-100/80">
                Menu Utama
            </div>

            <nav class="space-y-2">
                <a href="{{ url('/') }}" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10">
                    <span class="w-6 text-center">⌂</span>
                    <span>Home</span>
                </a>

                <a href="/profil" class="sidebar-active flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-semibold transition">
                    <span class="w-6 text-center">🏫</span>
                    <span>Profil</span>
                </a>

                <a href="{{ url('/') }}" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10">
                    <span class="w-6 text-center">📚</span>
                    <span>Akademik</span>
                </a>

                <a href="/galeri" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10">
                    <span class="w-6 text-center">🖼️</span>
                    <span>Galeri</span>
                </a>

                <a href="/informasi" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10">
                    <span class="w-6 text-center">ℹ️</span>
                    <span>Informasi</span>
                </a>
            </nav>

            <div class="absolute -bottom-20 -left-10 h-44 w-80 rounded-[50%] border border-white/10"></div>
            <div class="absolute -bottom-28 -right-16 h-56 w-96 rounded-[50%] border border-white/10"></div>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="main-gradient min-h-screen lg:ml-[298px]">

        <!-- TOP NAVBAR -->
        <header class="sticky top-0 z-40 h-[72px] border-b border-slate-200/70 bg-white/90 backdrop-blur-md">
            <div class="flex h-full items-center justify-between px-5 lg:px-7">

                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">
                        Halaman Profil
                    </p>
                    <h2 class="text-lg font-bold text-slate-900">
                        Profil SMAN 5 Cirebon
                    </h2>
                </div>

                <a href="{{ url('/') }}" class="button-gradient rounded-xl px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5">
                    ← Kembali ke Home
                </a>
            </div>
        </header>

        <main class="p-5 lg:p-7">

            <!-- HERO -->
            <section class="hero-gradient hero-shadow relative overflow-hidden rounded-2xl lg:rounded-[20px] px-7 py-7 lg:px-9 lg:py-8">
                <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-blue-400/10"></div>
                <div class="absolute -bottom-20 -left-12 h-56 w-56 rounded-full bg-indigo-400/10"></div>

                <div class="relative grid items-center gap-8 lg:grid-cols-[1.35fr_.65fr]">

                    <div>
                        <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-blue-200 bg-white/70 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.14em] text-blue-700">
                            <span class="h-2 w-2 rounded-full bg-blue-500"></span>
                            Profil Sekolah
                        </div>

                        <h1 class="text-3xl font-extrabold leading-tight text-slate-900 md:text-4xl">
                            Mengenal <span class="text-blue-600">SMAN 5 Cirebon</span>
                        </h1>

                        <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600 md:text-[15px]">
                            Mengenal lebih dekat SMAN 5 Cirebon melalui informasi sekolah dan portal digital
                            yang mendukung kegiatan akademik maupun ekstrakurikuler siswa.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="{{ url('/') }}" class="button-gradient rounded-xl px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:-translate-y-0.5">
                                Lihat Ekstrakurikuler →
                            </a>

                            <a href="#tentang" class="rounded-xl border border-slate-200 bg-white/80 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-white">
                                Tentang Sekolah
                            </a>
                        </div>
                    </div>

                    <div class="flex justify-center lg:justify-end">
                        <div class="flex h-48 w-48 items-center justify-center rounded-[28px] bg-white p-7 shadow-xl ring-1 ring-white/80 md:h-56 md:w-56">
                            <img src="{{ asset('images/logo-sman5.png') }}" alt="Logo SMAN 5 Cirebon" class="h-full w-full object-contain">
                        </div>
                    </div>

                </div>
            </section>

            <!-- QUICK INFO -->
            <section class="relative -mt-5 px-3 lg:px-6">
                <div class="soft-shadow grid overflow-hidden rounded-2xl border border-slate-100 bg-white md:grid-cols-3">

                    <div class="flex items-center gap-4 border-b border-slate-100 p-5 md:border-b-0 md:border-r">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-lg text-blue-600">🏫</div>
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-slate-400">Institusi</p>
                            <p class="mt-0.5 text-sm font-bold text-slate-900">SMAN 5 Cirebon</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 border-b border-slate-100 p-5 md:border-b-0 md:border-r">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-lg text-indigo-600">📍</div>
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-slate-400">Lokasi</p>
                            <p class="mt-0.5 text-sm font-bold text-slate-900">Kota Cirebon</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 p-5">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-violet-50 text-lg text-violet-600">💻</div>
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-slate-400">Portal</p>
                            <p class="mt-0.5 text-sm font-bold text-slate-900">E-Ekstrakurikuler</p>
                        </div>
                    </div>

                </div>
            </section>

            <!-- TENTANG -->
            <section id="tentang" class="mt-8 grid gap-6 lg:grid-cols-[1.35fr_.65fr]">

                <div class="soft-shadow rounded-2xl border border-slate-100 bg-white p-7 lg:p-8">
                    <div class="mb-5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-blue-600">
                            Tentang Sekolah
                        </p>
                        <h3 class="mt-2 text-2xl font-extrabold text-slate-900">
                            Mengenal <span class="text-blue-600">SMAN 5 Cirebon</span>
                        </h3>
                    </div>

                    <div class="space-y-4 text-sm leading-7 text-slate-600 md:text-[15px]">
                        <p>
                            SMAN 5 Cirebon merupakan lingkungan pendidikan yang menyediakan berbagai kegiatan
                            pembelajaran dan pengembangan minat serta bakat siswa.
                        </p>

                        <p>
                            Melalui portal E-Ekstrakurikuler ini, informasi mengenai kegiatan ekstrakurikuler dapat
                            disajikan secara lebih terstruktur sehingga siswa dapat melihat pilihan kegiatan dan
                            melakukan proses pendaftaran secara digital.
                        </p>
                    </div>

                    <div class="mt-6 rounded-xl border-l-4 border-blue-500 bg-blue-50 px-5 py-4">
                        <p class="text-sm font-medium leading-6 text-blue-800">
                            “Portal digital untuk membantu siswa mengenal dan mendaftar kegiatan ekstrakurikuler secara lebih praktis.”
                        </p>
                    </div>
                </div>

                <!-- INFO CARD -->
                <div class="soft-shadow rounded-2xl border border-slate-100 bg-white p-7">
                    <div class="mb-6 flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white">
                            ℹ️
                        </div>
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[0.14em] text-blue-600">Detail</p>
                            <h4 class="text-lg font-extrabold text-slate-900">Informasi Sekolah</h4>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div class="flex gap-3">
                            <span>🏫</span>
                            <div>
                                <p class="text-[10px] font-semibold uppercase text-slate-400">Nama Sekolah</p>
                                <p class="mt-1 text-sm font-semibold text-slate-800">SMAN 5 Cirebon</p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <span>📍</span>
                            <div>
                                <p class="text-[10px] font-semibold uppercase text-slate-400">Alamat</p>
                                <p class="mt-1 text-sm leading-6 text-slate-600">
                                    Jl. Swasembada 7 Majasem Kota Cirebon, Karyamulya, Kota Cirebon, 45131
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <span>✉️</span>
                            <div>
                                <p class="text-[10px] font-semibold uppercase text-slate-400">Email</p>
                                <p class="mt-1 text-sm text-slate-600">info@sman5cirebon.sch.id</p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <span>📞</span>
                            <div>
                                <p class="text-[10px] font-semibold uppercase text-slate-400">Telepon</p>
                                <p class="mt-1 text-sm text-slate-600">+62 852-8431-3567</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- PORTAL -->
            <section class="mt-6">
                <div class="hero-gradient hero-shadow relative overflow-hidden rounded-2xl border border-blue-100 p-7 lg:p-8">
                    <div class="absolute -right-14 -top-14 h-44 w-44 rounded-full bg-indigo-400/10"></div>

                    <div class="relative flex flex-col justify-between gap-6 md:flex-row md:items-center">
                        <div class="max-w-2xl">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-blue-600">
                                Portal Digital
                            </p>

                            <h3 class="mt-2 text-2xl font-extrabold text-slate-900 md:text-3xl">
                                E-Ekstrakurikuler <span class="text-blue-600">SMAN 5 Cirebon</span>
                            </h3>

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                Portal ini dikembangkan untuk membantu proses informasi dan pendaftaran ekstrakurikuler siswa secara lebih praktis dan terorganisir.
                            </p>
                        </div>

                        <a href="{{ url('/') }}" class="button-gradient shrink-0 rounded-xl px-6 py-3.5 text-center text-sm font-semibold text-white shadow-md transition hover:-translate-y-0.5">
                            Jelajahi Ekstrakurikuler →
                        </a>
                    </div>
                </div>
            </section>

        </main>

        <!-- FOOTER -->
        <footer class="mt-2 border-t border-slate-200 bg-white">
            <div class="px-5 py-8 lg:px-7">
                <div class="flex flex-col justify-between gap-3 text-xs text-slate-500 md:flex-row">
                    <p>© {{ date('Y') }} SMAN 5 Cirebon. Semua hak dilindungi.</p>
                    <p>E-Ekstrakurikuler</p>
                </div>
            </div>
        </footer>

    </div>

</body>
</html>
