<?php
session_start();
if (empty($_SESSION)) {
    header('location:../connexion.php');
}
include('../../include/functions.php');
$visiteurs = getAllUsers();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="../styles.css" />
    <title>CSS GRID DASHBOARD</title>
    <?php include('../template/style.php') ?>
</head>

<body id="body">
    <div class="container">
        <!-- nav bar -->
        <?php
        include('../template/navbar.php')
        ?>
        <!-- end of navbar -->

        <main>
            <div class="main__container">
                <!-- MAIN TITLE STARTS HERE -->
                <div class="main__title">



                    <img src="assets/hello.svg" alt="" />
                    <div class="main__greeting">
                        <h1>Liste Visiteurs</h1>
                        <p>descrription</p>
                    </div>

                </div>
                <!-- notifications -->
                <?php
                // notification d'ajout
                if (isset($_GET['valider']) && $_GET['valider'] == "ok") {
                    print '<div class="alert alert-success">
                    visiteur valider avec succes
                    </div>';
                }
                ?>

                <!-- MAIN TITLE ENDS HERE -->
                <!-- MAIN STARTS HERE -->
                <div class="charts" style="width: 900px;">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($visiteurs as $i => $visiteur) {

                                $i++;
                                print '<tr>
                                <th scope="row">' . $i . '</th>
                                <td >' . $visiteur['nom_vis'] . ' ' . $visiteur['prenom_vis'] . '</td>
                                <td >' . $visiteur['email_vis'] . '</td>
                                <td style="width: 30px;">
                                    <a  href="valide.php?id=' . $visiteur['id_vis'] . '" class="btn btn-success d-block "style="max-width: 75PX;" > <img src="../template/img/checked-buttom.png" style="max-width: 30px; left: 50%;margin-left:10px;">  </a>
                                </td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>


















                </div>
                <!-- MAIN ENDS HERE -->
            </div>
        </main>

        <!-- sidebar -->
        <?php
        include('../template/sidebar.php');
        ?>
        <!-- end of sidebar -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>

</html>