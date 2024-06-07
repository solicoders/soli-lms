<!DOCTYPE html>
<html lang="fr">
    <?php include_once "../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../layouts/aside.php" ?>

<div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Les briefs projets</h1>
                            </div>
                            <div class="col-sm-6">
                                <a href="./create.php" type="button" class="btn btn-primary float-right">
                                    <i class="fas fa-plus"></i> Ajouter un brief projet
                                </a>
                            </div>
                                                    </div>
                                                </div><!-- /.container-fluid -->
                                            </section>

                                            <!-- Contenu principal -->
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <!-- Boîte par défaut -->
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Tableau des brief projets</h3>                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-3">
                                                                            <label for="skill">Compétence :</label>
                                                                            <select class="form-control" id="skill">
                                                                                <option value="">Toutes</option>
                                                                                <option value="C1">Maquetter une application mobile</option>
                                                                                <option value="C2">Manipuler une base de données - perfectionnement</option>
                                                                                <option value="C3">Développer la partie back-end d’une application web ou web mobile - perfectionnement</option>
                                                                                <option value="C4">Collaborer à la gestion d’un projet informatique et à l’organisation de l’environnement de développement - perfectionnement</option>
                                                                                <option value="C5">Développer une application mobile native, avec Android et React Native</option>
                                                                                <option value="C6">Préparer et exécuter les plans de tests d’une application</option>
                                                                                <option value="C7">Préparer et exécuter le déploiement d’une application web et mobile - perfectionnement</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label for="projectName">Rechercher</label>
                                                                            <input type="text" class="form-control" id="projectName" placeholder="Nom du projet :...">
                                                                        </div>
                                                                    </div>
                                                                        
                                                                    </div>
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Titre</th>
                                                                                <th>Compétence</th>
                                                                                <th>Date debut</th>
                                                                                <th>Date de fin</th>
                                                                                <th>Actions</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Lab-Markdown</td>
                                                                                <td><ul>
                                                                                    <li>C1. Maquetter une application mobile <span>(Imiter)</span></li>
                                                                                    <li>C2. Manipuler une base de données <span>(Adapter)</span> </li>
                                                                                </ul></td>
                                                                                <td>2021-12-01</td>
                                                                                <td>2021-12-8</td>
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
                                                                    </div>                                                                </div>
                                                                <!-- /.card-footer-->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- /.content -->
                                        </div>

                                        </div>
</body>

<!-- get script -->
<?php include_once "../layouts/script-link.php"; ?>

</html>