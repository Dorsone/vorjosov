<?php

namespace Database\Seeders;

use App\Models\MyObject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MyObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MyObject::factory(50)->create();
    }
}
