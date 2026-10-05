<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Extracurricular;
use App\Models\Registration;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total siswa
        $totalSiswa = User::where('role', 'siswa')->count();

        // Total ekstrakurikuler
        $totalEkskul = Extracurricular::count();

        // Total pendaftaran
        $totalPendaftaran = Registration::count();

        // Pendaftaran Pending
        $totalPending = Registration::where(
            'status',
            'Pending'
        )->count();

        // Pendaftaran Diterima
        $totalDiterima = Registration::where(
            'status',
            'Diterima'
        )->count();

        // Pendaftaran Ditolak
        $totalDitolak = Registration::where(
            'status',
            'Ditolak'
        )->count();

        // Data ekskul berdasarkan jumlah pendaftar
        $statistikEkskul = Extracurricular::withCount([
            'registrations'
        ])
            ->orderByDesc('registrations_count')
            ->get();

        // Pendaftaran terbaru
        $pendaftaranTerbaru = Registration::with([
            'user',
            'extracurricular'
        ])
            ->latest()
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalSiswa',
                'totalEkskul',
                'totalPendaftaran',
                'totalPending',
                'totalDiterima',
                'totalDitolak',
                'statistikEkskul',
                'pendaftaranTerbaru'
            )
        );
    }
}