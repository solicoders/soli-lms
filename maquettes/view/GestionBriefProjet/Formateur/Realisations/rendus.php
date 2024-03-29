<!DOCTYPE html>
<html lang="fr">
<?php include_once "../../../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../../../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../../../layouts/aside.php" ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Les rendus</h1>
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
                                    <h3 class="card-title">Projet : Gestion d'une agence d'immeuble</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Réduire">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            title="Supprimer">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-4 mt-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Rechercher...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Apprenant</th>
                                            <th>Livrables Rendus</th>
                                            <th>Etat de validation</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ahmed</td>
                                            <td class="rendus">
                                                <a href="">
                                                    <i class="fa-brands fa-github"></i> Github
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-google-drive"></i> Drive
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-figma"></i> Figma
                                                </a>
                                            </td>
                                            <td>
                                            <span class="validation-badge badge badge-success">Validé</span>
                                            </td>
                                            <td class='actions'>
                                                <a href="re-evaluate.php" class="btn btn-warning btn-sm">Re-évaluer</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Younes</td>
                                            <td class="rendus">
                                                <a href="">
                                                    <i class="fa-brands fa-github"></i> Github
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-google-drive"></i> Drive
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-figma"></i> Figma
                                                </a>
                                            </td>
                                            <td>
                                            <span class="validation-badge badge badge-success">Validé</span>

                                            </td>
                                            <td class='actions'>
                                                <a href="re-evaluate.php" class="btn btn-warning btn-sm">Re-évaluer</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Amal</td>
                                            <td class="rendus">
                                                <a href="">
                                                    <i class="fa-brands fa-github"></i> Github
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-google-drive"></i> Drive
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-figma"></i> Figma
                                                </a>
                                            </td>
                                            <td>
                                            <span class="validation-badge badge badge-secondary">Non Validé</span>

                                            </td>
                                            <td class='actions'>
                                                <a href="/validate.php" class="btn btn-primary btn-sm">Valider le brief</a>
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
<?php include_once "../../../layouts/script-link.php"; ?>

</html>