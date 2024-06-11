@extends('layouts.app')

@section('content')
<div class="content-header">
    </div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Modifier le brief projet</h3>
                    </div>
                    <div class="card-body p-0">
                        <form  method="POST" action="{{ route('apprenantRealisations.store') }}">
                            @csrf 
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Livrable</th>
                                        <th>Lien</th>
                                        <th>État</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" name='realisation_projet_id' value="">
                                    <tr>
                                        <td><input type="text" name="nom" class="form-control"
                                           ></td>
                                        <td><input type="text" name="lien[]" class="form-control"
                                                value="https://example.com/presentation"></td>
                                    </tr>                                    
                                </tbody>
                            </table>

                            <div class="text-right m-5">
                                <button type="submit" class="btn btn-primary">Valider le brief</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection