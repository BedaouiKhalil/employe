<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Contrat;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ContratRequest;

class ContratController extends Controller
{
    public function index()
    {
        $list = Contrat::all();
        return view('Backend.contrat.index',compact('list'));  
    }

    
    
    public function store(ContratRequest $request)
    {
        Contrat::create($request->validated());

        return redirect()->route('contrat.index')->with([
            'message' => 'Ajout fait',
            'alert-type' => 'success'
        ]); 
    }

   

   
    public function update(ContratRequest $request, Contrat $Contrat)
    {
        $Contrat->update($request->validated());

        return redirect()->route('contrat.index')->with([
            'message' => 'Modification Faite',
            'alert-type' => 'success'
        ]);
    }

   
    public function destroy(Contrat $Contrat)
    {
        $Contrat->delete();

        return redirect()->route('contrat.index')->with([
            'message' => 'Suppression Faite',
            'alert-type' => 'success'
        ]);
    }
}
