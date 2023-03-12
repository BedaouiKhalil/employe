@extends('layouts.admin')
@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Conge</h6>
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
                                <th>Prenom</th>
                                <th>type</th>
                                <th>statut</th>
                                <th>date d'envoi</th>
                                <th>action</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @forelse($list as $ele)
                            <tr>
                                <td>{{ $ele->id }}</td>
                                <td>{{ $ele->employe->nom}}</td>
                                <td>{{ $ele->employe->prenom }}</td>
                                <td>{{ $ele->type }}</td>
                               

                                @if($ele->statut=='1' )
                                <td><span class="badge bg-warning text-dark">{{ $ele->statut() }}</span></td>
                                @elseif ( $ele->statut=='2')
                                <td><span class="badge bg-success">{{ $ele->statut() }}</span></td>
                                @else
                                <td><span class="badge bg-danger">{{ $ele->statut() }}</span></td>
                                @endif
                                
                                <td>{{ $ele->created_at->format('Y-m-d') }}</td>

                                <td>
                                    <div class="btn-group btn-group-sm">
                                  
                                        <a href="{{ route('demande.conge.show', $ele->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        
                                      
                                </td>
                                
                                
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">0 Contrat</td>
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