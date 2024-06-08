@extends('layouts.app')

@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Mes projets</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Contenu principal -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Boîte par défaut -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tableau des projets</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Réduire">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            title="Supprimer">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="skill">Compétence :</label>
                                            <select class="form-control" id="skill">
                                            @foreach($Competences as $Competence)
                                            <option value="{{ $Competence->id }}">{{ $Competence->nom }}</option>
                                        @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="nom brief projet...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <table class="table table-bordered">
    <thead>
        <tr>
            <th>Brief projet</th>
            <th>Competences</th>
            <th>Etat de réalisation</th>
            <th>Date debut</th>
            <th>Date de fin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($realisationProjets as $project)
        <tr>
            <td>{{ $project->projet->titre }}</td>
            <td>
            @foreach($project->projet->competences as $competence)
            @if(strlen($competence->nom) > 20)
        <span>{{ substr($competence->nom, 0, 20) }} <span>...</span></span>
        <a href="#" class="expand-content">Read more</a>
        <span class="full-content" style="display: none;">{{ $competence->nom }}</span>
    @else
        <span>{{ $competence->nom }}</span>
    @endif
        @endforeach
        
<script>
    document.querySelectorAll('.expand-content').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            item.style.display = 'none';
            item.nextElementSibling.style.display = 'inline';
        });
    });
</script>
    </td>
        <td class="etat">@if($project->EtatRealisationProjet->etat == 'Cancelled')
    <span class="badge badge-danger">A faire</span>
@elseif($project->EtatRealisationProjet->etat == 'Pending')
    <span class="badge badge-secondary">En pause</span>
@elseif($project->EtatRealisationProjet->etat == 'In Progress')
    <span class="badge badge-info">En cours</span>
@elseif($project->EtatRealisationProjet->etat == 'Completed')
    <span class="badge badge-success">Terminer</span>
@endif</td>
            <td>{{ $project->date_debut_realisation }}</td>
            <td>{{ $project->date_fin_realisation }}</td>

            <td class="text-center">
                                                <a href="show.php" class='btn btn-default btn-sm'>
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="edit.php" class="btn btn-default btn-sm" >
                                                    <i class="fas fa-edit"></i>
                                                </a>
            </td>
            <!-- Add more columns if needed -->
        </tr>
        @endforeach
    </tbody>
</table>
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
                                        <ul class="pagination  m-0 float-right">
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
        </div>
        </section>
        <!-- /.content -->
    </div>


@endsection