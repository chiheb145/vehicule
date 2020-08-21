<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Marque;
use App\Modele;
use App\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function list_marque(){
        $list=Marque::all();
        return response()->json($list);
    }
    public function update_vehicule(Request $request){
        $vehicule=Vehicule::findOrFail($request->v_id);

            $vehicule->nom=$request->name;
            $vehicule->marque=$request->marque_id;
            $vehicule->modele=$request->modele_id;
            $vehicule->save();
            return response()->json(['Success'=>'votre véhicule etait mise à jour']);


    }

    public function list_modele()
    {
        $list=Modele::all();
        return response()->json($list);
    }

}
