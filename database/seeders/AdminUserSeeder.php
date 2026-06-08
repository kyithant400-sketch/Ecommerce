<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin K',
            'email' => 'admink@example.com',
            'password' => Hash::make('admink123'),
        ]);
        $admin->assignRole('admin');
    }
}