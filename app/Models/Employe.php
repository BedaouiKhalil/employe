<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employe extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    protected $dates = ['date_naissance', 'date_r','deleted_at'];
   

    public function services()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }

    public function fonctions()
    {
        return $this->belongsTo('App\Models\Fonction', 'fonction_id');
    }

    public function contrat()
    {
        return $this->hasOne('App\Models\Contrat');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
   
    
    public function situation_soc()
    {
        switch ($this->situation_soc) {
            case 1: $result = 'Célébataire'; break;
            case 2: $result = 'Marié'; break;
            case 3: $result = 'Divorcé'; break;
            case 4: $result = 'Rejected'; break;
            case 5: $result = 'Canceled'; break;
            case 6: $result = 'Refund requested'; break;
            case 7: $result = 'Refunded'; break;
            case 8: $result = 'Returned order'; break;
        }
        return $result;
    }

    

  

    
}
