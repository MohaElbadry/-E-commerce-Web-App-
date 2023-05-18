<?php

include "include/functions.php";
session_start();
$alerts = 0;
$categories = getAllCategories();

if (!empty($_POST)) { //click sur button submit
    $alerts = AddVisiteur($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link rel="stylesheet" href="css/register_style.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>


<body>

<div class="lol">


    <form method="POST">
        <h1>Register</h1>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Nom</label>
            <input type="text" name="nom_vis" class="form-control" id="inputEmail4" require>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Prenom</label>
            <input type="text" name="prenom_vis" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" required name="email_vis" class="form-control" id="inputEmail4" require>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Télephone</label>
            <input type="tel" name="telephone" class="form-control" id="inputPassword4">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Password</label>
            <input type="password" required name="mp_vis" class="form-control" id="inputCity">
        </div>


        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
        <p class="text--center">Tu as deja in compte <a href="connexion.php">Connecter</a> <svg class="icon">
            <use xlink:href="#icon-arrow-right"></use>
        </svg></p>
</div>


</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.28/sweetalert2.all.min.js"></script>
<?php
if ($alerts === 1)
    print " <script>
    Swal.fire(
        'Success',
        'Creation de compte avec succes',
        'success'
    )
</script>";
?>

</html>