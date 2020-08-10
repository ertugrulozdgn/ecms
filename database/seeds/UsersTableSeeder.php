<?php

use App\User;
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
        User::create([
           'name' => 'Ertuğrul Özdoğan',
           'role' => 'admin',
            'email' => 'ozdgnertugrul@gmail.com',
            'password' => Hash::make('12345678'),
            'image' => '123.png',
            'status' => '1'
        ]);
    }
}
