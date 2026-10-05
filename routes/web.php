<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Extracurricular;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\RegistrationPeriodController;
use App\Http\Controllers\RegistrationLogController;
use App\Http\Controllers\Admin\AttendanceController;

/*
|--------------------------------------------------------------------------
| PUBLIC / HALAMAN UMUM
|--------------------------------------------------------------------------
*/

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/', function (Request $request) {
    $query = Extracurricular::query();

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%')
              ->orWhere('schedule', 'like', '%' . $search . '%');
        });
    }

    $extracurriculars = $query->latest()->get();
    $status = $request->get('status', 'Aktif');

    return view('welcome', compact('extracurriculars', 'status'));
})->name('akademik');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

// ROUTE DETAIL GALERI DINAMIS
Route::get('/galeri/{slug}', function ($slug) {
    $title = ucwords(str_replace('-', ' ', $slug));
    return view('galeri-detail', compact('title', 'slug'));
})->name('galeri.detail');

Route::get('/informasi', function () {
    return view('informasi');
})->name('informasi');

/*
|--------------------------------------------------------------------------
| ROUTE SISWA / USER LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [RegistrationController::class, 'index'])->name('dashboard');
    Route::post('/daftar-ekskul/{id}', [RegistrationController::class, 'store'])->name('daftar.ekskul');
    Route::delete('/pendaftaran/{id}/cancel', [RegistrationController::class, 'cancel'])->name('registration.cancel');
    Route::get('/pendaftaran/{id}/riwayat', [RegistrationLogController::class, 'show'])->name('registration.history');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('extracurriculars', ExtracurricularController::class);

        // Route Absensi Ekskul
        Route::resource('extracurriculars.attendances', AttendanceController::class);

        Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
        Route::patch('/registrations/{id}', [RegistrationController::class, 'updateStatus'])->name('registrations.update');
        Route::get('/registrations/export', [RegistrationController::class, 'export'])->name('registrations.export');

        Route::resource('students', AdminStudentController::class);
        Route::resource('registration-periods', RegistrationPeriodController::class);

        Route::get('/registration-logs/{id}', [RegistrationLogController::class, 'show'])->name('registration-logs.show');

    });

/*
|--------------------------------------------------------------------------
| PROFILE BREEZE & AUTH
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';