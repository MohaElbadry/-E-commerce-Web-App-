<?php

session_start();
// test user connectee
if (!isset($_SESSION['nom'])) { // user nn connectee
    header('location:../connexion.php');
}
include("../include/functions.php");
//----connexion_bd-----//
$conn = connect();

// id visiteur
$visiteur = $_SESSION['id_vis'];
$total = $_SESSION['panier'][1];
$date = date('Y-m-d');


//------creation_de_panier----//
// requette
$requette_panier = "INSERT INTO panier(id_vis,total,date_creation)VALUES('$visiteur',$total,'$date')";

// execution_requette_panier
$resultat = $conn->query($requette_panier);
$id_pan = $conn->lastInsertId();

$commandes = $_SESSION['panier'][3];
 

/* pour voir les index des valuer dans la session
//-----Ajouter_commande-----//
$_SESSION['panier'] = array( $visiteur,
0,
$date,
array());
$_SESSION['panier'][3][] = array(   $quantite,
$total,
                                    $date,
                                    $date,
                                    $id_produit,
                                    $produit['nom_prod']);
                                    */
foreach ($commandes as $index => $commande) {
    // requette
    $quantite = $commande[0];
    $total = $commande[1];
    $id_produit = $commande[4];
    $requette_commandes = "INSERT INTO commandes ( quantite, total, id_pan, date_creation,date_modification, id_prod) 
                           VALUES('$quantite','$total','$id_pan','$date','$date','$id_produit')";

// execution_requette_commandes


$resultat = $conn->query($requette_commandes);
}
//supprimer le panier
$_SESSION['panier'] = null;

//direction vers l'index
header('location:../index.php');
