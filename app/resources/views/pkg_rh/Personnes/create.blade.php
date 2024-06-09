@extends('layouts.app')
@section('content')
        <section class="content">
            <div class="container-fluid">
                <section class="content-header">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="container-fluid ">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Créer un nouvel {{ __('pkg_rh/'.$type.'.singular')}}</h1>
                            </div>
                        </div>
                    </div>
                </section>
                
                <div class="card">
                    <div class="card-body">
                        <form method="post" action={{ route($type.'.store') }}>
                            @csrf
                            @method('POST')
                            <!-- Personal Information -->
                            <h4 class="mb-3 mt-3">Informations personnelles</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control"  id="nom" name="nom">
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" class="form-control"  id="prenom" name="prenom">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_naissance">Date de Naissance</label>
                                        <input type="date" class="form-control"  id="date_naissance" name="date_naissance">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom_arab">Nom en Arabe</label>
                                        <input type="text" class="form-control" id="nom_arab" name="nom_arab">
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom_arab">Prénom en Arabe</label>
                                        <input type="text" class="form-control"  id="prenom_arab" name="prenom_arab">
                                    </div>
                                    <div class="form-group">
                                        <label for="tele_num">Numéro de Téléphone</label>
                                        <input type="text" class="form-control"  id="tele_num" name="tele_num">
                                    </div>
                                </div>
                            </div>
                            <!-- End Personal Information -->

                            <!-- Contact Information -->
                            <h4 class="mb-3 mt-3">Informations de contact</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control"  id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rue">Rue</label>
                                        <input type="text" class="form-control" id="rue" name="rue">
                                    </div>
                                    <div class="form-group">
                                        <label for="ville_id">Ville</label>
                                        <select class="form-control" id="ville_id" name="ville_id">
                                            <option>Choisissez</option>
                                            @foreach ($villes as $ville)
                                                <option value={{$ville->id}}>{{$ville->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- End Contact Information -->

                            <!-- Other Information -->
                            <h4 class="mb-3 mt-3">Autres informations</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cin">CIN</label>
                                        <input type="text" class="form-control"  id="cin" name="cin">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="groupe_id">Groupe</label>
                                        <select class="form-control" id="groupe_id" name="groupe_id">
                                            <option>Choisissez</option>
                                            @foreach ($groupes as $groupe)
                                                <option value={{$groupe->id}}>{{$groupe->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if ($type == 'Apprenant')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CNE">CNE</label>
                                        <input type="text" class="form-control"  id="CNE" name="cne">
                                    </div>
                                    <div class="form-group">
                                        <label for="niveau_scolaire_id">Niveau scolaire</label>
                                        <select class="form-control" id="niveau_scolaire_id" name="niveau_scolaire_id">
                                            <option>Choisissez</option>
                                            @foreach ($niveauxScolaire as $niveauScolaire)
                                                <option value={{$niveauScolaire->id}}>{{$niveauScolaire->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6">
                                    @if ($type == 'Formateur')
                                    <div class="form-group">
                                        <label for="specialite_id">Spécialité</label>
                                        <select class="form-control" id="specialite_id" name="specialite_id">
                                            <option>Choisissez</option>
                                            @foreach ($specialites as $specialite)
                                                <option value={{$specialite->id}}>{{$specialite->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="lieu_naissance_id">Lieu de Naissance</label>
                                        <select class="form-control" id="lieu_naissance_id" name="lieu_naissance_id">
                                            <option>Choisissez</option>
                                            @foreach ($villes as $ville)
                                                <option value={{$ville->id}}>{{$ville->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- End Other Information -->


                            <a type="button" class="btn btn-secondary" href={{ route($type.'.index') }}>{{ __('app.cancel')}}</a>
                            <button type="submit" class="btn btn-info">{{ __('app.add')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection