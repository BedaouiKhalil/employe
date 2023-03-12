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

                <form action="{{ route('service.update', $ele->id) }}" method="post" >
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                        <div class="row">
                            <div class="col-12 mb-3">
                                    <label for="name">Nom Service</label>
                                    <input type="text" name="name" value="{{ old('name', $ele->name) }}" class="form-control">
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