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
                    <div class="card-header col-md-12"> 
                        <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                            <input type="text" name="table_search" id="table_search" class="form-control float-right" placeholder="Recherche">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <!-- <div class="input-group input-group-sm float-sm-left col-md-3 p-0">
                            <select class="form-control " id="filterSelect">
                                <option value="">Toutes les spécialités</option>
                                <option value="option1">Professeur</option>
                                <option value="option2">Responsable</option>
                                <option value="option3">Secrétaire Générale</option>
                            </select>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Numéro de téléphone</th>
                                    <th>Spécialité</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Essaraj</td>
                                    <td>Fouad</td>
                                    <td>0612345689</td>
                                    <td>Professeur de développement Mobile</td>
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
                                    <td>0612345689</td>
                                    <td>Professeure de développement Web</td>
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
                                    <td>0612345689</td>
                                    <td>Professeur d'entrepreneuriat</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>EL Masoudi</td>
                                    <td>Abdelouhabe</td>
                                    <td>0612345689</td>
                                    <td>Professeur de développement Web</td>
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
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center p-2">
                            <div class="d-flex align-items-center mb-2">
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-download"></i> IMPORT
                                </button>
                                <button type="button" class="btn btn-default btn-sm mt-0 mx-2">
                                    <i class="fas fa-upload"></i> EXPORT
                                </button>
                            </div>
                            <div class="mr-5">
                                <ul class="pagination  m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
  
</div>
</body>

<?php include_once "../../layouts/script-link.php"; ?>
</html>
