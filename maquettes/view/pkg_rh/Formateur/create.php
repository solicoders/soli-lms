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
                                <h1>Créer un nouvel Formateur</h1>
                            </div>
                        </div>
                    </div>
                </section>
                
                <div class="card">
                    <div class="card-body">
                        <form id="createPersonnelForm">
                            <!-- Personal Information -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" value="Souklabi" id="nom" name="nom">
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" class="form-control" value="Abdellatif" id="prenom" name="prenom">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_naissance">Date de Naissance</label>
                                        <input type="date" class="form-control" value="2000-01-01" id="date_naissance" name="date_naissance">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom_arab">Nom en Arabe</label>
                                        <input type="text" class="form-control" value="..." id="nom_arab" name="nom_arab">
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom_arab">Prénom en Arabe</label>
                                        <input type="text" class="form-control" value="..." id="prenom_arab" name="prenom_arab">
                                    </div>
                                    <div class="form-group">
                                        <label for="tele_num">Numéro de Téléphone</label>
                                        <input type="text" class="form-control" value="0601020304" id="tele_num" name="tele_num">
                                    </div>
                                </div>
                            </div>
                            <!-- End Personal Information -->

                            <!-- Contact Information -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" value="personnel@example.com" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rue">Rue</label>
                                        <input type="text" class="form-control" value="..." id="rue" name="rue">
                                    </div>
                                    <div class="form-group">
                                        <label for="ville_id">Ville</label>
                                        <select class="form-control" id="ville_id" name="ville_id">
                                            <option value="1">Ville 1</option>
                                            <option value="2">Ville 2</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- End Contact Information -->

                            <!-- Other Information -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cin">CIN</label>
                                        <input type="text" class="form-control" value="123456789" id="cin" name="cin">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_id">Type</label>
                                        <select class="form-control" id="Type_id" name="type">
                                            <option value="1">Type</option>
                                            <option value="1">Formateur</option>
                                            <option value="2">Responasble</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- End Other Information -->

                            <!-- Additional Information -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="matricule">Matricule</label>
                                        <input type="text" class="form-control" value="123456789" id="matricule" name="matricule">
                                    </div>
                                    <div class="form-group">
                                        <label for="grade_id">Grade</label>
                                        <select class="form-control" id="grade_id" name="grade_id">
                                            <option value="1">Grade 1</option>
                                            <option value="2">Grade 2</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="specialite_id">Spécialité</label>
                                        <select class="form-control" id="specialite_id" name="specialite_id">
                                            <option value="1">Spécialité 1</option>
                                            <option value="2">Spécialité 2</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="etablissement_id">Établissement</label>
                                        <select class="form-control" id="etablissement_id" name="etablissement_id">
                                            <option value="1">Établissement 1</option>
                                            <option value="2">Établissement 2</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- End Additional Information -->

                            <a type="button" class="btn btn-secondary" href="./index.php">Annuler</a>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
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
