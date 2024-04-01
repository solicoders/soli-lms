<!DOCTYPE html>
<html lang="fr">

<!-- Inclure l'en-tête -->
<?php include_once "../../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../../layouts/aside.php" ?>

        <div class="content-wrapper" style="min-height: 1302.4px;">

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
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Livrable</th>
                                                <th>Lien</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Presentation</td>
                                                <td><input type="text" name="lien[]" class="form-control"
                                                        value="https://example.com/presentation"></td>
                                            </tr>
                                            <tr>
                                                <td>Code <a href="https://example.com/code"></a></td>
                                                <td><input type="text" name="lien[]" class="form-control"
                                                        value="https://example.com/code"></td>
                                            </tr>
                                            <tr>
                                                <td>Etat </td>
                                                <td><select class="form-control" id="project">
                                            <option value="">Tous</option>
                                            <option value="à faire">à faire</option>
                                            <option value="en cours">en cours</option>
                                            <option value="en pause">en pause</option>
                                            <option value="terminé">terminé</option>
</td>
                                        
                                            </tr>
                                           
                                        </tbody>
                                      
                                    </table>
                                </div>
                                <div class="text-right m-5">
                                            <a type="submit" href="index.php" class="btn btn-primary">Valider le brief</a>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                  
            </section>
        </div>
    </div>

    <!-- Include footer -->
    <?php include_once "../../layouts/footer.php" ?>




    <!-- Inclure le pied de page -->
    <?php include_once "../../layouts/footer.php" ?>

    </div>

    <!-- Inclure le script -->
    <?php include_once "../../layouts/script-link.php" ?>
</body>

</html>