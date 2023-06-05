<?php
 //echo "id de categorie";
$idcategorie=$_GET['idc'];
include "../../inc/functions.php";
$databaseConnection = connect();
$requette="DELETE FROM categories WHERE id='$idcategorie' ";
$resultat=$databaseConnection->query($requette);
if ($resultat){
    //echo "categorie supprimer";
    header('location:listecategorie.php?delete=ok');
}
?>