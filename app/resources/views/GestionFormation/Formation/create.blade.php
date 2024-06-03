<!DOCTYPE html>
<html lang="en">
<?php include_once "../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

<!-- Site wrapper -->
<div class="wrapper">

    <!-- Navigation -->
    <?php include_once "../layouts/nav.php" ?>
    <!-- Barre latérale -->
    <?php include_once "../layouts/aside.php" ?>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <section class="content-header">
                    <div class="container-fluid ">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Ajouter une formation</h1>
                            </div>
                        </div>
                    </div>
                </section>
                
                <div class="card">
                    <div class="card-body">
                        <form id="createFormateurForm">
                            <div class="form-group">
                                <label for="nom">Nom de formation</label>
                                <input type="text" class="form-control" value="Laravel" id="nom" name="nom">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Lien</label>
                                <input type="text" class="form-control" value="https://grafikart.fr/" id="prenom" name="prenom">
                            </div>
                            <div class="form-group">
                              <label for="description">Description :</label>
                               <textarea class="form-control" id="inputDescription" rows="4" placeholder="Saisissez votre description ici..."></textarea>
                            </div>
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
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#inputDescription'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
<?php include_once "../layouts/script-link.php"; ?>

</html>
