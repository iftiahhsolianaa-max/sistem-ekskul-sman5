<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun Siswa | SMAN 5 Cirebon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f8ff;
            color: #173574;
        }
        .main-gradient {
            background:
                radial-gradient(circle at 90% 5%, rgba(99,102,241,.10), transparent 28%),
                radial-gradient(circle at 10% 95%, rgba(37,99,235,.08), transparent 30%),
                #f5f8ff;
        }
        .button-gradient {
            background: linear-gradient(135deg, #3478ee 0%, #6250e8 100%);
        }
        .button-gradient:hover {
            background: linear-gradient(135deg, #2869dc 0%, #5342d4 100%);
        }
        .soft-shadow {
            box-shadow: 0 15px 35px rgba(36, 72, 135, 0.08);
        }
    </style>
</head>
<body class="main-gradient min-h-screen flex flex-col items-center justify-center p-6 py-12">

    <!-- Header Logo & Title -->
    <div class="text-center mb-6">
        <div class="w-16 h-16 rounded-2xl bg-white shadow-md border border-blue-100 flex items-center justify-center mx-auto mb-3 p-2">
            <img src="{{ asset('images/logo-sman5.png') }}" alt="Logo SMAN 5 Cirebon" class="w-full h-full object-contain">
        </div>
        <h1 class="text-2xl font-extrabold text-[#173574]">Buat Akun Siswa</h1>
        <p class="text-xs text-slate-500 mt-1 uppercase tracking-wider font-medium">Pendaftaran Ekstrakurikuler SMAN 5 Cirebon</p>
    </div>

    <!-- Register Card -->
    <div class="w-full max-w-xl bg-white rounded-3xl soft-shadow border border-slate-100 p-8 lg:p-10">
        
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Nama Lengkap -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Masukkan nama lengkap" 
                    class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-white transition">
                @error('name')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- NIS -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">NIS (Nomor Induk Siswa)</label>
                <input type="text" name="nis" value="{{ old('nis') }}" required placeholder="Masukkan NIS" 
                    class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-white transition">
                @error('nis')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Grid Kelas & Jurusan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                
                <!-- Kelas -->
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Kelas</label>
                    <select name="class" required class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-white transition">
                        <option value="">Pilih Kelas</option>
                        <!-- Kelas X (1 - 12) -->
                        <optgroup label="Tingkat X">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="X-{{ $i }}" {{ old('class') == "X-$i" ? 'selected' : '' }}>X-{{ $i }}</option>
                            @endfor
                        </optgroup>
                        <!-- Kelas XI (1 - 11) -->
                        <optgroup label="Tingkat XI">
                            @for ($i = 1; $i <= 11; $i++)
                                <option value="XI-{{ $i }}" {{ old('class') == "XI-$i" ? 'selected' : '' }}>XI-{{ $i }}</option>
                            @endfor
                        </optgroup>
                        <!-- Kelas XII (1 - 11) -->
                        <optgroup label="Tingkat XII">
                            @for ($i = 1; $i <= 11; $i++)
                                <option value="XII-{{ $i }}" {{ old('class') == "XII-$i" ? 'selected' : '' }}>XII-{{ $i }}</option>
                            @endfor
                        </optgroup>
                    </select>
                    @error('class')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Jurusan -->
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Jurusan</label>
                    <select name="major" required class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-white transition">
                        <option value="">Pilih Jurusan</option>
                        <option value="IPA" {{ old('major') == 'IPA' ? 'selected' : '' }}>IPA</option>
                        <option value="MIPAS" {{ old('major') == 'MIPAS' ? 'selected' : '' }}>MIPAS</option>
                        <option value="IPS" {{ old('major') == 'IPS' ? 'selected' : '' }}>IPS</option>
                    </select>
                    @error('major')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <!-- Email -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="contoh@email.com" 
                    class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-white transition">
                @error('email')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Password</label>
                <input type="password" name="password" required placeholder="Masukkan password" 
                    class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-white transition">
                @error('password')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required placeholder="Ulangi password" 
                    class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-white transition">
            </div>

            <!-- Tombol Submit dengan Gradasi -->
            <div class="pt-2">
                <button type="submit" class="w-full h-12 button-gradient text-white rounded-xl text-sm font-semibold shadow-lg shadow-blue-500/25 transition hover:opacity-95">
                    Daftar Akun
                </button>
            </div>

            <!-- Link Login -->
            <div class="text-center pt-2">
                <p class="text-xs text-slate-500">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:underline">Masuk di sini</a>
                </p>
            </div>

        </form>

    </div>

</body>
</html>