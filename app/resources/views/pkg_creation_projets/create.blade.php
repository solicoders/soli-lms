@extends('layouts.app')
    @section('content')

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
                                            <div class="bs-stepper-header" role="tablist">

                                                @include('pkg_creation_projets.partials.description-part')
                                                <div class="line"></div>
                                                @include('pkg_creation_projets.partials.competence-part')
                                                <div class="line"></div>
                                                @include('pkg_creation_projets.partials.affectation-part')
                                            </div>
                                            <div class="bs-stepper-content">
                                                <!-- your steps content here -->
                                                <div id="description-part" class="content active dstepper-block" role="tabpanel"
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



                                                    <button class="btn btn-primary"
                                                        onclick="stepper.next()">Suivant</button>
                                                </div>
                                                <div id="competence-part" class="content active dstepper-block" role="tabpanel"
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
                                                    <button class="btn btn-primary"
                                                        onclick="stepper.previous()">Précédent</button>
                                                    <button class="btn btn-primary"
                                                        onclick="stepper.next()">Suivant</button>
                                                </div>
                                                <div id="affectation-part" class="content active dstepper-block" role="tabpanel"
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

                                                    <button class="btn btn-primary"
                                                        onclick="stepper.previous()">Précédent</button>
                                                    <a href="./index.php" type="submit"
                                                        class="btn btn-primary">Ajouter</a>
                                                </div>
                                                </d>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


@endsection
