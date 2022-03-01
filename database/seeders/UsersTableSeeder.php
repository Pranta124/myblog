<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        'userid' => 'admin101',
        'role_id'=> 1,
        'name' => 'Pranta',
        'email' => 'pranta138@gmail.com',
        'password' => bcrypt('admin'),
        ]);

        $user = User::create([
            'userid' => 'user404',
            'role_id'=>2,
            'name' => 'Prema',
            'email' => 'prema@gmail.com',
            'password' => bcrypt('user'),
            ]);

    }
}
