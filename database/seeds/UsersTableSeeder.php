<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
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
        User::truncate();

        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'firstName' => 'Admin ',
            'lastName' => ' User',
            'nickname' => ' AdminNick',
            'birthDate' => ' 1991-12-23',
            'imgPath' => ' /images/users/profileDefault.png',
            'credit' => 1000,
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            ]);
            
            $user = User::create([
            'firstName' => 'Generic ',
            'lastName' => ' User',
            'nickname' => ' UserNick',
            'birthDate' => ' 1990-05-19',
            'imgPath' => ' /images/users/profileDefault.png',
            'credit' => 100,
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
