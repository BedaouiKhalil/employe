<?php

namespace App\Http\Controllers\Backend\demande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conge;
use App\Models\Employe;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\CongeRequest;


class CongeController extends Controller
{
  
    public function __construct()
    {
    $this->middleware('permission:gestion carriere total', ['only' => ['index','reponse','show']]);
    $this->middleware('permission:employe total', ['only' => ['mesconges','store','create','show','destroy']]);
    }

    public function index(){

        $list = Conge::with('employe')->get();
        return view('backend.demande.conge.index',compact('list'));
    }

    public function mesconges(){
        $employe=Employe::where('user_id','=',Auth::user()->id)->get()->first();
        $list = Conge::where('employe_id','=', $employe->id)->get();
        return view('backend.demande.conge.mesconges',compact('list'));
    }

    public function create()
    {
        return view('backend.demande.conge.create');
    }

    public function store(CongeRequest $request)
    {
        $employe=Employe::where('user_id','=',Auth::user()->id)->get()->first();
        Conge::create([
            'type' =>$request->type,
            'description'=>$request->description,
            'employe_id'=>$employe->id,
        ]);

        return redirect()->back()->with([
            'message' => 'Ajout fait',
            'alert-type' => 'success'
        ]); 
    }

    public function show($id){
       $ele=Conge::findorfail($id);
        return view('backend.demande.conge.show',compact('ele'));
    }


    public function destroy($id)
    {
        $ele=Conge::findorfail($id);
        $ele->delete();

        return redirect()->back()->with([
            'message' => 'Suppression Faite',
            'alert-type' => 'success'
        ]);
    }


    public function reponse(Request $request ,$id){
        
      $conge=Conge::findorfail($id);
        $conge->update([
            'statut'=>$request->reponse
        ]);

        return redirect()->back()->with([
            'message' => 'decision faite',
            'alert-type' => 'success'
        ]);
    }

    


}
