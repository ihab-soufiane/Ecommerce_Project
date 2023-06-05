<?php 
session_start();
//1- recuperer les donne de la formulaire
$nom =$_POST['nom'];
$description =$_POST['description'];
$createur=$_SESSION['id'];
$date_creation = date("Y-m-d");
//2-la chaine de connexion
include "../../inc/functions.php";
$databaseConnection = connect();
//3-creation de la requette
$requette = "INSERT INTO categories(nom,description,createur,date_creation)VALUES ('$nom','$description','$createur','$date_creation') ";
//4- execution de la requette

$resultat=$databaseConnection->query($requette);
if ($resultat){
    header('Location:listecategorie.php?ajout=ok');
}
?>