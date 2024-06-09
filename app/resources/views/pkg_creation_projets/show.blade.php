@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Détails du projet</h1>
                </div>
                {{-- @can('edit-ProjetController') --}}
                <div class="col-sm-6">
                    <a href="{{ route('projets.edit', $projet->id) }}" class="btn btn-default float-right">
                        <i class="far fa-edit"></i> Modifier
                    </a>
                </div>
                {{-- @endcan --}}
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
                                <label for="nom">{{ __('app.name') }} :</label>
                                <p>{{ $projet->titre }}</p>
                            </div>

                            <!-- Champ Compétences -->
                            <div class="col-sm-12">
                                <label for="competences">{{ __('pkg_compentences/competence.plural') }}</label>
                                <ul>
                                    @foreach ($projet->transfertCompetences as $transfertCompetence)
                                    <li>{{ $transfertCompetence->competence->nom ?? 'No competence' }}
                                        <span>({{ $transfertCompetence->appreciation->description ?? 'No appreciation' }})</span>
                                        <ul>
                                            @foreach ($transfertCompetence->technologies as $technology)
                                                <li>{{ $technology->nom }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                </ul>
                            </div>

                            <!-- Champ Travail à faire -->
                            <div class="col-sm-12">
                                <label for="travail">{{ __('app.travailAFaire') }}</label>
                                <p>{{ $projet->travailAFaire }}</p>
                            </div>

                            <!-- Champ Critères de validation -->
                            <div class="col-sm-12">
                                <label for="validation">{{ __('app.critereDeTravail') }}</label>
                                <p>{{ $projet->critereDeTravail }}</p>
                            </div>

                            <!-- Champ Date de début et de fin -->
                            <div class="col-sm-12">
                                <label for="date">{{ __('app.date') }}</label>
                                <p>{{ __('app.dateDebut') }} : {{ $projet->dateDebut }}</p>
                                <p>{{ __('app.dateFin') }}  : {{ $projet->dateFin }}</p>
                            </div>

                            <!-- Champ Ressources -->
                            <div class="col-sm-12">
                                <label for="resources">{{ __('pkg_creation_projets/Resource.plural') }} :</label>
                                <ul>
                                    @foreach ($projet->resources as $resource)
                                        <li><a href="{{ $resource->lien }}">{{ $resource->nom }}</a>: {{ $resource->description }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Champ Livrables -->
                            <div class="col-sm-12">
                                <label for="livrables">{{ __('pkg_creation_projets/Livrable.plural') }} :</label>
                                <ul>
                                    @foreach ($projet->livrables as $livrable)
                                        <li>{{ $livrable->titre }}: <a href="{{ $livrable->lien }}">{{ $livrable->lien }}</a>
                                            - {{ $livrable->description }} ({{ $livrable->natureLivrable->nom ?? 'No nature' }})</li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Champ Apprenants -->
                            <div class="col-sm-12">
                                <label for="apprenants">Apprenants :</label>
                                <ul>
                                    @foreach ($learners as $learner)
                                        <li>{{ $learner->nom }} {{ $learner->prenom }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection