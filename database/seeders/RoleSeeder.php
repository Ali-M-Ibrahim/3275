<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1= new Role();
        $role1->name = "admin";
        $role1->key = "A";
        $role1->save();

        $role2= new Role();
        $role2->name = "user";
        $role2->key = "U";
        $role2->save();

    }
}
