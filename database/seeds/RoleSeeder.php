<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'role_name' => 'Director',
            'del_flg' => '0',
        ]);
        
        DB::table('roles')->insert([
            'role_name' => 'Manager',
            'del_flg' => '0',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Employee',
            'del_flg' => '0',
        ]);
    }
}
