<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
        	'username' => 'umkm',
        	'password' => Hash::make('umkm')
        	));
    }

}