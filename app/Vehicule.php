<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{

    protected $table = 'vehicules';

    protected $fillable = [
        'name',
        'marque_id',
        'modele_id',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function modele_v()
    {
        return $this->hasOne('App\Modele', 'id', 'modele_id');
    }

    public function marque_v()
    {
        return $this->hasOne('App\Marque', 'id','marque_id');
    }

}
