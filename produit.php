<?php

session_start();

include "include/functions.php";

$categories = getAllCategories();
if (isset($_GET['id'])) {

    $produit = GetProduitById($_GET['id']);
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
    <link rel="stylesheet" href="cc.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>


    <!-- Navbar -->
    <?php

    include "include/header.php";
    ?>
    <?php
    if (isset($_SESSION['etat']) && $_SESSION['etat'] == 0) {
        print '
        <div class="modal modal-sheet position-static d-block " tabindex="-1" role="dialog" id="modalSheet">
            <div class="modal-dialog  ">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header text-center border-bottom-0">
                        <h5 class="modal-title text-danger text-capitalize">Utilisateur non verifier</h5>
                    </div>
                    <div class="modal-body py-0">
                        <p> verfierz votre compte pour commander der porduits</p>
                    </div>
                </div>
            </div>
        </div>
        ';
    } else {

        if (!isset($_SESSION['nom'])) {
            print '
                    <div class="modal modal-sheet position-static d-block " tabindex="-1" role="dialog" id="modalSheet">
                        <div class="modal-dialog  ">
                            <div class="modal-content rounded-4 shadow">
                                <div class="modal-header text-center border-bottom-0">
                                    <h5 class="modal-title text-danger text-capitalize">Connectez-vous</h5>
                                </div>
                                <div class="modal-body py-0">
                                    <p>vouez     
                                    <a href="connexion.php">connecter</a> ou     
                                    <a href="registre.php">s\'inscrire</a>
                                    dans notre site</p>
                                </div>
                            </div>
                        </div>
                    </div>
        ';
        }
    }

    ?>







    <body>
        <div class=" d-flex " style="margin:50px 180px 0 180px;  border: 3px solid #000000;  border-radius: 20px 0px 200px 20px;
">
            <div class="product-img">
                <img src="include/img/<?php echo $produit['image']; ?>" height="450" width="357">
            </div>
            <div class="product-info">
                <div class="product-text">
                    <pre>

                        <h1><?php echo $produit['nom_prod'] ?></h1> <h3 class="text-opacity-50">by Panneaux Alum</h3>
                    </pre>


                    <?php
                    foreach ($categories as $index => $c) {
                        if ($c['id_cat'] == $produit['id_cat']) {
                            print ' <p class="list-group-item"> <b>Categorie  :</b>  ' . $c['nom_cat'] . '</p>';
                        }
                    }
                    ?>
                    <pre><?php echo '<h6> <b> Description :</b></h6>  ' . $produit['description_prod'] ?></pre>
                </div>
                <div class="m-lg-3">
                    <p><span> <b>PRIX</b> <?php echo $produit['prix_prod'] ?> DH</span></p>
                </div>
                <div class="product-price-btn ">
                    <form class="" action="actions/commander.php" method="POST">
                        <input type="hidden" value="<?php echo $produit['id_prod'] ?>" name="id_prod">
                        <br>
                        <input style="margin-left: 20px;" type="number" class="form-control " name="quantite" step="1" required placeholder="Quantite du produit ...">
                        <button style="margin:30px; padding:10px 80px;" type="submit" <?php if (!isset($_SESSION['etat']) ||   $_SESSION['etat'] == 0) {
                                                                                            echo "disabled ";
                                                                                        } ?> class="btn btn-primary mb-3">Commander</button>
                    </form>
                </div>
            </div>
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