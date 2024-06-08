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
            <h1>{{ __('app.Gestion_des_formations') }}</h1>
        </div>
        <div class="col-sm-6 d-flex justify-content-end align-items-center">
            <a href="{{ route('formations.create') }}" class="btn btn-info">
                <i class="fas fa-plus"></i> {{ __('app.add') }} {{ __('pkg_formations/Formations.singular') }}
            </a>
        </div>
    </div>
</div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class=" p-0">
                                <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                    <input type="text" name="table_search" id="table_search"
                                        class="form-control float-right" placeholder="Recherche">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @include('GestionFormation.Formation.table')
                    </div>
                </div>
            </div>
        </div>
        
        <input type="hidden" id='page' value="1">
    </section>
@endsection



 