<?php 
session_start();
//1- recuperer les donne de la formulaire
$id=$_POST['idc'];
$nom =$_POST['nom'];
$description =$_POST['description'];
$couleur =$_POST['couleur'];
$size =$_POST['size'];
$prix =$_POST['prix'];
$createur=$_SESSION['id'];
$date_creation = date("Y-m-d");
$categorie = $_POST['categorie'];
$date_creation2 = date("Y-m-d");
$image=$_FILES["image"]["name"];
 
//2-la chaine de connexion
include "../../inc/functions.php";
$databaseConnection = connect();
//3-creation de la requette
$requette = "UPDATE produits SET nom='$nom',description='$description',coleur='$couleur',size='$size',createur='$createur',prix='$prix',image='$image',date_creation='$date_creation',categorie='$categorie' WHERE id ='$id'";
//4- execution de la requette

$resultat=$databaseConnection->query($requette);
if ($resultat){
    header('Location:liste.php?modif=ok');
}
?>