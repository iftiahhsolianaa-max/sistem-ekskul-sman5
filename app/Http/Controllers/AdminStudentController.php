<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminStudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kelas = $request->input('kelas');
        $jurusan = $request->input('jurusan');

        $students = User::query()
            ->where('role', 'siswa')
            ->withCount('registrations')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('nis', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->when($kelas, function ($query) use ($kelas) {
                $query->where('kelas', $kelas);
            })
            ->when($jurusan, function ($query) use ($jurusan) {
                $query->where('jurusan', $jurusan);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kelasList = User::where('role', 'siswa')
            ->whereNotNull('kelas')
            ->where('kelas', '!=', '')
            ->distinct()
            ->orderBy('kelas')
            ->pluck('kelas');

        $jurusanList = User::where('role', 'siswa')
            ->whereNotNull('jurusan')
            ->where('jurusan', '!=', '')
            ->distinct()
            ->orderBy('jurusan')
            ->pluck('jurusan');

        return view('admin.students.index', compact(
            'students',
            'search',
            'kelas',
            'jurusan',
            'kelasList',
            'jurusanList'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL SISWA
    |--------------------------------------------------------------------------
    */

    public function show(User $student)
    {
        // Pastikan yang dibuka memang akun siswa
        if ($student->role !== 'siswa') {
            abort(404);
        }

        // Ambil data siswa beserta seluruh pendaftaran
        $student->load([
            'registrations.extracurricular',
            'registrations.logs.admin',
        ]);

        return view(
            'admin.students.show',
            compact('student')
        );
    }
}