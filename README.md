# Portal E-Ekstrakurikuler SMAN 5 Cirebon

Aplikasi web berbasis Laravel untuk pengelolaan pendaftaran, data ekstrakurikuler, galeri dokumentasi, dan absensi siswa di SMAN 5 Cirebon.

## Fitur Utama
- **Halaman Publik & Akademik**: Menampilkan profil sekolah, informasi, galeri kegiatan dinamis, serta daftar ekstrakurikuler lengkap dengan fitur pencarian.
- **Autentikasi Siswa**: Registrasi akun siswa dengan pilihan kelas lengkap (Tingkat X: 1-12, Tingkat XI: 1-11, Tingkat XII: 1-11) dan pilihan jurusan (IPA, MIPAS, IPS).
- **Dashboard Siswa**: Memantau status pendaftaran dan riwayat aktivitas ekstrakurikuler.
- **Panel Admin**: Manajemen data ekstrakurikuler, verifikasi pendaftaran siswa, pengelolaan periode pendaftaran, ekspor data, serta modul manajemen absensi kehadiran.

## Persyaratan Sistem
- PHP >= 8.2
- Composer
- Node.js & NPM
- Database (SQLite / MySQL)

## Panduan Instalasi Lokal
1. Ekstrak atau kloning repositori ke direktori lokal.
2. Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env