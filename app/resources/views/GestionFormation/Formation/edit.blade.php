@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($errorMessage))
            <div class="alert alert-danger">
                {{ $errorMessage }}
            </div>
        @else
            @if(isset($dataToEdit))
                <div class="card" style="background-color: white; margin-top: 20px;">
                    <div class="card-body">
                        <form action="{{ route('formations.update', $dataToEdit->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nom">{{ __('app.name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom', $dataToEdit->nom) }}">
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('app.description') }}</label>
                                <textarea name="description" class="form-control" id="description">{{ old('description', $dataToEdit->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lien">{{ __('app.link') }}</label>
                                <input type="text" name="lien" class="form-control" id="lien" value="{{ old('lien', $dataToEdit->lien) }}">
                                @error('lien')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="formateur_id">{{ __('app.formateur') }} <span class="text-danger">*</span></label>
                                <select name="formateur_id" class="form-control" id="formateur_id">
                                    <option value="">Sélectionnez un formateur</option>
                                    @foreach($formateurs as $formateur)
                                        <option value="{{ $formateur->id }}" {{ old('formateur_id', $dataToEdit->formateur_id) == $formateur->id ? 'selected' : '' }}>
                                            {{ $formateur->nom }} {{ $formateur->prenom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('formateur_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Autres champs de formation -->

                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            @else 
                <div class="alert alert-danger">
                    Aucune donnée à afficher.
                </div>
            @endif
        @endif
    </div>
@endsection
