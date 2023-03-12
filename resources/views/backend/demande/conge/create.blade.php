@extends('layouts.admin')
@section('content')
    
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">conge</h6>
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
    

                   <form action="{{ route('demande.conge.store') }}" method="post" >
                            @csrf

                            <div class="row">
                                
                                <input type="hidden" name="employe_id" value="{{ Auth::user()->id  }}" class="form-control">
                              
                                <div class="col-12 mb-3"> 
                                    <label for="type"></label>
                                    <select name="type" id="type" class="form-control">
                                         <option value="congé" {{ old('type') == 'congé' ? 'selected' : null }}>Congé</option>
                                         <option value="retraitre" {{ old('type') == 'retraite' ? 'selected' : null }}>Retraite</option>
                                         <option value="démission" {{ old('type') == 'démission' ? 'selected' : null }}>Démission</option>
                                         <option value="Promotion" {{ old('type') == 'promotion' ? 'selected' : null }}>Promotion</option>
                                     </select>
                               </div>

                                  <div class="mb-3 col-12">
                                    <label for="demande" class="form-label">Tapez votre demande</label>
                                    <textarea class="form-control" id="demande"  name="description" rows="4">{{ old('description') }}</textarea>
                                  </div>
                                  
                            </div>




                            <div class="row">
                                <div class="col-3 mb-3 ml-0 ">
                                    <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </div>
                            
                   

                </form>
                   
                    
                </div>
            </div>
            
    
        </div>
    
    </div>
    
    @endsection