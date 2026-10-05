<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | SMAN 5 Cirebon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f5f8ff; }
        .sidebar-gradient {
            background: radial-gradient(circle at 15% 10%, rgba(255,255,255,.16), transparent 24%),
                        linear-gradient(160deg, #21499c 0%, #285bc0 38%, #4b55c9 72%, #6846c8 100%);
        }
        .main-gradient {
            background: radial-gradient(circle at 90% 5%, rgba(99,102,241,.06), transparent 25%),
                        radial-gradient(circle at 15% 90%, rgba(59,130,246,.05), transparent 28%), #f5f8ff;
        }
        .hero-gradient {
            background: radial-gradient(circle at 85% 15%, rgba(99,102,241,.14), transparent 30%),
                        radial-gradient(circle at 10% 90%, rgba(59,130,246,.12), transparent 32%),
                        linear-gradient(135deg, #edf5ff 0%, #f3f1ff 100%);
        }
        .button-gradient { background: linear-gradient(135deg, #3478ee 0%, #6250e8 100%); }
        .button-gradient:hover { background: linear-gradient(135deg, #2869dc 0%, #5342d4 100%); }
        .soft-shadow { box-shadow: 0 12px 30px rgba(40, 73, 145, .08); }
        .hero-shadow { box-shadow: 0 20px 45px rgba(40, 73, 145, .10); }
    </style>
</head>

<body class="text-slate-800 antialiased">

    <!-- SIDEBAR -->
    <aside class="sidebar-gradient fixed left-0 top-0 z-50 hidden h-screen w-[298px] text-white lg:flex lg:flex-col justify-between py-6 px-5 shadow-xl">
        <div class="relative z-10">
            <div class="mb-8 flex items-center gap-3 px-2">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/95 p-2 shadow-lg">
                    <img src="{{ asset('images/logo-sman5.png') }}" alt="Logo SMAN 5 Cirebon" class="h-full w-full object-contain">
                </div>
                <div>
                    <h1 class="text-[16px] font-extrabold leading-tight">SMAN 5 CIREBON</h1>
                    <p class="mt-1 text-[10px] font-medium uppercase tracking-[0.12em] text-blue-100">Portal E-Ekstrakurikuler</p>
                </div>
            </div>

            <div class="mb-5 px-2 text-[10px] font-semibold uppercase tracking-[0.18em] text-blue-100/80">Menu Utama</div>

            <nav class="space-y-2">
                <a href="{{ url('/home') }}" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10"><span>⌂</span><span>Home</span></a>
                <a href="{{ url('/profil') }}" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10"><span>🏫</span><span>Profil</span></a>
                <a href="{{ url('/') }}" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10"><span>📚</span><span>Akademik</span></a>
                <a href="{{ url('/galeri') }}" class="bg-white/14 flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-semibold transition"><span>🖼️</span><span>Galeri</span></a>
                <a href="{{ url('/informasi') }}" class="flex items-center gap-4 rounded-2xl px-4 py-3.5 text-[15px] font-medium transition hover:bg-white/10"><span>ℹ️</span><span>Informasi</span></a>
            </nav>
        </div>
        <div class="relative z-0 text-center text-xs text-blue-200/60 pb-2">SMAN 5 Cirebon</div>
    </aside>

    <!-- KONTEN UTAMA -->
    <div class="main-gradient min-h-screen lg:ml-[298px]">

        <!-- TOP NAVBAR -->
        <header class="sticky top-0 z-40 h-[72px] border-b border-slate-200/70 bg-white/90 backdrop-blur-md">
            <div class="flex h-full items-center justify-between px-5 lg:px-7">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">Detail Dokumentasi</p>
                    <h2 class="text-lg font-bold text-slate-900">{{ $title }}</h2>
                </div>
                <a href="{{ url('/galeri') }}" class="button-gradient rounded-xl px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5">
                    ← Kembali ke Galeri
                </a>
            </div>
        </header>

        <main class="p-5 lg:p-7">
            <!-- HERO DETAIL -->
            <section class="hero-gradient hero-shadow relative overflow-hidden rounded-2xl lg:rounded-[20px] px-7 py-7 lg:px-9 lg:py-8 mb-8">
                <div class="relative max-w-3xl">
                    <span class="inline-block mb-3 px-3.5 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold uppercase tracking-wider">Kategori Dokumentasi</span>
                    <h1 class="text-3xl font-extrabold text-slate-900 md:text-4xl">{{ $title }}</h1>
                    <p class="mt-3 text-sm text-slate-600 md:text-[15px] leading-relaxed">
                        Berikut adalah dokumentasi lengkap dan kumpulan foto-foto pilihan untuk kategori <span class="font-semibold text-blue-600">{{ $title }}</span> di SMAN 5 Cirebon.
                    </p>
                </div>
            </section>

            <!-- GRID DOKUMENTASI / FOTO -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @for ($i = 1; $i <= 6; $i++)
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 soft-shadow p-4">
                    <div class="h-48 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-lg font-bold shadow-inner">
                        Foto Dokumentasi #{{ $i }}
                    </div>
                    <div class="mt-4">
                        <span class="text-[10px] font-semibold uppercase text-blue-600 tracking-wider">SMAN 5 Cirebon</span>
                        <h4 class="font-bold text-slate-900 text-base mt-1">Kegiatan {{ $title }} Sesi {{ $i }}</h4>
                        <p class="text-xs text-slate-500 mt-1">Dokumentasi resmi kegiatan sekolah dan ekstrakurikuler.</p>
                    </div>
                </div>
                @endfor
            </section>
        </main>

        <!-- FOOTER -->
        <footer class="mt-12 border-t border-slate-200 bg-white">
            <div class="px-5 py-8 lg:px-7 text-center text-xs text-slate-500">
                <p>© {{ date('Y') }} SMAN 5 Cirebon. Semua hak dilindungi.</p>
            </div>
        </footer>

    </div>

</body>
</html>