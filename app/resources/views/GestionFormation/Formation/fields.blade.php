@extends('layouts.app')

@section('content')
<div class="content-header">
@if ($errors->has('unexpected_error'))
    <div class="alert alert-danger">
        {{ $errors->first('unexpected_error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="nav-icon fas fa-table"></i>
                            {{ __('app.add') }} {{ __('pkg_formations/formations.singular') }}
                        </h3>
                    </div>
                    <!-- Obtaining the form -->
                    <form id="your-form" action="{{ route('formations.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nom">{{ __('app.name') }} <span class="text-danger">*</span></label>
                                <input name="nom" type="text" class="form-control" id="nom" placeholder="Entrez le titre" value="{{ old('nom') }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="inputDescription">{{ __('app.description') }}</label>
                                <textarea name="description" id="editor" class="form-control" rows="7" placeholder="Entrez la description">{{ strip_tags(old('description'), '<br><b><i><strong><em>') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="lien">{{ __('app.link') }}</label>
                                <input name="lien" type="url" class="form-control" id="lien" placeholder="Entrez le lien" value="{{ old('link') }}">
                            </div>

                            <div class="form-group">
                                <label for="formateur_id">{{ __('app.formateur') }} <span class="text-danger">*</span></label>
                                <select name="formateur_id" class="form-control" id="formateur_id">
                                    <option value="">Sélectionnez un formateur</option>
                                    @foreach($dataToEdit as $formateur)
                                        <option value="{{ $formateur->id }}" {{ old('formateur_id') == $formateur->id ? 'selected' : '' }}>
                                            {{ $formateur->nom }} {{ $formateur->prenom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('formations.index') }}" class="btn btn-default">{{ __('app.cancel') }}</a>
                            <button type="submit" class="btn btn-info ml-2">{{ __('app.add') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#your-form').submit(function() {
        var description = $('#editor').val();
        description = description.replace(/<p>/g, '').replace(/<\/p>/g, ''); // Remove <p> tags
        $('#editor').val(description); // Update the textarea value
    });
});
</script>
@endsection
