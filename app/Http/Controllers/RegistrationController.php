<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Extracurricular;
use App\Models\RegistrationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DATA PENDAFTARAN / DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        if ($user->isAdmin()) {

            $search = $request->input('search');
            $status = $request->input('status');
            $kelas = $request->input('kelas');
            $jurusan = $request->input('jurusan');
            $extracurricularId = $request->input('extracurricular_id');

            /*
            |--------------------------------------------------------------------------
            | STATISTIK GLOBAL
            |--------------------------------------------------------------------------
            */

            $totalPendaftaran = Registration::count();

            $totalPending = Registration::where(
                'status',
                'Pending'
            )->count();

            $totalDiterima = Registration::where(
                'status',
                'Diterima'
            )->count();

            $totalDitolak = Registration::where(
                'status',
                'Ditolak'
            )->count();


            /*
            |--------------------------------------------------------------------------
            | DATA PENDAFTARAN
            |--------------------------------------------------------------------------
            */

            $registrations = Registration::with([
                'user',
                'extracurricular'
            ])

                ->when($search, function ($query) use ($search) {

                    $query->whereHas('user', function ($userQuery) use ($search) {

                        $userQuery->where(function ($q) use ($search) {

                            $q->where(
                                'name',
                                'like',
                                '%' . $search . '%'
                            )

                            ->orWhere(
                                'nis',
                                'like',
                                '%' . $search . '%'
                            )

                            ->orWhere(
                                'email',
                                'like',
                                '%' . $search . '%'
                            );

                        });

                    });

                })

                ->when($status, function ($query) use ($status) {

                    $query->where(
                        'status',
                        $status
                    );

                })

                ->when($kelas, function ($query) use ($kelas) {

                    $query->whereHas(
                        'user',
                        function ($userQuery) use ($kelas) {

                            $userQuery->where(
                                'kelas',
                                $kelas
                            );

                        }
                    );

                })

                ->when($jurusan, function ($query) use ($jurusan) {

                    $query->whereHas(
                        'user',
                        function ($userQuery) use ($jurusan) {

                            $userQuery->where(
                                'jurusan',
                                $jurusan
                            );

                        }
                    );

                })

                ->when(
                    $extracurricularId,
                    function ($query) use ($extracurricularId) {

                        $query->where(
                            'extracurricular_id',
                            $extracurricularId
                        );

                    }
                )

                ->latest()
                ->paginate(10)
                ->withQueryString();


            /*
            |--------------------------------------------------------------------------
            | DATA FILTER
            |--------------------------------------------------------------------------
            */

            $extracurriculars = Extracurricular::orderBy(
                'name'
            )->get();


            $kelasList = Registration::with('user')
                ->get()
                ->pluck('user.kelas')
                ->filter()
                ->unique()
                ->sort()
                ->values();


            $jurusanList = Registration::with('user')
                ->get()
                ->pluck('user.jurusan')
                ->filter()
                ->unique()
                ->sort()
                ->values();


            return view(
                'admin.registrations',
                compact(
                    'registrations',
                    'search',
                    'status',
                    'kelas',
                    'jurusan',
                    'extracurricularId',
                    'extracurriculars',
                    'kelasList',
                    'jurusanList',
                    'totalPendaftaran',
                    'totalPending',
                    'totalDiterima',
                    'totalDitolak'
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD SISWA
        |--------------------------------------------------------------------------
        */

        $myRegistrations = Registration::where(
            'user_id',
            $user->id
        )
            ->with('extracurricular')
            ->latest()
            ->get();


        $extracurriculars = Extracurricular::all();


        return view(
            'siswa.dashboard',
            compact(
                'myRegistrations',
                'extracurriculars'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DAFTAR EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, $id)
    {
        $user = Auth::user();


        if (!$user->isSiswa()) {

            abort(
                403,
                'Hanya siswa yang dapat melakukan pendaftaran ekstrakurikuler.'
            );

        }


        $extracurricular = Extracurricular::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | CEK PENDAFTARAN DUPLIKAT
        |--------------------------------------------------------------------------
        */

        $exists = Registration::where(
            'user_id',
            $user->id
        )
            ->where(
                'extracurricular_id',
                $extracurricular->id
            )
            ->exists();


        if ($exists) {

            return back()->with(
                'error',
                'Anda sudah mendaftar ekstrakurikuler ini sebelumnya.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | MAKSIMAL 2 EKSTRAKURIKULER
        |--------------------------------------------------------------------------
        */

        $registrationCount = Registration::where(
            'user_id',
            $user->id
        )
            ->whereIn(
                'status',
                [
                    'Pending',
                    'Diterima'
                ]
            )
            ->count();


        if ($registrationCount >= 2) {

            return back()->with(
                'error',
                'Anda sudah mencapai batas maksimal 2 ekstrakurikuler.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | CEK KUOTA
        |--------------------------------------------------------------------------
        */

        $acceptedCount = Registration::where(
            'extracurricular_id',
            $extracurricular->id
        )
            ->where(
                'status',
                'Diterima'
            )
            ->count();


        if ($acceptedCount >= $extracurricular->quota) {

            return back()->with(
                'error',
                'Maaf, kuota ekstrakurikuler ' .
                $extracurricular->name .
                ' sudah penuh.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN PENDAFTARAN
        |--------------------------------------------------------------------------
        */

        Registration::create([
            'user_id' => $user->id,
            'extracurricular_id' => $extracurricular->id,
            'status' => 'Pending',
        ]);


        return back()->with(
            'success',
            'Berhasil mendaftar ke ' .
            $extracurricular->name .
            '. Pendaftaran menunggu validasi admin.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS PENDAFTARAN
    |--------------------------------------------------------------------------
    */

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => [
                'required',
                'in:Diterima,Ditolak'
            ],
        ]);


        $registration = Registration::with([
            'user',
            'extracurricular'
        ])->findOrFail($id);


        $oldStatus = $registration->status;


        /*
        |--------------------------------------------------------------------------
        | CEK KUOTA SAAT DITERIMA
        |--------------------------------------------------------------------------
        */

        if ($request->status === 'Diterima') {

            $extracurricular = $registration->extracurricular;


            $acceptedCount = Registration::where(
                'extracurricular_id',
                $extracurricular->id
            )
                ->where(
                    'status',
                    'Diterima'
                )
                ->count();


            if (
                $registration->status !== 'Diterima'
                &&
                $acceptedCount >= $extracurricular->quota
            ) {

                return back()->with(
                    'error',
                    'Pendaftaran tidak dapat diterima karena kuota ' .
                    $extracurricular->name .
                    ' sudah penuh.'
                );

            }
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS
        |--------------------------------------------------------------------------
        */

        $registration->update([
            'status' => $request->status,
        ]);


        /*
        |--------------------------------------------------------------------------
        | SIMPAN LOG PERUBAHAN STATUS
        |--------------------------------------------------------------------------
        */

        if ($oldStatus !== $request->status) {

            RegistrationLog::create([
                'registration_id' => $registration->id,
                'admin_id' => Auth::id(),
                'old_status' => $oldStatus,
                'new_status' => $request->status,
            ]);

        }


        return back()->with(
            'success',
            'Status pendaftaran ' .
            $registration->user->name .
            ' berhasil diperbarui menjadi ' .
            $request->status .
            '.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | BATAL PENDAFTARAN
    |--------------------------------------------------------------------------
    */

    public function cancel($id)
    {
        $user = Auth::user();


        if (!$user->isSiswa()) {

            abort(
                403,
                'Hanya siswa yang dapat membatalkan pendaftaran.'
            );

        }


        $registration = Registration::where(
            'id',
            $id
        )
            ->where(
                'user_id',
                $user->id
            )
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | HANYA STATUS PENDING YANG BOLEH DIBATALKAN
        |--------------------------------------------------------------------------
        */

        if ($registration->status !== 'Pending') {

            return back()->with(
                'error',
                'Pendaftaran yang sudah diterima atau ditolak tidak dapat dibatalkan.'
            );

        }


        $registration->delete();


        return back()->with(
            'success',
            'Pendaftaran ekstrakurikuler berhasil dibatalkan.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EXPORT DATA PENDAFTARAN KE CSV
    |--------------------------------------------------------------------------
    */

    public function export()
    {
        $registrations = Registration::with([
            'user',
            'extracurricular'
        ])
            ->latest()
            ->get();


        $fileName = 'data-pendaftaran-ekstrakurikuler-' .
            now()->format('Y-m-d-H-i-s') .
            '.csv';


        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];


        $callback = function () use ($registrations) {

            $file = fopen('php://output', 'w');


            /*
            |--------------------------------------------------------------------------
            | BOM UTF-8
            |--------------------------------------------------------------------------
            |
            | Supaya karakter Bahasa Indonesia terbaca dengan baik
            | ketika file dibuka menggunakan Microsoft Excel.
            |
            */

            fprintf(
                $file,
                chr(0xEF) . chr(0xBB) . chr(0xBF)
            );


            /*
            |--------------------------------------------------------------------------
            | HEADER CSV
            |--------------------------------------------------------------------------
            */

            fputcsv($file, [
                'No',
                'Nama Siswa',
                'NIS',
                'Kelas',
                'Jurusan',
                'Email',
                'Ekstrakurikuler',
                'Status',
                'Tanggal Pendaftaran',
            ]);


            /*
            |--------------------------------------------------------------------------
            | DATA PENDAFTARAN
            |--------------------------------------------------------------------------
            */

            foreach ($registrations as $index => $registration) {

                fputcsv($file, [
                    $index + 1,
                    $registration->user->name ?? '-',
                    $registration->user->nis ?? '-',
                    $registration->user->kelas ?? '-',
                    $registration->user->jurusan ?? '-',
                    $registration->user->email ?? '-',
                    $registration->extracurricular->name ?? '-',
                    $registration->status,
                    $registration->created_at
                        ? $registration->created_at->format('d-m-Y H:i')
                        : '-',
                ]);

            }


            fclose($file);
        };


        return response()->stream(
            $callback,
            200,
            $headers
        );
    }
}