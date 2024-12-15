<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username'          => 'ahmadsuherman',
            'fullname'          => 'Ahmad Suherman',
            'email'             => 'suhermana274@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('password'),
            'roles'             => 'Admin',
            'is_verified'       => true,
            'avatar'            => null,
            'bio'               => null,
            'links'             => null,
        ]);

        User::create([
            'username'          => 'naufalzulfaza',
            'fullname'          => 'Naufal Zul Faza',
            'email'             => 'naufalzul45@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('password'),
            'roles'             => 'Admin',
            'is_verified'       => true,
            'avatar'            => null,
            'bio'               => null,
            'links'             => null,
        ]);

        User::create([
            'username'          => 'febialia',
            'fullname'          => 'Febi Alia',
            'email'             => 'febialia149@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('password'),
            'roles'             => 'Admin',
            'is_verified'       => true,
            'avatar'            => null,
            'bio'               => null,
            'links'             => null,
        ]);

        User::create([
            'username'          => 'melinda',
            'fullname'          => 'Melinda Sulaeman',
            'email'             => 'melindasulaeman08@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('password'),
            'roles'             => 'Admin',
            'is_verified'       => true,
            'avatar'            => null,
            'bio'               => null,
            'links'             => null,
        ]);

        User::create([
            'username'          => 'kholiskamil',
            'fullname'          => 'Kholis Kamil',
            'email'             => 'kholishkamil54@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('password'),
            'roles'             => 'Admin',
            'is_verified'       => true,
            'avatar'            => null,
            'bio'               => null,
            'links'             => null,
        ]);

        // for($i = 0; $i < 20; $i++){
        //     User::create([
        //         'username'          => 'speaker' . $i,
        //         'fullname'          => 'Speaker' . $i,
        //         'email'             => 'speaker'. $i .'@gmail.com',
        //         'email_verified_at' => Carbon::now(),
        //         'password'          => Hash::make('password'),
        //         'roles'             => 'Speakers',
        //         'is_verified'       => true,
        //         'avatar'            => null,
        //         'bio'               => null,
        //         'links'             => null
        //     ]);

            
        //     User::create([
        //         'username'          => 'member' . $i,
        //         'fullname'          => 'Member' . $i,
        //         'email'             => 'member'. $i .'@gmail.com',
        //         'email_verified_at' => Carbon::now(),
        //         'password'          => Hash::make('password'),
        //         'roles'             => 'Members',
        //         'is_verified'       => true,
        //         'avatar'            => null,
        //         'bio'               => null,
        //         'links'             => null
        //     ]);
        // }
    }
}
