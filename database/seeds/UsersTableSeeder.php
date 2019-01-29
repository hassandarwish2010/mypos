<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $user = \App\User::create([
                'first_name' =>'suber',
                 'last_name' =>'admin',
                'email' => 'suberadmin@app.com',
                'password' => bcrypt('123456')
            ]);
         
         $user->attachRole('suber_admin');

    }//end of run
}// end of seed
