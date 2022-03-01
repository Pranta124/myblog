<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name'=>'Pranta']);
        $user = Role::create(['name'=>'Prema']);
        $suspend = Role::create(['name'=>'suspend']);
    }
}
