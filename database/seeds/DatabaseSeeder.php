<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ServiciosTableSeeder::class);
        $this->call(ProfesionesTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(RoleUsersTable::class);

    }
}
