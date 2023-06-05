<?php
session_start();
include "inc/functions.php";
$categories = getAllCategories();

if (isset($_GET['id'])){
    $produit =  getProduitById($_GET['id']);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
  <!--nav-->
  <?php
     include "inc/header.php";
  ?>
 
    <!--body-->
    <div class="row col-12 mt-4">
        <?php if(isset($_SESSION['etat']) && ($_SESSION['etat'] == 0)){ // utilisateur non validee
            print '<div class="alert alert-danger">
                   Compte non validee
                   </div>';
               }
        ?>
    <div class="card">
  <img src="images/<?php echo $produit['image']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $produit['nom']?></h5>
    <p class="card-text"><?php echo $produit['description']?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $produit['coleur']?></li>
    <li class="list-group-item"><?php echo $produit['size']?></li>
    <li class="list-group-item"><?php echo $produit['prix']?>TND</li>
    <?php
        foreach($categories as $index => $categorie){
          if ($categorie['id'] == $produit['categorie']){
               print'<button class="btn btn-primary">'.$categorie['nom'].'</button>';
          }
        }
    ?>
    
  </ul>
  
</div>
   <div>
      <form  method ="POST" action="actions/commander.php">
       <input type="hidden" value="<?php echo $produit['id']?>" name="produit">
       <input type="number" step="1" name="quantite" placeholder="tapper quantite de produit"id="">
       <button type="submit"  <?php if(isset($_SESSION['etat']) && $_SESSION['etat'] == 0 || !isset($_SESSION['etat'])){echo"disabled";} ?> class="btn btn-primary">Commander</button>  
       </form>
      </div>
  </div>
      <!--endbody-->
      <!--footer-->
      <div class="text-white bg-dark "  >
          <p>hipoo2022</p>

      </div>
      <!--endfooter-->
</body>
</html>