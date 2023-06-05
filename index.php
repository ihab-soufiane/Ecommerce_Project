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

    <div class="banniere">
            <div class="banniere-contenu d-flex container">
                <div class="gauche">
                    <span class="Sous-titre">OBTENEZ VOTRE COLLECTION PRINTEMPS</span>
                    <h1 class="titre">
                        Jusqu'à
                        <span class="coleur">80% <br/>
                           de réduction</span>
                           sur <br/>
                           nos offre de chaque moi 
                    </h1>
                    <h5>Du 5 Avril au 5 mai 2022</h5>
                    <a href="./products.html" class="btn">ACHETEZ MAINTENANT</a>
                </div>
                  <div class="droit">
                    <img src="images/banner_1.png" alt="" width="120%" height="100%">
                  </div>
            </div>
    </div>
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
  <section class="section">
        <div class="titre">
            <h1><span>Produits Par</span> Categories</h1>
        </div>
        <div class="row col-12 mt-4">
        <?php
    foreach($categories as $categorie){
        print'<div class="col-4"> 
      <div class="card " >
      <td ><a href=""><img src="images/'.$categorie['image'].'" width="500" height="500" /></a></td>
        <div class="card-body">
          <h3 class="card-title"><a href="">'.$categorie['nom'].'</a></h3>
        </div>
      </div>
    </div>
        ';
        }
        ?>
        </div>
    </section>
    
    <section class="section services">
    <div class="titre">
            <h1><span>Les clients parlent</span> de nos services</h1>
        </div>
     
        <div class="service-center container-fluid">
        <div class="service">
            <span class="icon"><div><i class='bx bx-purchase-tag'></i></div></span>
            <h4>Livresion gartuite</h4>
            <span class="text">Commande superieur a TND 100</span>
        </div>
        <div class="service">
            <span class="icon"><div><i class='bx bx-lock'></i></div></span>
            <h4>Paiemennt securisé</h4>
            <span class="text">Moyens de paiement populaires</span>
        </div>
        <div class="service">
            <span class="icon"><div><i class='bx bxs-left-arrow-circle'></i></div></span>
            <h4>15-Jours pour retour</h4>
            <span class="text">Produit 100% garantie</span>
        </div>
        <div class="service">
            <span class="icon"><div><i class='bx bx-headphone'></i></div></span>
            <h4>24/7 Support</h4>
            <span class="text">Assistance Clien</span>
        </div>
    </div>    

    </section>
      <!--endbody-->
      <!--footer-->
      <?php
     include "inc/footer.php";
       ?>
  
      <!--endfooter-->
</body>
</html>