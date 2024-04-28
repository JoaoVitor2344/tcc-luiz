<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin',
            'RH',
            'user',
        ];

        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::create(['name' => $role]);
        }
    }
}
