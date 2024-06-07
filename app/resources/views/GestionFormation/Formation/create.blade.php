@extends('layouts.app')

@section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <!-- You can add other conditional error messages here if needed -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                    @include('GestionFormation.Formation.fields')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
