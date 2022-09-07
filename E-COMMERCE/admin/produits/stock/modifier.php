<?php
session_start();
if (empty($_SESSION)) {
    header('location:../../connexion.php');
}
// 1_ recuperation des donnes de la formulaire
var_dump($_POST);
$id = $_POST['id_stock'];
$quantite=$_POST['quantite'];
// 2_ la chaine de connexion
include('../../../include/functions.php');
$conn = connect();

// 3_ creation de le requette
    $requette = "UPDATE stock SET quantite='$quantite'
    WHERE id_stock=$id"; 

// 4_ execution de la requette

$resultat = $conn->query($requette);

if ($resultat) {
    //variable pour afficher notification
    header('location:list.php?modify=ok');
}
