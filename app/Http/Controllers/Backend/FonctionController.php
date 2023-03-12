<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fonction;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\FonctionRequest;

class FonctionController extends Controller
{
    public function __construct()
    {
    $this->middleware('permission:administration total', ['only' => ['index','store','update','destroy']]);
    }
    
    public function index()
    {
        $list = Fonction::all();
        return view('Backend.fonction.index',compact('list'));  
    }

    
    
    public function store(FonctionRequest $request)
    {
        Fonction::create($request->validated());

        return redirect()->route('fonction.index')->with([
            'message' => 'Ajout fait',
            'alert-type' => 'success'
        ]); 
    }

   

   
    public function update(FonctionRequest $request, Fonction $Fonction)
    {
        $Fonction->update($request->validated());

        return redirect()->route('fonction.index')->with([
            'message' => 'Modification Faite',
            'alert-type' => 'success'
        ]);
    }

   
    public function destroy(Fonction $Fonction)
    {
        $Fonction->delete();

        return redirect()->route('fonction.index')->with([
            'message' => 'Suppression Faite',
            'alert-type' => 'success'
        ]);
    }
}
