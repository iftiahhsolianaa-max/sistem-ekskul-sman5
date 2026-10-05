<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Periode - Admin</title>

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

    <nav class="bg-white border-b border-slate-200">

        <div class="max-w-5xl mx-auto px-6 py-4">

            <div class="flex items-center justify-between">

                <a
                    href="{{ route('admin.registration-periods.index') }}"
                    class="font-bold text-slate-700"
                >
                    ← Kembali ke Periode
                </a>

                <span class="font-extrabold text-slate-800">
                    SMAN 5 Cirebon
                </span>

            </div>

        </div>

    </nav>


    <main class="max-w-5xl mx-auto px-6 py-10">

        <div class="gradient-main rounded-3xl p-8 text-white mb-8 shadow-xl">

            <div class="text-4xl mb-4">
                📅
            </div>

            <h1 class="text-3xl font-extrabold">
                Atur Periode Pendaftaran
            </h1>

            <p class="mt-2 text-blue-100">
                Tentukan kapan siswa dapat melakukan pendaftaran ekstrakurikuler.
            </p>

        </div>


        @if($errors->any())

            <div class="mb-6 bg-red-50 border border-red-200 rounded-2xl p-5 text-red-700">

                <ul class="list-disc list-inside text-sm space-y-1">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            method="POST"
            action="{{ route('admin.registration-periods.store') }}"
            class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100"
        >

            @csrf

            <div class="space-y-6">

                <!-- NAMA -->
                <div>

                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Nama Periode
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Pendaftaran Ekstrakurikuler Semester Ganjil 2026/2027"
                        class="w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500"
                        required
                    >

                </div>


                <!-- TANGGAL -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>

                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Tanggal & Waktu Mulai
                        </label>

                        <input
                            type="datetime-local"
                            name="start_at"
                            value="{{ old('start_at') }}"
                            class="w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        >

                    </div>


                    <div>

                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Tanggal & Waktu Selesai
                        </label>

                        <input
                            type="datetime-local"
                            name="end_at"
                            value="{{ old('end_at') }}"
                            class="w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        >

                    </div>

                </div>


                <!-- DESKRIPSI -->
                <div>

                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Keterangan
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        placeholder="Tambahkan keterangan periode..."
                        class="w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500"
                    >{{ old('description') }}</textarea>

                </div>


                <!-- AKTIF -->
                <div class="bg-indigo-50 rounded-2xl p-5">

                    <label class="flex items-start gap-3 cursor-pointer">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            checked
                            class="mt-1 rounded border-indigo-300 text-indigo-600 focus:ring-indigo-500"
                        >

                        <div>

                            <p class="font-bold text-slate-800">
                                Aktifkan periode
                            </p>

                            <p class="text-sm text-slate-500 mt-1">
                                Jika diaktifkan, periode ini dapat digunakan
                                untuk menentukan status pendaftaran siswa.
                            </p>

                        </div>

                    </label>

                </div>


                <!-- BUTTON -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4">

                    <a
                        href="{{ route('admin.registration-periods.index') }}"
                        class="flex-1 text-center px-5 py-3 rounded-xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="flex-1 px-5 py-3 rounded-xl gradient-main text-white font-bold shadow-lg hover:scale-[1.01] transition"
                    >
                        Simpan Periode
                    </button>

                </div>

            </div>

        </form>

    </main>

</body>

</html>