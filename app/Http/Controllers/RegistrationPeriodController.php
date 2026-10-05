<?php

namespace App\Http\Controllers;

use App\Models\RegistrationPeriod;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegistrationPeriodController extends Controller
{
    /**
     * Menampilkan semua periode.
     */
    public function index()
    {
        $periods = RegistrationPeriod::latest('start_at')->get();

        $activePeriod = RegistrationPeriod::where(
            'is_active',
            true
        )
            ->where(
                'start_at',
                '<=',
                now()
            )
            ->where(
                'end_at',
                '>=',
                now()
            )
            ->latest('start_at')
            ->first();

        $upcomingPeriod = RegistrationPeriod::where(
            'is_active',
            true
        )
            ->where(
                'start_at',
                '>',
                now()
            )
            ->orderBy('start_at')
            ->first();

        $closedCount = RegistrationPeriod::where(
            'end_at',
            '<',
            now()
        )->count();

        return view(
            'admin.registration-periods.index',
            compact(
                'periods',
                'activePeriod',
                'upcomingPeriod',
                'closedCount'
            )
        );
    }

    /**
     * Form tambah periode.
     */
    public function create()
    {
        return view(
            'admin.registration-periods.create'
        );
    }

    /**
     * Menyimpan periode baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'start_at' => [
                'required',
                'date',
            ],

            'end_at' => [
                'required',
                'date',
                'after:start_at',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ], [
            'name.required' => 'Nama periode wajib diisi.',

            'start_at.required' => 'Tanggal mulai wajib diisi.',

            'start_at.date' => 'Tanggal mulai tidak valid.',

            'end_at.required' => 'Tanggal selesai wajib diisi.',

            'end_at.after' =>
                'Tanggal selesai harus setelah tanggal mulai.',
        ]);

        $isActive = $request->boolean('is_active');

        /*
         * Jika periode baru diaktifkan,
         * nonaktifkan periode lainnya.
         */
        if ($isActive) {
            RegistrationPeriod::where(
                'is_active',
                true
            )->update([
                'is_active' => false,
            ]);
        }

        RegistrationPeriod::create([
            'name' => $validated['name'],
            'start_at' => $validated['start_at'],
            'end_at' => $validated['end_at'],
            'description' => $validated['description'] ?? null,
            'is_active' => $isActive,
        ]);

        return redirect()
            ->route('admin.registration-periods.index')
            ->with(
                'success',
                'Periode pendaftaran berhasil ditambahkan.'
            );
    }

    /**
     * Menampilkan detail periode.
     */
    public function show(RegistrationPeriod $registrationPeriod)
    {
        return redirect()
            ->route(
                'admin.registration-periods.edit',
                $registrationPeriod
            );
    }

    /**
     * Form edit periode.
     */
    public function edit(
        RegistrationPeriod $registrationPeriod
    ) {
        return view(
            'admin.registration-periods.edit',
            compact('registrationPeriod')
        );
    }

    /**
     * Update periode.
     */
    public function update(
        Request $request,
        RegistrationPeriod $registrationPeriod
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'start_at' => [
                'required',
                'date',
            ],

            'end_at' => [
                'required',
                'date',
                'after:start_at',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ], [
            'name.required' => 'Nama periode wajib diisi.',

            'start_at.required' => 'Tanggal mulai wajib diisi.',

            'end_at.required' => 'Tanggal selesai wajib diisi.',

            'end_at.after' =>
                'Tanggal selesai harus setelah tanggal mulai.',
        ]);

        $isActive = $request->boolean('is_active');

        /*
         * Jika periode ini diaktifkan,
         * nonaktifkan periode lainnya.
         */
        if ($isActive) {
            RegistrationPeriod::where(
                'id',
                '!=',
                $registrationPeriod->id
            )
                ->where(
                    'is_active',
                    true
                )
                ->update([
                    'is_active' => false,
                ]);
        }

        $registrationPeriod->update([
            'name' => $validated['name'],
            'start_at' => $validated['start_at'],
            'end_at' => $validated['end_at'],
            'description' => $validated['description'] ?? null,
            'is_active' => $isActive,
        ]);

        return redirect()
            ->route(
                'admin.registration-periods.index'
            )
            ->with(
                'success',
                'Periode pendaftaran berhasil diperbarui.'
            );
    }

    /**
     * Menghapus periode.
     */
    public function destroy(
        RegistrationPeriod $registrationPeriod
    ) {
        $registrationPeriod->delete();

        return redirect()
            ->route(
                'admin.registration-periods.index'
            )
            ->with(
                'success',
                'Periode pendaftaran berhasil dihapus.'
            );
    }
}