<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Contrat;

class ContratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contrat::create([
            'date_d'        => Carbon::now(),
            'date_f'       => Carbon::now()->addMonth(),
            'type'      => 'CDI',
            'salaire'            => 90000,
        ]);
    }
}
