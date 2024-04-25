<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    $_SESSION = array();
    header('Location: ../../../../index.php');
    exit();
}
?>
<!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light"> -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Liens de navigation de gauche -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="/view/assets/images/man.png" class="user-image img-circle elevation-2"
                    alt="Image d'utilisateur">
                <span class="d-none d-md-inline">
                    <?php
                    if (isset($_SESSION['email']) && $_SESSION['email'] === 'apprenant@solicode.com') {
                        echo 'hussein bouik';
                    } elseif (isset($_SESSION['email']) && $_SESSION['email'] === 'formateur@solicode.com'){
                        echo 'Formateur';
                    }elseif(isset($_SESSION['email']) && $_SESSION['email'] === 'ResponsableFormation@solicode.com') {
                        echo 'ResponsableFormation' ;
                    }
                    ?>
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- Image d'utilisateur -->
                <li class="user-header bg-info">
                    <img src="/view/assets/images/man.png" class="img-circle elevation-2" alt="Image d'utilisateur">
                    <p>
                        <?php
                        if (isset($_SESSION['email']) && $_SESSION['email'] === 'apprenant@solicode.com') {
                            echo 'hussein bouik';
                        } else {
                            echo 'Formateur';
                        }
                        ?> <small>Membre depuis le 28/12/2023</small>
                    </p>
                </li>
                <!-- Pied de page du menu -->
                <li class="user-footer">
                    <form id="logout-form" action="" method="POST">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <input type="submit" name="logout" value="Déconnexion"
                            class="btn btn-default btn-flat float-right logout">
                    </form>
                </li>
            </ul>

        </li>
    </ul>
</nav>