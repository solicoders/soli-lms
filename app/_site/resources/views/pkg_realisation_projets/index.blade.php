@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Les réalisations</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header col-md-12">
                    <h3 class="card-title">Tableau des réalisations</h3>
                </div>
                <div class="card-body">
                    <div class="p-0 mb-3">
                        <form>
                            <div class="form-row">
                                <!-- Skills Dropdown -->
                                <div class="col-md-2">
                                    <select class="form-control-sm form-control" id="skill">
                                        <option value="">Competences</option>
                                        @foreach($Competences as $Competence)
                                            <option value="{{ $Competence->id }}">{{ $Competence->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Projects Dropdown -->
                                <div class="col-md-2">
                                    <select class="form-control-sm form-control" id="project">
                                        <option value="">Projets</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Learners Dropdown -->
                                <div class="col-md-3">
                                    <select class="form-control-sm form-control" id="learner">
                                        <option value="">Apprenants</option>
                                        @foreach($Personnes as $Personne)
                                            <option value="{{ $Personne->id }}">{{ $Personne->prenom }}{{ $Personne->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <!-- Learners Dropdown -->
                                <div class="col-md-3">
                                    <select class="form-control-sm form-control" id="learner">
                                        <option value="">etat</option>
                                        @foreach($EtatRealisationProjet as $EtatRealisation)
                                            <option value="{{ $EtatRealisation->id }}">{{ $EtatRealisation->etat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Projet</th>
                                <th>Apprenants</th>
                                <th>Etat de réalisation</th>
                                <th>Etat de validation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($realisationProjets as $project)
                                <tr>
                                    <td class="nom-brief">{{ $project->projet->titre }}</td>
                                    <td class="etat">{{ $project->Personne->nom }}</td>
                                    <td class="etat">@if($project->EtatRealisationProjet->etat == 'Cancelled')
    <span class="badge badge-danger">A faire</span>
@elseif($project->EtatRealisationProjet->etat == 'Pending')
    <span class="badge badge-secondary">En pause</span>
@elseif($project->EtatRealisationProjet->etat == 'In Progress')
    <span class="badge badge-info">En cours</span>
@elseif($project->EtatRealisationProjet->etat == 'Completed')
    <span class="badge badge-success">Terminer</span>
@endif</td>
                                    <td >
                                    @if($project->validation)
                                    <span class="badge badge-success">Validé</span>
                                    @else
                                    <span class="badge badge-secondary">-</span>
                                   @endif
                                     </td>
                                    </td>
                                    <td class='actions'>
                                        <a href="{{ route('validations.validate', ['realisation_id' => $project->id]) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-check"></i> Valider
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center p-2">
                    <div class="d-flex align-items-center mb-2">
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-download"></i> IMPORT
                        </button>
                        <button type="button" class="btn btn-default btn-sm mt-0 mx-2">
                            <i class="fas fa-upload"></i> EXPORT
                        </button>
                    </div>
                    <div class="mr-5">
                        <ul class="pagination m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </div>
</div>
</section>
<!-- /.content -->
@endsection