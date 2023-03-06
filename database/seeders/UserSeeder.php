<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if (!app()->environment('production')){
            User::query()->create([
                'name' => 'Admin Adminov',
                'login' => 'admin',
                'password' => bcrypt('password'),
            ]);
            User::factory(10)->create();
        }
    }
}
