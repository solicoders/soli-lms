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
                            <div id="deliverable-form">
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
                                                value="Prototype">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="inputDescription"
                                                name="description" rows="3">Description du projet</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="travail">Travail à faire</label>
                                            <textarea class="form-control" id="inputTravailafaire"
                                                name="travail"
                                                rows="3">Concevoir et développer un site Web responsive pour le client</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="critere">Critère de validation</label>
                                            <textarea class="form-control" id="inputcriterevalidation"
                                                name="critere"
                                                rows="3">Le site Web doit être entièrement responsive, respecter les meilleures pratiques en développement Web et répondre aux exigences du client.</textarea>
                                        </div>
                                        <div class="form-group" id="deliverables-container">
                                            <label for="livrable">Nom de livrable</label>
                                            <input type="text" class="form-control mb-3"
                                                name="deliverable[]" placeholder="Nom de livrable"
                                                value="Presentation">
                                        </div>
                                        <button type="button" class="btn btn-primary"
                                            onclick="addInput()">Ajouter un autre livrable</button>



                                        <div class="form-group">
                                            <label for="dateDebut">Date de début</label>
                                            <input type="date" class="form-control" id="dateDebut"
                                                name="dateDebut" value="2022-01-01">
                                        </div>
                                        <div class="form-group">
                                            <label for="dateFin">Date de fin</label>
                                            <input type="date" class="form-control" id="dateFin"
                                                name="dateFin" value="2022-01-31">
                                        </div>
                                        <div class="form-group">
                                            <label for="project_resources">Resources</label>
                                            <div class="input-group mb-3">
                                                <input type="text"
                                                    class="form-control new-link-input resource-link"
                                                    placeholder="Enter a link">
                                                <div class="input-group-append">
                                                    <button type="button"
                                                        class="btn btn-outline-success add-link-btn">Ajouter
                                                        un
                                                        lien</button>
                                                </div>
                                            </div>
                                            <ul class="list-group linked-items resource-list">
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <label for="project_references">Reference</label>
                                            <div class="input-group mb-3">
                                                <input type="text"
                                                    class="form-control new-link-input reference-link"
                                                    placeholder="Enter a link">
                                                <div class="input-group-append">
                                                    <button type="button"
                                                        class="btn btn-outline-success add-link-btn">Ajouter
                                                        un
                                                        lien</button>
                                                </div>
                                            </div>
                                            <ul class="list-group linked-items reference-list">
                                            </ul>
                                        </div>




                                    </div>
                                    </div>
                                    <div class="step" id="step2" style="display:none;">
                                        <div id="competence-part"  role="tabpanel"
                                        aria-labelledby="projet-part-trigger">
                                        <div class="form-group">
                                            <h2>Compétences</h2>
                                            <p>Veuillez sélectionner les compétences que vous possédez.</p>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Competence</th>
                                                        <th>Niveaux</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="mr-2"
                                                                    name="competence" id="competence_mobile"
                                                                    value="imiter">
                                                                <i class="fas fa-mobile-alt"></i> Maquetter
                                                                une
                                                                application mobile
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <select name="competence_mobile_level"
                                                                class="form-control">
                                                                <option value="imiter">Imiter</option>
                                                                <option value="adapter">Adapter</option>
                                                                <option value="transposer">Transposer
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="mr-2"
                                                                    name="competence" id="competence_db"
                                                                    value="adapter">
                                                                <i class="fas fa-database"></i> Manipuler
                                                                une
                                                                base de données - perfectionnement
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <select name="competence_db_level"
                                                                class="form-control">
                                                                <option value="imiter">Imiter</option>
                                                                <option value="adapter">Adapter</option>
                                                                <option value="transposer">Transposer
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="mr-2"
                                                                    name="competence"
                                                                    id="competence_backend"
                                                                    value="transposer">
                                                                <i class="fas fa-code"></i> Développer la
                                                                partie
                                                                back-end d’une application web ou web mobile
                                                                -
                                                                perfectionnement
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <select name="competence_backend_level"
                                                                class="form-control">
                                                                <option value="imiter">Imiter</option>
                                                                <option value="adapter">Adapter</option>
                                                                <option value="transposer">Transposer
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="mr-2"
                                                                    name="competence" value="other" checked>
                                                                <i class="fas fa-cogs"></i> Collaborer à la
                                                                gestion d’un projet informatique et à
                                                                l’organisation de l’environnement de
                                                                développement
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <select name="competence_deploy_level"
                                                                class="form-control">
                                                                <option value="imiter">Imiter</option>
                                                                <option value="adapter">Adapter</option>
                                                                <option value="transposer">Transposer
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="mr-2"
                                                                    name="competence" value="other" checked>
                                                                <i class="fas fa-cogs"></i> Développer une
                                                                application web responsive avec HTML, CSS et
                                                                JavaScript
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <select name="competence_deploy_level"
                                                                class="form-control">
                                                                <option value="imiter">Imiter</option>
                                                                <option value="adapter">Adapter</option>
                                                                <option value="transposer">Transposer
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="mr-2"
                                                                    name="competence" value="other" checked>
                                                                <i class="fas fa-cogs"></i> Utiliser un
                                                                framework PHP pour le développement backend
                                                                (par
                                                                exemple, Laravel)
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <select name="competence_deploy_level"
                                                                class="form-control">
                                                                <option value="imiter">Imiter</option>
                                                                <option value="adapter">Adapter</option>
                                                                <option value="transposer">Transposer
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="mr-2"
                                                                    name="competence" value="other" checked>
                                                                <i class="fas fa-cogs"></i> Créer et gérer
                                                                une
                                                                base de données MySQL pour l'application web
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <select name="competence_deploy_level"
                                                                class="form-control">
                                                                <option value="imiter">Imiter</option>
                                                                <option value="adapter">Adapter</option>
                                                                <option value="transposer">Transposer
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                        </div>


                                    </div>                                    </div>
                                    <div class="step" id="step3" style="display:none;">
                                        <div id="affectation-part"  role="tabpanel"
                                        aria-labelledby="affectation-part-trigger">
                                        <div class="d-flex flex-column mt-3 form-check">
                                            <input type="checkbox" id="checkAll" class="form-check-input"
                                                id="flexCheckIndeterminate">
                                            <label class="form-check-label"
                                                for="flexCheckIndeterminate">Tout
                                                cocher<br>
                                                <?php
                                                $apprenants = [
                                                    "sarsri imrane",
                                                    "Grain Reda",
                                                    "Bouik Hussein",
                                                    "Assaid Amina",
                                                    "zaani hamza",
                                                    "FAIZ SAFAA",
                                                    "El ajoumi Mohammed aymane",
                                                    "Lharrak Adnan",
                                                    "YASMINE DAIFANE",
                                                    "BEN NASAR ADNAN",
                                                    "Achaou Hamid",
                                                    "Betroji Jalil",
                                                    "lamchatab amine",
                                                    "Boukhar Soufiane"
                                                ];
                                                ?>

                                                <div class="row">
                                                    <?php foreach ($apprenants as $apprenant): ?>
                                                        <div class="col-sm-4 mb-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="apprenants[]"
                                                                    value="<?php echo $apprenant; ?>" checked>
                                                                <label class="form-check-label"
                                                                    for="<?php echo $apprenant; ?>">
                                                                    <?php echo $apprenant; ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>

                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                    <button type="button" id="prevBtn" class="btn btn-secondary" onclick="nextPrev(-1, event)">Previous</button>
                                    <button type="button" id="nextBtn" class="btn btn-primary" onclick="nextPrev(1, event)">Next</button>
                                    <button type="submit" id="submitBtn" class="btn btn-primary" style="display:none;">Submit</button>
                                </form>

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
<script>
    // Add functionality for "Add Another Deliverable" button
    const addDeliverableButton = document.getElementById("addDeliverable");
    const deliverableForm = document.getElementById("deliverableForm");

    addDeliverableButton.addEventListener("click", function () {
        // Clone the existing deliverable group (including all its inputs)
        const newDeliverableGroup = deliverableForm.querySelector(".deliverable-group").cloneNode(true);

        // Clear the values of the cloned inputs to avoid pre-filled data
        newDeliverableGroup.querySelector("input").value = "";

        // Append the cloned group to the form
        deliverableForm.appendChild(newDeliverableGroup);
    });
</script>
<!-- Inclure le script -->
<script>
    function addInput() {
        // Create a new input element
        var input = document.createElement("input");
        input.type = "text";
        input.className = "form-control mb-3";
        input.name = "deliverable[]"; // Using array syntax for form submission
        input.placeholder = "Nom de livrable";

        // Append the new input to the container
        document.getElementById("deliverables-container").appendChild(input);
    }
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
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
<script>

    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
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
<script>
    // Get references to elements
    const addLinkButtons = document.querySelectorAll('.add-link-btn');
    const resourceList = document.querySelector('.resource-list');
    const referenceList = document.querySelector('.reference-list');

    // Function to add a new link
    function addNewLink(event) {
        const newLinkInput = event.target.parentElement.parentElement.querySelector('.new-link-input');
        const newLinkValue = newLinkInput.value.trim();
        const targetList = event.target.parentElement.parentElement.nextElementSibling;

        if (newLinkValue) {
            const linkedItem = document.createElement('li');
            linkedItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');

            const linkText = document.createElement('span');
            linkText.textContent = newLinkValue;

            const removeLinkBtn = document.createElement('button');
            removeLinkBtn.classList.add('btn', 'btn-sm', 'btn-danger');
            removeLinkBtn.textContent = 'Remove';
            removeLinkBtn.addEventListener('click', function () {
                targetList.removeChild(linkedItem);
            });

            linkedItem.appendChild(linkText);
            linkedItem.appendChild(removeLinkBtn);

            targetList.appendChild(linkedItem);

            newLinkInput.value = '';
        }
    }

    // Add event listeners to the "Add Link" buttons
    addLinkButtons.forEach(button => button.addEventListener('click', addNewLink));

    // Populate existing links based on your project data
    const existingResources = [
        { url: "https://grafikart.fr/formations/laravel", text: "https://grafikart.fr/formations/laravel" },
        { url: "https://laracasts.com/series/phpunit-testing-in-laravel", text: "https://laracasts.com/series/phpunit-testing-in-laravel" },
    ];

    const existingReferences = [
        { url: "https://www.figma.com/file/Aciw4FSMe0rRsC3x1LH3R1/biblioth%C3%A8que-website?type=design&node-id=55%3A344&mode=design&t=bXJnh73iQoHkdkdj-1", text: "https://www.figma.com/file/Aciw4FSMe0rRsC3x1LH3R1/biblioth%C3%A8que-website?type=design&node-id=55%3A344&mode=design&t=bXJnh73iQoHkdkdj-1" },
        { url: "https://m3.material.io/", text: "https://m3.material.io/" },
    ];

    // Function to populate existing links (optional)
    function populateExistingLinks(linkData, targetList) {
        linkData.forEach(link => {
            const linkedItem = document.createElement('li');
            linkedItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');

            const linkText = document.createElement('span');
            linkText.textContent = link.text;

            const removeLinkBtn = document.createElement('button');
            removeLinkBtn.classList.add('btn', 'btn-sm', 'btn-danger');
            removeLinkBtn.textContent = 'Remove';
            removeLinkBtn.addEventListener('click', function () {
                targetList.removeChild(linkedItem);
            });

            linkedItem.appendChild(linkText);
            linkedItem.appendChild(removeLinkBtn);
            targetList.appendChild(linkedItem);
        });
    }

    populateExistingLinks(existingResources, resourceList);
    populateExistingLinks(existingReferences, referenceList);
</script>
@endsection
