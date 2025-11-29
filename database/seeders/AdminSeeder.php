<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Quarybuilder approach

        // DB::table('admins')->insert([
        //     [
        //         'name' => 'Super Admin',
        //         'email' => 'admin@example.com',
        //         'photo' => null,
        //         'password' => Hash::make('123456'), // change password later
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]
        // ]);



        // model approach

        Admin::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '01501501501',
            'photo' => null,
            'password' => Hash::make('123456'), // remember to change password later
        ]);
    }
}
