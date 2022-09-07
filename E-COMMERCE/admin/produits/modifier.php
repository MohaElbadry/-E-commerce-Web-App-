<?php
session_start();
if (empty($_SESSION)) {
    header('location:../connexion.php');
}
// 1_ recuperation des donnes de la formulaire
$id = $_POST['id_p'];
$nom = $_POST['nom_prod'];
$prix = $_POST['prix_prod'];
$description = $_POST['description_prod'];
$date_modif = date("y-m-d");
$cat = $_POST['categorie'];
echo $cat;

// 2_ la chaine de connexion
include('../../include/functions.php');
$conn = connect();

// 3_ creation de le requette
if (!empty($nom)) {
    $requette = "UPDATE produit 
                SET nom_prod='$nom', prix_prod='$prix',description_prod='$description',date_modification='$date_modif',
                id_cat='$cat'
                WHERE id_prod=$id";
} else header('location:list.php');


// 4_ execution de la requette

$resultat = $conn->query($requette);

if ($resultat) {
    //variable pour afficher notification
    header('location:list.php?modify=ok');
}
