<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email' ,'test@test.com' )->exists()){
            User::create([
                'name' => 'Admin',
                'email' => 'test@test.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]);
        }

    }
}
