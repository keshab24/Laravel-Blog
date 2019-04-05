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
       $user= App\User::create([
            'name'=>'Keshab bhattarai',
            'email'=>'keshab@gmail.com',
            'password'=>bcrypt('steyngun'),
            'admin'=>1
        ]);
        App\Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/avatars/man.png',
            'about'=>'hhehd msdbdjbsdbsd bdsbdsd donn  mns',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'

        ]);
    }
}
