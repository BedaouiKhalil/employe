<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(PermissionTableSeeder::class);
        $this->call(AdministrationSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(FonctionSeeder::class);
        $this->call(EmployeSeeder::class);
        $this->call(CongeSeeder::class);
    }
}
