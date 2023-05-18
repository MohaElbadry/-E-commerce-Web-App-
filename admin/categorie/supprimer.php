<?php
session_start();
if (empty($_SESSION)) {
    header('location:../connexion.php');
}
$id_cat = $_GET['idc'];

include('../../include/functions.php');

$conn = connect();

$requette = "DELETE FROM categories WHERE id_cat='$id_cat'";

$resultat = $conn->query($requette);

if ($resultat) {
    header('location:list.php?delete=ok');
}



