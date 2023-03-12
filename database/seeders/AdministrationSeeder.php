<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdministrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= User::create([
            'nom'        => 'admin',
            'prenom'       => 'admin',
            'email'      => 'admin@gmail.com',
            'password'            => bcrypt('123123123'),
        ]);
        $role=Role::findorfail(4);
        $admin->assignRole($role);

       $user1= User::create([
            'nom'        => 'belhadi',
            'prenom'       => 'amine',
            'email'      => 'amine@gmail.com',
            'password'            => bcrypt('123123123'),
        ]);

        $role1=Role::findorfail(1);
        $user1->assignRole($role1);

        $user2= User::create([
            'nom'        => 'arbi',
            'prenom'       => 'racim',
            'email'      => 'racim@gmail.com',
            'password'            => bcrypt('123123123'),
        ]);

        $role2=Role::findorfail(2);
        $user2->assignRole($role2);


       
    }
}
