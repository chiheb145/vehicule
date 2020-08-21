@extends('layouts.app')

@section('content')
    <style>
        .card1{
            /*background-color: #96963114;*/
            border-radius: 15px;
            background-color: #e0e6ec;

        }
    </style>
    <div class="page-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="row mt-2" id="list0">
            <div class="col-lg-12 ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <h4 class="titre">Modifier la véhicule {{$vehicule->nom}}</h4>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-1">
                    <div class="card card1">
                        <form action="{{route('vehicule.update')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label  class="col-sm-2 control-label col-form-label" >Nom</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="nom" class="form-control" id="nom" value="{{$vehicule->nom}}" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="modele" class="col-sm-2  control-label col-form-label">Modèle</label>

                                    <select name="modele" class="form-control col-sm-6" id="modele">
                                        @foreach($modeles as $m)
                                            <option value="{{$m->id}}" @if($m->id == $vehicule->modele)selected @endif>{{$m->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group row">
                                    <label for="marque" class="col-sm-2  control-label col-form-label">Marque</label>

                                    <select name="marque" class="form-control col-sm-6" id="marque">
                                        @foreach($marques as $m)
                                            <option value="{{$m->id}}" @if($m->id == $vehicule->marque)selected @endif>{{$m->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <input type="hidden" name="vehicule_id" value="{{$vehicule->id}}">
                            </div>
                            <div class="border-top">
                                <div class="card-body">

                                    <a href="{{route('vehicule')}}" class="btn btn-primary float-right m-1">Annuler</a>
                                    <button type="submit" class="btn btn-primary float-right m-1">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
