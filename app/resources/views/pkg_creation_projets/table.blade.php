
            @foreach ($projetData as $projet)
                <tr>
                    <td class="text-wrap w-50">{{ $projet->titre }}</td>
                    <td class="text-wrap w-50">
                        <ul>
                            @if ($projet->transfertCompetences)
                                @foreach($projet->transfertCompetences as $transfertCompetence)
                                    <li>
                                        {{ $transfertCompetence->competence->nom ?? 'No competence' }}
                                        @if ($transfertCompetence->appreciation)
                                            <ul>
                                                <li>{{ $transfertCompetence->appreciation->nom ?? 'No appreciation' }}</li>
                                            </ul>
                                        @else
                                            <p>No appreciation available</p>
                                        @endif
                                    </li>
                                @endforeach
                            @else
                                <p>No competences available</p>
                            @endif
                        </ul>
                    </td>
                    <td>{{ $projet->dateDebut }}</td>
                    <td>{{ $projet->dateFin }}</td>

                    <td class="text-center">
                        {{-- @can('show-ProjetController') --}}
                            <a href="{{ route('projets.show', $projet) }}" class="btn btn-default btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        {{-- @endcan --}}
                        {{-- @can('edit-ProjetController') --}}
                            <a href="{{ route('projets.edit', $projet) }}" class="btn btn-sm btn-default">
                                <i class="fas fa-pen-square"></i>
                            </a>
                        {{-- @endcan --}}
                        {{-- @can('destroy-ProjetController') --}}
                            <form action="{{ route('projets.destroy', $projet) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        {{-- @endcan --}}
                    </td>
                </tr>
            @endforeach
      