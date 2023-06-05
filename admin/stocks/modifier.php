<?php 
session_start();
//1- recuperer les donne de la formulaire
$id=$_POST['idstock'];

$quantite =$_POST['quantite'];
$date_modification = date("Y-m-d");
//2-la chaine de connexion
include "../../inc/functions.php";
$databaseConnection = connect();
//3-creation de la requette
$requette = "UPDATE stock SET quantite='$quantite',date_modification='$date_modification' WHERE id ='$id'";
//4- execution de la requette

$resultat=$databaseConnection->query($requette);
if ($resultat){
    header('Location:liste.php?modif=ok');
}
?>