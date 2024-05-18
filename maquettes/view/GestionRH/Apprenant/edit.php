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
                                <h1>Ajouter un nouvel apprenant</h1>
                            </div>
                        </div>
                    </div>
                </section>
                
                <div class="card">
                    <div class="card-body">
                        <form id="createStudentForm">
                            <!-- Personal Information -->
                            <div class="row">
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
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" value="Grain" id="nom" name="nom">
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" class="form-control" value="Reda" id="prenom" name="prenom">
                                    </div>
                                    <div class="form-group">
                                        <label for="nom_arab">Nom en Arabe</label>
                                        <input type="text" class="form-control" value="..." id="nom_arab" name="nom_arab">
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom_arab">Prénom en Arabe</label>
                                        <input type="text" class="form-control" value="..." id="prenom_arab" name="prenom_arab">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_naissance">Date de Naissance</label>
                                        <input type="date" class="form-control" value="2000-01-01" id="date_naissance" name="date_naissance">
                                    </div>
                                    <div class="form-group">
                                        <label for="tele_num">Numéro de Téléphone</label>
                                        <input type="text" class="form-control" value="0601020304" id="tele_num" name="tele_num">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" value="apprenant@example.com" id="email" name="email">
                                    </div>

                                </div>
                            </div>
                            <!-- End Personal Information -->

                            <!-- Student Information -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="numero_etudiant">Numéro d'étudiant</label>
                                        <input type="text" class="form-control" value="152420" id="numero_etudiant" name="numero_etudiant">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="classe">Classe</label>
                                        <input type="text" class="form-control" value="DMW 102" id="classe" name="classe">
                                    </div>
                                </div>
                            </div>
                            <!-- End Student Information -->

                            <a type="button" href='./index.php' class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
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
