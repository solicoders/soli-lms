@extends('layouts.app')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Gestion des formations</h1>
                        </div>
                        <div class="col-sm-6">
                            <a href="./create.php" type="button" class="btn btn-primary float-right">
                                <i class="fas fa-plus"></i> Ajouter une formation
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="content px-3">


                <div class="clearfix"></div>

                <div class="card-header">
                    <div class="col-sm-12 d-flex justify-content-between p-0">
                        <div>
                        </div>
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input type="search" class="form-control form-control-lg" id="search"
                                    placeholder="Recherche">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card" id="table-container">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped" id="dossier-patients-table">
                                <thead>
                                    <tr>
                                        <th>Nom de formation</th>
                                        <th>Lien</th>
                                        <th>Description</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Laravel</td>
                                        <td>https://grafikart.fr/</td>
                                        <td>Laravel est un framework web PHP open-source utilisé.</td>
                                        <td>
                                            <a href="./show.php" class='btn btn-default btn-sm'>
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="./edit.php" class="btn btn-sm btn-default"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PHP</td>
                                        <td>https://grafikart.fr/</td>
                                        <td>PHP (Hypertext Preprocessor)...</td>
                                        <td>
                                            <a href="./show.php" class='btn btn-default btn-sm'>
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="./edit.php" class="btn btn-sm btn-default"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Html5</td>
                                        <td>https://grafikart.fr/</td>
                                        <td>HTML (HyperText Markup Language) ...</td>
                                        <td>
                                            <a href="./show.php" class='btn btn-default btn-sm'>
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="./edit.php" class="btn btn-sm btn-default"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CSS</td>
                                        <td>https://grafikart.fr/</td>
                                        <td>CSS(Hypertext Preprocessor)...</td>
                                        <td>
                                            <a href="./show.php" class='btn btn-default btn-sm'>
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="./edit.php" class="btn btn-sm btn-default"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Figma</td>
                                        <td>https://grafikart.fr/</td>
                                        <td>Figma...</td>
                                        <td>
                                            <a href="./show.php" class='btn btn-default btn-sm'>
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="./edit.php" class="btn btn-sm btn-default"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


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

                    <!-- Modal Import -->
                    <div class="modal fade" id="importModel" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Imprimer </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="http://127.0.0.1:8000/import" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token"
                                            value="YQv3AiqNcUn2SoqIBfgp9fxuhbqdAQNqUbSERFzA" autocomplete="off"> <input
                                            type="file" name="file" class="form-control">
                                        <br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annuler</button>
                                            <button class="btn btn-success">Importer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
