<?php
session_start();
if (empty($_SESSION)) {
    header('location:../connexion.php');
}
$nom_prod = $_POST['nom_prod'];
$description_prod = $_POST['description_prod'];
$prix_prod = $_POST['prix_prod'];
$createur = $_POST['createur'];
$categorie = $_POST['categorie'];
// stock
$quantite = $_POST['quantite'];
$date = date('y-m-d');
//image parametres
$img_name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
$img_ex_lc = strtolower($img_ex);

$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
$img_upload_path = '../../include/img/' . $new_img_name;
move_uploaded_file($tmp_name, $img_upload_path);
// Insert into Database 
include('../../include/functions.php');
$conn = connect();
$requette = "INSERT INTO produit(nom_prod,description_prod,prix_prod,image,id_cat,id_admin,date_creation) 
             VALUES ('$nom_prod','$description_prod','$prix_prod','$new_img_name','$categorie','$createur','$date')";
             var_dump($_SESSION);
$resultat = $conn->query($requette);


if ($resultat) {

    $id_pord = $conn->lastInsertId();

    $requette2 = "INSERT INTO stock(id_prod,quantite,id_admin,date_creation_stock)
    VALUES('$id_pord','$quantite','$createur','$date')";
    if ($conn->query($requette2)) {
        header('location:list.php?ajout=ok');
    }
}
