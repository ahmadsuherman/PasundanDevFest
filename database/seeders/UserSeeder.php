<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username'          => 'superadmin',
            'fullname'          => 'Super Admin',
            'email'             => 'superadmin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'          => 'password',
            'roles'             => 'Admin',
            'is_verified'       => true,
            'avatar'            => null,
            'bio'               => null,
            'links'             => null,
        ]);

        User::create([
            'username'          => 'speaker',
            'fullname'          => 'Speaker',
            'email'             => 'speaker@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'          => 'password',
            'roles'             => 'Speakers',
            'is_verified'       => true,
            'avatar'            => null,
            'bio'               => null,
            'links'             => null
        ]);

        User::create([
            'username'          => 'member',
            'fullname'          => 'Member',
            'email'             => 'member@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'          => 'password',
            'roles'             => 'Members',
            'is_verified'       => true,
            'avatar'            => null,
            'bio'               => null,
            'links'             => null
        ]);
    }
}
