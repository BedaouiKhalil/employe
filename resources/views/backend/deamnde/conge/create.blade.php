@extends('layouts.admin')
@section('content')
    
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ajouter</h6>
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

                            <div class="row mb-5">
                                
                                <input name="employe_id"  type="hidden" value="{{ Auth::user()->id  }}" >
                              
                                <div class="col-6 mb-3">
                                        <label for="name">Date debut</label>
                                        <input type="date" name="date_d" value="{{ old('date_d') }}" class="form-control">
                                </div>
    
                                <div class="col-6 mb-3">
                                    <label for="name">Date fin</label>
                                    <input type="date" name="date_f" value="{{ old('date_f') }}" class="form-control">
                                </div>

                                <div class="form-floating col-12 mb-3">
                                    <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                                    <label for="floatingTextarea2">Tapez votre demande</label>
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