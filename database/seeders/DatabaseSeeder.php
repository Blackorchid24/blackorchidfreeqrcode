<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            [
                'username' => 'blackorchidadmin',
            ],
            [
                'name' => 'Aaron Pon Guadalquiver',
                'password' => Hash::make('BlackorchidAdmin@123'),
                'role' => 'superadmin',
                'status' => 'active',
                'last_login_at' => null,
            ]
        );
    }
}
