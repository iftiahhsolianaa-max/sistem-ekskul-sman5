<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Create the admin user.
     */
    public function run(): void
    {
        $admin = User::firstOrNew([
            'email' => 'admin@smansma5.test',
        ]);

        $admin->name = 'Administrator';
        $admin->password = Hash::make('Admin12345');
        $admin->role = 'admin';
        $admin->save();
    }
}