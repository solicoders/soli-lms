<!DOCTYPE html>
<html lang="fr">
<?php include_once "../../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../../layouts/aside.php" ?>

        

        <div class="content-wrapper pt-4" style="min-height: 1302.4px;">

    <div class="content-header">

    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-info">
                        <div class="card-header">
                            <h2 class="card-title"> <i class="nav-icon fas fa-tasks"></i> Editer Une Compétence</h2>
                        </div>
                        <form method="POST" class="container pt-2" action="">

                        
                            <div class="card-body">

                                <div class="form-group">
                                    
                                    <select name="projetId" id="projetId" class="form-control">  
                                        
                                        <option value="1">Développeur Mobile – mode Bootcamp</option>
                                        <option value="2">Développeur Web – mode Bootcamp</option>
                                    </select>
                                    
                                        <div class="invalid-feedback text-danger"></div>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="nom" class="form-label">Module</label>
                                    <select name="projetId" id="projetId" class="form-control">  
                                        
                                        <option value="1">Anglais technique</option>
                                        <option value="2">Maquettage d’une application mobile</option>
                                        <option value="3">Communication écrite et orale</option>
                                    </select>
                                    
                                        <div class="invalid-feedback text-danger"></div>
                                    
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="nom">Code</label>
                                    <input name="nom" type="text" class="form-control" id="nom" value="C1">
                                    
                                        <div class="text-danger"></div>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="nom">Nom</label>
                                    <input name="nom" type="text" class="form-control" id="nom" value="Maquetter une application mobile">
                                    
                                        <div class="text-danger"></div>
                                </div>
                        
                                <div class="form-group mb-3">
                                    <label for="Description">Description</label>
                                    <textarea name="description" id="inputDescription" class="form-control"></textarea>
                                
                                    <div class="text-danger">
                                        
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="Description">Niveau imiter</label>
                                    <textarea name="description" id="inputDescription" class="form-control"></textarea>
                                
                                    <div class="text-danger">
                                        
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="Description">Niveau adapter</label>
                                    <textarea name="description" id="inputDescription" class="form-control"></textarea>
                                
                                    <div class="text-danger">
                                        
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="Description">Niveau Transposé</label>
                                    <textarea name="description" id="inputDescription" class="form-control"></textarea>
                                
                                    <div class="text-danger">
                                        
                                    </div>
                                </div>

                                
                        
                            </div>
                            <div class="card-footer">
                                <a href="" class="btn btn-default">Cancel</a>
                                <button href="/view/GestionCompetences/Competences/index.php" type="submit" class="btn btn-info mx-2">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>



        
    </div>

    </div>
</body>

<!-- get script -->
<?php include_once "../../layouts/script-link.php"; ?>

</html>