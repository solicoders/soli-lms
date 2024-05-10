<!DOCTYPE html>
<html lang="fr">
<?php include_once "../../layouts/heade.php" ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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
                        <div class="card-header row m-0">
                                        <div class="col-md-3">
                                            <label for="skill">Diagramme</label>
                                            <select class="form-control" id="skill">
                                                <option value="">Diagrammes</option>
                                                <option value="Autoformations" selected>Autoformations</option>
                                                <option value="Briefs">Briefs</option>
                                                <option value="Compétences">Compétences</option>
                                            </select>
                                        </div>
                                    </div>
                            <!-- Boîte par défaut -->
                            <div class="card">
                              
                                <div class="card-body">
                                    <canvas id="myChart" height="400" width="1000"></canvas>
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
<script>
 // Get the canvas element by its ID
const ctx = document.getElementById('myChart');

// Define chart data
const chartData = {
  type: 'bar',
  data: {
    labels: ['Laravel', 'Php', 'Git', 'Bootstrap', 'Kotlin', 'OOP'],
    datasets: [{
      label: 'Pourcentage',
      data: [80, 100, 40, 83, 30, 10],
      borderWidth: 1,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          callback: function(value) {
            return value + '%';
          }
        }
      }
    }
  }
};


// Create a new Chart instance
new Chart(ctx, chartData);

</script>


<!-- get script -->
<?php include_once "../../layouts/script-link.php"; ?>

</html>