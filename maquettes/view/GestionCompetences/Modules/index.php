<!DOCTYPE html>
<html lang="fr">
<?php include_once "../../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../../layouts/aside.php" ?>

        <div class="content-wrapper" style="min-height: 1302.4px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Liste des Modules</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-right">
                            <a href="create.html" style="background-color: #17A2B8;" class="btn">
                                <i class="fas fa-plus"></i> Ajouter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header col-md-12">
                                <div class="d-flex justify-content-between">
                                    <div class="btn-group mr-3">
                                        <button type="button" class="btn btn-default dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-filter text-dark pr-2 border-right"></i>
                                            Filière
                                        </button>
                                        <input type="hidden">
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" value="1">Développeur Web – mode
                                                Bootcamp</a>
                                            <a class="dropdown-item" href="#" value="2">Développeur Mobile – mode
                                                Bootcamp</a>
                                        </div>


                                    </div>



                                    <div class=" p-0">
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="search-input" id="search-input"
                                                class="form-control" placeholder="Recherche">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0" style="overflow-x: auto;">
                                <table class="table table-striped text-nowrap table-compétence">
                                    <thead>
                                        <tr>
                                            <th>N° </th>
                                            <th>MODULE</th>
                                            <th>Masse horaire</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>M01</th>
                                            <td style="text-align: start;">Communication écrite et orale</td>
                                            <td style="text-align: start;">30 hours</td>
                                            <td class="">
                                                <a href="détails.html" class="btn btn-sm btn-default">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="Edit.html" class="btn btn-sm btn-default mx-1">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>M02</th>
                                            <td style="text-align: start;">Anglais technique</td>
                                            <td style="text-align: start;">30 hours</td>
                                            <td class="">
                                                <a href="détails.html" class="btn btn-sm btn-default">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="Edit.html" class="btn btn-sm btn-default mx-1">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>M03</th>
                                            <td style="text-align: start;">Culture d'entreprenariat</td>
                                            <td style="text-align: start;">30 hours</td>
                                            <td class="">
                                                <a href="détails.html" class="btn btn-sm btn-default">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="Edit.html" class="btn btn-sm btn-default mx-1">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>M04</th>
                                            <td style="text-align: start;">Compétences comportementales et sociales (Soft Skills)</td>
                                            <td style="text-align: start;">30 hours</td>
                                            <td class="">
                                                <a href="détails.html" class="btn btn-sm btn-default">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="Edit.html" class="btn btn-sm btn-default mx-1">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>M05</th>
                                            <td style="text-align: start;">Initiation à l’environnement du développement mobile par la pédagogie active</td>
                                            <td style="text-align: start;">70 hours</td>
                                            <td class="">
                                                <a href="détails.html" class="btn btn-sm btn-default">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="Edit.html" class="btn btn-sm btn-default mx-1">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>M06</th>
                                            <td style="text-align: start;">Maquettage d’une application mobile</td>
                                            <td style="text-align: start;">50 hours</td>
                                            <td class="">
                                                <a href="détails.html" class="btn btn-sm btn-default">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="Edit.html" class="btn btn-sm btn-default mx-1">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <input type="hidden" id='page' value="1">
                                </table>

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
                    </div>
                </div>
            </div>
        </section>
    </div>

        </section>
        <!-- /.content -->
    </div>

    </div>
</body>

<!-- get script -->
<?php include_once "../../layouts/script-link.php"; ?>

</html>