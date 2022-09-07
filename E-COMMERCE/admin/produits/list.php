<?php
session_start();
if (empty($_SESSION)) {
    header('location:../connexion.php');
}
include('../../include/functions.php');
$categories = getAllCategories();
$produits = getAllProducts();
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
                        <h1>Liste Des Produit</h1>
                        <p>descrription</p>
                        <!-- Button trigger modal -->
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</a>
                        <!-- notifications -->
                        <?php
                        //notification d'ajout
                        if (isset($_GET['ajout']) && $_GET['ajout'] == "ok") {
                            print '<div class="alert alert-success">
                            Produit Ajoutee avec succes
                            </div>';
                        }
                        //notification de suppression

                        if (isset($_GET['delete']) && $_GET['delete'] == "ok") {
                            print '<div class="alert alert-danger">
                            Produit supperimer avec succes
                            </div>';
                        }
                        //notification de modification


                        if (isset($_GET['modify']) && $_GET['modify'] == "ok") {
                            print '<div class="alert alert-success">
                            Produit modifieé avec succes
                            </div>';
                        }
                        ?>
                    </div>
                </div>
                <!-- MAIN STARTS HERE -->
                <div class="charts" style="width: 900px;">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($produits as $i => $p) {

                                $x = $p['id_prod'];
                                print '<tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $p['nom_prod'] . '</td>
                                <td>' . $p['description_prod'] . '</td>
                                <td>' . $p['prix_prod'] . '</td>
                                <td> 
                                <a  class="btn btn-success  " data-bs-toggle="modal" data-bs-target="#editModal' . $x . '">
                                                 <i class="fa-regular fa-pen-to-square"></i> 
                                </a>                                 
                                    <a  href="supprimer.php?idp=' . $p['id_prod'] . '." class="btn btn-danger"><i class="fa-regular fa-trash"></i></a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter Produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="ajout.php" method="post" enctype="multipart/form-data">
                            <div class="from-group">
                                <input type="text" class="form-control mb-4" required name="nom_prod" placeholder="nom de produit....">
                            </div>
                            <div class="from-group">
                                <textarea type="text" class="form-control mb-4" required name="description_prod" placeholder="decsription de produit...."></textarea>
                            </div>
                            <div class="from-group">
                                <input type="number" step="0.01" class="form-control mb-4" required name="prix_prod" placeholder="prix de produit....">
                            </div>
                            <div class="from-group">
                                <input type="file" class="form-control mb-4" name="image" placeholder="prix de produit....">
                            </div>
                            <div class="from-group">
                                <input type="number" step="1" class="form-control mb-4" required name="quantite" placeholder="quantite de produit....">
                            </div>

                            <div class="from-group">

                                <select class="form-control" name="categorie">

                                    <?php
                                    foreach ($categories as $index => $categorie)

                                        print '<option  value="' . $categorie['id_cat'] . '" > ' . $categorie['nom_cat'] . '</option>'
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="createur">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal modification -->
        <?php foreach ($produits as  $p) { ?>
            <div class="modal fade" id="editModal<?php echo $p['id_prod'] ?>" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="modifier.php" method="post">
                                <input type="hidden" value="<?php echo $p['id_prod']; ?>" name="id_p">
                                <div class="from-group">
                                    <input type="text" class="form-control mb-4" name="nom_prod" value="<?php echo $p['nom_prod']; ?>" placeholder="nom de categorie....">
                                </div>
                                <div class="from-group">
                                    <textarea type="text" class="form-control" name="description_prod" placeholder="decsription de categorie...."> <?php echo $p['description_prod']; ?></textarea>
                                </div>
                                <div class="from-group">
                                    <input type="number" class="form-control mb-4" name="prix_prod" value="<?php echo $p['prix_prod']; ?>" placeholder="prix de categorie....">
                                </div>
                                <div class="from-group">

                                    <select class="form-control" name="categorie">

                                        <?php
                                        foreach ($categories as $index => $categorie) {
                                            print '<option value="' . $categorie['id_cat'] . '" > ' . $categorie['nom_cat'] . '</option>';
                                        }
                                        ?>
                                    </select>
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