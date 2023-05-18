<?php
session_start();
if (empty($_SESSION)) {
    header('location:../connexion.php');
}
// 1_ recuperation des donnes de la formulaire
$id=$_POST['id_c'];
$nom = $_POST['nom_cat'];
$description = $_POST['description_cat'];
$date_modif = date("y-m-d");

// 2_ la chaine de connexion
include('../../include/functions.php');
$conn = connect();

// 3_ creation de le requette
if (!empty($nom) && !empty($description)) {
    $requette = "UPDATE categories SET nom_cat='$nom',description_cat='$description',date_modification='$date_modif'
    WHERE id_cat=$id";
} else header('location:list.php');


// 4_ execution de la requette

$resultat = $conn->query($requette);

if ($resultat) {
    //variable pour afficher notification
    header('location:list.php?modify=ok');
}
