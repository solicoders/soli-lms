<!DOCTYPE html>
<html lang="fr">
<?php include_once "../../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../../layouts/aside.php" ?>



        <div class="content-wrapper pt-4" style="min-height: 1302.4px;">

            <div class="content-header">

            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card card-info">
                                <div class="card-header">
                                    <h2 class="card-title"> <i class="nav-icon fas fa-tasks"></i> Modifier une module</h2>
                                </div>
                                <form method="POST" class="container pt-2" action="">


                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="Filieres" class="form-label">Filieres</label>
                                            <select name="Filieres" id="Filieres" class="form-control">
                                                <option value="1">Développeur Mobile – mode Bootcamp</option>
                                                <option value="2">Développeur Web – mode Bootcamp</option>
                                            </select>
                                            <div class="invalid-feedback text-danger"></div>
                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="N">N°</label>
                                            <input name="N" type="text" class="form-control" id="N" value="M01">

                                            <div class="text-danger"></div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="module">MODULE</label>
                                            <input name="module" type="text" class="form-control" id="module" value="Communication écrite et orale">

                                            <div class="text-danger"></div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="MasseHoraire">Masse horaire</label>
                                            <input name="MasseHoraire" type="text" class="form-control" id="MasseHoraire" value="30 hours">

                                            <div class="text-danger"></div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="Description">Description</label>
                                            <textarea name="description" id="inputDescription" class="form-control"></textarea>

                                            <div class="text-danger">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="" class="btn btn-default">Cancel</a>
                                        <button href="/view/GestionCompetences/Competences/index.php" type="submit" class="btn btn-info mx-2">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>




    </div>

    </div>
</body>

<!-- get script -->
<?php include_once "../../layouts/script-link.php"; ?>

</html>