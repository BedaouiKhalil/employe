<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Backend\Administration as adm;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\AdministrationRequest;

class administrationController extends Controller
{

    public function __construct()
    {
    $this->middleware('permission:administration total', ['only' => ['index','store','update','destroy']]);
    }

    public function index()
    {
        $roles = Role::whereNotIn('name', ['employe','admin'])->get();;
        $list = User::role($roles)->get();
       
        return view('Backend.administration.index',compact('list','roles'));
    }

    
    
    public function store(AdministrationRequest $request)
    {
        $user=User::create([
            'nom' =>$request->nom,
            'prenom' =>$request->prenom,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        $user->assignRole($request->role_id);

        return redirect()->route('administration.index')->with([
            'message' => 'Ajout fait',
            'alert-type' => 'success'
        ]); 
    }

   

   
    public function update(AdministrationRequest $request, User $Administration)
    {
        
       $Administration->update($request->except('_method', '_token','role_id'));

      
       $role = Role::findById((int)$request->role_id);
       
       $Administration->syncRoles([$role->name]);

        return redirect()->route('administration.index')->with([
            'message' => 'Modification Faite',
            'alert-type' => 'success'
        ]);
    }

   
    public function destroy(User $Administration)
    {
        $Administration->delete();

        return redirect()->route('administration.index')->with([
            'message' => 'Suppression Faite',
            'alert-type' => 'success'
        ]);
    }
}
