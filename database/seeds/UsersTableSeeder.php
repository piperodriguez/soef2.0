<?php

use App\Models\User;
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
        User::create([
        	'username' => 'frodriguez',
        	'email' => 'frodriguez@solati.com.co',
        	'password' => bcrypt('solati123')
        ]);
        User::create([
            'username' => 'yvcastiblanco',
            'email' => 'yvcastiblanco5@gmail.com',
            'password' => bcrypt('romanoymichuz')
        ]);
    }
}
