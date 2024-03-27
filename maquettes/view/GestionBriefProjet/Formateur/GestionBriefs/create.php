<!DOCTYPE html>
<html lang="fr">

<!-- Inclure l'en-tête -->
<?php include_once "../../../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../../../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../../../layouts/aside.php" ?>

        <div class="content-wrapper" style="min-height: 1302.4px;">

            <div class="content-header">
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Ajoute un brief projet</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <!-- your steps here -->
                                            <div class="step" data-target="#description-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="description-part" id="description-part-trigger">
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">Description</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#competence-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="competence-part" id="competence-part-trigger">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">Competence</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#affectation-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="affectation-part" id="affectation-part-trigger">
                                                    <span class="bs-stepper-circle">3</span>
                                                    <span class="bs-stepper-label">Affectation</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <!-- your steps content here -->
                                            <div id="description-part" class="content" role="tabpanel"
                                                aria-labelledby="description-part-trigger">
                                                <div class="form-group">
                                                    <label for="titre">Titre du brief</label>
                                                    <input type="text" class="form-control" id="titre" name="titre">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" id="description" name="description"
                                                        rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="travail">Travail à faire</label>
                                                    <textarea class="form-control" id="travail" name="travail"
                                                        rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="critere">Critère de validation</label>
                                                    <textarea class="form-control" id="critere" name="critere"
                                                        rows="3"></textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label for="dateDebut">Date de début</label>
                                                    <input type="date" class="form-control" id="dateDebut"
                                                        name="dateDebut">
                                                </div>
                                                <div class="form-group">
                                                    <label for="dateFin">Date de fin</label>
                                                    <input type="date" class="form-control" id="dateFin" name="dateFin">
                                                </div>
                                                <div class="form-group">
                                                    <label for="resources">Ressources</label>
                                                    <div id="link-container">
                                                        <input type="url" class="form-control input-small" id="new-link"
                                                            placeholder="Enter Link URL">
                                                        <button class="btn btn-secondary" onclick="addLink()">Add
                                                            Link</button>
                                                    </div>
                                                    <ul id="link-list"></ul>
                                                </div>
                                                <div class="form-group">
                                                    <label for="resources">Ressources</label>
                                                    <input type="text" class="form-control" id="resources"
                                                        name="resources[]" placeholder="Enter a link" multiple>
                                                </div>


                                                <button class="btn btn-primary"
                                                    onclick="stepper.next()">Suivant</button>
                                            </div>
                                            <div id="competence-part" class="content" role="tabpanel"
                                                aria-labelledby="projet-part-trigger">
                                                <div class="form-group">
                                                    <h2>Compétences</h2>
                                                    <p>Veuillez sélectionner les compétences que vous possédez.</p>
                                                    <div class="d-flex flex-column mt-3" data-toggle="buttons">
                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label class="btn btn-secondary">
                                                                    <input type="checkbox" name="competence"
                                                                        id="competence_mobile" value="imiter">
                                                                    <i class="fas fa-mobile-alt"></i> Maquetter une application mobile
                                                                </label>
                                                                <select name="competence_mobile_level"
                                                                    class="form-control">
                                                                    <option value="imiter">Imiter</option>
                                                                    <option value="adapter">Adapter</option>
                                                                    <option value="transposer">Transposer</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label class="btn btn-secondary">
                                                                    <input type="checkbox" name="competence"
                                                                        id="competence_db" value="adapter">
                                                                    <i class="fas fa-database"></i>Manipuler une base de données - perfectionnement
                                                                </label>
                                                                <select name="competence_db_level" class="form-control">
                                                                    <option value="imiter">Imiter</option>
                                                                    <option value="adapter">Adapter</option>
                                                                    <option value="transposer">Transposer</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label class="btn btn-secondary">
                                                                    <input type="checkbox" name="competence"
                                                                        id="competence_backend" value="transposer">
                                                                    <i class="fas fa-code"></i>  Développer la partie back-end d’une application web ou web mobile - perfectionnement
                                                                </label>
                                                                <select name="competence_backend_level"
                                                                    class="form-control">
                                                                    <option value="imiter">Imiter</option>
                                                                    <option value="adapter">Adapter</option>
                                                                    <option value="transposer">Transposer</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label class="btn btn-secondary">
                                                                    <input type="checkbox" name="competence"
                                                                        id="competence_deploy" value="other">
                                                                    <i class="fas fa-cogs"></i> Collaborer à la gestion d’un projet informatique et à l’organisation de l’environnement de développement - perfectionnement
                                                                </label>
                                                                <select name="competence_deploy_level"
                                                                    class="form-control">
                                                                    <option value="imiter">Imiter</option>
                                                                    <option value="adapter">Adapter</option>
                                                                    <option value="transposer">Transposer</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label class="btn btn-secondary">
                                                                    <input type="checkbox" name="competence"
                                                                        id="competence_deploy" value="other">
                                                                    <i class="fas fa-cogs"></i>  Développer une application mobile native, avec Android et React Native
                                                                </label>
                                                                <select name="competence_deploy_level"
                                                                    class="form-control">
                                                                    <option value="imiter">Imiter</option>
                                                                    <option value="adapter">Adapter</option>
                                                                    <option value="transposer">Transposer</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label class="btn btn-secondary">
                                                                    <input type="checkbox" name="competence"
                                                                        id="competence_deploy" value="other">
                                                                    <i class="fas fa-cogs"></i> Préparer et exécuter les plans de tests d’une application
                                                                </label>
                                                                <select name="competence_deploy_level"
                                                                    class="form-control">
                                                                    <option value="imiter">Imiter</option>
                                                                    <option value="adapter">Adapter</option>
                                                                    <option value="transposer">Transposer</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label class="btn btn-secondary">
                                                                    <input type="checkbox" name="competence"
                                                                        id="competence_deploy" value="other">
                                                                    <i class="fas fa-cogs"></i>  Préparer et exécuter le déploiement d’une application web et mobile - perfectionnement
                                                                </label>
                                                                <select name="competence_deploy_level"
                                                                    class="form-control">
                                                                    <option value="imiter">Imiter</option>
                                                                    <option value="adapter">Adapter</option>
                                                                    <option value="transposer">Transposer</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <button class="btn btn-primary"
                                                    onclick="stepper.previous()">Previous</button>
                                                <button class="btn btn-primary"
                                                    onclick="stepper.next()">Suivant</button>
                                            </div>
                                            <div id="affectation-part" class="content" role="tabpanel"
                                                aria-labelledby="affectation-part-trigger">
                                                <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
  <label class="form-check-label" for="flexCheckIndeterminate">
    Indeterminate checkbox
  </label>
</div>
                                                <div class="d-flex flex-column mt-3 form-check">
                                                    <input type="checkbox" id="checkAll">Check All<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="sarsri imrane">
                                                        <label class="form-check-label" for="flexCheckIndeterminate">Sarsri Imrane<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="Grain Reda">  <label class="form-check-label" for="flexCheckIndeterminate">Grain
                                                    Reda<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="Bouik Hussein">  <label class="form-check-label" for="flexCheckIndeterminate">Bouik Hussein<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="Assaid Amina">  <label class="form-check-label" for="flexCheckIndeterminate">Assaid Amina<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="zaani hamza">  <label class="form-check-label" for="flexCheckIndeterminate">Zaani
                                                    Hamza<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="FAIZ SAFAA">  <label class="form-check-label" for="flexCheckIndeterminate">Faiz
                                                    Safaa<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="El ajoumi Mohammed aymane">  <label class="form-check-label" for="flexCheckIndeterminate">El Ajoumi Mohammed Aymane<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="Lharrak Adnan">  <label class="form-check-label" for="flexCheckIndeterminate">Lharrak Adnan<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="YASMINE DAIFANE">  <label class="form-check-label" for="flexCheckIndeterminate">Yasmine Daifane<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="BEN NASAR ADNAN">  <label class="form-check-label" for="flexCheckIndeterminate">Ben Nasar Adnan<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="Achaou Hamid">  <label class="form-check-label" for="flexCheckIndeterminate">Achaou Hamid<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="Betroji Jalil">  <label class="form-check-label" for="flexCheckIndeterminate">Betroji Jalil<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="lamchatab amine">  <label class="form-check-label" for="flexCheckIndeterminate">Lamchatab Amine<br>
                                                    <input type="checkbox" name="apprenants[]" class="apprenant form-check-input" id="flexCheckIndeterminate"
                                                        value="Boukhar Soufiane">Boukhar Soufiane<br>
                                                </div>

                                                <button class="btn btn-primary"
                                                    onclick="stepper.previous()">Previous</button>
                                                <a href="./index.php" type="submit" class="btn btn-primary">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Include footer -->
    <?php include_once "../../../layouts/footer.php" ?>




    <!-- Inclure le pied de page -->
    <?php include_once "../../../layouts/footer.php" ?>

    </div>

    <!-- Inclure le script -->
    <?php include_once "../../../layouts/script-link.php" ?>
    <script>
        function addLink() {
            var linksContainer = document.getElementById("links-container");
            var linkInput = document.createElement("input");
            linkInput.type = "text";
            linkInput.className = "form-control mt-2";
            linkInput.name = "liens[]";
            linkInput.placeholder = "Enter a link";
            linksContainer.appendChild(linkInput);
        }
    </script>
    <script>

        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
    <script>
        document.getElementById('checkAll').addEventListener('change', function () {
            var checkboxes = document.querySelectorAll('input.apprenant');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
    </script>
    <script>
        function addLink() {
            // Get the value of the input field
            const newLink = document.getElementById("new-link").value;

            // Validate the URL format (optional)
            if (!newLink.trim() || !/^https?:\/\/.+/.test(newLink)) {
                alert("Please enter a valid URL.");
                return;
            }

            // Create a new list item element
            const listItem = document.createElement("li");

            // Create an anchor tag with the entered URL
            const link = document.createElement("a");
            link.href = newLink;
            link.textContent = newLink; // Display the URL as the link text

            // Add the anchor tag to the list item
            listItem.appendChild(link);

            // Get the link list element
            const linkList = document.getElementById("link-list");

            // Add the list item to the link list
            linkList.appendChild(listItem);

            // Clear the input field for the next link
            document.getElementById("new-link").value = "";
        }
    </script>
</body>

</html>