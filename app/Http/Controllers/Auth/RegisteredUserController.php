<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan halaman registrasi.
     */
    public function create(): View
    {
        return view('auth.register');
    }


    /**
     * Menyimpan data siswa baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'nis' => [
                'required',
                'string',
                'max:50',
                'unique:' . User::class,
            ],

            'kelas' => [
                'required',
                'string',
                'max:50',
            ],

            'jurusan' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],

        ]);


        // Membuat akun siswa
        $user = User::create([

            'name' => $request->name,

            'nis' => $request->nis,

            'kelas' => $request->kelas,

            'jurusan' => $request->jurusan,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),
        ]);


        // Role siswa ditentukan oleh sistem,
        // bukan dari input user.
        $user->forceFill([
            'role' => 'siswa',
        ])->save();


        event(new Registered($user));

        Auth::login($user);


        return redirect(
            route('dashboard', absolute: false)
        );
    }
}