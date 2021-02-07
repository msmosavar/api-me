<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{


    public function run()
    {
        $this->call(RolePermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
