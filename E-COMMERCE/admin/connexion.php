<?php
session_start();

include "../include/functions.php";


$categories = getAllCategories();

$user = true;

if (!empty($_POST)) {
    $user = ConnectAdmin($_POST);
    //utilisateur est connecter
    if (is_array($user)) {
        session_start();
        $_SESSION['email'] = $user['email_admin'];
        $_SESSION['password'] = $user['mp_admin'];
        $_SESSION['nom'] = $user['nom_admin'];
        $_SESSION['id'] = $user['id_admin'];
        header('location:profile.php');
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,100,1,-25" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/connexion_syle.css">
    <style>
        form {
            margin-bottom: 250px;
        }

        h1 {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>





<body class="align">
    <h1 class="text-center">Espace Admin : Connexion</h1>

    <div class="grid">

        <form action="connexion.php" method="POST" class="form login">

            <div class="form__field">
                <label for="login__username">

                    <span class="material-symbols-outlined">
                        person
                    </span>
                </label>
                <input autocomplete="email" id="login__username" type="text" name="email" class="form__input" placeholder="Username" required>
            </div>

            <div class="form__field">
                <label for="login__password"><span class="material-symbols-outlined">
                        lock
                    </span><span class="hidden">Password</span></label>
                <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
            </div>

            <div class="form__field">
                <input type="submit" value="Sign In">
            </div>

        </form>

    </div>



</body>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.28/sweetalert2.all.min.js"></script>
<?php

if (!$user) {

    print " <script>
    Swal.fire(
        'Erreur',
        'Cordonnes non valide',
        'error'
        )
        </script>";
}
?>

</html>