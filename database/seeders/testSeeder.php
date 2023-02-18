<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class testSeeder extends Seeder
{

    public function run()
    {
        $this->createUser();
    }

    public function createUser(){
        $user = new User();
        $user -> first_name = "Ali";
        $user -> last_name = "ahmed";
        $user -> email = "Ali@gmail.com";
        $user -> phone = 956563747;
        $user -> password = Hash::make(12345699);
        $user -> save();
    }
}
