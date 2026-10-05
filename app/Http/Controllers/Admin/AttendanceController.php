<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use App\Models\AttendanceSession;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Menampilkan daftar sesi absensi per ekstrakurikuler
    public function index(Extracurricular $extracurricular)
    {
        $sessions = $extracurricular->attendanceSessions()->latest('date')->get();
        return view('admin.attendances.index', compact('extracurricular', 'sessions'));
    }

    // Form untuk membuat sesi absensi baru (pilih tanggal & topik)
    public function create(Extracurricular $extracurricular)
    {
        return view('admin.attendances.create', compact('extracurricular'));
    }

    // Menyimpan sesi baru dan menyiapkan data kehadiran siswa yang diterima
    public function store(Request $request, Extracurricular $extracurricular)
    {
        $request->validate([
            'date' => 'required|date',
            'topic' => 'nullable|string|max:255',
        ]);

        // Buat sesi absensi
        $session = AttendanceSession::create([
            'extracurricular_id' => $extracurricular->id,
            'date' => $request->date,
            'topic' => $request->topic,
        ]);

        // Ambil semua siswa yang sudah mendaftar dan berstatus diterima (accepted) pada ekskul ini
        $acceptedStudents = $extracurricular->registrations()
            ->where('status', 'accepted')
            ->with('user')
            ->get();

        // Otomatis buat record absensi default 'hadir' untuk setiap siswa terdaftar
        foreach ($acceptedStudents as $reg) {
            if ($reg->user) {
                Attendance::create([
                    'attendance_session_id' => $session->id,
                    'user_id' => $reg->user->id,
                    'status' => 'hadir',
                ]);
            }
        }

        return redirect()->route('admin.extracurriculars.attendances.index', $extracurricular->id)
            ->with('success', 'Sesi absensi berhasil dibuat. Silakan perbarui status kehadiran jika diperlukan.');
    }

    // Form untuk merekap/mengubah status kehadiran siswa pada sesi tertentu
    public function edit(Extracurricular $extracurricular, AttendanceSession $attendance)
    {
        $session = $attendance->load('attendances.user');
        return view('admin.attendances.edit', compact('extracurricular', 'session'));
    }

    // Memperbarui status kehadiran siswa (hadir, izin, sakit, alpa)
    public function update(Request $request, Extracurricular $extracurricular, AttendanceSession $attendance)
    {
        $request->validate([
            'statuses' => 'required|array',
            'statuses.*' => 'in:hadir,izin,sakit,alpa',
        ]);

        foreach ($request->statuses as $attendanceId => $status) {
            Attendance::where('id', $attendanceId)->update([
                'status' => $status
            ]);
        }

        return redirect()->route('admin.extracurriculars.attendances.index', $extracurricular->id)
            ->with('success', 'Data absensi berhasil diperbarui.');
    }

    // Menghapus sesi absensi
    public function destroy(Extracurricular $extracurricular, AttendanceSession $attendance)
    {
        $attendance->delete();

        return redirect()->route('admin.extracurriculars.attendances.index', $extracurricular->id)
            ->with('success', 'Sesi absensi berhasil dihapus.');
    }
}