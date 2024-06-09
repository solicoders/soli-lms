@extends('layouts.app')

@section('title', __('app.show') . ' ' . __('pkg_realisation_projet/livrable.singular'))

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('app.detail') }}</h1>
                </div>
                {{-- @can('edit-LivrableController') --}}
                    <div class="col-sm-6">
                        <a href="" class="btn btn-default float-right">
                            <i class="far fa-edit"></i>
                            {{ __('app.annuler') }}
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
                            <!-- Realisation Project Title -->
                            <div class="col-sm-12">
                                <label for="titre">{{ __('pkg_realisation_projet/livrable.title') }}:</label>
                                <p>{{ $realisation->titre }}</p>
                            </div>

                            <!-- Realisation Project Description -->
                            <div class="col-sm-12">
                                <label for="description">{{ __('app.description') }}:</label>
                                @if ($realisation->description)
                                    <p>
                                        {!! $realisation->description !!}
                                    </p>
                                @else
                                    <p class="text-secondary">{{ __('app.no_information_available') }}</p>
                                @endif
                            </div>

                            <!-- Realisation Project Link -->
                            <div class="col-sm-12">
                                <label for="lien">{{ __('pkg_realisation_projet/livrable.link') }}:</label>
                                <p>{{ $realisation->lien }}</p>
                            </div>

                            <!-- Project Title -->
                            <div class="col-sm-12">
                                <label for="titre">{{ __('pkg_realisation_projet/projet.title') }}:</label>
                                <p>{{ $realisation->projet->titre }}</p>
                            </div>

                            <!-- Project Description -->
                            <div class="col-sm-12">
                                <label for="description">{{ __('app.description') }}:</label>
                                @if ($realisation->projet->description)
                                    <p>
                                        {!! $realisation->projet->description !!}
                                    </p>
                                @else
                                    <p class="text-secondary">{{ __('app.no_information_available') }}</p>
                                @endif
                            </div>
                            
                            <!-- Realisation Project Person -->
                            <div class="col-sm-12">
                                <label for="nom">Nom: </label> {{ $realisation->Personne->nom }}
                            </div>
                            <div class="col-sm-12">
                                <label for="prenom">Prénom: </label> {{ $realisation->Personne->prenom }}
                            </div>

                            <!-- Livrables List -->
                            <div class="col-sm-12">
                                <label for="livrables">{{ __('pkg_realisation_projet/livrable.plural') }}:</label>
                                <ul class="list-group list-group-horizontal d-flex flex-row">
                                    @foreach ($realisation->livrableRealisations as $livrableRealisation)
                                        <li class="list-group-item mr-2">
                                            <strong>{{ $livrableRealisation->nom }}</strong>
                                            <a href="{{ $livrableRealisation->lien }}">
                                                @if (str_contains($livrableRealisation->lien, 'docs.google.com') ||
                                                    str_contains($livrableRealisation->lien, 'sheets.google.com') ||
                                                    str_contains($livrableRealisation->lien, 'slides.google.com'))
                                                    <i class="fas fa-google-drive"></i> Google Drive
                                                @elseif (str_contains($livrableRealisation->lien, 'figma.com'))
                                                    <i class="fab fa-figma"></i> Figma
                                                @else
                                                    <i class="fas fa-link"></i> Link
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Validation Information -->
                          <div class="col-sm-12 mt-4">
    <h3 class="card-title">Informations de Validation</h3>
    <div class="row">
        @foreach ($competences as $competence)
            <div class="col-md-12 mb-3">
                <div class="card p-3">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Compétence:</strong> {{ $competence->competence->nom }}</p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Appréciation:</strong> {{ $competence->appreciation->nom }}</p>
                        </div>
                        <div class="col-md-2">
                            <p><strong>Note:</strong> {{ isset($notesByCompetence[$competence->id]) ? $notesByCompetence[$competence->id] : '-' }}</p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Titre:</strong> {{ isset($messagesByCompetence[$competence->id]) ? $messagesByCompetence[$competence->id][0]->titre : '-' }}</p>
                            <p><strong>Description:</strong> {{ isset($messagesByCompetence[$competence->id]) ? $messagesByCompetence[$competence->id][0]->description : '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection