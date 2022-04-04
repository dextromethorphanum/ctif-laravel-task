<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@localhost',
            'password' => Hash::make('admin@localhost'),
        ]);
        $admin->roles()->sync([$admin->getRoleIdByName('admin')]);

        define('OPERATOR_DISTRICT_COUNT', 5);
        $districts = District::take(5)->get();

        for($i = 0; $i != OPERATOR_DISTRICT_COUNT; $i++)
        {
            $operator_raion = User::create([
                'name' => 'operator_raion_' . $districts[$i]->code,
                'email' => 'operator_raion_' . $districts[$i]->code . '@localhost',
                'password' => Hash::make('operator_raion'),
            ]);

            $operator_raion->roles()->sync([$operator_raion->getRoleIdByName('operator_raion')]);
            DB::table('user_roles')
                ->where('user_id', $operator_raion->id)
                ->where('role_id', $operator_raion->getRoleIdByName('operator_raion'))
                ->update(['additional_code' => $districts[$i]->code]);
        }
    }
}
