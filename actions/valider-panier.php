<?php
 
session_start();
include "../inc/functions.php";
// connexion bd
$databaseConnection = connect();
// id visiteur
$visiteur = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$date = date('Y-m-d');
// creation de panier
$requette_panier = "INSERT INTO paniers(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";
// execution requette_panier
$resultat = $databaseConnection->query($requette_panier);
$panier_id = $databaseConnection->lastInsertId();
$commandes = $_SESSION['panier'][3];

// Ajouter commande 
foreach($commandes as $commande){
    $quantite = $commande[0];
    $id_produit = $commande[4];
    $total=  $commande[1];



$requette="INSERT INTO commandes (produit,quantite,total,panier,date_creation,date_modification)VALUES('$id_produit','$quantite','$total','$panier_id','$date','$date')";
// // execution requette
$resultat = $databaseConnection->query($requette);
}
// supprimer le panier
$_SESSION['panier'] = null;
// redirection vers la page
header('location:../index.php');
?>