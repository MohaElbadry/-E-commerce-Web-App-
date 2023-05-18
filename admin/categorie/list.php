<?php
session_start();
if (empty($_SESSION)) {
    header('location:../connexion.php');
}
include('../../include/functions.php');
$categories = getAllCategories();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/duyplus/fontawesome-pro/css/all.min.css">
    <title>DASHBOARD</title>
    <?php include('../template/style.php') ?>

</head>

<body>
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
                        <h1>Liste Categories</h1>
                        <!-- <p>description</p> -->
                        <a class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</a>
                    </div>
                </div>
                <!-- Notfication -->
                <?php
                //notification d'ajout
                if (isset($_GET['ajout']) && $_GET['ajout'] == "ok") {
                    print '<div class="alert alert-success m-4">
                    categorie Ajoutee avec succes
                    </div>';
                }
                //notification de suppression


                if (isset($_GET['delete']) && $_GET['delete'] == "ok") {
                    print '<div class="alert alert-danger m-4">
                    categorie supperimer avec succes
                    </div>';
                }
                //notification de modification


                if (isset($_GET['modify']) && $_GET['modify'] == "ok") {
                    print '<div class="alert alert-success m-4">
                    categorie modifieé avec succes
                    </div>';
                }
                ?>
                <!-- notifivation ends -->

                <!-- MAIN STARTS HERE -->
                <div class="charts" style="width: 900px;">


                    <table>
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Job Title</th>
                                <th>Twitter</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $i = 1;
                            foreach ($categories as $c) {

                                print '<tr>
                                <th scope="row" >' . $i . '</th>
                                <td style="max-width: 150PX;">' . $c['nom_cat'] . '</td>
                                <td style="max-width: 500PX;">' . $c['description_cat'] . '</td>
                                <td >
                                    <a class="btn btn-success d-inline-block" data-bs-toggle="modal" data-bs-target="#editModal' . $c['id_cat'] . '"> <i class="fa-regular fa-pen-to-square"></i></a>
                                    <a  href="supprimer.php?idc=' . $c['id_cat'] . '." class="btn btn-danger d-inline-block"><i class="fa-light fa-trash"></i></a>  
                                </td>
                                </tr>';
                                $i++;
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
        <!-- Modal ajout -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter Categorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="ajout.php" method="post">
                            <div class="from-group">
                                <input type="text" class="form-control mb-4" required name="nom_cat" placeholder="nom de categorie....">
                            </div>
                            <div class="from-group">
                                <textarea type="text" class="form-control" required name="description_cat" placeholder="decsription de categorie...."></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <?php foreach ($categories as $index => $categorie) { ?>
            <!-- Modal modification -->
            <div class="modal fade" id="editModal<?php echo $categorie['id_cat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier Categorie</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="modifier.php" method="post">
                                <input type="hidden" value="<?php echo $categorie['id_cat']; ?>" name="id_c">
                                <div class="from-group">
                                    <input type="text" class="form-control mb-4" name="nom_cat" value="<?php echo $categorie['nom_cat']; ?>" placeholder="nom de categorie....">
                                </div>
                                <div class="from-group">
                                    <textarea type="text" class="form-control" name="description_cat" placeholder="decsription de categorie...."> <?php echo $categorie['description_cat']; ?></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        <?php } ?>

    </div>
    <script src="../../javascript/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../../javascript/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../../javascript/dashboard.js"></script>
    <script src="../../javascript/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>

</html>