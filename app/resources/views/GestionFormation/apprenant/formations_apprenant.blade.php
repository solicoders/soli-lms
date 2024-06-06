@extends('layouts.app') 

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Formations</h3>
                        </div>
                        <div class="card-body">
                            @include('GestionFormation.apprenant.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
