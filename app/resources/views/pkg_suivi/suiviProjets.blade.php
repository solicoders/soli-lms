<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
</head>
<body>
    <h1>Projects</h1>
    <ul>
        @foreach($projects as $project)
            <li>
                <h2>{{ $project->titre }}</h2>
                
                @php
                    // Fetch the first related realisation project
                    $firstRealisationProjet = $project->realisationProjets->first();
                @endphp

                @if ($firstRealisationProjet)
                    <p>Start Date: {{ $firstRealisationProjet->date_debut_realisation }}</p>
                    <p>End Date: {{ $firstRealisationProjet->date_fin_realisation }}</p>
                    <p>State of Realization: {{ $firstRealisationProjet->etatRealisationProjet->etat ?? 'N/A' }}</p>
                @endif

                <p>Members:</p>
                <ul>
                    @foreach($project->realisationProjets as $realisationProjet)
                        <li>{{ $realisationProjet->personne->nom }} {{ $realisationProjet->personne->prenom }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</body>
</html>
