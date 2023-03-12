<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable =['date_d', 'date_f', 'type', 'salaire','employe_id'];
    protected $dates = ['date_d', 'date_f'];


  
}
