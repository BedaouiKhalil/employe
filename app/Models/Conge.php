<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    protected $fillable =['type', 'description', 'employe_id','statut'];


    public function employe()
    {
        return $this->belongsTo('App\Models\User','employe_id');
    }

    public function statut()
    {
        switch ($this->statut) {
            case 1: $result = 'Pas encore'; break;
            case 2: $result = 'Accepté'; break;
            case 3: $result = 'Refusé'; break;
           
        }
        return $result;
    }

    
}
