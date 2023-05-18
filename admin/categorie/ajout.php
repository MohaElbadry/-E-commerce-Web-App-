<?php

////////////// 
/* utiliser try chatch =>pour les nom duplice*/
//////////////
session_start();
if (empty($_SESSION)) {
    header('location:../connexion.php');
}
// 1_ recuperation des donnes de la formulaire

$nom = $_POST['nom_cat'];
$description = $_POST['description_cat'];
$id = $_SESSION['id'];
$date = date("y-m-d");

// 2_ la chaine de connexion
include('../../include/functions.php');
$conn = connect();

// 3_ creation de le requette
if (!empty($nom) && !empty($description)) {
    $requette = "INSERT INTO categories(nom_cat,description_cat,id_admin,date_creation) 
             VALUES ('$nom','$description','$id','$date')";
} else header('location:list.php');


// 4_ execution de la requette

$resultat = $conn->query($requette);

if ($resultat) {
    //variable pour afficher notification
    header('location:list.php?ajout=ok');
}
