<div class="card-body table-responsive p-0">
    <table class="table table-striped text-nowrap">
        <thead>
            <tr>
                <th>{{ __('app.name') }}</th>
                <th>{{ __('app.description') }}</th>
                <th>{{ __('app.link') }}</th>
                <th>{{ __('app.formateur') }}</th>
                <th class="text-center">{{ __('app.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formationData as $formation)
                <tr>
                    <td>{{ $formation->nom }}</td>
                    <td>{{ $formation->description }}</td>
                    <td>{{ $formation->lien }}</td>
                    <td>{{ $formation->formateur->nom ?? 'N/A' }} {{ $formation->formateur->prenom ?? '' }}</td>
                    <td class="text-center">
                        <a href="{{ route('formations.show', $formation) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        @can('edit formation')
                            <a href="{{ route('formations.edit', ['id' => $formation->id]) }}" class="btn btn-sm btn-default">
                                <i class="fas fa-pen-square"></i>
                            </a>
                        @endcan
                        @can('delete formation')
                            <form action="{{ route('formations.destroy', ['id' => $formation->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-md-flex justify-content-between align-items-center p-2">
    <div class="d-flex align-items-center mb-2 ml-2 mt-2">
        @can('import formation')
            <form action="{{ route('formation.import') }}" method="post" class="mt-2" enctype="multipart/form-data" id="importForm">
                @csrf
                <label for="upload" class="btn btn-default btn-sm font-weight-normal">
                    <i class="fas fa-file-download"></i>
                    {{ __('app.import') }}
                </label>
                <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
            </form>
        @endcan
        @can('export formation')
            <form class="">
                <a href="{{ route('formation.export') }}" class="btn btn-default btn-sm mt-0 mx-2">
                    <i class="fas fa-file-export"></i>
                    {{ __('app.export') }}</a>
            </form>
        @endcan
    </div>
    <ul class="pagination  m-0 float-right">
        {{ $formationData->onEachSide(1)->links() }}
    </ul>
</div>
