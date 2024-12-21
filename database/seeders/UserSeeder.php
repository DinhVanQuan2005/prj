<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Nguyễn Văn A',
                'email' => 'a@gmail.com',
                'address' => 'Hà Nội',
                'phone_number' => '012345678',
                'password' => Hash::make('A12345678')
            ],

            [
                'name' => 'Nguyễn Văn B',
                'email' => 'b@gmail.com',
                'address' => 'Thanh Hóa',
                'phone_number' => '012345670',
                'password' => Hash::make('B12345678')
            ],

            [
                'name' => 'Nguyễn Văn C',
                'email' => 'c@gmail.com',
                'address' => 'Hải Phòng',
                'phone_number' => '0123456000',
                'password' => Hash::make('C12345678')
            ],


            [
                'name' => 'Nguyễn Văn D',
                'email' => 'd@gmail.com',
                'address' => 'Ninh Bình',
                'phone_number' => '0123889999',
                'password' => Hash::make('D12345678')
            ],


            [
                'name' => 'Nguyễn Văn E',
                'email' => 'e@gmail.com',
                'address' => 'Hồ Chí Minh',
                'phone_number' => '012345699',
                'password' => Hash::make('E12345678')
            ],


            [
                'name' => 'Nguyễn Văn F',
                'email' => 'f@gmail.com',
                'address' => 'Nghệ An',
                'phone_number' => '0974186499',
                'password' => Hash::make('F12345678')
            ],

        ]);
    }
}
