<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Greg',
                'email' => 'gregmdev30@gmail.com',
                'password' => bcrypt('oreo123')
            ],
            [
                'name' => 'Louise',
                'email' => 'louise@hartrestaurants.co.uk',
                'password' => bcrypt('oreo456')
            ]
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
