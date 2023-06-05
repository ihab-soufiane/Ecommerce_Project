<?php
// //test user connexion
session_start();
if(!isset($_SESSION['nom'])){//user non connecte
    header('location:../connexion.php');
  exit();
 }
 include"../inc/functions.php";


//  /* Database connexion */
 $databaseConnection = connect();
 $id_produit = $_POST['produit'];
 $quantite = $_POST['quantite'];


 $visiteur=$_SESSION['id'];

//  // requette
 $requette = "SELECT prix , nom FROM produits WHERE id=$id_produit";
//  //execution 
$resultat = $databaseConnection->query($requette);
 $produit = $resultat->fetch();

$total = $quantite * $produit['prix'];
 //echo $total;
 $date = date('Y-m-d');
 if(!isset( $_SESSION['panier'])){//si panier n'existe pas 
 $_SESSION['panier']= array($visiteur,0,$date,array());//creation de panier
 }
 $_SESSION['panier'][1] +=$total;
 $_SESSION['panier'][3][]=array($quantite,$total,$date,$date,$id_produit,$produit['nom']);

 //echo "panier </br>";
 //var_dump( $_SESSION['panier']);
 //echo "commande panier </br>";
 //var_dump( $_SESSION['panier'][3]);
 //exit;
//  //requette pqnier
//  $requette_panier= "INSERT INTO paniers(visiteur,total,date_creation)VALUES('$visiteur','$total','$date')";
//  //execution pqnier
//  $resultat = $databaseConnection->query($requette_panier);
//  $panier_id=$databaseConnection->lastInsertId();

// $requette="INSERT INTO commandes (produit,quantite,total,panier,date_creation,date_modification)VALUES('$id_produit','$quantite','$total','$panier_id','$date','$date')";
// $resultat = $databaseConnection->query($requette);
header('location:../panier.php');
?>