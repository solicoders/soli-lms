<!DOCTYPE html>
<html lang="en">
<?php include_once "../../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

<!-- Site wrapper -->
<div class="wrapper">

    <!-- Navigation -->
    <?php include_once "../../layouts/nav.php" ?>
    <!-- Barre latérale -->
    <?php include_once "../../layouts/aside.php" ?>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <section class="content-header">
                    <div class="container-fluid ">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Liste des Formateurs</h1>
                            </div>
                            <div class="col-sm-6">
                                <a href="./create.php" type="button" class="btn btn-primary float-right">
                                    <i class="fas fa-plus"></i> Ajouter un Formateur
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Numéro de formateur</th>
                                    <th>Spécialité</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Essaraj</td>
                                    <td>Fouad</td>
                                    <td>123456</td>
                                    <td>Professeur</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chebbab</td>
                                    <td>Fatine</td>
                                    <td>123456</td>
                                    <td>Professeure</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Souklabi</td>
                                    <td>Abdellatif</td>
                                    <td>123456</td>
                                    <td>Professeur</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
  
</div>
</body>

<?php include_once "../../layouts/script-link.php"; ?>
</html>
