@extends('layouts.admin')
@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Employe</h6>
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


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ref</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Service</th>
                                <th>Fonction</th>
                               
                            </tr>
                        </thead>
                       
                        <tbody>
                            @forelse($list as $ele)
                            <tr>
                                <td>{{ $ele->id }}</td>
                                <td>{{ $ele->nom }}</td>
                                <td>{{ $ele->prenom }}</td>
                                <td>{{ $ele->services->name }}</td>
                                <td>{{ $ele->fonctions->name }}</td>
                              
                                
                                
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">0 Contrat</td>
                            </tr>
                        @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        

    </div>

 
</div>

@endsection