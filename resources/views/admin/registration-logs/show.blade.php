<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Riwayat Pendaftaran - Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .gradient-main {
            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #4f46e5,
                    #7c3aed
                );
        }

    </style>

</head>

<body class="bg-slate-50 min-h-screen">

    <!-- NAVBAR -->

    <nav class="bg-white border-b border-slate-200">

        <div class="max-w-5xl mx-auto px-6 py-4">

            <div class="flex items-center justify-between">

                <a
                    href="{{ route('admin.registrations.index') }}"
                    class="font-bold text-slate-700 hover:text-indigo-600"
                >
                    ← Kembali ke Pendaftaran
                </a>

                <div class="flex items-center gap-3">

                    <img
                        src="{{ asset('images/logo-sman5.png') }}"
                        class="w-10 h-10 object-contain"
                        alt="Logo"
                    >

                    <div>

                        <p class="font-extrabold text-slate-800">
                            SMAN 5 Cirebon
                        </p>

                        <p class="text-xs text-slate-500">
                            Panel Administrator
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </nav>


    <main class="max-w-5xl mx-auto px-6 py-10">

        <!-- HEADER -->

        <div
            class="gradient-main rounded-3xl p-8 text-white shadow-xl mb-8"
        >

            <div class="text-4xl mb-4">
                🕘
            </div>

            <h1 class="text-3xl font-extrabold">
                Riwayat Status Pendaftaran
            </h1>

            <p class="text-blue-100 mt-2">
                Catatan perubahan status pendaftaran siswa.
            </p>

        </div>


        <!-- DATA SISWA -->

        <div
            class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 mb-6"
        >

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <p class="text-xs text-slate-400 uppercase font-bold">
                        Nama Siswa
                    </p>

                    <p class="font-bold text-slate-800 mt-1">
                        {{ $registration->user->name }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-slate-400 uppercase font-bold">
                        NIS
                    </p>

                    <p class="font-bold text-slate-800 mt-1">
                        {{ $registration->user->nis ?? '-' }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-slate-400 uppercase font-bold">
                        Ekstrakurikuler
                    </p>

                    <p class="font-bold text-slate-800 mt-1">
                        {{ $registration->extracurricular->name }}
                    </p>

                </div>


                <div>

                    <p class="text-xs text-slate-400 uppercase font-bold">
                        Status Saat Ini
                    </p>

                    <div class="mt-2">

                        @if($registration->status === 'Diterima')

                            <span
                                class="px-3 py-1.5 rounded-full bg-green-100 text-green-700 text-xs font-bold"
                            >
                                🟢 Diterima
                            </span>

                        @elseif($registration->status === 'Ditolak')

                            <span
                                class="px-3 py-1.5 rounded-full bg-red-100 text-red-600 text-xs font-bold"
                            >
                                🔴 Ditolak
                            </span>

                        @else

                            <span
                                class="px-3 py-1.5 rounded-full bg-amber-100 text-amber-700 text-xs font-bold"
                            >
                                🟡 Pending
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        <!-- HISTORY -->

        <div
            class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100"
        >

            <h2 class="text-xl font-extrabold text-slate-800 mb-6">
                Histori Perubahan
            </h2>


            @forelse($registration->logs as $log)

                <div class="relative pl-8 pb-8 last:pb-0">

                    <!-- GARIS -->

                    @if(!$loop->last)

                        <div
                            class="absolute left-[7px] top-4 bottom-0 w-0.5 bg-indigo-100"
                        ></div>

                    @endif


                    <!-- DOT -->

                    <div
                        class="absolute left-0 top-1 w-4 h-4 rounded-full gradient-main ring-4 ring-indigo-50"
                    ></div>


                    <div class="bg-slate-50 rounded-2xl p-5">

                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

                            <div>

                                <p class="font-bold text-slate-800">

                                    {{ $log->old_status }}

                                    <span class="text-indigo-500 mx-2">
                                        →
                                    </span>

                                    {{ $log->new_status }}

                                </p>

                                <p class="text-sm text-slate-500 mt-1">

                                    Diubah oleh:
                                    <span class="font-semibold">
                                        {{ $log->admin->name }}
                                    </span>

                                </p>

                            </div>


                            <span
                                class="text-xs font-semibold text-slate-400"
                            >
                                {{ $log->created_at->format('d M Y, H:i') }}
                            </span>

                        </div>

                    </div>

                </div>

            @empty

                <div class="text-center py-12">

                    <div class="text-5xl mb-4">
                        🕘
                    </div>

                    <h3 class="font-bold text-slate-700">
                        Belum ada perubahan status
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        Riwayat akan muncul setelah admin mengubah status.
                    </p>

                </div>

            @endforelse

        </div>

    </main>


    <footer class="text-center py-8 text-sm text-slate-400">

        © {{ date('Y') }} SMA Negeri 5 Cirebon

    </footer>

</body>

</html>