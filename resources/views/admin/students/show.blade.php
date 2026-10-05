<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Detail Siswa | SMAN 5 Cirebon</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

</head>


<body class="bg-slate-50 text-slate-800">


<!-- ================================================= -->
<!-- NAVBAR -->
<!-- ================================================= -->

<nav class="bg-white border-b border-slate-200">

    <div class="max-w-7xl mx-auto px-6">

        <div class="h-20 flex items-center justify-between">

            <!-- LOGO -->

            <div class="flex items-center gap-4">

                <img
                    src="{{ asset('images/logo-sman5.png') }}"
                    alt="Logo SMAN 5 Cirebon"
                    class="w-12 h-12 object-contain"
                >

                <div>

                    <h1 class="font-bold text-lg text-slate-900">
                        SMAN 5 Cirebon
                    </h1>

                    <p class="text-xs text-slate-500">
                        Admin Panel
                    </p>

                </div>

            </div>


            <!-- ADMIN -->

            <div class="flex items-center gap-4">

                <div class="text-right hidden sm:block">

                    <p class="font-semibold text-sm text-slate-900">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-xs text-slate-500">
                        Administrator
                    </p>

                </div>


                <div class="w-11 h-11 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>


                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="px-4 py-2.5 rounded-xl bg-red-50 text-red-600 font-semibold text-sm hover:bg-red-100 transition"
                    >
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>



<!-- ================================================= -->
<!-- CONTENT -->
<!-- ================================================= -->

<main class="max-w-7xl mx-auto px-6 py-10">


    <!-- BREADCRUMB -->

    <div class="mb-6">

        <a
            href="{{ route('admin.students.index') }}"
            class="text-sm font-semibold text-blue-600 hover:text-blue-700"
        >
            ← Kembali ke Data Siswa
        </a>

    </div>



    <!-- ================================================= -->
    <!-- HEADER SISWA -->
    <!-- ================================================= -->

    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 text-white shadow-lg mb-8">

        <div class="flex flex-col md:flex-row md:items-center gap-6">


            <!-- AVATAR -->

            <div class="w-24 h-24 rounded-3xl bg-white/20 backdrop-blur flex items-center justify-center text-4xl font-extrabold">

                {{ strtoupper(substr($student->name, 0, 1)) }}

            </div>


            <!-- DATA UTAMA -->

            <div class="flex-1">

                <p class="text-blue-100 text-sm font-semibold uppercase tracking-wide">
                    Detail Siswa
                </p>

                <h2 class="text-3xl font-extrabold mt-1">
                    {{ $student->name }}
                </h2>

                <p class="text-blue-100 mt-2">
                    {{ $student->email }}
                </p>

            </div>


            <!-- NIS -->

            <div class="bg-white/15 rounded-2xl px-6 py-4">

                <p class="text-xs text-blue-100">
                    NIS
                </p>

                <p class="text-xl font-extrabold mt-1">
                    {{ $student->nis ?? '-' }}
                </p>

            </div>

        </div>

    </div>



    <!-- ================================================= -->
    <!-- INFORMASI SISWA -->
    <!-- ================================================= -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">


        <!-- KELAS -->

        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

            <p class="text-sm text-slate-500">
                Kelas
            </p>

            <p class="text-xl font-extrabold text-slate-900 mt-2">
                {{ $student->kelas ?? '-' }}
            </p>

        </div>


        <!-- JURUSAN -->

        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

            <p class="text-sm text-slate-500">
                Jurusan
            </p>

            <p class="text-xl font-extrabold text-slate-900 mt-2">
                {{ $student->jurusan ?? '-' }}
            </p>

        </div>


        <!-- JUMLAH EKSKUL -->

        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

            <p class="text-sm text-slate-500">
                Jumlah Pilihan Ekskul
            </p>

            <p class="text-xl font-extrabold text-blue-600 mt-2">
                {{ $student->registrations->count() }}
            </p>

        </div>

    </div>



    <!-- ================================================= -->
    <!-- DATA PENDAFTARAN -->
    <!-- ================================================= -->

    <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm">

        <!-- HEADER -->

        <div class="px-6 py-5 border-b border-slate-200">

            <h3 class="text-xl font-bold text-slate-900">
                Ekstrakurikuler yang Dipilih
            </h3>

            <p class="text-sm text-slate-500 mt-1">
                Daftar ekstrakurikuler yang pernah didaftarkan oleh siswa.
            </p>

        </div>



        @if ($student->registrations->count() > 0)

            <div class="overflow-x-auto">

                <table class="w-full text-sm">


                    <!-- HEADER TABLE -->

                    <thead class="bg-slate-50 border-b border-slate-200">

                        <tr>

                            <th class="px-6 py-4 text-left font-semibold">
                                No
                            </th>

                            <th class="px-6 py-4 text-left font-semibold">
                                Ekstrakurikuler
                            </th>

                            <th class="px-6 py-4 text-left font-semibold">
                                Jadwal
                            </th>

                            <th class="px-6 py-4 text-left font-semibold">
                                Tanggal Daftar
                            </th>

                            <th class="px-6 py-4 text-left font-semibold">
                                Status
                            </th>

                            <th class="px-6 py-4 text-left font-semibold">
                                Riwayat
                            </th>

                        </tr>

                    </thead>



                    <!-- BODY -->

                    <tbody class="divide-y divide-slate-100">

                        @foreach ($student->registrations as $registration)

                            <tr class="hover:bg-slate-50 transition">


                                <!-- NO -->

                                <td class="px-6 py-5">

                                    {{ $loop->iteration }}

                                </td>



                                <!-- EKSKUL -->

                                <td class="px-6 py-5">

                                    <p class="font-bold text-slate-900">

                                        {{ $registration->extracurricular->name }}

                                    </p>

                                    <p class="text-xs text-slate-500 mt-1">

                                        {{ Str::limit($registration->extracurricular->description, 70) }}

                                    </p>

                                </td>



                                <!-- JADWAL -->

                                <td class="px-6 py-5">

                                    {{ $registration->extracurricular->schedule }}

                                </td>



                                <!-- TANGGAL -->

                                <td class="px-6 py-5">

                                    <p>
                                        {{ $registration->created_at->format('d/m/Y') }}
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        {{ $registration->created_at->format('H:i') }}
                                    </p>

                                </td>



                                <!-- STATUS -->

                                <td class="px-6 py-5">

                                    @if ($registration->status === 'Diterima')

                                        <span class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold">

                                            Diterima

                                        </span>

                                    @elseif ($registration->status === 'Ditolak')

                                        <span class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold">

                                            Ditolak

                                        </span>

                                    @else

                                        <span class="inline-flex px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold">

                                            Pending

                                        </span>

                                    @endif

                                </td>



                                <!-- RIWAYAT -->

                                <td class="px-6 py-5">

                                    <a
                                        href="{{ route('pendaftaran.riwayat', $registration->id) }}"
                                        class="inline-flex items-center px-4 py-2 rounded-xl bg-indigo-50 text-indigo-600 font-semibold text-xs hover:bg-indigo-100 transition"
                                    >
                                        Lihat Riwayat
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


        @else

            <!-- BELUM MENDAFTAR -->

            <div class="text-center py-16">

                <div class="text-5xl mb-4">
                    📋
                </div>

                <h3 class="text-xl font-bold text-slate-900">
                    Belum Ada Pendaftaran
                </h3>

                <p class="text-slate-500 mt-2">
                    Siswa ini belum memilih ekstrakurikuler.
                </p>

            </div>

        @endif

    </div>



    <!-- ================================================= -->
    <!-- BUTTON -->
    <!-- ================================================= -->

    <div class="mt-8 flex flex-wrap gap-3">

        <a
            href="{{ route('admin.students.index') }}"
            class="px-5 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition"
        >
            ← Kembali ke Data Siswa
        </a>


        <a
            href="{{ route('admin.registrations.index') }}"
            class="px-5 py-3 rounded-xl bg-white border border-slate-300 text-slate-700 font-semibold hover:bg-slate-50 transition"
        >
            📋 Semua Pendaftaran
        </a>

    </div>

</main>



<!-- ================================================= -->
<!-- FOOTER -->
<!-- ================================================= -->

<footer class="border-t border-slate-200 bg-white mt-16">

    <div class="max-w-7xl mx-auto px-6 py-8 text-center">

        <p class="font-semibold text-slate-900">
            SMAN 5 Cirebon
        </p>

        <p class="text-sm text-slate-500 mt-1">
            Admin Panel — E-Ekstrakurikuler
        </p>

    </div>

</footer>


</body>

</html>