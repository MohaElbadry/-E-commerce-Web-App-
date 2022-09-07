<?php
session_start();
// test user connectee
if (!isset($_SESSION['nom'])) { // user nn connectee
    header('location:../connexion.php');
}
$id = $_GET['id'];

$_SESSION['panier'][1] = $_SESSION['panier'][1] - $_SESSION['panier'][3][$id][1];

unset($_SESSION['panier'][3][$id]);
