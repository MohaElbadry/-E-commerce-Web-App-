<?php
session_start();
var_dump($_SESSION);
if (!isset($_SESSION['nom'])) {
    header('location:connexion.php');
}
include "include/functions.php";
$categories = getAllCategories();


if (!empty($_POST)) {
    //button search cliked 
    $produits = searchProduits($_POST["search"]);
} else {
    $produits = getAllProducts();
}
$commandes = array();
if (isset($_SESSION['panier'])) {
    if (count($_SESSION['panier'][3]) > 0) {
        $commandes = $_SESSION['panier'][3];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/duyplus/fontawesome-pro/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <?php
    include "include/header.php";

    ?>
    <div class="row col-12 mt-4 p-5">
        <h1>Pani
            er utlisateur</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">produit</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">total</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['panier'])) {
                    foreach ($commandes as $index => $commande) {
                        print '
                            <tr>
                                <th scope="row">' . ($index + 1) . '</th>
                                <td>' . $commande[5] . '</td>
                                <td>' . $commande[0] . ' Pieces</td>
                                <td>' . $commande[1] . ' DH</td>
                                <td><a href="actions/enlever-produit-panier.php?id=' . $index . '" class ="btn btn-danger">supprimer</a></td>
                            </tr>
                            ';
                    }
                }
                ?>
            </tbody>
        </table>

        <?php
        if (isset($_SESSION['panier'])) {
            print '
            <a href="actions/valider-panier.php" class="btn btn-success" style="width:100px">Valider</a>
            <h3 class="text-end">Total :' . $_SESSION['panier'][1] . ' DH  </h3>
            ';
        } else {
            print '
             <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
             <symbol id="info-fill" viewBox="0 0 16 16">
             <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
             </symbol>
             </svg>
             <div class="alert alert-primary d-flex align-items-center" role="alert" style="height:100px">
             <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:" style="height:60px"><use xlink:href="#info-fill"/></svg>
             <div>
             aucune commande n\' a été effectuée
             </div>
            </div>
            ';
            print '
            <a class="btn btn-success" style="width:100px">Valider</a>
            <h3 class="text-end">Total : 0 DH  </h3>
            ';
        }

        ?>

    </div>





    <!-- footer  -->
    <?php
    include('include/footer.php');
    ?>



</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>

</html>