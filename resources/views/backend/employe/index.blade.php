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

               <a href="{{ route('employe.create') }}" class="btn btn-primary mb-5">
                <span class="text">Nouvelle demande</span>
               </a>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ref</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Service</th>
                                <th>Fonction</th>
                                <th>action</th>
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
                                <td>
                                    <div class="btn-group btn-group-sm">
                                      
                                        <a href="{{ route('employe.show', $ele->id) }}" class="btn btn-secondary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                       
                                        <a href="{{ route('employe.edit', $ele->id) }}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('employe.generate_pdf', $ele->id) }}" class="btn btn-warning">
                                            <i class="fa fa-file-pdf"></i>
                                        </a>
                                        
                                        
                                        <a href="javascript:void(0);" onclick="if (confirm('etes vous sur de la supression?')) { document.getElementById('delete-{{ $ele->id }}').submit(); } else { return false; }" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                    <form action="{{ route('employe.destroy', $ele->id) }}" method="post" id="delete-{{ $ele->id }}" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                
                                
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">0 Contrat</td>
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