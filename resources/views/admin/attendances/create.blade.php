<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sesi Absensi | Admin SMAN 5 Cirebon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Poppins', sans-serif; background: #f5f8ff; }</style>
</head>
<body class="text-[#173574]">
    <div class="min-h-screen p-6 max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <h1 class="text-xl font-bold mb-1">Buat Sesi Pertemuan Baru</h1>
            <p class="text-sm text-gray-500 mb-6">Ekstrakurikuler: <span class="font-semibold text-[#173574]">{{ $extracurricular->name }}</span></p>

            <form action="{{ route('admin.extracurriculars.attendances.store', $extracurricular->id) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Latihan / Pertemuan</label>
                    <input type="date" name="date" value="{{ date('Y-m-d') }}" required class="w-full h-11 px-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Topik / Materi (Opsional)</label>
                    <input type="text" name="topic" placeholder="Contoh: Latihan Dasar / Persiapan Lomba" class="w-full h-11 px-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('admin.extracurriculars.attendances.index', $extracurricular->id) }}" class="px-5 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-100 transition">Batal</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl text-sm font-semibold transition">Simpan & Generate Absen</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>