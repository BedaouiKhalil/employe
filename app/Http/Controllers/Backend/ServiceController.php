<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ServiceRequest;

class ServiceController extends Controller
{
    public function __construct()
    {
    $this->middleware('permission:administration total', ['only' => ['index','store','update','destroy']]);
    }
    
    public function index()
    {
        $list = Service::all();
        return view('Backend.service.index',compact('list'));  
    }

    
    
    public function store(ServiceRequest $request)
    {
        Service::create($request->validated());

        return redirect()->route('service.index')->with([
            'message' => 'Ajout fait',
            'alert-type' => 'success'
        ]); 
    }

   

   
    public function update(ServiceRequest $request, Service $service)
    {
        $service->update($request->validated());

        return redirect()->route('service.index')->with([
            'message' => 'Modification Faite',
            'alert-type' => 'success'
        ]);
    }

   
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')->with([
            'message' => 'Suppression Faite',
            'alert-type' => 'success'
        ]);
    }
}


