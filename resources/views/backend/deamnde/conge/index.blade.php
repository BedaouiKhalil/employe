@extends('layouts.admin')
@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Contrats</h6>
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

                <a href="#" data-toggle="modal" data-target="#ajouter" class="btn btn-success btn-icon-split mb-4 text-capitalize" >
                    <span class="text">Ajouter</span>
                </a>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ref</th>
                                <th>type</th>
                                <th>salaire</th>
                                <th>date debut</th>
                                <th>date fin</th>
                                <th>action</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @forelse($list as $ele)
                            <tr>
                                <td>{{ $ele->id }}</td>
                                <td>{{ $ele->type }}</td>
                                <td>{{ $ele->salaire }}</td>
                                <td>{{ $ele->date_d->format('Y-m-d') }}</td>
                                <td>{{ $ele->date_f->format('Y-m-d') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" data-toggle="modal" data-target="#modifier{{ $ele->id }}"  class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @include('backend.contrat.edit')
                                        
                                        <a href="javascript:void(0);" onclick="if (confirm('etes vous sur de la supression?')) { document.getElementById('delete-{{ $ele->id }}').submit(); } else { return false; }" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                    <form action="{{ route('contrat.destroy', $ele->id) }}" method="post" id="delete-{{ $ele->id }}" class="d-none">
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

    @include('backend.contrat.create')
</div>

@endsection