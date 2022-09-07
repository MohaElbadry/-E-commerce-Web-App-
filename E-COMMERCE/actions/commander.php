<?php
session_start();


include("../include/functions.php");
// connexion_bd
$conn = connect();
$visiteur = $_SESSION['id_vis'];
$id_produit = $_POST['id_prod'];
$quantite = $_POST['quantite'];

// selectionner le produit avec leur id
$requette = "SELECT prix_prod,nom_prod FROM produit WHERE id_prod='$id_produit'";
//execution requette
$resultat = $conn->query($requette);
$produit = $resultat->fetch();

//calcule de total
$total = $quantite * $produit['prix_prod'];
$date = date("Y-m-d");

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array($visiteur, 0, $date, array());
}
$_SESSION['panier'][1] += $total;
$_SESSION['panier'][3][] = array( $quantite, $total, $date, $date, $id_produit, $produit['nom_prod']);


/////////////////////////
header('location:../panier.php');
