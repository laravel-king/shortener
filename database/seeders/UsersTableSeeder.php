<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();
        //\DB::table('role_user')->truncate();

        $adminRole = Role::query()->where('name', 'Admin')->first();
        $moderatorRole = Role::query()->where('name', 'Moderator')->first();
        $userRole = Role::query()->where('name', 'User')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password')
        ]);

        $moderator = User::create([
            'name' => 'Moderator',
            'email' => 'moderator@mail.com',
            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $moderator->roles()->attach($moderatorRole);
        $user->roles()->attach($userRole);


    }
}
