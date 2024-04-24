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
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" value="Grain" id="nom" name="nom">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" value="Reda" id="prenom" name="prenom">
                            </div>
                            <div class="form-group">
                                <label for="numero_etudiant">Numéro d'étudiant</label>
                                <input type="text" class="form-control" value="152420" id="numero_etudiant" name="numero_etudiant">
                            </div>
                            <div class="form-group">
                                <label for="classe">Classe</label>
                                <input type="text" class="form-control" value="DMW 102" id="classe" name="classe">
                            </div>
                            <a type="button" href='./index.php' class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
           
    </div>
        </section>
    </div>
  
</div>
</body>

<?php include_once "../../layouts/script-link.php"; ?>
</html>