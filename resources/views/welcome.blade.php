@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-9 offset-3 " style="padding-top: 15px">


            <button type="button" class="btn btn-success float-right mr-1"
                    data-toggle="modal"
                    data-target="#modal_add_marque">Marque
            </button>
            <button type="button" class="btn btn-success float-right mr-1"
                    data-toggle="modal"
                    data-target="#modal_add_modele">Modèle
            </button>
            <button type="button" class="btn btn-success float-right mr-1"
                    data-toggle="modal"
                    data-target="#modal_add_vehicule">Ajouter véhicule
            </button>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h1>Listes des véhicules</h1>
        </div>
        <div class="row justify-content-center">
            @foreach($vehicules as $vehicule)

                <div class="col-12 my-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="card-title ">{{$vehicule->nom}}</h3>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{route('vehicule.edit',$vehicule->id)}}"
                                       class="btn btn-outline-primary float-right mr-1"
                                       title="modifier"><span
                                            class="fas fa-upload"></span></a>

                                    <a href="{{route('vehicule.delete',$vehicule->id)}}"
                                       class="btn btn-danger float-right mr-1"
                                       title="Supprimer ce véhicule"><span
                                            class="fas fa-times"></span></a>

                                    <a class="btn-modele btn btn-primary float-right mr-1" data-id="{{$vehicule->id}}"
                                       data-toggle="collapse" href="#collapseExamplemodele{{$vehicule->id}}"
                                       role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Modèle
                                    </a>
                                    <button class="btn-marque btn btn-primary float-right mr-1"
                                            data-id="{{$vehicule->id}}" type="button" data-toggle="collapse"
                                            data-target="#collapseExamplemarque{{$vehicule->id}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                        Marque
                                    </button>


                                    {{--}}<a href="{{route('vehicule.supprimer',$vehicule->id)}}" class="btn btn-danger  float-right mr-1" title="Supprimer ce kolok" ><span class="fas fa-times" ></span></a>{{--}}

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="collapse" id="collapseExamplemodele{{$vehicule->id}}">

                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3>{{$vehicule->modele_v->name}}</h3>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="collapse" id="collapseExamplemarque{{$vehicule->id}}">


                                <div class="card" style="">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3> {{$vehicule->marque_v->name}}</h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>


                    </div>
                </div>


            @endforeach
            <div class="modal fade" id="modal_add_vehicule" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{route('vehicule.store')}}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter une véhicule</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <label for="" class="col-sm-2 control-label col-form-label">Nom</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nom" class="form-control" id="nom"
                                           placeholder="saisir le nom de véhicule" required>
                                </div>

                                <label for="modele"
                                       class="col-sm-2  control-label col-form-label">Modèle</label>
                                <select name="modele" class="form-control" id="modele">
                                    <option value="0" disabled selected>Sélectionner</option>
                                    @foreach($modeles as $m)
                                        <option value="{{$m->id}}">{{$m->name}}</option>
                                    @endforeach
                                </select>
                                <label for="marque"
                                       class="col-sm-2  control-label col-form-label">Marque</label>
                                <select name="marque" class="form-control" id="marque">
                                    <option value="0" disabled selected>Sélectionner</option>
                                    @foreach($marques as $m)
                                        <option value="{{$m->id}}">{{$m->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Annuler
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_add_modele" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{route('modele.store')}}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un modèle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <label for="" class="col-sm-2 control-label col-form-label">Nom</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nom" class="form-control" id="nom"
                                           placeholder="saisir le nom " required>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Annuler
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_add_marque" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{route('marque.store')}}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter une marque</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <label for="" class="col-sm-2 control-label col-form-label">Nom</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nom" class="form-control" id="nom"
                                           placeholder="saisir la marque" required>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Annuler
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script>

        $(".btn-modele").on('click', function () {
            vehicule_id = $(this).data('id');
            $('#collapseExamplemarque' + vehicule_id).removeClass("show");

        });
        $(".btn-marque").on('click', function () {
            vehicule_id = $(this).data('id');
            $('#collapseExamplemodele' + vehicule_id).removeClass("show");
        });


    </script>
@endsection

