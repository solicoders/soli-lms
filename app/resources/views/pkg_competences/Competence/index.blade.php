@extends('layouts.app')

@section('title', __('pkg_competences/competence.singular'))

@section('content')
    <div class="content-header">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center" >
                <div class="col-md-8 text-center">
                    <h1>
                        @php
                            use App\helpers\TranslationHelper;
                            $lang = Config::get('app.locale');
                            echo TranslationHelper::getTitle(__('pkg_competences/competence.plural'), $lang);
                        @endphp
                    </h1>
                </div>
                <div class="col-md-4 text-center">
                    @can('create-CompetenceController')
                        <a href="{{ route('competence.create') }}" class="btn btn-info">
                            <i class="fas fa-plus"></i>
                            {{ __('app.add') }} {{ __('pkg_competences/competence.singular') }}
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <form action="{{ route('competence.index') }}" method="GET" class="form-inline justify-content-center">
                                <div class="form-group mb-2 me-2" style="padding: 20px;">
                                    <label for="ModuleFilter" class="me-2">{{ __('pkg_competences/Module.plural') }}:</label>
                                    <select name="module" class="form-control" id="ModuleFilter">
                                        <option value="">{{ __('Modules') }}</option>
                                        @foreach ($allModules as $Module)
                                            <option value="{{ $Module->id }}" {{ request('module') == $Module->id ? 'selected' : '' }}>
                                                {{ $Module->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-2 me-2">
                                    <input type="text" name="table_search" id="table_search" class="form-control" placeholder="{{ __('app.search') }}">
                                    <button type="submit" class="btn btn-default" id="search-button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        @include('pkg_competences.competence.table')
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="page" value="1">
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#search-button').on('click', function(e) {
                e.preventDefault();
                var searchValue = $('#table_search').val();

                $.ajax({
                    url: "{{ route('competence.index') }}",
                    type: "GET",
                    data: { searchValue: searchValue },
                    success: function(response) {
                        $('#competence-list').html(response);
                    },
                    error: function(xhr) {
                        console.log('An error occurred:', xhr);
                    }
                });
            });
        });
    </script>
@endpush
