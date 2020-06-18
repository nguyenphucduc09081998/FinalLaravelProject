<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
        $users = array(
            array('name' => 'NgocHLB', 'email' => 'ngochlb@gmail.com', 'password' => bcrypt('12345678')),
          
            array('name' => 'DucNP', 'email' => 'ducnp@gmail.com', 'password' => bcrypt('12345678')),
            array('name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('12345678')),
        );

        DB::table('users')->insert($users);
    }
}
