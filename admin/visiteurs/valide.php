<?php 
session_start();
if (empty($_SESSION)) {
    header('location:../connexion.php');
}
include('../../include/functions.php');
$conn = connect();

$id = $_GET['id'];

$requette="UPDATE visiteur SET  etat=1 WHERE id_vis='$id'";
$resultat = $conn->query($requette);
if ($resultat) {
    header('location:list.php?valider=ok');
}else echo'ERROR';