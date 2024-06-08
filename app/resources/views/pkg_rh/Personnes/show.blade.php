@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid ">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Details de {{$type}}</h1>
                        </div>
                        <div class="col-sm-6">
                            <a href="./create.php" type="button" class="btn btn-info float-right">
                                <i class="fas fa-plus"></i> Ajouter un {{$type}}
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="card">
                <div class="card-body">
                    <h3>Informations de {{$type}}</h3>
                    <br>
                    <br>
                    <p><strong>Nom: </strong> {{$personne->nom}}</p>
                    <p><strong>Prénom: </strong> {{$personne->prenom}}</p>
                    <p><strong>Numéro de {{$type}}: </strong> {{$personne->tele_num}}</p>
                    <p><strong>{{$type == 'Formateur' ? 'Spécialité' : 'Groupe' }} </strong>{{$type == 'Formateur' ? $personne->specialite->nom : $personne->niveauScolaire->nom}}</p>
                    <p><strong>Ville: </strong> {{$personne->ville->nom}}</p>
                    <p><strong>Prénom: </strong> {{$personne->groupe->nom}}</p>
                    <p><strong>Prénom: </strong> {{$personne->prenom}}</p>
                    <p><strong>Prénom: </strong> {{$personne->prenom}}</p>
                    <p><strong>Prénom: </strong> {{$personne->prenom}}</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href='./index.php'>Annuler</a>
                    <button class="btn btn-info" >Modifier</button>
                </div>
            </div>
        </div>
    </section>
@endsection