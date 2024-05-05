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
            if (!\Spatie\Permission\Models\Role::where('name', $role)->exists()) {
                \Spatie\Permission\Models\Role::create(['name' => $role]);
            }

            $permissions = \Spatie\Permission\Models\Permission::all();
            foreach ($permissions as $permission) {
                \Spatie\Permission\Models\Role::findByName('admin')->givePermissionTo($permission);
            }
        }
    }
}
