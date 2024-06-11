@extends('layouts.app')

@section('content')
<style>
    .step {
        display: none;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Ajouter un brief projet</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="bs-stepper">
                            <div id="livrable-form">
                                <form action="{{ $dataToEdit ? route('projets.update', $dataToEdit->id) : route('projets.store') }}" method="POST">
                                    @csrf
                                    @if ($dataToEdit)
                                        @method('PUT')
                                    @endif
                                    <div class="bs-stepper-content">
                                        <div class="step" id="step1">
                                            <div id="description-part"  role="tabpanel"
                                                 aria-labelledby="description-part-trigger">
                                                <div class="form-group">
                                                    <label for="titre">Titre du brief</label>
                                                    <input type="text" class="form-control" id="titre" name="titre"
                                                           value="{{ old('titre') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" id="inputDescription"
                                                              name="description" rows="3">{{ old('description') }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="travail">Travail à faire</label>
                                                    <textarea class="form-control" id="inputTravailafaire"
                                                              name="travail"
                                                              rows="3">{{ old('travail') }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="critere">Critère de validation</label>
                                                    <textarea class="form-control" id="inputcriterevalidation"
                                                              name="critere"
                                                              rows="3">{{ old('critere') }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dateDebut">Date de début</label>
                                                    <input type="date" class="form-control" id="dateDebut"
                                                           name="dateDebut" value="{{ old('dateDebut') ? old('dateDebut') : date('Y-m-d') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="dateFin">Date de fin</label>
                                                    <input type="date" class="form-control" id="dateFin"
                                                           name="dateFin" value="{{ old('dateFin') ? old('dateFin') : date('Y-m-d') }}">
                                                </div>
                                                <div class="form-group" id="livrables-container">
                                                    <label for="livrable">Nom de livrable</label>
                                                    @if(isset($dataToEdit->livrables))
                                                        @foreach($dataToEdit->livrables as $livrable)
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" name="livrable[]" placeholder="Nom de livrable" value="{{ $livrable->nom }}">
                                                                <div class="input-group-append ">
                                                                    <select class="form-control" name="livrable_nature[]">
                                                                        @foreach($livrableNatures as $nature)
                                                                            <option value="{{ $nature->id }}" @if($livrable->nature_id == $nature->id) selected @endif>
                                                                                {{ $nature->nom }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="livrable_description">Description du livrable</label>
                                                                <textarea class="form-control" id="livrable_description" name="livrable_description[]" rows="3">{{ $livrable->description }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="livrable_link">Lien du livrable</label>
                                                                <input type="text" class="form-control" id="livrable_link" name="livrable_link[]" value="{{ $livrable->link }}">
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="livrable[]" placeholder="Nom de livrable" value="Presentation">
                                                            <div class="input-group-append">

                                                                <select class="form-control" name="livrable_nature[]">
                                                                    @foreach($livrableNatures as $nature)
                                                                        <option value="{{ $nature->id }}">{{ $nature->nom }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="livrable_description">Description du livrable</label>
                                                            <textarea class="form-control" id="livrable_description" name="livrable_description[]" rows="3"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="livrable_link">Lien du livrable</label>
                                                            <input type="text" class="form-control" id="livrable_link" name="livrable_link[]" value="">
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="button" class="btn btn-primary mb-3"
                                                        onclick="addLivraison()">Ajouter un autre livrable
                                                </button>
                                                <div class="form-group" id="ressources-container">
                                                    <label for="ressource">Nom de la ressource</label>
                                                    @if(isset($dataToEdit->ressources))
                                                        @foreach($dataToEdit->ressources as $ressource)
                                                            <div class="ressource mb-3">
                                                                <input type="text" class="form-control" name="ressource_nom[]" placeholder="Nom de la ressource" value="{{ $ressource->nom }}">
                                                                <div class="form-group">
                                                                    <label for="ressource_description">Description de la ressource</label>
                                                                    <textarea class="form-control resourceDescription" id="ressource_description" name="ressource_description[]" rows="3">{{ $ressource->description }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ressource_link">Lien de la ressource</label>
                                                                    <input type="text" class="form-control" id="ressource_link" name="ressource_lien[]" value="{{ $ressource->lien }}">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="ressource mb-3">
                                                            <input type="text" class="form-control" name="ressource_nom[]" placeholder="Nom de la ressource">
                                                            <div class="form-group">
                                                                <label for="ressource_description">Description de la ressource</label>
                                                                <textarea class="form-control resourceDescription" id="ressource_description" name="ressource_description[]" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ressource_link">Lien de la ressource</label>
                                                                <input type="text" class="form-control" id="ressource_link" name="ressource_lien[]">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="button" class="btn btn-primary mb-3" onclick="addRessource()">Ajouter une autre ressource</button>
                                                
                                            </div>
                                        </div>

                                        <div class="step" id="step2" style="display:none;">
                                            <div id="competence-part"  role="tabpanel"
                                                 aria-labelledby="projet-part-trigger">
                                                <div class="form-group">
                                                    <h2>Compétences</h2>
                                                    <p>Veuillez sélectionner les compétences que vous possédez.</p>
                                                    <label for="technologies">Technologies:</label>
                                                    <select name="technologie_ids[]" id="technologies" multiple>
                                                        @foreach($technologies as $technology)
                                                            <option value="{{ $technology->id }}">{{ $technology->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Compétences</th>
                                                            <th>Appréciations</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($competences as $competence)
                                                            <tr>
                                                                <td>
                                                                    <label>
                                                                        <input type="checkbox" class="mr-2"
                                                                               name="competences[]"
                                                                               id="competence_{{ $competence->id }}"
                                                                               value="{{ $competence->id }}"
                                                                               @if(isset($dataToEdit) && in_array($competence->id, $dataToEdit->competences->pluck('id')->toArray())) checked @endif>
                                                                        <i class="fas fa-{{ $competence->icon }}"></i>
                                                                        {{ $competence->nom }}
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <select name="competence_{{ $competence->id }}_appreciation"
                                                                            class="form-control">
                                                                        @foreach($appreciations as $appreciation)
                                                                            <option value="{{ $appreciation->id }}"
                                                                                    @if(isset($dataToEdit) && $dataToEdit->competences->where('id', $competence->id)->first()->appreciation_id == $appreciation->id) selected @endif>
                                                                                {{ $appreciation->nom }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                               
                                            </div>
                                        </div>

                                        <div class="step" id="step3" style="display:none;">
                                            <div id="affectation-part"  role="tabpanel"
                                                 aria-labelledby="affectation-part-trigger">
                                                <div class="d-flex flex-column mt-3 form-check">
                                                    <input type="checkbox" id="checkAll" class="form-check-input"
                                                           id="flexCheckIndeterminate">
                                                    <label class="form-check-label"
                                                           for="flexCheckIndeterminate">Tout
                                                        cocher<br>
                                                        <div class="row">
                                                            @foreach($apprenants as $apprenant)
                                                                <div class="col-sm-4 mb-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="apprenants[]"
                                                                               value="{{ $apprenant->id }}"
                                                                               @if(isset($dataToEdit) && in_array($apprenant->id, $dataToEdit->apprenants->pluck('id')->toArray())) checked @endif>
                                                                        <label class="form-check-label"
                                                                               for="{{ $apprenant->id }}">
                                                                            {{ $apprenant->nom }} {{ $apprenant->prenom }} ({{ $apprenant->type }})
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" id="prevBtn" class="btn btn-secondary" onclick="nextPrev(-1, event)">Previous</button>
                                        <button type="button" id="nextBtn" class="btn btn-primary" onclick="nextPrev(1, event)">Next</button>
                                        <button type="submit" id="submitBtn" class="btn btn-primary" style="display:none;">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var currentStep = 0;
    showStep(currentStep);

    function showStep(n) {
        var steps = document.getElementsByClassName("step");
        var totalSteps = steps.length;
        steps[n].style.display = "block";

        // Always show the Previous button, but change its function on the first step
        document.getElementById("prevBtn").style.display = "inline";
        if (n === 0) {
            document.getElementById("prevBtn").innerHTML = "Cancel"; // or "Go Back", etc.
        } else {
            document.getElementById("prevBtn").innerHTML = "Previous";
        }

        // Adjust the Next/Submit button visibility
        if (n === totalSteps - 1) {
            document.getElementById("nextBtn").style.display = "none";
            document.getElementById("submitBtn").style.display = "inline";
        } else {
            document.getElementById("nextBtn").style.display = "inline";
            document.getElementById("submitBtn").style.display = "none";
        }
    }

    function nextPrev(n, event) {
        event.preventDefault(); // Prevent default form submission initially
        var steps = document.getElementsByClassName("step");
        var totalSteps = steps.length;

        // Validation check
        if (n == 1 && !validateForm()) return false;

        // Hide current step
        steps[currentStep].style.display = "none";

        // Decrement currentStep
        currentStep += n;

        // Redirect if trying to go back from the first step
        if (currentStep < 0) {
            window.location.href = '/projets'; // Change '/your-specific-route' to your desired URL
            return; // Stop further execution
        }

        // Check if it is the last step, then submit form
        if (currentStep >= totalSteps) {
            document.getElementById("regForm").submit(); // Submit the form
            return false;
        }

        // Otherwise, show the next step
        showStep(currentStep);
    }

    function validateForm() {
        // validation code here
        return true;
    }
</script>
<!-- Inclure le script -->
<script>
    function addLivraison() {
        // Create a new div to contain all inputs for a new livraison
        var livraisonDiv = document.createElement("div");
        livraisonDiv.classList.add("form-group", "livraison");

        // Create input for Nom de livrable
        var nomLabel = document.createElement("label");
        nomLabel.textContent = "Nom de livrable";

        var nomInput = document.createElement("input");
        nomInput.type = "text";
        nomInput.className = "form-control";
        nomInput.name = "livrable[]";
        nomInput.placeholder = "Nom de livrable";

        // Create select for livrable nature
        var natureLabel = document.createElement("label");
        natureLabel.textContent = "Nature du livrable";

        var natureSelect = document.createElement("select");
        natureSelect.className = "form-control";
        natureSelect.name = "livrable_nature[]";

        // Add options to the select
        @foreach($livrableNatures as $nature)
            var option = document.createElement("option");
            option.value = "{{ $nature->id }}";
            option.text = "{{ $nature->nom }}";
            natureSelect.appendChild(option);
        @endforeach

        // Create textarea for livrable description
        var descriptionLabel = document.createElement("label");
        descriptionLabel.textContent = "Description du livrable";

        var descriptionTextarea = document.createElement("textarea");
        descriptionTextarea.classList.add("form-control", "livrableDescription");
        descriptionTextarea.name = "livrable_description[]";
        descriptionTextarea.rows = "3";
        descriptionTextarea.placeholder = "Description du livrable";

        // Append all inputs to the livraisonDiv
        livraisonDiv.appendChild(nomLabel);
        livraisonDiv.appendChild(nomInput);
        livraisonDiv.appendChild(natureLabel);
        livraisonDiv.appendChild(natureSelect);
        livraisonDiv.appendChild(descriptionLabel);
        livraisonDiv.appendChild(descriptionTextarea);

        // Append the livraisonDiv to the container
        document.getElementById("livrables-container").appendChild(livraisonDiv);
    }
</script>
<script>
    function addRessource() {
        // Create a new div to contain all inputs for a new resource
        var ressourceDiv = document.createElement("div");
        ressourceDiv.classList.add("ressource");

        // Create label for resource name
        var nomLabel = document.createElement("label");
        nomLabel.textContent = "Nom de la ressource";

        // Create input for resource name
        var nomInput = document.createElement("input");
        nomInput.type = "text";
        nomInput.className = "form-control";
        nomInput.name = "ressource_nom[]";
        nomInput.placeholder = "Nom de la ressource";

        // Create label for resource link
        var lienLabel = document.createElement("label");
        lienLabel.textContent = "Lien de la ressource";

        // Create input for resource link
        var lienInput = document.createElement("input");
        lienInput.type = "text";
        lienInput.className = "form-control";
        lienInput.name = "ressource_lien[]";
        lienInput.placeholder = "Lien de la ressource";

        // Create label for resource description
        var descriptionLabel = document.createElement("label");
        descriptionLabel.textContent = "Description de la ressource";

        // Create textarea for resource description
        var descriptionTextarea = document.createElement("textarea");
        descriptionTextarea.classList.add("form-control");
        descriptionTextarea.name = "ressource_description[]";
        descriptionTextarea.rows = "3";
        descriptionTextarea.placeholder = "Description de la ressource";

        // Append labels and inputs to the ressourceDiv
        ressourceDiv.appendChild(nomLabel);
        ressourceDiv.appendChild(nomInput);
        ressourceDiv.appendChild(lienLabel);
        ressourceDiv.appendChild(lienInput);
        ressourceDiv.appendChild(descriptionLabel);
        ressourceDiv.appendChild(descriptionTextarea);

        // Append the ressourceDiv to the container
        document.getElementById("ressources-container").appendChild(ressourceDiv);
    }
</script>






    <script>
            ClassicEditor
                .create(document.querySelector('#inputDescription'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#inputTravailafaire'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#inputcriterevalidation'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });

    </script>
    


<!-- Place the following <script> and <textarea> tags your HTML's <body> -->

<script>
    document.getElementById('checkAll').addEventListener('change', function () {
        var checkboxes = document.querySelectorAll('.form-check-input');  // Select all checkboxes
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;  // Set checked state based on "checkAll"
        }
    });

</script>

@endsection