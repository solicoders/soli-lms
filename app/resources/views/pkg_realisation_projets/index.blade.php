@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Project Realisations</h1>


    <!-- Form for importing projects -->
        @csrf
        <input type="file" name="file" required>
        <button type="submit" class="btn btn-primary">Import Projects</button>
    </form>

    <table class="table">
    <thead>
    <tr>
        <th>Personne ID</th>
        <th>État Réalisation Projet ID</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($realisationProjets as $projet)
    <tr>
        <td>{{ $projet->personne->prenom }}</td> <!-- Assuming 'name' is the attribute you want to display -->
        <td>{{ $projet->etatRealisationProjet->etat }}</td> <!-- Assuming 'status' is the attribute you want to display -->
        <td>{{ $projet->date_debut_realisation }}</td>
        <td>{{ $projet->date_fin_realisation }}</td>
        <td>
            <a href="{{ route('realisationProjets.edit', $projet->id) }}" class="btn btn-info">Edit</a>
            <form action="{{ route('realisationProjets.destroy', $projet->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
    </table>
</div>
@endsection