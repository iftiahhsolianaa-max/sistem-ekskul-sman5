<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class RegistrationLogController extends Controller
{
    public function show($id)
    {
        $registration = Registration::with([
            'user',
            'extracurricular',
            'logs.admin',
        ])->findOrFail($id);

        $user = Auth::user();

        // Admin boleh melihat semua riwayat
        if ($user->isAdmin()) {
            return view(
                'admin.registration-logs.show',
                compact('registration')
            );
        }

        // Siswa hanya boleh melihat riwayat miliknya sendiri
        if ($registration->user_id !== $user->id) {
            abort(
                403,
                'Anda tidak memiliki akses ke riwayat pendaftaran ini.'
            );
        }

        return view(
            'siswa.registration-logs.show',
            compact('registration')
        );
    }
}