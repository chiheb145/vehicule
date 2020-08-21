<?php

namespace App\Http\Controllers;

use App\Marque;
use App\Modele;
use App\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules=Vehicule::all();
        $marques=Marque::all();
        $modeles=Modele::all();
        return view('welcome',compact('vehicules','marques','modeles'));
    }
    public function store(Request $request)
    {

        $vehicule=new Vehicule();
        $vehicule->name=$request->nom;
        $vehicule->marque_id=$request->marque;
        $vehicule->modele_id=$request->modele;

        $vehicule->save();
        return back()->with(['success' => 'Ajout de véhicule réussite']);
    }
    public function store_modele(Request $request)
    {
        $modeles=Modele::all();
        foreach ($modeles as $model)
        {
            if($model->name==$request->nom){
                return back()->with(['error' => 'Modèle existe déjà']);
            }
        }
        $modele=new Modele();
        $modele->name=$request->nom;
        $modele->save();
        return back()->with(['success' => 'Ajout de modèle réussite']);

    }
    public function store_marque(Request $request)
    {
        $marques=Modele::all();
        foreach ($marques as $marque)
        {
            if($marque->name==$request->nom){
                return back()->with(['error' => 'Marque existe déjà']);
            }
        }
        $modele=new Marque();
        $modele->name=$request->nom;
        $modele->save();
        return back()->with(['success' => 'Ajout de marque réussite']);
    }
    public function delete_vehicule($id)
    {
        $vehicule=Vehicule::find($id);
        $vehicule->delete();
        return back()->with(['error' => 'Véhicule supprimé avec succès']);
    }
    public function edit($id)
    {
        $vehicule=Vehicule::find($id);
        $marques=Marque::all();
        $modeles=Modele::all();
        return view('vehicule.edit',compact('vehicule','marques','modeles'));
    }
    public function update(Request $request)
    {

        $vehicule=Vehicule::find($request->vehicule_id);
        $vehicule->name=$request->nom;
        $vehicule->modele_id=$request->modele;
        $vehicule->marque_id=$request->marque;
        $vehicule->save();
        return redirect()->route('vehicule');

    }

}
