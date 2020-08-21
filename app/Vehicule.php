<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{

    protected $table = 'vehicules';

    protected $fillable = [
        'nom',
        'marque',
        'modele',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function modele_v()
    {
        return $this->hasOne('App\Modele', 'id', 'modele');
    }

    public function marque_v()
    {
        return $this->hasOne('App\Marque', 'id','marque');
    }

}
