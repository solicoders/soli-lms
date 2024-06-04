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
                        Les briefs projets
                        {{-- @php
                            // Generate the title using the title function
                            use App\helpers\TranslationHelper;
                            $lang = Config::get('app.locale');
                            $translatedName = TranslationHelper::getTitle(__('GestionProjets/projet.singular'), $lang);
                            echo $translatedName;

                        @endphp --}}
                    </h1>

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
                                                                    <h3 class="card-title">Tableau des brief projets</h3>                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-3">
                                                                            <label for="skill">Compétence :</label>
                                                                            <select class="form-control" id="skill">
                                                                                <option value="">Toutes</option>
                                                                                <option value="C1">Maquetter une application mobile</option>
                                                                                <option value="C2">Manipuler une base de données - perfectionnement</option>
                                                                                <option value="C3">Développer la partie back-end d’une application web ou web mobile - perfectionnement</option>
                                                                                <option value="C4">Collaborer à la gestion d’un projet informatique et à l’organisation de l’environnement de développement - perfectionnement</option>
                                                                                <option value="C5">Développer une application mobile native, avec Android et React Native</option>
                                                                                <option value="C6">Préparer et exécuter les plans de tests d’une application</option>
                                                                                <option value="C7">Préparer et exécuter le déploiement d’une application web et mobile - perfectionnement</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label for="projectName">Rechercher</label>
                                                                            <input type="text" class="form-control" id="projectName" placeholder="Nom du projet :...">
                                                                        </div>
                                                                    </div>

                                                                    </div>

                                                                    @include('pkg_creation_projets.table')

                                                                </div>
                                                                <!-- /.card-body -->
                                                                <div class="card-footer">
                                                                    <div class="d-flex justify-content-between align-items-center p-2">
                                                                        <div class="d-flex align-items-center mb-2">
                                                                            <button type="button" class="btn btn-default btn-sm">
                                                                                <i class="fas fa-download"></i> IMPORT
                                                                            </button>
                                                                            <button type="button" class="btn btn-default btn-sm mt-0 mx-2">
                                                                                <i class="fas fa-upload"></i> EXPORT
                                                                            </button>
                                                                        </div>
                                                                        <div class="mr-5">
                                                                            <ul class="pagination  m-0 float-right">
                                                                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                                                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>                                                                </div>
                                                                <!-- /.card-footer-->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                    </div>
                                            </section>
@endsection
