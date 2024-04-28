<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new \App\Models\User();

        $user->name = 'Admin';
        $user->email = 'admin@localhost';
        $user->password = bcrypt('admin');
        $user->assignRole('admin');

        $user->save();

        User::factory(10)->create();
    }
}
