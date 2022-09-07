<?php
session_start();
if (empty($_SESSION)) {
    header('location:connexion.php');
}
include "../include/functions.php";

if (isset($_POST['btn-subb'])) {
    //si les infos sont incorrect il va afficher un alert
    if (editEmail($_POST)) {
        // si la modification a ete effectuer il faut changer les informations dons la session
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['email'] = $_POST['email'];
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/duyplus/fontawesome-pro/css/all.min.css">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="styles.css">
    <!-- style -->
    <?php include('template/style.php'); ?>

</head>

<body>
    <div class="container">
        <!-- nav bar -->
        <?php
        include('template/navbar.php')
        ?>
        <!-- end of navbar -->

        <main>
            <div class="main__container">
                <!-- MAIN TITLE STARTS HERE -->
                <div class="main__title">
                    <img src="assets/hello.svg" alt="" />
                    <div class="main__greeting text-center">
                        <h1 class="text-center">Profile</h1>
                        <!-- <p>description</p> -->
                    </div>
                </div>
                <!-- MAIN TITLE ENDS HERE -->
                <!-- MAIN STARTS HERE -->
                <div class="charts">
                    <div class="card-container">
                        <span class="pro">ADMIN</span>
                        <img class="round" src="template/img/143817_user_profile_male_man_account_icon.png" alt="user" style="width: 150px;" />
                        <h3><?php print '<span class="text-primary  text-uppercase">' . $_SESSION['nom'] . '</span>'; ?></h3>
                        <h6><?php print '<span >' . $_SESSION['email'] . '</span>'; ?></h6>
                        <h6>SAFI</h6>
                        <p>Manager de different taches d'entreprise <br /></p>
                        <div class="buttons">
                            <a class="btn btn-primary d-inline-block" data-bs-toggle="modal" data-bs-target="#edit">
                                Modifier
                            </a>

                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1f1a36"  d="M0,32L48,48C96,64,192,96,288,138.7C384,181,480,235,576,240C672,245,768,203,864,197.3C960,192,1056,224,1152,213.3C1248,203,1344,149,1392,122.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
                        <div class="skills">
                            <h6>Management</h6>
                            <ul>
                                <li>Profile</li>
                                <li>Categories</li>
                                <li>Produits</li>
                                <li>Paniers</li>
                                <li>Stocks</li>
                            </ul>
                        </div>
                        <div class="skills">
                            <h6>Verification</h6>
                            <ul>
                                <li>Utilisatuers</li>

                            </ul>
                        </div>
                    </div>


                </div>
                <!-- MAIN ENDS HERE -->
            </div>
        </main>

        <!-- sidebar -->
        <?php
        include('template/sidebar.php');
        ?>
        <!-- end of sidebar -->

        <!-- Modal modification -->
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier Categorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="id">
                            <div class="from-group">
                                <input type="text" class="form-control mb-4" name="nom" value="<?php echo $_SESSION['nom']; ?>" placeholder="nom d'admin....">
                            </div>
                            <div class="from-group">
                                <input type="text" class="form-control mb-4" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="email d'admin....">
                            </div>
                            <div class="from-group">
                                <input type="password" class="form-control mb-4" name="password" placeholder="tapez votre mot de passe ....">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="btn-subb" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- end of Modal modification -->





    </div>
    <script src="../javascript/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../javascript/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>

</html>