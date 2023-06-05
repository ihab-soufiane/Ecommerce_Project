<?php

SESSION_start();
include "inc/functions.php";
$total=0;
if(isset($_SESSION['panier'])){
$total = $_SESSION['panier'][1];
}
$categories = getAllCategories();


if(!empty($_POST)){
// echo  $_POST['search'];
 $produits = searchProducts($_POST['search']);
}else {
  $produits = getAllProducts();
}
$commandes = array();
if(isset($_SESSION[ 'panier']) ){
    if(count($_SESSION['panier'][3]) > 0 ){
    $commandes = $_SESSION['panier'][3];
    }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
  <!--nav-->
  <?php
     include "inc/header.php";
  ?>
 
    <!--body-->
    <div class="row col-12 mt-4 p-5">
           <h1>liste de panier</h1>
           <table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Produit</th>
<th scope="col">Quantite</th>
<th scope="col">Total</th>
<th scope="col">Actions</th>
</tr>
</thead>
<tbody>
<?php
foreach($commandes as $index=> $commande){
print '<tr>
<th scope="row">'.($index+1). '</th>
<td>'.$commande[5].'</td>
<td>'.$commande[0].' pieces</td>
<td>'.$commande[1].' PTT </td>
<td><a href="actions/supprimer-produit-panier.php?id='.$index.'" class="btn btn-danger"> Supprimer </a></td>
</tr>';
}
?>

</tbody>
</table>
<div class="text-end mt-3">
<h3>Total <?php echo $total; ?> DTT</h3>
<hr />
<a href="actions/valider-panier.php" class="btn btn-success" style="width: 100px"> Valider </a>
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