<div class="modal fade" id="modifier{{ $ele->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form action="{{ route('administration.update', $ele->id) }}" method="post" >
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                       
                    <div class="row">
                        <div class="col-6 mb-3">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" value="{{ old('nom',$ele->nom) }}" class="form-control">
                        </div>

                        <div class="col-6 mb-3">
                                <label for="prenom">Prenom</label>
                                <input type="text" name="prenom" value="{{ old('prenom',$ele->prenom) }}" class="form-control">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email',$ele->email) }}" class="form-control">
                        </div>

                        
                        <div class="col-12 mb-3">         
                            <label for="role_id">Role</label>
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach($roles as $role)
                                <?php  $role_user =$ele->roles->first(); ?>
                                 <option value="{{ $role->id }}" {{ old('role',$role_user->id)== $role->id ? 'selected' : null }}>
                                    {{ $role->name }}
                                </option>
                                @endforeach
                             </select>
                        </div>


                        
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">fermer</button>
                    <button type="submit" name="submit" class="btn btn-success">Modifier</button>
                </div>
            </form>
            </div>
        </div>
    </div>