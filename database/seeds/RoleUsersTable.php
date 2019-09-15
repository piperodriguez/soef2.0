<?php
use App\Models\UsersRole;
use Illuminate\Database\Seeder;

class RoleUsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsersRole::create([
        	'role_id' => 1,
        	'user_id' => 1
        ]);
        UsersRole::create([
        	'role_id' => 2,
        	'user_id' => 1
        ]);
    }
}
