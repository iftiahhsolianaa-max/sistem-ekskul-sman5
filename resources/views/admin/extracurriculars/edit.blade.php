<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Ekstrakurikuler - Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>


<body class="bg-slate-50 text-slate-800">


    <!-- =====================================================
         NAVBAR
    ====================================================== -->

    <nav class="bg-white border-b border-slate-200">

        <div class="max-w-7xl mx-auto px-6">

            <div class="h-20 flex items-center justify-between">

                <!-- LOGO -->

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3"
                >

                    <img
                        src="{{ asset('images/logo-sman5.png') }}"
                        class="w-12 h-12 object-contain"
                        alt="Logo SMA Negeri 5 Cirebon"
                    >

                    <div>

                        <h1 class="font-bold text-lg">
                            E-Ekstrakurikuler
                        </h1>

                        <p class="text-xs text-slate-500">
                            SMA Negeri 5 Cirebon
                        </p>

                    </div>

                </a>


                <!-- ADMIN -->

                <div class="flex items-center gap-4">

                    <div class="text-right hidden sm:block">

                        <p class="font-semibold text-sm">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="text-xs text-slate-500">
                            Administrator
                        </p>

                    </div>


                    <!-- AVATAR -->

                    <div
                        class="
                            w-11
                            h-11
                            rounded-full
                            bg-blue-600
                            text-white
                            flex
                            items-center
                            justify-center
                            font-bold
                        "
                    >

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>


                    <!-- LOGOUT -->

                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="
                                text-sm
                                font-medium
                                text-red-500
                                hover:text-red-700
                            "
                        >
                            Logout
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </nav>



    <!-- =====================================================
         CONTENT
    ====================================================== -->

    <main class="max-w-4xl mx-auto px-6 py-10">


        <!-- HEADER -->

        <div class="mb-8">

            <a
                href="{{ route('admin.extracurriculars.index') }}"
                class="
                    text-sm
                    font-semibold
                    text-blue-600
                    hover:text-blue-800
                "
            >
                ← Kembali ke Ekstrakurikuler
            </a>


            <p
                class="
                    text-blue-600
                    font-semibold
                    text-sm
                    mt-6
                    mb-2
                "
            >
                ADMIN PANEL
            </p>


            <h2 class="text-3xl font-bold">
                Edit Ekstrakurikuler
            </h2>


            <p class="text-slate-500 mt-2">
                Perbarui informasi ekstrakurikuler sesuai data terbaru.
            </p>

        </div>



        <!-- =================================================
             ERROR VALIDATION
        ================================================== -->

        @if($errors->any())

            <div
                class="
                    mb-6
                    p-4
                    rounded-xl
                    bg-red-50
                    border
                    border-red-200
                    text-red-700
                "
            >

                <p class="font-semibold mb-2">
                    Terdapat kesalahan:
                </p>


                <ul class="list-disc ml-5 text-sm">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        <!-- =================================================
             FORM CARD
        ================================================== -->

        <div
            class="
                bg-white
                rounded-2xl
                border
                border-slate-200
                shadow-sm
            "
        >


            <!-- CARD HEADER -->

            <div
                class="
                    px-6
                    py-5
                    border-b
                    border-slate-200
                "
            >

                <h3 class="font-bold text-lg">
                    Informasi Ekstrakurikuler
                </h3>


                <p class="text-sm text-slate-500 mt-1">
                    Periksa kembali informasi sebelum menyimpan perubahan.
                </p>

            </div>



            <!-- FORM -->

            <form
                method="POST"
                action="{{ route('admin.extracurriculars.update', $extracurricular) }}"
                class="p-6 space-y-6"
            >

                @csrf

                @method('PUT')



                <!-- =================================================
                     NAMA EKSTRAKURIKULER
                ================================================== -->

                <div>

                    <label
                        for="name"
                        class="
                            block
                            text-sm
                            font-semibold
                            mb-2
                        "
                    >
                        Nama Ekstrakurikuler
                    </label>


                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $extracurricular->name) }}"
                        placeholder="Contoh: Kelompok Ilmiah Remaja (KIR)"
                        required
                        class="
                            w-full
                            rounded-xl
                            border-slate-300
                            focus:border-blue-500
                            focus:ring-blue-500
                        "
                    >


                    @error('name')

                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                <!-- =================================================
                     PEMBINA
                ================================================== -->

                <div>

                    <label
                        for="pembina"
                        class="
                            block
                            text-sm
                            font-semibold
                            mb-2
                        "
                    >
                        Pembina Ekstrakurikuler
                    </label>


                    <input
                        type="text"
                        id="pembina"
                        name="pembina"
                        value="{{ old('pembina', $extracurricular->pembina) }}"
                        placeholder="Contoh: Hj. Heppi Ruminah, M.Pd"
                        required
                        class="
                            w-full
                            rounded-xl
                            border-slate-300
                            focus:border-blue-500
                            focus:ring-blue-500
                        "
                    >


                    <p class="text-xs text-slate-500 mt-2">
                        Gunakan nama pembina sesuai data resmi dari sekolah.
                    </p>


                    @error('pembina')

                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                <!-- =================================================
                     DESKRIPSI
                ================================================== -->

                <div>

                    <label
                        for="description"
                        class="
                            block
                            text-sm
                            font-semibold
                            mb-2
                        "
                    >
                        Deskripsi
                    </label>


                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Jelaskan tentang kegiatan ekstrakurikuler..."
                        required
                        class="
                            w-full
                            rounded-xl
                            border-slate-300
                            focus:border-blue-500
                            focus:ring-blue-500
                        "
                    >{{ old('description', $extracurricular->description) }}</textarea>


                    @error('description')

                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                <!-- =================================================
                     JADWAL
                ================================================== -->

                <div>

                    <label
                        for="schedule"
                        class="
                            block
                            text-sm
                            font-semibold
                            mb-2
                        "
                    >
                        Jadwal
                    </label>


                    <input
                        type="text"
                        id="schedule"
                        name="schedule"
                        value="{{ old('schedule', $extracurricular->schedule) }}"
                        placeholder="Contoh: Senin, 15.30 - 17.00 WIB"
                        required
                        class="
                            w-full
                            rounded-xl
                            border-slate-300
                            focus:border-blue-500
                            focus:ring-blue-500
                        "
                    >


                    @error('schedule')

                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                <!-- =================================================
                     KUOTA
                ================================================== -->

                <div>

                    <label
                        for="quota"
                        class="
                            block
                            text-sm
                            font-semibold
                            mb-2
                        "
                    >
                        Kuota Siswa
                    </label>


                    <input
                        type="number"
                        id="quota"
                        name="quota"
                        value="{{ old('quota', $extracurricular->quota) }}"
                        min="1"
                        max="1000"
                        required
                        class="
                            w-full
                            rounded-xl
                            border-slate-300
                            focus:border-blue-500
                            focus:ring-blue-500
                        "
                    >


                    <p class="text-xs text-slate-500 mt-2">
                        Masukkan jumlah maksimal siswa yang dapat diterima.
                    </p>


                    @error('quota')

                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                <!-- =================================================
                     JUMLAH PENDAFTAR DITERIMA
                ================================================== -->

                @php
                    $acceptedCount = $extracurricular
                        ->registrations()
                        ->where('status', 'Diterima')
                        ->count();
                @endphp


                <div
                    class="
                        rounded-xl
                        bg-blue-50
                        border
                        border-blue-100
                        p-4
                    "
                >

                    <div class="flex items-center justify-between gap-4">

                        <div>

                            <p class="text-sm font-semibold text-blue-900">
                                Siswa Diterima
                            </p>

                            <p class="text-xs text-blue-700 mt-1">
                                Jumlah siswa yang sudah diterima pada ekstrakurikuler ini.
                            </p>

                        </div>


                        <div
                            class="
                                text-2xl
                                font-extrabold
                                text-blue-700
                            "
                        >
                            {{ $acceptedCount }}
                        </div>

                    </div>

                </div>



                <!-- =================================================
                     PERINGATAN KUOTA
                ================================================== -->

                @if($acceptedCount > 0)

                    <div
                        class="
                            rounded-xl
                            bg-amber-50
                            border
                            border-amber-200
                            p-4
                        "
                    >

                        <p
                            class="
                                text-sm
                                font-semibold
                                text-amber-800
                            "
                        >
                            Perhatian
                        </p>


                        <p
                            class="
                                text-xs
                                text-amber-700
                                mt-1
                            "
                        >
                            Ekstrakurikuler ini sudah memiliki
                            {{ $acceptedCount }}
                            siswa yang diterima.
                            Pastikan perubahan kuota tidak lebih kecil
                            dari jumlah siswa yang sudah diterima.
                        </p>

                    </div>

                @endif



                <!-- =================================================
                     BUTTON
                ================================================== -->

                <div
                    class="
                        pt-4
                        border-t
                        border-slate-100
                        flex
                        flex-col
                        sm:flex-row
                        gap-3
                    "
                >


                    <!-- BATAL -->

                    <a
                        href="{{ route('admin.extracurriculars.index') }}"
                        class="
                            w-full
                            sm:w-auto
                            px-6
                            py-3
                            text-center
                            rounded-xl
                            border
                            border-slate-300
                            text-slate-600
                            font-semibold
                            hover:bg-slate-50
                        "
                    >
                        Batal
                    </a>


                    <!-- SIMPAN -->

                    <button
                        type="submit"
                        class="
                            w-full
                            sm:w-auto
                            px-6
                            py-3
                            rounded-xl
                            bg-blue-600
                            text-white
                            font-semibold
                            hover:bg-blue-700
                            transition
                        "
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </main>



    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer
        class="
            border-t
            border-slate-200
            bg-white
            mt-10
        "
    >

        <div
            class="
                max-w-7xl
                mx-auto
                px-6
                py-6
                text-center
            "
        >

            <p class="text-sm text-slate-500">

                © {{ date('Y') }}
                E-Ekstrakurikuler
                SMA Negeri 5 Cirebon

            </p>

        </div>

    </footer>


</body>

</html>