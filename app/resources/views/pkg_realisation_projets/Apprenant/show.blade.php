@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 1302.4px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Détails du projet</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ url('./edit.php') }}" class="btn btn-default float-right"><i class="far fa-edit"></i>
                        Modifier</a>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12">
                                <label for="nom">Nom :</label>
                                <p>  
                            
                                {{ $realisationProjet->Projet->titre }}

                                </p>
                            </div>

                            <!-- Champ Compétences -->
                            <div class="col-sm-12">
                                <label for="competences">Compétences :</label>
                                <ul>
                                @foreach($projects->competences as $competence)
            @if(strlen($competence->nom) > 20)
        <span>{{ substr($competence->nom, 0, 20) }} <span>...</span></span>
        <a href="#" class="expand-content">Read more</a>
        <span class="full-content" style="display: none;">{{ $competence->nom }}</span>
    @else
        <span>{{ $competence->nom }}</span>
    @endif
        @endforeach
                                </ul>
                            </div>

                            <!-- Champ Travail à faire -->
                            <div class="col-sm-12">
                                <label for="travail">Travail à faire :</label>
                                <p>Concevoir et développer un site Web responsive pour une entreprise fictive.
                                </p>
                            </div>

                            <!-- Champ Critères de validation -->
                            <div class="col-sm-12">
                                <label for="validation">Critères de validation :</label>
                                <p>Le site Web doit être entièrement responsive, respecter les meilleures
                                    pratiques en développement Web et répondre aux exigences du client.</p>
                            </div>

                            <!-- Champ Date de début et de fin -->
                            <div class="col-sm-12">
                                <label for="date">Date :</label>
                                <p>Date de début : 1er janvier 2024</p>
                                <p>Date de fin : 31 mars 2024</p>
                            </div>

                            <!-- Champ Ressources -->
                            <div class="col-sm-12">
                                <label for="resources">Ressources :</label>
                                <p><a href="https://exemple.com/ressources">https://exemple.com/ressources</a>
                                </p>
                            </div>

                            <!-- Champ Référence -->
                            <div class="col-sm-12">
                                <label for="reference">Référence :</label>
                                <p><a href="https://exemple.com/reference">https://exemple.com/reference</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection