<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'reset_password_token' => null,
            'reset_password_sent_at' => null,
            'is_admin' => 1,
            'date_of_birth' => '1990-01-01',
            'phone' => '0812345678',
            'address' => '123 Main St',
            'province' => 'Bangkok',
            'zipcode' => '10100',
            'department_name' => 'IT',
            'is_approved' => 1,
        ]);

        // User ปกติ
        User::factory()->create([
            'name' => 'Normal User',
            'username' => 'user01',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'reset_password_token' => null,
            'reset_password_sent_at' => null,
            'is_admin' => 0,
            'date_of_birth' => '1995-05-05',
            'phone' => '0898765432',
            'address' => '456 Second St',
            'province' => 'Chiang Mai',
            'zipcode' => '50000',
            'department_name' => 'HR',
            'is_approved' => 1,
        ]);
    }
}
