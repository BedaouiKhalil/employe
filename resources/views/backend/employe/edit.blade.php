@extends('layouts.admin')
@section('content')
    
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Modifier</h6>
        </div>
    
        <div class="card-body">
            
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
    
                <div class="card-body">
    
                   @if ($errors->any())
                    <div class="alert alert-danger mb-3" >
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                   @endif
    

                   <form action="{{ route('employe.update', $ele->id) }}" method="post" >
                    @csrf
                    @method('PATCH')

                            <div class="row mb-5">
                            <h3 class="mb-3">Employé</h3>
                            <div class="col-6 mb-3">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" value="{{ old('nom',$ele->nom) }}" class="form-control">
                            </div>
    
                            <div class="col-6 mb-3">
                                    <label for="prenom">Prenom</label>
                                    <input type="text" name="prenom" value="{{ old('prenom',$ele->prenom) }}" class="form-control">
                            </div>

                            <div class="col-6 mb-3">
                                <label for="date_naissance">Date Naissance</label>
                                <input type="date" name="date_naissance" value="{{ old('date_naissance',$ele->date_naissance->format('Y-m-d')) }}" class="form-control">
                            </div>

                            <div class="col-6 mb-3">
                                <label for="lieu_naissance">Lieu Naissance</label>
                                <input type="text" name="lieu_naissance" value="{{ old('lieu_naissance',$ele->lieu_naissance) }}" class="form-control">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="diplome">Diplome</label>
                                <input type="text" name="diplome" value="{{ old('diplome',$ele->diplome) }}" class="form-control">
                            </div>

                            <div class="col-6 mb-3">
                                <label for="date_r">Date Récrutement</label>
                                <input type="date" name="date_r" value="{{ old('date_r',$ele->date_r->format('Y-m-d')) }}" class="form-control">
                            </div>

                            <div class="col-6 mb-3">         
                                <label for="situation_soc">Situation social</label>
                               <select name="situation_soc" id="situation_soc" class="form-control">
                                   <option value="1" {{ old('situation_soc',$ele->situation_soc) == '1' ? 'selected' : null }}>Célibataire</option>
                                   <option value="2" {{ old('situation_soc',$ele->situation_soc) == '2' ? 'selected' : null }}>Marié</option>
                                   <option value="3" {{ old('situation_soc',$ele->situation_soc) == '3' ? 'selected' : null }}>Divorcé</option>
                                 </select>
                                 
                            </div>

                            
 

                             <div class="col-12 mb-3">         
                                 <label for="service">Service</label>
                                <select name="service_id" id="service" class="form-control">
                                         @foreach($services as $service)
                                         <option value="{{ $service->id }}" {{ old('service',$ele->services->id) == $service->id ? 'selected' : null }}>{{ $service->name }}</option>
                                     @endforeach
                                  </select>
                             </div>

                                 <div class="col-12 mb-3">         
                                    <label for="fonction">Fonction</label>
                                    <select name="fonction_id" id="fonction" class="form-control">
                                        @foreach($fonctions as $fonction)
                                         <option value="{{ $fonction->id }}" {{ old('fonction',$ele->fonctions->id) == $service->id ? 'selected' : null }}>{{ $service->name }}</option>
                                        @endforeach
                                     </select>
                                </div>


                                <div class="col-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ old('email',$ele->email) }}" class="form-control">
                                </div>
        
                              

                            </div>


                            <div class="row mb-5">
                                <h3 class="mb-3">Contrat</h3>
                                <div class="col-4 mb-3"> 
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="form-control">
                                             <option value="CDD" {{ old('type',$ele->contrat->type) == 'CDD' ? 'selected' : null }}>CDD</option>
                                             <option value="CDI" {{ old('type',$ele->contrat->type) == 'CDI' ? 'selected' : null }}>CDI</option>
                                         </select>
                                </div>
    
                                <div class="col-8 mb-3">
                                    <label for="name">Salaire</label>
                                    <input type="number" name="salaire" value="{{ old('salaire',$ele->contrat->salaire) }}" class="form-control">
                               </div>
                            
                                <div class="col-6 mb-3">
                                        <label for="name">Date debut</label>
                                        <input type="date" name="date_d" value="{{ old('date_d',$ele->contrat->date_d->format('Y-m-d')) }}" class="form-control">
                                </div>
    
                                <div class="col-6 mb-3">
                                    <label for="name">Date fin</label>
                                    <input type="date" name="date_f" value="{{ old('date_f',$ele->contrat->date_f->format('Y-m-d')) }}" class="form-control">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-3 mb-3 ml-0 ">
                                    <button type="submit" name="submit" class="btn btn-primary">modifier</button>
                                </div>
                            </div>
                            
                   

                </form>
                   
                    
                </div>
            </div>
            
    
        </div>
    
    </div>
    
    @endsection