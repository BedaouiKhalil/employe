<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\EmployeRequest;
use App\Models\Employe;
use App\Models\User;
use App\Models\Contrat;
use App\Models\Fonction;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

class employeController extends Controller
{
   

    public function __construct()
    {
    $this->middleware('permission:gestion recrutement total', ['only' => ['index','store','update','destroy','create','edit']]);
    }

    public function index()
    {
        $list = Employe::with(['services','fonctions'])->get();
        return view('Backend.employe.index',compact('list'));
        
    }

    public function create()
    {

        $data['fonctions']=Fonction::all();
        $data['services']=Service::all();
        return view('backend.employe.create', $data);
    }
    
    public function store(EmployeRequest $request)
    {
        try {
        DB::beginTransaction();

        $user=User::create([
            'nom' =>$request->nom,
            'prenom' =>$request->prenom,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        $employe=Employe::create([
            'nom' =>$request->nom,
            'prenom' =>$request->prenom,
            'email'=>$request->email,
            'date_naissance'=>$request->date_naissance,
            'lieu_naissance'=>$request->lieu_naissance,
            'date_r'=>$request->date_r,
            'diplome'=>$request->diplome,
            'situation_soc'=>$request->situation_soc,
            'service_id'=>$request->service_id,
            'fonction_id'=>$request->fonction_id,
            'user_id'=>$user->id,
        ]);


       
        Contrat::create([
            'date_d' =>$request->date_d,
            'date_f' =>$request->date_f,
            'type'=>$request->type,
            'salaire'=>$request->salaire,
            'employe_id'=>$employe->id,
        ]);

         
        DB::commit();
 
        return redirect()->route('employe.index')->with([
            'message' => 'Ajout fait',
            'alert-type' => 'success'
        ]);
             
 
         } catch (\Exception $e) {
            
          
             DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }


    public function show(Employe $employe)
    {
        $ele = Employe::with(['services','fonctions','contrat'])->findorfail($employe->id);
        return view('backend.employe.show',compact('ele'));
    }


    public function edit(Employe $employe)
    {
      
        $data['fonctions']=Fonction::all();
        $data['services']=Service::all();
        $data['ele']=$employe;
        return view('backend.employe.edit', $data);
    }
   

   
    public function update(EmployeRequest $request, Employe $employe)
    {
        
        try {
            DB::beginTransaction();
    
            $employe->update([
                'nom' =>$request->nom,
                'prenom' =>$request->prenom,
                'email'=>$request->email,
                'date_naissance'=>$request->date_naissance,
                'lieu_naissance'=>$request->lieu_naissance,
                'date_r'=>$request->date_r,
                'diplome'=>$request->diplome,
                'situation_soc'=>$request->situation_soc,
                'service_id'=>$request->service_id,
                'fonction_id'=>$request->fonction_id,
            ]);
    
            $user=User::findorfail($employe->user_id);

            $user->update([
                'nom' =>$request->nom,
                'prenom' =>$request->prenom,
                'email'=>$request->email,

            ]);
    
           $contrat=Contrat::findorfail($employe->contrat->id);
           $contrat->update([
                'date_d' =>$request->date_d,
                'date_f' =>$request->date_f,
                'type'=>$request->type,
                'salaire'=>$request->salaire,
            ]);
    
             
            DB::commit();
     
            return redirect()->route('employe.index')->with([
                'message' => 'modification faite',
                'alert-type' => 'success'
            ]);
                 
     
             } catch (\Exception $e) {
                
              
                 DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

   
    public function destroy(Employe $employe)
    {
        
        User::findorfail($employe->user_id)->delete();
        
        

        return redirect()->route('employe.index')->with([
            'message' => 'Suppression Faite',
            'alert-type' => 'success'
        ]);
    }


    public function archive(){
        $list= Employe::onlyTrashed()->get();
        return view('Backend.employe.archive',compact('list'));
      }


    
    public function generate_pdf($id)
    {
        $employe = Employe::findorfail($id);
        $contrat=Contrat::findorfail($employe->contrat->id);
       
        $data = [
            'id' => $employe->id,
            'nom' => $employe->nom,
            'prenom' => $employe->prenom,
            'email' => $employe->email,
            'date_naissance' => $employe->date_naissance,
            'lieu_naissance' => $employe->lieu_naissance,
            'diplome' => $employe->diplome,
            'situation_soc' => $employe->situation_soc(),
            'date_r' => $employe->date_r,
            'service'=>$employe->services->name,
            'fonction' => $employe->fonctions->name,
            'date_d' =>$contrat->date_d,
             'date_f' =>$contrat->date_f,
             'type'=>$contrat->type,
             'salaire'=>$contrat->salaire,
        ];
        $pdf = PDF::chunkLoadView('<html-separator/>', 'layouts.sortie', $data);
        return $pdf->stream('document.pdf');
    }
    
}
