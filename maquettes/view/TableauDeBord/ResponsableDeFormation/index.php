<!DOCTYPE html>
<html lang="fr">
<?php include_once "../../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../../layouts/aside.php" ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tableau de bord</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Contenu principal -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Boîte par défaut -->




                            <div class="card">
                                <div class="card-header row">
                                    <div class="col-md-3">
                                        <label for="skill">Diagrammes</label>
                                        <select class="form-control" id="skill">
                                            <option value="">Diagrammes</option>
                                            <option value="Apprenants">Apprenants</option>
                                            <option value="Briefs">Briefs</option>
                                            <option value="Compétences">Compétences</option>
                                            <option value="Autoformations">Autoformations</option>
                                            <option value="Class">Avencement de Class</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="skill">Class</label>
                                        <select class="form-control" id="">
                                            <option value="">Class</option>
                                            <option value="DWB101">DWB101</option>
                                            <option value="DWB102">DWB102</option>
                                            <option value="DWB103">DWB103</option>
                                            <option value="DMB101">DMB101</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body">
                                <div class="card bg-gradient-info">
<div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
<h3 class="card-title">
<i class="fas fa-th mr-1"></i>
Sales Graph
</h3>
<div class="card-tools">
<button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>
<div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
<canvas class="chart chartjs-render-monitor" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 361px;" width="541" height="375"></canvas>
</div>

<div class="card-footer bg-transparent">
<div class="row">
<div class="col-4 text-center">
<div style="display:inline;width:60px;height:60px;"><canvas width="90" height="90" style="width: 60px; height: 60px;"></canvas><input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>
<div class="text-white">Mail-Orders</div>
</div>

<div class="col-4 text-center">
<div style="display:inline;width:60px;height:60px;"><canvas width="90" height="90" style="width: 60px; height: 60px;"></canvas><input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>
<div class="text-white">Online</div>
</div>

<div class="col-4 text-center">
<div style="display:inline;width:60px;height:60px;"><canvas width="90" height="90" style="width: 60px; height: 60px;"></canvas><input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>
<div class="text-white">In-Store</div>
</div>

</div>

</div>

</div>
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
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        </div>
        </section>
        <!-- /.content -->
    </div>

    </div>
</body>

<!-- get script -->
<?php include_once "../../layouts/script-link.php"; ?>

</html>