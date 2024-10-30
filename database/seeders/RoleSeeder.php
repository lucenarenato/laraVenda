<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["name" => "Admin"]);
        Role::create(["name" => "Client"]);
        Role::create(["name" => "Warehouse"]);
        Role::create(["name" => "Seller"]);

        DB::table('model_has_roles')->insert([
            'role_id'    => 1,
            'model_type' => 'App\Models\User',
            'model_id'   => 1
        ]);
    }
}
