<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    static $roles = [
        'admin',
        'operator',
        'operator_raion'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$roles as $role)
        {
            DB::table('roles')->insert([
                'role_name' => $role
            ]);
        }
    }
}
