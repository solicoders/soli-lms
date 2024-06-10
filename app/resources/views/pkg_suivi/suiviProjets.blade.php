@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Suivi de réalisation des projets</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header col-md-12">
                    <div class="col-md-3">
                    <select class="form-control-sm form-control" id="projectSelect">
                        <option value="">Projets</option>
                        @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->titre }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 30%">Projet</th>
                                    <th>Participants</th>
                                    <th>Etat de réalisation</th>
                                    <th>Début de réalisation</th>
                                    <th>Fin de réalisation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->titre }}</td>
                                    @php
                                    // Fetch the first related realisation project
                                    $firstRealisationProjet = $project->realisationProjets->first();
                                    @endphp
                                    <td>
                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="">Participants</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                    @foreach($project->realisationProjets as $realisationProjet)
                                        <span class="dropdown-item" href="#">{{ $realisationProjet->personne->nom }} {{ $realisationProjet->personne->prenom }}</span>
                                    @endforeach


                                    </div>
                                        
                                    </td>
                                    @if ($firstRealisationProjet)
                                    <td>
                                        @php
                                            // Determine the badge color based on the etat
                                            $badgeClass = '';
                                            switch($firstRealisationProjet->etatRealisationProjet->etat) {
                                                case 'En coure':
                                                    $badgeClass = 'bg-success';
                                                    break;
                                                case 'Annulé':
                                                    $badgeClass = 'bg-info';
                                                    break;
                                                case 'Terminé':
                                                    $badgeClass = 'bg-info';
                                                    break;
                                                case 'A faire':
                                                    $badgeClass = 'bg-secondary';
                                                    break;
                                               
                                            }
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">{{ $firstRealisationProjet->etatRealisationProjet->etat }}</span>
                                    </td>
                                    <td>{{ $firstRealisationProjet->date_debut_realisation }}</td>
                                    <td>{{ $firstRealisationProjet->date_fin_realisation }}</td>
                                    @endif
                                    
                                </tr>

                                @endforeach


                            </tbody>


                        </table>



                    </div>


                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end align-items-right p-2">
                        <div class="mr-5">
                        <ul class="pagination m-0 float-right ">
                        <li class="page-item"><a class="page-link text-info" href="#">«</a></li>
                            <li class="page-item"><a class="page-link active bg-info" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-info" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-info" href="#">»</a></li>                       
                        </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <input type="hidden" id='page' value="1">
</section>


</html>

@endsection