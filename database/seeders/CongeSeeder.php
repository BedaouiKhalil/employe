<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conge;
use App\Models\Employe;
use Carbon\Carbon;
use Faker\Factory;

class CongeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Conge::create([
            'type'        => 'congé',
            'employe_id'      => Employe::first()->id,
            'description'            => $faker->paragraph,
        ]);
    }
}
