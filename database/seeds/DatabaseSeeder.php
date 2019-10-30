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
        $this->call(ProfesionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(RoleUsersTable::class);
        $this->call(CiudadTableSeeder::class);
        $this->call(BarriosTableSeeder::class);
        $this->call(NivelEstdiosTableSeeder::class);


    }
}
