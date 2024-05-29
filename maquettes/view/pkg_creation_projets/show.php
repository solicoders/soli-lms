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
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Détails du projet</h1>
                        </div>
                        <div class="col-sm-6">
                            <a href="./edit.php" class="btn btn-default float-right"><i class="far fa-edit"></i>
                                Modifier</a>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-sm-12">
                                        <label for="nom">Nom :</label>
                                        <p>Exemple de projet de développement Web</p>
                                    </div>

                                    <!-- Champ Compétences -->
                                    <div class="col-sm-12">
                                        <label for="competences">Compétences :</label>
                                        <ul>
                                            <li>C1. Maquetter une application mobile <span>(Imiter)</span></li>
                                            <li>C2. Manipuler une base de données <span>(Adapter)</span> </li>
                                        </ul>
                                    </div>

                                    <!-- Champ Travail à faire -->
                                    <div class="col-sm-12">
                                        <label for="travail">Travail à faire :</label>
                                        <p>Concevoir et développer un site Web responsive pour une entreprise fictive.
                                        </p>
                                    </div>

                                    <!-- Champ Critères de validation -->
                                    <div class="col-sm-12">
                                        <label for="validation">Critères de validation :</label>
                                        <p>Le site Web doit être entièrement responsive, respecter les meilleures
                                            pratiques en développement Web et répondre aux exigences du client.</p>
                                    </div>

                                    <!-- Champ Date de début et de fin -->
                                    <div class="col-sm-12">
                                        <label for="date">Date :</label>
                                        <p>Date de début : 1er janvier 2024</p>
                                        <p>Date de fin : 31 mars 2024</p>
                                    </div>

                                    <!-- Champ Ressources -->
                                    <div class="col-sm-12">
                                        <label for="resources">Ressources :</label>
                                        <p><a href="https://exemple.com/ressources">https://exemple.com/ressources</a>
                                        </p>
                                    </div>

                                    <!-- Champ Référence -->
                                    <div class="col-sm-12">
                                        <label for="reference">Référence :</label>
                                        <p><a href="https://exemple.com/reference">https://exemple.com/reference</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>


        <!-- Inclure le pied de page -->
        <?php include_once "../../../layouts/footer.php" ?>

    </div>

    <!-- Inclure le script -->
    <?php include_once "../../../layouts/script-link.php" ?>
</body>

</html>