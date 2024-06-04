@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Les réalisations</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tableau des réalisations</h5>
            <form class="form-inline mb-3">
                <select class="form-control mr-2">
                    <option>Compétences</option>
                </select>
                <select class="form-control mr-2">
                    <option>Projets</option>
                </select>
                <select class="form-control mr-2">
                    <option>États</option>
                </select>
                <select class="form-control">
                <option>Compétences</option>
                   @foreach ($apprenants as $apprenant)
                   <option value="{{ $apprenant->id }}">{{ $apprenant->nom }}</option>
                   @endforeach
                </select>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>titre</th>
                        <th>Apprenants</th>
                        <th>État de réalisation</th>
                        <th>État de validation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($realisationProjets as $projet)
                    <tr>
                        <td>{{ $projet->projet->titre}}</td> <!-- Adjust based on your actual attribute -->
                        <td>{{ $projet->personne->nom }}</td> <!-- Assuming 'name' is the attribute you want to display -->
                        <td>
                            <span class="badge badge-{{ $projet->etatRealisationProjet->status_class }}">{{ $projet->etatRealisationProjet->etat }}</span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $projet->validation_status_class }}">{{ $projet->validation_status }}</span>
                        </td>
                        <td>
                            <a href="" class="btn btn-success">Valider</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" required>
                    <button type="submit" class="btn btn-primary">IMPORT</button>
                </form>
                <a href="" class="btn btn-secondary">EXPORT</a>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $realisationProjets->links() }} <!-- Assuming you're using pagination -->
            </div>
        </div>
    </div>
</div>
@endsection