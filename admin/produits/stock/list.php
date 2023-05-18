<?php
session_start();
if (empty($_SESSION)) {
    header('location:../../../connexion.php');
}
include('../../../include/functions.php');
$stocks = getStocks();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="../../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/duyplus/fontawesome-pro/css/all.min.css">
    <title>DASHBOARD</title>
    <?php include('../../template/style.php') ?>
</head>

<body id="body">
    <div class="container">
        <!-- nav bar -->
        <?php
        include('../../template/navbar.php')
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
                        <?php
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
                                <th scope="col">#</th>
                                <th scope="col">Nom de produit</th>
                                <th scope="col">Quantite</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($stocks as $c) {

                                print '<tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $c['nom_prod'] . '</td>
                                <td>' . $c['quantite'] . '</td>
                                <td>
                                    <a href="" class="btn btn-primary d-block m-1" data-bs-toggle="modal" data-bs-target="#editModal' . $c['id_stock'] . '" style="max-width: 74PX;"><i class="fa-regular fa-pen-to-square"></i></a>
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
        include('../../template/sidebar.php');
        ?>
        <!-- end of sidebar -->

        <!-- Modal modification -->
        <?php foreach ($stocks as $index => $stock) { ?>
            <div class="modal fade" id="editModal<?php echo $stock['id_stock']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier Stock <span class="text-parmay text-uppercase fw-bold text-nowrap bg-light borde text-primary"><?php echo $stock['nom_prod'] ?></span> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="modifier.php" method="post">
                                <input type="hidden" value="<?php echo $stock['id_stock']; ?>" name="id_stock">
                                <div class="from-group">
                                    <input type="number" class="form-control mb-4" name="quantite" value="<?php echo $stock['quantite']; ?>">
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        <?php } ?>

    </div>
    <script src="../../../javascript/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../../../javascript/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../../../javascript/dashboard.js"></script>
    <script src="../../../javascript/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>

</html>