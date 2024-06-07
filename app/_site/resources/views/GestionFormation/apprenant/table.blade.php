<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>{{ __('app.name') }}</th>
            <th>{{ __('app.description') }}</th>
            <th>{{ __('app.link') }}</th>
            <th>{{ __('app.formateur') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($formations as $formation)
            <tr>
                <<td>{{ $formation->nom }}</td>
                    <td>{{ $formation->description }}</td>
                    <td>{{ $formation->lien }}</td>
                    <td>{{ $formation->formateur->nom ?? 'N/A' }} {{ $formation->formateur->prenom ?? '' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
