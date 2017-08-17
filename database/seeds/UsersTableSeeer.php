<?php

use Illuminate\Database\Seeder;
use App\Model\User;
class UsersTableSeeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create(['email'=>'admin@sas.com',
        				'password'=>bcrypt('admin'),
        				'role'=>'admin']);

    }
}
