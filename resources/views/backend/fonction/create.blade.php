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

                <form action="{{ route('fonction.store') }}" method="post" >
                <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                    <label for="name">Nom Fonction</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
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