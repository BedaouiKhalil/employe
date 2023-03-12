<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fonction;

class FonctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fonction::create([
            'name'      => 'Support technique',
        ]);
         Fonction::create([
            'name'      => 'Consiel juridique',
        ]);
        Fonction::create([
            'name'      => 'Gestion des dossiers',
        ]);
    }
}
