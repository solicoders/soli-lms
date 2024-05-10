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
                                <h1>Details de Formation</h1>
                            </div>
                            <div class="col-sm-6">
                                <a href="./create.php" type="button" class="btn btn-primary float-right">
                                    <i class="fas fa-plus"></i> Ajouter une Formation
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informations de Formation</h5>
                        <br>
                        <br>
                        <p><strong>Nom de formation: </strong> Lien</p>
                        <p><strong>Lien: </strong>https://grafikart.fr/</p>
                        <p><strong>Description: </strong>Laravel est un framework web PHP open-source utilisé.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
  
</div>
</body>

<?php include_once "../layouts/script-link.php"; ?>
</html>