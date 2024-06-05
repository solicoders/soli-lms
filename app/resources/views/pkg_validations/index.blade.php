{{-- resources/views/pkg_validations/validation.blade.php --}}
@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header bg-info">
                        <h3 class="card-title">Validation : lab-markdown</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nom">Nom: </label> {{ $realisation->Personne->nom }}
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom: </label> {{ $realisation->Personne->prenom }}
                            </div>
                            {{-- Assuming you have links stored in the user model --}}
                            <div class="form-group">
                                <label for="livrables">Les livrables:</label>
                                <ul class="list-group list-group-horizontal d-flex flex-row">
                                    <li class="list-group-item mr-2">
                                        <strong>{{ $realisation->LivrableRealisation->nom}}<strong> <a  href="{{ $realisation->LivrableRealisation->lien }}"></i>  {{ $realisation->LivrableRealisation->nom }}</a>
                                    </li>
                                    <li class="list-group-item mr-2">
                                        <strong>Rapport:</strong> <a href=""><i class="fab fa-google-drive"></i> Drive</a>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Maquette:</strong> <a href=""><i class="fab fa-figma"></i> Figma</a>
                                    </li>
                                </ul>
                            </div>
                            <form action="index.php">
                                <table class="table table-bordered ">
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
                                        <tr>
                                            <td>Maquetter une application mobile</td>
                                            <td>
                                                <select name="competence_mobile_level" class="form-control">
                                                    <option value="Passable">Passable</option>
                                                    <option value="Insuffisant">Insuffisant</option>
                                                    <option value="Tres bien">Très bien</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="radio" name="competence_mobile_appreciation" value="Passable" style="accent-color: green;">
                                            </td>
                                            <td>
                                                <input type="radio" name="competence_mobile_appreciation" value="Insuffisant" style="accent-color: red;">
                                            </td>
                                            <td>
                                                <input type="number" name="competence_mobile_note" step="0.01" class="form-control" style="width: 100px;">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Manipuler une base de données - perfectionnement</td>
                                            <td>
                                                <select name="competence_database_level" class="form-control">
                                                    <option value="Passable">Passable</option>
                                                    <option value="Insuffisant">Insuffisant</option>
                                                    <option value="Tres bien">Très bien</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="radio" name="competence_database_appreciation" value="Passable" style="accent-color: green;">
                                            </td>
                                            <td>
                                                <input type="radio" name="competence_database_appreciation" value="Insuffisant" style="accent-color: red;">
                                            </td>
                                            <td>
                                                <input type="number" name="competence_database_note" step="0.01" class="form-control" style="width: 100px;">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Développer la partie back-end d'une application web ou web
                                                mobile - perfectionnement</td>
                                            <td>
                                                <select name="competence_backend_level" class="form-control">
                                                    <option value="Passable">Insuffisant</option>
                                                    <option value="Insuffisant">Passable</option>
                                                    <option value="Tres bien">Très bien</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="radio" name="competence_backend_appreciation" value="Passable" style="accent-color: green;">
                                            </td>
                                            <td>
                                                <input type="radio" name="competence_backend_appreciation" value="Insuffisant" style="accent-color: red;">
                                            </td>
                                            <td>
                                                <input type="number" name="competence_backend_note" step="0.01" class="form-control" style="width: 100px;">
                                            </td>

                                        </tr>


                                    </tbody>
                                </table>

                                <h3 style="text-align: center; font-size: 1.5em; color: #6c757d; margin: 20px 0;">Formulaire de Retour sur les Compétences</h3>
                                <div class="form-group">

                                    <label for="selected_competence">Compétence</label>
                                    <select id="selected_competence" class="form-control">
                                        <option value="competence_mobile">Maquetter une application mobile</option>
                                        <option value="competence_database">Manipuler une base de données - perfectionnement</option>
                                        <option value="competence_backend">Développer la partie back-end d'une application web ou web mobile - perfectionnement</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message_title">Titre du Message</label>
                                    <input type="text" id="message_title" class="form-control" placeholder="Entrez le titre du message">
                                </div>
                                <div class="form-group">
                                    <label for="competence_message">Description</label>
                                    <textarea id="competence_message" class="form-control message-editor" rows="3"></textarea>
                                </div>
                        </div>
                        </table>

                        <script>
                            ClassicEditor
                                .create(document.querySelector('.message-editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>




                        <div class="text-right m-5">
                            <button type="submit" class="btn btn-info">Valider</button>
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

@push('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('.message-editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush