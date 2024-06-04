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
                                    <h3 class="card-title">Validation : lab-markdown</h3>
                                </div>
                                <div class="card-body p-0">
                                    <!-- form -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nom">Nom: </label> bouik
                                        </div>
                                        <div class="form-group">
                                            <label for="prenom">Prénom: </label> hussein
                                        </div>
                                        <div class="form-group">
                                            <label for="livrables">Les livrables:</label>
                                            <ul class="list-group list-group-horizontal d-flex flex-row">
                                                <li class="list-group-item mr-2">
                                                    <strong>Code:</strong> <a href=""><i class="fab fa-github"></i>
                                                        Github</a>
                                                </li>
                                                <li class="list-group-item mr-2">
                                                    <strong>Rapport:</strong> <a href=""><i
                                                            class="fab fa-google-drive"></i> Drive</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Maquette:</strong> <a href=""><i class="fab fa-figma"></i>
                                                        Figma</a>
                                                </li>
                                            </ul>

                                        </div>
                                        <form action="index.php">
                                            <table class="table table-bordered ">
                                                <thead>
                                                    <tr>
                                                        <th>Compétence</th>
                                                        <th>Niveau</th>
                                                        <th><i class="fas fa-check"></i></th>
                                                        <th><i class="fas fa-times"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Maquetter une application mobile</td>
                                                        <td>
                                                            <select name="competence_mobile_level" class="form-control">
                                                                <option value="imiter">Imiter</option>
                                                                <option value="adapter">Adapter</option>
                                                                <option value="transposer">Transposer</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                        <input type="radio" name="competence_backend_level1" value="imiter"> 
                                                        </td>
                                                        <td>
                                                        <input type="radio" name="competence_backend_level1" value="adapter"> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Manipuler une base de données - perfectionnement</td>
                                                        <td>
                                                            <select name="competence_database_level"
                                                                class="form-control">
                                                                <option value="imiter">Imiter</option>
                                                                <option value="adapter">Adapter</option>
                                                                <option value="transposer">Transposer</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="competence_backend_level2" value="imiter" class="form-check-input">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="competence_backend_level2" value="adapter" class="form-check-input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Développer la partie back-end d’une application web ou web
                                                            mobile - perfectionnement</td>
                                                        <td>
                                                            <select name="competence_backend_level"
                                                                class="form-control">
                                                                <option value="imiter">Imiter</option>
                                                                <option value="adapter">Adapter</option>
                                                                <option value="transposer">Transposer</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                        <input type="radio" name="competence_backend_level3" value="imiter"> 
                                                        </td>
                                                        <td>
                                                        <input type="radio" name="competence_backend_level3" value="adapter"> 
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-right m-5">
                                                <button type="submit" class="btn btn-primary">Valider le brief</button>
                                            </div>
                                        </form>
                                    </div>



                                    <!-- Include footer -->
                                    <?php include_once "../../../layouts/footer.php" ?>




                                    <!-- Inclure le pied de page -->
                                    <?php include_once "../../../layouts/footer.php" ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>





    <!-- Inclure le script -->
    <?php include_once "../../../layouts/script-link.php" ?>
</body>

</html>