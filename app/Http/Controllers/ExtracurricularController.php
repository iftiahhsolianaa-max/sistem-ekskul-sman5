<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    /**
     * Menampilkan daftar ekstrakurikuler.
     */
    public function index()
    {
        $extracurriculars = Extracurricular::withCount([
            'registrations as accepted_count' => function ($query) {
                $query->where('status', 'Diterima');
            }
        ])
        ->latest()
        ->get();

        return view(
            'admin.extracurriculars.index',
            compact('extracurriculars')
        );
    }


    /**
     * Menampilkan form tambah ekstrakurikuler.
     */
    public function create()
    {
        return view('admin.extracurriculars.create');
    }


    /**
     * Menyimpan ekstrakurikuler baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'pembina' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'schedule' => [
                'required',
                'string',
                'max:255',
            ],

            'quota' => [
                'required',
                'integer',
                'min:1',
                'max:1000',
            ],
        ]);


        Extracurricular::create($validated);


        return redirect()
            ->route('admin.extracurriculars.index')
            ->with(
                'success',
                'Ekstrakurikuler berhasil ditambahkan.'
            );
    }


    /**
     * Menampilkan detail ekstrakurikuler.
     *
     * Saat ini belum digunakan.
     */
    public function show(Extracurricular $extracurricular)
    {
        return redirect()
            ->route('admin.extracurriculars.index');
    }


    /**
     * Menampilkan form edit ekstrakurikuler.
     */
    public function edit(Extracurricular $extracurricular)
    {
        return view(
            'admin.extracurriculars.edit',
            compact('extracurricular')
        );
    }


    /**
     * Memperbarui data ekstrakurikuler.
     */
    public function update(
        Request $request,
        Extracurricular $extracurricular
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'pembina' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'schedule' => [
                'required',
                'string',
                'max:255',
            ],

            'quota' => [
                'required',
                'integer',
                'min:1',
                'max:1000',
            ],
        ]);


        /*
         * Cek jumlah siswa yang sudah diterima.
         * Kuota tidak boleh dibuat lebih kecil dari
         * jumlah siswa yang sudah diterima.
         */
        $acceptedCount = $extracurricular
            ->registrations()
            ->where('status', 'Diterima')
            ->count();


        if ($validated['quota'] < $acceptedCount) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Kuota tidak dapat lebih kecil dari jumlah siswa yang sudah diterima (' .
                    $acceptedCount .
                    ' siswa).'
                );
        }


        $extracurricular->update($validated);


        return redirect()
            ->route('admin.extracurriculars.index')
            ->with(
                'success',
                'Ekstrakurikuler berhasil diperbarui.'
            );
    }


    /**
     * Menghapus ekstrakurikuler.
     */
    public function destroy(Extracurricular $extracurricular)
    {
        /*
         * Jangan hapus ekstrakurikuler yang sudah
         * memiliki data pendaftaran siswa.
         */
        $registrationCount = $extracurricular
            ->registrations()
            ->count();


        if ($registrationCount > 0) {

            return redirect()
                ->route('admin.extracurriculars.index')
                ->with(
                    'error',
                    'Ekstrakurikuler tidak dapat dihapus karena sudah memiliki pendaftaran siswa.'
                );
        }


        $extracurricular->delete();


        return redirect()
            ->route('admin.extracurriculars.index')
            ->with(
                'success',
                'Ekstrakurikuler berhasil dihapus.'
            );
    }
}