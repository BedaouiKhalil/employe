@extends('layouts.admin')
@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Employes</h6>
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


               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-employe-tab" data-bs-toggle="pill" data-bs-target="#pills-employe" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Information</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contrat-tab" data-bs-toggle="pill" data-bs-target="#pills-contrat" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Contrat</button>
                </li>
               
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-employe" role="tabpanel" aria-labelledby="pills-employe-tab">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <p><span class="fw-bold">Nom : </span>{{ $ele->nom }}</p>
                        </div>
                        <div class="col-6 mb-3">
                            <p><span class="fw-bold">Prenom : </span>{{ $ele->prenom }}</p>
                        </div>
                        <div class="col-6 mb-3">
                            <p><span class="fw-bold">Email : </span>{{ $ele->email }}</p>
                        </div>
                        <div class="col-6 mb-3">
                            <p><span class="fw-bold">Situation Social : </span>{{ $ele->situation_soc() }}</p>
                        </div>
                        <div class="col-6 mb-3">
                            <p><span class="fw-bold">Service : </span>{{ $ele->services->name }}</p>
                        </div>
                        <div class="col-6 mb-3">
                            <p><span class="fw-bold">Fonction : </span>{{ $ele->fonctions->name }}</p>
                        </div>
                        <div class="col-12 mb-3">
                            <p><span class="fw-bold">Diplome : </span>{{ $ele->diplome }}</p>
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contrat" role="tabpanel" aria-labelledby="pills-contrat-tab">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <p><span class="fw-bold">Type : </span>{{ $ele->contrat->type }}</p>
                        </div>
                        <div class="col-12 mb-3">
                            <p><span class="fw-bold">salaire : </span>{{ $ele->contrat->salaire }}</p>
                        </div>
                        <div class="col-6 mb-3">
                            <p><span class="fw-bold">Date début : </span>{{ $ele->contrat->date_d }}</p>
                        </div>
                        <div class="col-6 mb-3">
                            <p><span class="fw-bold">Date fin : </span>{{ $ele->contrat->date_f }}</p>
                        </div>
                    </div>
                </div>
              </div>

                
            </div>
        </div>
        

    </div>

    
</div>

@endsection