<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        $this->createRole();
        $this->createAdmin();
    }

    public function createAdmin(){
        $user = new User();
        $user -> first_name = "mohammed";
        $user -> last_name = "ahmed";
        $user -> email = "admin@gmail.com";
        $user -> phone = 956563742;
        $user -> role = "admin";
        $user -> password = Hash::make(12345678);
        $user -> save();
    }

    public function createRole(){
        $role = new Role();
        $role -> id = 1;
        $role -> type = "admin";
        $role -> save();

        $role = new Role();
        $role -> id = 2;
        $role -> type = "user";
        $role -> save();
    }




}
