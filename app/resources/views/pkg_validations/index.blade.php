@extends('layouts.app')

@section('content')
<section class="content">
    <form action="{{ route('validations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="realisation_projet_id" value="{{ $realisation->id }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header bg-info">
                            <h3 class="card-title">Validation : {{ $realisation->Projet->titre }}</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nom">Nom: </label> {{ $realisation->Personne->nom }}
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom: </label> {{ $realisation->Personne->prenom }}
                                </div>
                                <div class="form-group">
                                    <label for="livrables">Les livrables:</label>
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
    
                                <table class="table table-bordered">
                                    <caption style="caption-side: top; text-align: center; font-size: 1.5em; margin: 10px 0;">Formulaire pour la validation des Compétences</caption>
                                    <thead>
                                        <tr>
                                            <th>Compétence</th>
                                            <th>Appréciation</th>
                                            <th>Note</th>
                                            <th>Titre</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($competences as $competence)
                                            <tr>
                                                <td>{{ $competence->competence->nom }}</td>
                                                <td>
                                                    <select name="validations[{{ $competence->id }}][appreciation_id]" class="form-control">
                                                        @foreach ($appreciations as $appreciation)
                                                            @if ($competence->appreciation_id == $appreciation->id)
                                                                <option value="{{ $appreciation->id }}" selected>{{ $appreciation->nom }}</option>
                                                            @else
                                                                <option value="{{ $appreciation->id }}">{{ $appreciation->nom }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error("validations.{$competence->id}.appreciation_id")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="number" name="validations[{{ $competence->id }}][note]" class="form-control" value="{{ $note }}">
                                                    @error("validations.{$competence->id}.note")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" name="validations[{{ $competence->id }}][titre]" class="form-control" placeholder="Titre">
                                                    @error("validations.{$competence->id}.titre")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <textarea name="validations[{{ $competence->id }}][description]" class="form-control" placeholder="Description"></textarea>
                                                    @error("validations.{$competence->id}.description")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-right m-5">
                                    <button type="submit" class="btn btn-info">Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
