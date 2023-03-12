<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Employe;
use App\Models\Contrat;

use Carbon\Carbon;
use App\Models\User;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employe1= User::create([
            'nom'        => 'benomar',
            'prenom'       => 'samy',
            'email'      => 'samy@gmail.com',
            'password'            => bcrypt('123123123'),
        ]);

        $role3=Role::findorfail(3);
        $employe1->assignRole($role3);


        $employe1= Employe::create([
            'nom'        => 'benomar',
            'prenom'       => 'samy',
            'email'      => 'samy@gmail.com',
            'date_naissance'=>'1990-02-20',
            'date_r'            =>Carbon::now(),
            'lieu_naissance'=>'alger',
            'situation_soc'=>'1',
            'diplome'=>'ingenieur en informatique',
            'service_id'=>1,
            'fonction_id'=>1,
            'user_id'=>$employe1->id,
        ]);
        
        Contrat::create([
            'date_d'        => Carbon::now(),
            'date_f'       => Carbon::now()->addMonth(),
            'type'      => 'CDI',
            'salaire'            => 90000,
            'employe_id'=>$employe1->id ,
        ]);


        /***********user 2 */
        $employe2= User::create([
            'nom'        => 'msakni',
            'prenom'       => 'hmaza',
            'email'      => 'hamza@gmail.com',
            'password'            => bcrypt('123123123'),
        ]);

        $role3=Role::findorfail(3);
        $employe2->assignRole($role3);


        $employe2= Employe::create([
            'nom'        => 'msakni',
            'prenom'       => 'hmaza',
            'email'      => 'hamza@gmail.com',
            'date_naissance'=>'1995-03-20',
            'date_r'            =>Carbon::now(),
            'lieu_naissance'=>'oran',
            'situation_soc'=>'2',
            'diplome'=>'ingenieur en electronique',
            'service_id'=>1,
            'fonction_id'=>1,
            'user_id'=>$employe2->id,
        ]);
        
        Contrat::create([
            'date_d'        => Carbon::now(),
            'date_f'       => Carbon::now()->addMonth(),
            'type'      => 'CDD',
            'salaire'            => 20000,
            'employe_id'=>$employe2->id ,
        ]);




        
    }
}
