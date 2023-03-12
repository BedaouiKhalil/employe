@if($ele->statut === 1)
<div class="row mb-5" >
    <form  method="POST" action="{{ route('demande.conge.reponse', $ele->id) }}">
        @method('PUT')
        @csrf
    
  
    <button type="submit" class="btn btn-success" name="reponse" value="2">Accepter</button>
    <button type="submit" class="btn btn-danger" name="reponse" value="3">Réfuser</button>
    
</form>
</div>
@endif