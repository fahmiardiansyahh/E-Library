<?php

use Illuminate\Database\Seeder;
use App\User; 

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user
       $user = User::create([
        	'name' => 'Admin Perpus',
        	'email' => 'admin@perpus.com',
            'email_verified_at' => date("Y-m-d H:i:s") , 
        	'password' => bcrypt('12345678'),
        ]);
       $user->assignRole('admin');
       return($user);
    }
}
