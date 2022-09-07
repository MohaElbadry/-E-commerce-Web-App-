<?php
session_start();
include('../../include/functions.php');
if (empty($_SESSION)) {
    header('location:../connexion.php');
}
if (isset($_POST['submit'])) {
    ChangeEtat($_POST['etat'], $_POST['id_pan']);
}
$commandes = getAllCommandes();
$paniers = getAllPaniers();

if (isset($_POST['btn-chercher'])) {
    if ($_POST['etat'] == 'touts') {
        $paniers = getAllPaniers();
    } else
        $paniers = getPaniersByEtat($paniers, $_POST['etat']);
}
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
                        <!-- notifications -->

                    </div>
                </div>
                <!-- MAIN STARTS HERE -->
                <div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="d-flex float-end" style="width: 300px;">
                            <select name="etat" class="form-control form-control m-2">
                                <option value="">---Choisir etat----</option>
                                <option value="En cours">En cours</option>
                                <option value="touts">Touts</option>
                                <option value="En livraison">En livraison </option>
                                <option value="Livraison termine">Livraison termine</option>
                            </select>
                            <button type="submit" class="btn btn-primary ml-4 m-2" name="btn-chercher" value="Chercher"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <div class="charts" style="width: 900px;">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Client</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Action          </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($paniers as $index => $c) {
                                print '<tr>
                                <th scope="row">' . ($index + 1) . '</th>
                                <td style="max-width: 150PX;">' . $c['nom_vis'] . ' ' . $c['prenom_vis'] . '</td>
                                <td >' . $c['total'] . '</td>
                                <td >' . $c['date_creation'] . '</td>
                                <td >' . $c['etat'] . '</td>
                                <td >
                                    <a class="btn btn-success d-inline-block" data-bs-toggle="modal" data-bs-target="#editModal' . $c['id_pan'] . '"> <i class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-primary d-inline-block" data-bs-toggle="modal" data-bs-target="#Traiter' . $c['id_pan'] . '"> <i class="fa-regular fa-pen-to-square "></i></a>
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

        <!-- modals  -->
        <!-- Modal d'affichage -->
        <?php foreach ($paniers as $index => $panier) { ?>
            <div class="modal fade" id="editModal<?php echo $panier['id_pan']  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Liste des commandes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="modifier.php" method="post">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nom </th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Quantite</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($commandes as $c) {
                                        if ($c['id_pan'] == $panier['id_pan'])
                                            print '
                                                <tr>
                                                    <th scope="col">' . $c['nom_prod'] . '</th>
                                                    <th scope="col">
                                                        <img style="max-width: 90PX;"  src="../../include/img/' . $c['image'] . '">
                                                    </th>
                                                    <th scope="col">' . $c['quantite'] . '</th>
                                                    <th scope="col">' . $c['total'] . ' DH</th>
                                                </tr>
                                        ';
                                    } ?>
                                </table>



                            </form>
                        </div>

                    </div>
                </div>
            </div>


        <?php } ?>


        <!-- Modal modification -->
        <?php foreach ($paniers as $index => $panier) { ?>
            <div class="modal fade" id="Traiter<?php echo $panier['id_pan']  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Traiter la commande</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $panier['id_pan']  ?>" name="id_pan">
                                    <select name=" etat" class="form-control mb-3">
                                        <option>----choisir une etat----</option>
                                        <option value="En livraison">En livraison</option>
                                        <option value="Livraison termine">livraison termine</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-3">Sauvgarder</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- modals end -->




    </div>
    <script src="../../javascript/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../../javascript/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../../javascript/dashboard.js"></script>
    <script src="../../javascript/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>

</html>