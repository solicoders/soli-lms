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
                                <h1>Liste des Apprenants</h1>
                            </div>
                            <div class="col-sm-6">
                                <a href="./create.php" type="button" class="btn btn-primary float-right">
                                    <i class="fas fa-plus"></i> Ajouter un Apprenant
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
                                    <th>Numéro d'étudiant</th>
                                    <th>Classe</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Grain</td>
                                    <td>Reda</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>jalil	</td>
                                    <td>Betroji</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Assaid</td>
                                    <td>Amina</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Safaa</td>
                                    <td>Faiz</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Achaou</td>
                                    <td>Hamid</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Soufian</td>
                                    <td>Boukhar</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>daifane</td>
                                    <td>Yasmine</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>lamchatab</td>
                                    <td>Amine</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>bouik</td>
                                    <td>Hussein</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>harrak</td>
                                    <td>Adnan</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>sarsri</td>
                                    <td>Imrane</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
                                    <td class="text-center">
                                        <a href="./show.php" class='btn btn-default btn-sm'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ben nasar</td>
                                    <td>Adnan</td>
                                    <td>123456</td>
                                    <td>DMB 101</td>
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