<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{

    Permission::create(['name' => 'voir employe']);

    

    Permission::create(['name' => 'gestion recrutement total']);
    $role_emp = Role::create(['name' => 'gestion recrutement']);
    $role_emp->givePermissionTo('gestion recrutement total');


   
    Permission::create(['name' => 'gestion carriere total']);
    $role_emp = Role::create(['name' => 'gestion carriere']);
    $role_emp->givePermissionTo('gestion carriere total');
    $role_emp->givePermissionTo('voir employe');


    Permission::create(['name' => 'employe total']);
    $role_emp = Role::create(['name' => 'employe']);
    $role_emp->givePermissionTo('employe total');

    Permission::create(['name' => 'administration total']);
    $role_emp = Role::create(['name' => 'admin']);
    $role_emp->givePermissionTo('administration total');



}


}
