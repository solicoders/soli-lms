@extends('layouts.app')

@section('content')
    <div class="content-header">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}.
            </div>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        @php
                        // Generate the title using the title function
                        use App\helpers\TranslationHelper;
                        $lang = Config::get('app.locale');
                        $translatedName = TranslationHelper::getTitle(__('pkg_creation_projets/projet.plural'), $lang);
                        echo $translatedName;

                    @endphp                    </h1>

                </div>

                <div class="col-sm-6">
                    <div class="float-sm-right">
                        {{-- @can('create-ProjetController') --}}
                            <a href="{{ route('projets.create') }}" class="btn btn-info">
                                <i class="fas fa-plus"></i>
                                {{ __('app.add') }} {{ __('GestionProjets/projet.singular') }}
                            </a>
                        {{-- @endcan --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Boîte par défaut -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="skill"> {{ __('pkg_competences/competence.plural') }} :</label>
                                    <select class="form-control" id="competenceFilter">
                                        <option value="">Toutes</option>
                                        @foreach($competences as $competence)
                                            <option value="{{ $competence->id }}">{{ $competence->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="projectName">{{ __('app.rechercher') }}</label>
                                    <input type="text" class="form-control" id="searchInput" placeholder="Nom du projet :...">
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table id="projetTable"  class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>{{ __('pkg_creation_projets/projet.singular') }}</th>
                                        <th>{{ __('pkg_competences/competence.singular') }}</th>
                                        <th>{{ __('app.datedebut') }}</th>
                                        <th>{{ __('app.datefin') }}</th>
                                        <th class="text-center">{{ __('app.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="projetTableBody">
@include('pkg_creation_projets.table')
                                </tbody>

                            </table>
                        </div>

                        <div class="d-md-flex justify-content-between align-items-center p-2" id="card-footer">
                            <div class="d-flex align-items-center mb-2 ml-2 mt-2">

                                {{-- @can('import-ProjetController') --}}
                                    <!-- TODO : Import et export ne doit pas s'afficher dans la version mobile -->
                                    <form action="{{ route('projets.import') }}" method="post" class="mt-2" enctype="multipart/form-data"
                                        id="importForm">
                                        @csrf
                                        <label for="upload" class="btn btn-default btn-sm font-weight-normal">
                                            <i class="fas fa-file-download"></i>
                                            {{ __('app.import') }}
                                        </label>
                                        <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
                                    </form>
                                {{-- @endcan --}}
                                {{-- @can('export-ProjetController') --}}
                                    <form class="">
                                        <a href="{{ route('projets.export') }}" class="btn btn-default btn-sm mt-0 mx-2">
                                            <i class="fas fa-file-export"></i>
                                            {{ __('app.export') }}</a>
                                    </form>
                                {{-- @endcan --}}
                            </div>

                            <ul class="pagination  m-0 float-right">
                                {{ $projetData->onEachSide(1)->links() }}
                            </ul>
                        </div>


                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

