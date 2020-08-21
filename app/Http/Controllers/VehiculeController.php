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
        $vehicule->nom=$request->nom;
        $vehicule->marque=$request->marque;
        $vehicule->modele=$request->modele;

        $vehicule->save();
        return back();
    }
    public function store_modele(Request $request)
    {
        $modele=new Modele();
        $modele->name=$request->nom;
        $modele->save();
        return back();

    }
    public function store_marque(Request $request)
    {
        $modele=new Marque();
        $modele->name=$request->nom;
        $modele->save();
        return back();
    }
    public function delete_vehicule($id)
    {
        $vehicule=Vehicule::find($id);
        $vehicule->delete();
        return back();
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
        $vehicule->nom=$request->nom;
        $vehicule->modele=$request->modele;
        $vehicule->marque=$request->marque;
        $vehicule->save();
        return redirect()->route('vehicule');

    }

}
