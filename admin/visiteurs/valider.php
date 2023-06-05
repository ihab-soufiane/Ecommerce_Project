<?php

$idvisiteur = $_GET['id'];
//2-la chaine de connexion
include "../../inc/functions.php";
$databaseConnection = connect();

//requette
$requette = "UPDATE visiteurs SET etat =1 WHERE id='$idvisiteur'";
$result= $databaseConnection->query($requette);
if ($result){
    header('location:liste.php?valider=ok');

}else {
    echo "Erreur de la validation";
}


?>