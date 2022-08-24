<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //construir un usuario con email, username y password
        $u =new User();
        $u->name = "Lina";
        $u->email = "lina@misena.edu.co";
        $u->password = Hash::make("123456");
        $u->save();

    }
}
