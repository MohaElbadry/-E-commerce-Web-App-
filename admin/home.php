<?php
session_start();
if (empty($_SESSION)) {
    header('location:connexion.php');
}
include "../include/functions.php";
$data = getData();
$lastVis = lastVis();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/duyplus/fontawesome-pro/css/all.min.css">

    <title>CSS GRID DASHBOARD</title>
    <?php include('template/style.php'); ?>
    <link rel="stylesheet" href="template/table.css">

</head>

<body id="body">
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
                    <div class="main__greeting">
                        <h1>Dashboard</h1>
                        <p>Bonjours <?php print $_SESSION['nom']; ?></p>
                    </div>
                </div>

                <!-- MAIN TITLE ENDS HERE -->

                <!-- MAIN CARDS STARTS HERE -->
                <div class="main__cards">
                    <div class="card">
                        <i class="fa fa-user-o fa-3x text-dark" aria-hidden="true"></i>
                        <div class="card_inner">
                            <p class="text-primary-p">Nombre des clients</p>
                            <span class="font-bold text-title"><?php echo $data[" clients "] ?></span>
                        </div>
                    </div>
                    <div class="card">
                        <i class="fa-solid fa-list fa-3x text-white"></i>
                        <div class="card_inner">
                            <p class="text-primary-p">Nombre des Categories</p>
                            <span class="font-bold  text-title-2"><?php echo $data[" categories "] ?></span>
                        </div>
                    </div>
                    <div class="card">
                        <i class="fa fa-user-o fa-3x text-dark" aria-hidden="true"></i>
                        <div class="card_inner">
                            <p class="text-primary-p">Nombre des Produits</p>
                            <span class="font-bold text-title"><?php echo $data[" produits "] ?></span>
                        </div>
                    </div>
                    <div class="card">
                        <i class="fa fa-user-o fa-3x text-dark" aria-hidden="true"></i>
                        <div class="card_inner">
                            <p class="text-primary-p">Nombre de Paniers</p>
                            <span class="font-bold text-title"><?php echo $data['pan'] ?></span>
                            
                        </div>
                    </div>

                </div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Le dernier utilisateur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php var_dump($lastVis);
                                ?>
                                <td>
                                    NOM : <?PHP  print $zeo=2; ?>
                                    Email : <?PHP $lastVis['email_vis'] ?>
                                    Son etat : <?PHP $lastVis['email_vis'] ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </main>



        <!-- sidebar -->
        <?php
        include('template/sidebar.php');
        ?>
        <!-- end of sidebar -->



    </div>







    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>

</html>