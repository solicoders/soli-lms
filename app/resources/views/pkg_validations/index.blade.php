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
                                                </td>
                                              
                                                <td>
                                                    <input type="number" name="validations[{{ $competence->id }}][note]" class="form-control" value="{{ $note }}">                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h3 style="text-align: center; font-size: 1.5em; color: #6c757d; margin: 20px 0;">Formulaire de Retour sur les Compétences</h3>
                                <div class="form-group">

                                    <label for="selected_competence">Compétence</label>
                                    <select id="selected_competence" class="form-control">
                                        @foreach ($allcompetences as $Competence)
                                        <option value="competence_mobile">{{ $Competence->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message">Titre:</label>
                                <input type="text" id="message_title" class="form-control" value="{{ $message->titre}}" placeholder="Entrez le titre du message">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message:</label>
                                    <textarea class="form-control" id="message" name="message" rows="20">{{ $message ? $message->description : '' }}</textarea>
                                </div>

                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#message'))
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>

                            </div>

                            <div class="text-right m-5">
                                <button type="submit" class="btn btn-info">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
