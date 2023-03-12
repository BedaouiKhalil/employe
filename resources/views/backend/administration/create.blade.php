<div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form action="{{ route('administration.store') }}" method="post" >
                <div class="modal-body">
                        @csrf
                        <div class="row">
                        <div class="col-6 mb-3">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" value="{{ old('nom') }}" class="form-control">
                        </div>

                        <div class="col-6 mb-3">
                                <label for="prenom">Prenom</label>
                                <input type="text" name="prenom" value="{{ old('prenom') }}" class="form-control">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                        </div>

                        <div class="col-12 mb-3">         
                            <label for="role">Role</label>
                            <select name="role_id" id="role" class="form-control">
                                @foreach($roles as $role)
                                 <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : null }}>{{ $role->name }}</option>
                                @endforeach
                             </select>
                        </div>


                        
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">fermer</button>
                    <button type="submit" name="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
            </div>
        </div>
    </div>