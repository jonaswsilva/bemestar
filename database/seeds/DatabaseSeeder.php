<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(EspecialitiesTableSeeder::class);
        $this->call(TypeProceduresTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);

    }
}
