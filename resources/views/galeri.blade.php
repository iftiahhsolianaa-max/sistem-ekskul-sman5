<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri | SMAN 5 Cirebon</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

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
        <div class="relative h-full px-5 py-6 flex flex-col justify-between">

            <div>
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

                <nav class="space-y-2 relative z-20">
                    <a href="{{ url('/home') }}" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10">
                        <span class="w-6 text-center">⌂</span>
                        <span>Home</span>
                    </a>

                    <a href="{{ url('/profil') }}" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10">
                        <span class="w-6 text-center">🏫</span>
                        <span>Profil</span>
                    </a>

                    <a href="{{ url('/') }}" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10">
                        <span class="w-6 text-center">📚</span>
                        <span>Akademik</span>
                    </a>

                    <a href="{{ url('/galeri') }}" class="sidebar-active flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-semibold transition">
                        <span class="w-6 text-center">🖼️</span>
                        <span>Galeri</span>
                    </a>

                    <a href="{{ url('/informasi') }}" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10">
                        <span class="w-6 text-center">ℹ️</span>
                        <span>Informasi</span>
                    </a>
                </nav>
            </div>

            <div class="relative pointer-events-none">
                <div class="absolute -bottom-20 -left-10 h-44 w-80 rounded-[50%] border border-white/10"></div>
                <div class="absolute -bottom-28 -right-16 h-56 w-96 rounded-[50%] border border-white/10"></div>
            </div>

        </div>
    </aside>

    <div class="main-gradient min-h-screen lg:ml-[298px]">

        <!-- TOP NAVBAR -->
        <header class="sticky top-0 z-40 h-[72px] border-b border-slate-200/70 bg-white/90 backdrop-blur-md">
            <div class="flex h-full items-center justify-between px-5 lg:px-7">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">
                        Halaman Galeri
                    </p>
                    <h2 class="text-lg font-bold text-slate-900">
                        Galeri SMAN 5 Cirebon
                    </h2>
                </div>

                <a href="{{ url('/home') }}" class="button-gradient rounded-xl px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5">
                    ← Kembali ke Home
                </a>
            </div>
        </header>

        <main class="p-5 lg:p-7">

            <!-- HERO -->
            <section class="hero-gradient hero-shadow relative overflow-hidden rounded-2xl lg:rounded-[20px] px-7 py-7 lg:px-9 lg:py-8">
                <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-blue-400/10"></div>
                <div class="absolute -bottom-20 -left-12 h-56 w-56 rounded-full bg-indigo-400/10"></div>

                <div class="relative max-w-3xl">
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-blue-200 bg-white/70 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.14em] text-blue-700">
                        <span class="h-2 w-2 rounded-full bg-blue-500"></span>
                        Dokumentasi
                    </div>

                    <h1 class="text-3xl font-extrabold leading-tight text-slate-900 md:text-4xl">
                        Galeri <span class="text-blue-600">SMAN 5 Cirebon</span>
                    </h1>

                    <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600 md:text-[15px]">
                        Ruang dokumentasi untuk menampilkan berbagai aktivitas dan kegiatan yang ada di lingkungan SMAN 5 Cirebon.
                    </p>
                </div>
            </section>

            <!-- GALLERY -->
            <section class="mt-8">

                <div class="mb-6 flex flex-col justify-between gap-4 md:flex-row md:items-end">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-blue-600">
                            Dokumentasi Sekolah
                        </p>
                        <h3 class="mt-2 text-2xl font-extrabold text-slate-900 md:text-3xl">
                            Momen & Kegiatan
                        </h3>
                    </div>

                    <p class="max-w-md text-sm leading-6 text-slate-500">
                        Klik pada salah satu kategori galeri di bawah ini untuk melihat detail dokumentasi kegiatan.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

                    @php
                        $galleryItems = [
                            [
                                'icon' => '🏫', 'category' => 'Sekolah', 'title' => 'Kegiatan Sekolah', 
                                'desc' => 'Tempat untuk menampilkan dokumentasi kegiatan sekolah.', 
                                'gradient' => 'from-sky-400 via-blue-500 to-indigo-600',
                                'url' => route('galeri.detail', 'kegiatan-sekolah')
                            ],
                            [
                                'icon' => '🎯', 'category' => 'Ekstrakurikuler', 'title' => 'Aktivitas Siswa', 
                                'desc' => 'Tempat untuk menampilkan dokumentasi kegiatan ekstrakurikuler siswa.', 
                                'gradient' => 'from-indigo-500 via-blue-600 to-sky-500',
                                'url' => route('galeri.detail', 'aktivitas-siswa')
                            ],
                            [
                                'icon' => '📸', 'category' => 'Dokumentasi', 'title' => 'Momen Kegiatan', 
                                'desc' => 'Tempat untuk menampilkan berbagai momen kegiatan sekolah.', 
                                'gradient' => 'from-blue-500 via-indigo-600 to-purple-600',
                                'url' => route('galeri.detail', 'momen-kegiatan')
                            ],
                            [
                                'icon' => '👥', 'category' => 'Siswa', 'title' => 'Aktivitas Siswa', 
                                'desc' => 'Dokumentasi aktivitas siswa dapat ditampilkan pada bagian ini.', 
                                'gradient' => 'from-sky-500 to-cyan-500',
                                'url' => route('galeri.detail', 'aktivitas-siswa')
                            ],
                            [
                                'icon' => '🌟', 'category' => 'Dokumentasi', 'title' => 'Momen Inspiratif', 
                                'desc' => 'Bagian ini dapat digunakan untuk dokumentasi momen inspiratif.', 
                                'gradient' => 'from-blue-500 to-indigo-700',
                                'url' => route('galeri.detail', 'momen-inspiratif')
                            ],
                            [
                                'icon' => '💙', 'category' => 'Galeri', 'title' => 'Dokumentasi Sekolah', 
                                'desc' => 'Koleksi foto dapat ditambahkan sesuai dokumentasi yang tersedia.', 
                                'gradient' => 'from-indigo-500 to-sky-500',
                                'url' => route('galeri.detail', 'dokumentasi-sekolah')
                            ],
                        ];
                    @endphp

                    @foreach ($galleryItems as $item)
                        <a href="{{ $item['url'] }}" class="group overflow-hidden rounded-2xl border border-slate-100 bg-white soft-shadow transition duration-300 hover:-translate-y-1 hover:shadow-xl block text-left">

                            <div class="relative flex h-56 items-center justify-center overflow-hidden bg-gradient-to-br {{ $item['gradient'] }}">
                                <div class="absolute -right-12 -top-12 h-40 w-40 rounded-full bg-white/10 transition duration-500 group-hover:scale-125"></div>
                                <div class="absolute -bottom-16 -left-10 h-44 w-44 rounded-full bg-white/10"></div>

                                <div class="relative text-center text-white">
                                    <div class="mb-3 text-5xl">{{ $item['icon'] }}</div>
                                    <p class="text-lg font-extrabold">{{ $item['title'] }}</p>
                                    <p class="mt-1 text-xs text-white/80">Klik untuk melihat detail →</p>
                                </div>
                            </div>

                            <div class="p-6">
                                <span class="text-[10px] font-semibold uppercase tracking-[0.14em] text-blue-600">
                                    {{ $item['category'] }}
                                </span>

                                <h4 class="mt-2 text-base font-extrabold text-slate-900 group-hover:text-blue-600 transition">
                                    {{ $item['title'] }}
                                </h4>

                                <p class="mt-2 text-sm leading-6 text-slate-500">
                                    {{ $item['desc'] }}
                                </p>
                            </div>

                        </a>
                    @endforeach

                </div>
            </section>

            <!-- CTA -->
            <section class="mt-8">
                <div class="hero-gradient hero-shadow relative overflow-hidden rounded-2xl border border-blue-100 p-7 lg:p-8">
                    <div class="absolute -right-14 -top-14 h-44 w-44 rounded-full bg-indigo-400/10"></div>

                    <div class="relative flex flex-col justify-between gap-6 md:flex-row md:items-center">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-blue-600">
                                Portal Digital
                            </p>

                            <h3 class="mt-2 text-2xl font-extrabold text-slate-900 md:text-3xl">
                                Ingin melihat kegiatan <span class="text-blue-600">ekstrakurikuler?</span>
                            </h3>

                            <p class="mt-3 max-w-xl text-sm leading-7 text-slate-600">
                                Jelajahi daftar ekstrakurikuler yang tersedia di SMAN 5 Cirebon.
                            </p>
                        </div>

                        <a href="{{ url('/') }}" class="button-gradient shrink-0 rounded-xl px-6 py-3.5 text-center text-sm font-semibold text-white shadow-md transition hover:-translate-y-0.5">
                            Lihat Ekstrakurikuler →
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