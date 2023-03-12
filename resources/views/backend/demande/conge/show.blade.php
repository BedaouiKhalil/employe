@extends('layouts.admin')
@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Congé</h6>
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


              
                @include("backend.demande.conge.reponse")

               <div class="row">
                <div class="col-12 mb-3">
                    <p><span class="fw-bold">Statut : </span>
                        
                        @if($ele->statut=='1' )
                        <span class="badge bg-warning text-dark">{{ $ele->statut() }}</span>
                        @elseif ( $ele->statut=='2')
                        <span class="badge bg-success">{{ $ele->statut() }}</span>
                        @else
                        <span class="badge bg-danger">{{ $ele->statut() }}</span>
                        @endif
                    
                    </p> 
                </div>

                @can('voir employe')
                 <div class="col-12 mb-3">
                    <p><span class="fw-bold">Nom/Prenom : </span> <a href="{{route('employe.show',$ele->employe->id)}}"> {{ $ele->employe->nom }} {{ $ele->employe->prenom }}</a></p> 
                 </div>
                @endcan
                
              
                <div class="col-6 mb-3">
                    <p><span class="fw-bold">Date début : </span>{{ $ele->date_d }}</p>
                </div>
                <div class="col-6 mb-3">
                    <p><span class="fw-bold">Date fin : </span>{{ $ele->date_f }}</p>
                </div>

                <div class="col-6 mb-3">
                    <p><span class="fw-bold">Date d'envoi : </span>{{ $ele->date_f }}</p>
                </div>

                <div class="col-12 mb-3">
                    <span class="fw-bold">description :</span> <p>{{ $ele->description }}</p>
                </div>
            </div>

                
            </div>
        </div>
        

    </div>

    
</div>

@endsection