<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | E-Ekstrakurikuler SMAN 5 Cirebon</title>
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
                radial-gradient(circle at 90% 5%, rgba(99,102,241,.12), transparent 28%),
                radial-gradient(circle at 10% 95%, rgba(37,99,235,.10), transparent 30%),
                linear-gradient(135deg, #e4f6ff 0%, #e5efff 50%, #eee8ff 100%);
        }
        .button-gradient {
            background: linear-gradient(135deg, #3478ee 0%, #6250e8 100%);
        }
        .button-gradient:hover {
            background: linear-gradient(135deg, #2869dc 0%, #5342d4 100%);
        }
        .soft-shadow {
            box-shadow: 0 20px 45px rgba(36, 72, 135, 0.12);
        }
    </style>
</head>
<body class="main-gradient min-h-screen flex items-center justify-center p-6">

    <!-- Login Card -->
    <div class="w-full max-w-md bg-white rounded-[28px] soft-shadow border border-slate-100 p-8 lg:p-10 relative overflow-hidden">
        
        <!-- Logo SMAN 5 Cirebon Asli -->
        <div class="flex justify-center mb-6">
            <div class="w-16 h-16 rounded-2xl bg-white shadow-md border border-blue-100 flex items-center justify-center p-2">
                <img src="{{ asset('images/logo-sman5.png') }}" alt="Logo SMAN 5 Cirebon" class="w-full h-full object-contain">
            </div>
        </div>

        <div class="text-center mb-8">
            <h1 class="text-2xl font-extrabold text-[#173574]">Selamat Datang Kembali</h1>
            <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                Silahkan masuk ke akun E-Ekstrakurikuler<br>SMAN 5 Cirebon
            </p>
        </div>

        @if (session('status'))
            <div class="mb-4 text-xs font-medium text-emerald-600 bg-emerald-50 border border-emerald-200 p-3 rounded-xl text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@email.com" 
                    class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-white transition">
                @error('email')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600">Password</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs font-medium text-blue-600 hover:underline">Lupa password?</a>
                    @endif
                </div>
                <input type="password" name="password" required placeholder="Masukkan password" 
                    class="w-full h-12 px-4 rounded-xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-white transition">
                @error('password')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                <label for="remember" class="ml-2 text-xs font-medium text-slate-600">Ingat saya</label>
            </div>

            <!-- Tombol Log In -->
            <div class="pt-2">
                <button type="submit" class="w-full h-12 button-gradient text-white rounded-xl text-sm font-semibold shadow-lg shadow-blue-500/25 transition hover:opacity-95">
                    Log In Sekarang
                </button>
            </div>

            <!-- Link Register -->
            <div class="text-center pt-2">
                <p class="text-xs text-slate-500">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:underline">Daftar di sini</a>
                </p>
            </div>

        </form>

    </div>

</body>
</html>