<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Informasi | SMAN 5 Cirebon</title>

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

                <a href="/profil" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10">
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

                <a href="/informasi" class="sidebar-active flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-semibold transition">
                    <span class="w-6 text-center">ℹ️</span>
                    <span>Informasi</span>
                </a>
            </nav>

            <div class="absolute -bottom-20 -left-10 h-44 w-80 rounded-[50%] border border-white/10"></div>
            <div class="absolute -bottom-28 -right-16 h-56 w-96 rounded-[50%] border border-white/10"></div>
        </div>
    </aside>

    <div class="main-gradient min-h-screen lg:ml-[298px]">

        <!-- TOP NAVBAR -->
        <header class="sticky top-0 z-40 h-[72px] border-b border-slate-200/70 bg-white/90 backdrop-blur-md">
            <div class="flex h-full items-center justify-between px-5 lg:px-7">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">
                        Halaman Informasi
                    </p>
                    <h2 class="text-lg font-bold text-slate-900">
                        Informasi SMAN 5 Cirebon
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

                <div class="relative max-w-3xl">
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-blue-200 bg-white/70 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.14em] text-blue-700">
                        <span class="h-2 w-2 rounded-full bg-blue-500"></span>
                        Pusat Informasi
                    </div>

                    <h1 class="text-3xl font-extrabold leading-tight text-slate-900 md:text-4xl">
                        Informasi <span class="text-blue-600">SMAN 5 Cirebon</span>
                    </h1>

                    <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600 md:text-[15px]">
                        Informasi yang berkaitan dengan portal E-Ekstrakurikuler dan kegiatan siswa SMAN 5 Cirebon.
                    </p>
                </div>
            </section>

            <!-- INFORMATION CARDS -->
            <section class="mt-8">
                <div class="mb-6">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-blue-600">
                        Informasi Utama
                    </p>

                    <h3 class="mt-2 text-2xl font-extrabold text-slate-900 md:text-3xl">
                        Informasi Portal
                    </h3>

                    <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500">
                        Berikut beberapa informasi yang dapat membantu siswa memahami penggunaan portal E-Ekstrakurikuler.
                    </p>
                </div>

                @php
                    $infoCards = [
                        ['icon' => '📋', 'color' => 'bg-blue-50 text-blue-600', 'category' => 'Pendaftaran', 'title' => 'Pendaftaran Ekstrakurikuler', 'desc' => 'Siswa dapat melihat pilihan ekstrakurikuler yang tersedia kemudian melakukan pendaftaran melalui portal secara digital.'],
                        ['icon' => '🔎', 'color' => 'bg-indigo-50 text-indigo-600', 'category' => 'Pilihan', 'title' => 'Pilih Ekstrakurikuler', 'desc' => 'Kenali informasi ekstrakurikuler yang tersedia sebelum menentukan kegiatan yang ingin diikuti.'],
                        ['icon' => '👤', 'color' => 'bg-violet-50 text-violet-600', 'category' => 'Akun Siswa', 'title' => 'Akun & Pendaftaran', 'desc' => 'Gunakan akun yang telah terdaftar untuk mengakses fitur pendaftaran ekstrakurikuler.'],
                    ];
                @endphp

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($infoCards as $card)
                        <div class="group rounded-2xl border border-slate-100 bg-white p-7 soft-shadow transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                            <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl text-2xl {{ $card['color'] }}">
                                {{ $card['icon'] }}
                            </div>

                            <span class="text-[10px] font-semibold uppercase tracking-[0.14em] text-blue-600">
                                {{ $card['category'] }}
                            </span>

                            <h4 class="mt-2 text-lg font-extrabold text-slate-900">
                                {{ $card['title'] }}
                            </h4>

                            <p class="mt-3 text-sm leading-6 text-slate-500">
                                {{ $card['desc'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- HOW TO -->
            <section class="mt-8">
                <div class="grid items-stretch gap-6 lg:grid-cols-2">

                    <!-- LEFT -->
                    <div class="soft-shadow rounded-2xl border border-slate-100 bg-white p-7 lg:p-8">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-blue-600">
                            Cara Menggunakan Portal
                        </p>

                        <h3 class="mt-2 text-2xl font-extrabold text-slate-900">
                            Alur Pendaftaran
                        </h3>

                        @php
                            $steps = [
                                ['number' => 1, 'color' => 'bg-blue-500', 'title' => 'Buat atau masuk ke akun', 'desc' => 'Gunakan akun siswa untuk mengakses fitur pendaftaran.'],
                                ['number' => 2, 'color' => 'bg-indigo-500', 'title' => 'Lihat pilihan ekstrakurikuler', 'desc' => 'Pilih kegiatan ekstrakurikuler yang ingin diikuti.'],
                                ['number' => 3, 'color' => 'bg-violet-500', 'title' => 'Kirim pendaftaran', 'desc' => 'Lakukan pendaftaran melalui tombol yang tersedia.'],
                                ['number' => 4, 'color' => 'bg-purple-500', 'title' => 'Tunggu proses validasi', 'desc' => 'Pendaftaran akan diproses oleh admin sekolah.'],
                            ];
                        @endphp

                        <div class="mt-7 space-y-5">
                            @foreach ($steps as $step)
                                <div class="flex gap-4">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-sm font-extrabold text-white {{ $step['color'] }}">
                                        {{ $step['number'] }}
                                    </div>

                                    <div>
                                        <h4 class="text-sm font-extrabold text-slate-900">
                                            {{ $step['title'] }}
                                        </h4>

                                        <p class="mt-1 text-sm leading-6 text-slate-500">
                                            {{ $step['desc'] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-600 via-indigo-600 to-violet-600 p-7 text-white lg:p-8">
                        <div class="absolute -right-16 -top-16 h-56 w-56 rounded-full bg-white/10"></div>
                        <div class="absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-white/5"></div>

                        <div class="relative">
                            <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl border border-white/20 bg-white/15 text-2xl">
                                💡
                            </div>

                            <h3 class="text-2xl font-extrabold">
                                Kenapa menggunakan portal ini?
                            </h3>

                            <div class="mt-6 space-y-4">
                                <div class="flex gap-3">
                                    <span class="text-blue-200">✓</span>
                                    <p class="text-sm leading-6 text-blue-50">Informasi ekstrakurikuler lebih terstruktur.</p>
                                </div>

                                <div class="flex gap-3">
                                    <span class="text-blue-200">✓</span>
                                    <p class="text-sm leading-6 text-blue-50">Proses pendaftaran dilakukan secara digital.</p>
                                </div>

                                <div class="flex gap-3">
                                    <span class="text-blue-200">✓</span>
                                    <p class="text-sm leading-6 text-blue-50">Data pendaftaran lebih mudah dikelola oleh admin.</p>
                                </div>

                                <div class="flex gap-3">
                                    <span class="text-blue-200">✓</span>
                                    <p class="text-sm leading-6 text-blue-50">Membantu siswa memilih kegiatan sesuai minat dan bakat.</p>
                                </div>
                            </div>

                            <a href="{{ url('/') }}" class="mt-7 inline-block rounded-xl bg-white px-6 py-3.5 text-sm font-extrabold text-blue-600 shadow-lg transition hover:-translate-y-0.5">
                                Mulai Jelajahi →
                            </a>
                        </div>
                    </div>

                </div>
            </section>

            <!-- CONTACT -->
            <section class="mt-8">
                <div class="soft-shadow rounded-2xl border border-slate-100 bg-white p-7 lg:p-8">
                    <div class="grid gap-7 md:grid-cols-3">

                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[0.14em] text-blue-600">Sekolah</p>
                            <h4 class="mt-1 text-lg font-extrabold text-slate-900">SMAN 5 Cirebon</h4>
                        </div>

                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[0.14em] text-blue-600">Alamat</p>
                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                Jl. Swasembada 7 Majasem Kota Cirebon, Karyamulya, Kota Cirebon, 45131
                            </p>
                        </div>

                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[0.14em] text-blue-600">Kontak</p>
                            <p class="mt-1 text-sm text-slate-500">+62 852-8431-3567</p>
                            <p class="mt-1 text-sm text-slate-500">info@sman5cirebon.sch.id</p>
                        </div>

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
