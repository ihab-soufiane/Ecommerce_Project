<?php

SESSION_start();
include "inc/functions.php";
$categories = getAllCategories();


if(!empty($_POST)){
// echo  $_POST['search'];
 $produits = searchProducts($_POST['search']);
}else {
  $produits = getAllProducts();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
  

    
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
      
    <script type="text/javascript" src="../script.js"></script>
   
    

    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
  <!--nav-->
  <?php
     include "inc/header.php";
  ?>
 
    <!--body-->

    
    <div class="titre">
            <h1><span> Nos Produits</span> </h1>
        </div>
    <div class="row col-12 mt-4">
      <?php
    foreach($produits as $produit){
      print' <div class="col-3" mt-2>
      
      <div class="card"  mt-5>
      <div class="produit">
         <div class="img-cover">
      <img src="images/'.$produit['image'].'" class="card-img-top" alt="...">
      </div>
      <div class="card-body">
        <h5 class="card-title">'.$produit['nom'].'</h5>
        
          
        <div class="rating">
        <i class="bx bxs-star"></i>
        <i class="bx bxs-star"></i>
        <i class="bx bxs-star"></i>
        <i class="bx bxs-star"></i>
        <i class="bx bxs-star"></i>
    </div>
        <p class="card-text">'.$produit['prix'].'<span class="color-red">TND</span></p>
       
      <a href="produit.php?id='.$produit['id'].'" class="btn btn-primary">Afficher_details</a>
      </div>
    </div>
   </div>
    </div>';
    }
    
    ?>
  </div>
 
      <!--endbody-->
      <!--footer-->
      <?php
     include "inc/footer.php";
       ?>
   
      <!--endfooter-->
</body>
</html>