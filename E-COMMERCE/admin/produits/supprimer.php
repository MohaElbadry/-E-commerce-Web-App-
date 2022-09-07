<?php
session_start();
if (empty($_SESSION)) {
    header('location:../connexion.php');
}
$id_prod = $_GET['idp'];

include('../../include/functions.php');

$conn = connect();

$requette = "DELETE FROM produit WHERE id_prod='$id_prod'";

$resultat = $conn->query($requette);

 if ($resultat) {
    header('location:list.php?delete=ok');
}
