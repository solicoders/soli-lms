{{-- resources/views/pkg_validations/validation.blade.php --}}
@extends('layouts.app')

@section('content')
<section class="content">
    <form action="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header bg-info">
                        <h3 class="card-title">Validation : {{ $RealisationProjet->Projet->titre }}</h3>
                        </div>
                    <div class="card-body p-0">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nom">Nom: </label> {{ $RealisationProjet->Personne->nom }}
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom: </label> {{ $RealisationProjet->Personne->prenom }}
                            </div>
                            <div class="form-group">
                                <label for="livrables">Les livrables:</label>
                                <ul class="list-group list-group-horizontal d-flex flex-row">
                                    
                                    <li class="list-group-item mr-2">
                                        <strong>{{ $RealisationProjet->LivrableRealisation->nom }}</strong> <a href="{{ $realisation->LivrableRealisation->lien }}"><i class="fab fa-github"></i> Github</a>
                                    </li>
                                </ul>
                            </div>
                            
                                <table class="table table-bordered">
                                    <caption style="caption-side: top; text-align: center; font-size: 1.5em; margin: 10px 0;">Formulaire pour la validation des Compétences</caption>
                                    <thead>
                                        <tr>
                                            <th>Compétence</th>
                                            <th>Appréciation</th>
                                            <th><i class="fas fa-check" style="color: green;"></i></th>
                                            <th><i class="fas fa-times" style="color: red;"></i></th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Competences as $Competence)
                                        <tr>
                                            <td>{{ $Competence->nom }}</td>
                                            <td>
                                                <select name="competence_{{ $Competence->id }}_level" class="form-control">
                                                    @foreach ($appreciations as $appreciation)
                                                        <option value="{{ $appreciation->value }}">{{ $appreciation->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="radio" name="competence_{{ $Competence->id }}_appreciation" value="Passable" style="accent-color: green;">
                                            </td>
                                            <td>
                                                <input type="radio" name="competence_{{ $Competence->id }}_appreciation" value="Insuffisant" style="accent-color: red;">
                                            </td>
                                            <td>
                                                <input type="number" name="note" class="form-control" value="{{ $validations->note }}">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                <h3 style="text-align: center; font-size: 1.5em; color: #6c757d; margin: 20px 0;">Formulaire de Retour sur les Compétences</h3>
                                <div class="form-group">

                                    <label for="selected_competence">Compétence</label>
                                    <select id="selected_competence" class="form-control">
                                        @foreach ($Competences as $Competence)
                                        <option value="competence_mobile">{{ $Competence->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message">Titre:</label>
                                <input type="text" id="message_title" class="form-control" value="{{ $messages->titre}}" placeholder="Entrez le titre du message">
                                </div>
                              
                                <div class="form-group">
                                    <label for="message">Message:</label>
                                    <div class="form-control" id="message"  name="validation_message" rows="20">{{ $messages->description}}</textarea>
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
                                        <a href="{{ route('validations.store') }}" class="btn btn-info">Valider</a>
                            
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
