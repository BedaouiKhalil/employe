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

                <form action="{{ route('contrat.update', $ele->id) }}" method="post" >
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                       
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control">
                                     <option value="CDD" {{ old('type', $ele->type) == 'CDD' ? 'selected' : null }}>CDD</option>
                                     <option value="CDI" {{ old('type',$ele->type) == 'CDI' ? 'selected' : null }}>CDI</option>
                                 </select>
                            </div>

                            <div class="col-8 mb-3">
                                <label for="name">Salaire</label>
                                <input type="text" name="salaire" value="{{ old('salaire', $ele->salaire) }}" class="form-control">
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                    <label for="name">Date debut</label>
                                    <input type="date" name="date_d" value="{{ old('date_d', $ele->date_d->format('Y-m-d')) }}" class="form-control">
                            </div>

                            <div class="col-6 mb-3">
                                <label for="name">Date fin</label>
                                <input type="date" name="date_f" value="{{ old('date_f', $ele->date_f->format('Y-m-d')) }}" class="form-control">
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