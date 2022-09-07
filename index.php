<?php
session_start();
include "include/functions.php";
$categories = getAllCategories();

if (!empty($_POST)) {
    //button search cliked 
    $produits = searchProduits($_POST["search"]);
} else {
    $produits = getAllProducts();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="cc.css">
</head>

<body>
    <!-- Navbar -->
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-indigo-600">
        <div class="mx-auto max-w-7xl py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between">
                <div class="flex w-0 flex-1 items-center">
                    <span class="flex rounded-lg bg-indigo-800 p-2">
                        <!-- Heroicon name: outline/megaphone -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46" />
                        </svg>
                    </span>
                    <p class="ml-3 truncate font-medium text-white">
                        <span class="md:hidden">Toujours des nouveaux porduits!</span>
                        <span class="hidden md:inline">Toujours des nouveaux porduits!.</span>
                    </p>
                </div>

                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                    <button type="button" class="-mr-1 flex rounded-md p-2 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: outline/x-mark -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php

    include "include/header.php";

    ?>
    <div class="row col-12 mt-5 mb-5">
        <?php
        foreach ($produits as $produit) {
            print ' <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="include/img/' . $produit['image'] . '" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">' . $produit['nom_prod'] . '</h5>' .

                //<p class="card-text">' . $produit['description_prod'] . '</p>

                '<a href="produit.php?id=' . $produit['id_prod'] . '" class="btn btn-primary">Afficher</a>
                
                            </div>
                        </div>
                    </div>';
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
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.tailwindcss.com"></script>


</html>