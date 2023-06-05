<?php 
session_start();
//1- recuperer les donne de la formulaire
$nom =$_POST['nom'];
$description =$_POST['description'];
$couleur =$_POST['couleur'];
$size =$_POST['size'];
$prix =$_POST['prix'];
$createur=$_SESSION['id'];
$date_creation = date("Y-m-d");
$categorie = $_POST['categorie'];
$quantite = $_POST['quantite'];
$date_creation2 = date("Y-m-d");

//upload file
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
   
   $image=$_FILES["image"]["name"];
     //echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }  
//2-la chaine de connexion
include "../../inc/functions.php";
$databaseConnection = connect();
//3-creation de la requette
$requette = "INSERT INTO produits(nom,description,coleur,size,image,categorie,prix,date_creation,createur)VALUES ('$nom','$description','$couleur','$size','$image','$categorie','$prix','$date_creation','$createur') ";

//4- execution de la requette


$resultat=$databaseConnection->query($requette);
if ($resultat){
  $produit_id= $databaseConnection->lastInsertId();
$requette2 ="INSERT INTO stock(produit,quantite,createur,date_creation)VALUES ('$produit_id','$quantite','$createur','$date_creation2')";
  if($databaseConnection->query($requette2)){    
header('Location:liste.php?ajout=ok');
}else{
  echo "impossible d'ajouter le stock du produit";
}
}
?>