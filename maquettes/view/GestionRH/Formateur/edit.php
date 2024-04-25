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
                                <h1>Modifier Formateur</h1>
                            </div>
                        </div>
                    </div>
                </section>
                
                <div class="card">
                    <div class="card-body">
                        <form id="createFormateurForm">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" value="Souklabi" id="nom" name="nom">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" value="Abdellatif" id="prenom" name="prenom">
                            </div>
                            <div class="form-group">
                                <label for="numero_formateur">Numéro de formateur</label>
                                <input type="text" class="form-control" value="123456" id="numero_formateur" name="numero_formateur">
                            </div>
                            <div class="form-group">
                                <label for="specialite">Spécialité</label>
                                <input type="text" class="form-control" value="Professeur" id="specialite" name="specialite">
                            </div>
                            <a type="button" class="btn btn-secondary" href="./index.php">Annuler</a>
                            <button type="submit" class="btn btn-primary">Modifier</button>
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
