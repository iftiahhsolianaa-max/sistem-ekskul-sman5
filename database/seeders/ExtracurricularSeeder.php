<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Extracurricular;

class ExtracurricularSeeder extends Seeder
{
    public function run(): void
    {
        $extracurriculars = [
            [
                'name' => 'Kelompok Ilmiah Remaja (KIR)',
                'pembina' => 'Hj. Heppi Ruminah, M.Pd',
                'schedule' => 'Jum\'at, Pukul 13.30-16.00 WIB',
                'quota' => 40,
                'description' => 'Ekstrakurikuler Kelompok Ilmiah Remaja (KIR) di SMAN 5 Cirebon bertempat di Laboratorium Kimia dengan pembina Hj. Heppi Ruminah, M.Pd[cite: 1, 2, 5].'
            ],
            [
                'name' => 'Jurnalistik',
                'pembina' => 'Dwiyanto Nugraha, S.Pd',
                'schedule' => 'Selasa, Pukul 14.30-17.00 WIB',
                'quota' => 35,
                'description' => 'Ekstrakurikuler Jurnalistik bertempat di Ruang Kelas SMAN 5 Cirebon dengan pembina Dwiyanto Nugraha, S.Pd[cite: 1, 3].'
            ],
            [
                'name' => 'Seni Musik',
                'pembina' => 'Yuliana, S.Pd',
                'schedule' => 'Selasa & Rabu, Pukul 14.30-17.00 WIB',
                'quota' => 40,
                'description' => 'Ekstrakurikuler Seni Musik bertempat di Ruang Seni SMAN 5 Cirebon dengan pembina Yuliana, S.Pd[cite: 1, 3, 4].'
            ],
            [
                'name' => 'Seni Tari',
                'pembina' => 'Yuliana, S.Pd',
                'schedule' => 'Rabu & Jum\'at, Pukul 14.30-17.00 WIB',
                'quota' => 40,
                'description' => 'Ekstrakurikuler Seni Tari bertempat di Ruang Seni SMAN 5 Cirebon dengan pembina Yuliana, S.Pd[cite: 1, 4, 5].'
            ],
            [
                'name' => 'Seni Teater',
                'pembina' => 'Sigit Pamungkas, S.Pd',
                'schedule' => 'Senin & Selasa, Pukul 14.30-17.00/17.30 WIB',
                'quota' => 35,
                'description' => 'Ekstrakurikuler Seni Teater bertempat di Ruang Seni SMAN 5 Cirebon dengan pembina Sigit Pamungkas, S.Pd[cite: 1, 3].'
            ],
            [
                'name' => 'PMR',
                'pembina' => 'Dwi Elyartanti, S.Pd',
                'schedule' => 'Selasa & Rabu, Pukul 14.30-17.00 WIB',
                'quota' => 45,
                'description' => 'Ekstrakurikuler Palang Merah Remaja (PMR) bertempat di Kelas/Lapangan SMAN 5 Cirebon dengan pembina Dwi Elyartanti, S.Pd[cite: 1, 3, 4].'
            ],
            [
                'name' => 'IRM',
                'pembina' => 'Danu Akbar, M.Pd.I',
                'schedule' => 'Sabtu, Pukul 08.00-10.00 WIB',
                'quota' => 50,
                'description' => 'Ekstrakurikuler Ikatan Remaja Masjid (IRM) bertempat di Masjid SMAN 5 Cirebon dengan pembina Danu Akbar, M.Pd.I[cite: 1, 5].'
            ],
            [
                'name' => 'Paskibra',
                'pembina' => 'Agung Dwi Surachman, S.Pd',
                'schedule' => 'Selasa, Kamis & Sabtu, Pukul 14.30-17.00 / 08.00 WIB',
                'quota' => 40,
                'description' => 'Ekstrakurikuler Paskibra bertempat di Lapangan Basket SMAN 5 Cirebon dengan pembina Agung Dwi Surachman, S.Pd[cite: 1, 3, 4, 5].'
            ],
            [
                'name' => 'Pramuka',
                'pembina' => 'Dara Khodijah, S.Pd; Syaiful Bachri A, S.Pd',
                'schedule' => 'Rabu & Jum\'at, Pukul 14.30-17.00 WIB',
                'quota' => 60,
                'description' => 'Ekstrakurikuler Pramuka bertempat di Kelas/Lap. Voli SMAN 5 Cirebon dengan pembina Dara Khodijah, S.Pd dan Syaiful Bachri A, S.Pd[cite: 1, 4, 5].'
            ],
            [
                'name' => 'English Club',
                'pembina' => 'Ria Kusmawati, S.Pd',
                'schedule' => 'Kamis, Pukul 14.30-17.00 WIB',
                'quota' => 35,
                'description' => 'Ekstrakurikuler English Club bertempat di Aula SMAN 5 Cirebon dengan pembina Ria Kusmawati, S.Pd[cite: 1, 4].'
            ],
            [
                'name' => 'Bola Basket',
                'pembina' => 'Yurrí Erlando, S.Pd',
                'schedule' => 'Senin, Rabu & Sabtu, Pukul 15.30-17.30 / 08.00 WIB',
                'quota' => 45,
                'description' => 'Ekstrakurikuler Bola Basket bertempat di Lapangan Basket SMAN 5 Cirebon dengan pembina Yurrí Erlando, S.Pd[cite: 1, 3, 4, 5].'
            ],
            [
                'name' => 'Bola Voli',
                'pembina' => 'Agus Supriyadi, S.Pd',
                'schedule' => 'Senin & Kamis, Pukul 15.30-17.30 / 14.30-17.00 WIB',
                'quota' => 40,
                'description' => 'Ekstrakurikuler Bola Voli bertempat di Lap. Voli SMAN 5 Cirebon dengan pembina Agus Supriyadi, S.Pd[cite: 1, 3, 4].'
            ],
            [
                'name' => 'Bela Diri',
                'pembina' => 'Resna Triyandi W, S.Pd',
                'schedule' => 'Senin, Selasa & Rabu, Pukul 14.30-17.30 WIB',
                'quota' => 40,
                'description' => 'Ekstrakurikuler Bela Diri (Tarung Derajat, Pencaksilat, Boxing) bertempat di Rooftop SMAN 5 Cirebon dengan pembina Resna Triyandi W, S.Pd[cite: 1, 3, 4].'
            ],
            [
                'name' => 'Softball + Baseball',
                'pembina' => 'Resna Triyandi W, S.Pd',
                'schedule' => 'Senin & Rabu, Pukul 15.30-17.30 / 14.30-17.00 WIB',
                'quota' => 35,
                'description' => 'Ekstrakurikuler Softball + Baseball bertempat di Lap. Basket SMAN 5 Cirebon dengan pembina Resna Triyandi W, S.Pd[cite: 1, 3, 4, 5].'
            ],
            [
                'name' => 'Sepak Bola',
                'pembina' => 'Resna Triyandi W, S.Pd',
                'schedule' => 'Rabu & Kamis, Pukul 14.30-17.00 WIB',
                'quota' => 45,
                'description' => 'Ekstrakurikuler Sepak Bola/Futsal bertempat di Lap. Basket SMAN 5 Cirebon dengan pembina Resna Triyandi W, S.Pd[cite: 1, 3, 4].'
            ],
            [
                'name' => 'Atletik',
                'pembina' => 'Resna Triyandi W, S.Pd',
                'schedule' => 'Senin & Kamis, Pukul 15.30-17.30 / 14.30-17.00 WIB',
                'quota' => 30,
                'description' => 'Ekstrakurikuler Atletik bertempat di Lap. Basket SMAN 5 Cirebon dengan pembina Resna Triyandi W, S.Pd[cite: 1, 3, 4].'
            ],
        ];

        foreach ($extracurriculars as $data) {
            Extracurricular::updateOrCreate(
                ['name' => $data['name']],
                [
                    'pembina' => $data['pembina'],
                    'schedule' => $data['schedule'],
                    'quota' => $data['quota'],
                    'description' => $data['description']
                ]
            );
        }
    }
}