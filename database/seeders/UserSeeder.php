<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $j = 0;
        for ($i = 0; $i < 15; $i++) {
            $j++;
            User::create([
                'firstname' => "udin",
                'lastname' => "B$j",
                'gender' => 0,
                'status' => 0,
                'email' => "udin$j@gg.com",
                'city' => 'malang',
                'address' => "jl.anggrek $j",
                'phone' => "12345$j"
            ]);
            User::create([
                'firstname' => "budi",
                'lastname' => "K$j",
                'gender' => 0,
                'status' => 0,
                'email' => "budi$j@gg.com",
                'city' => 'malang',
                'address' => "jl.mawar $j",
                'phone' => "11111$j"
            ]);
        }
    }
}
