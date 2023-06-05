<?php
session_start();
include "../../inc/functions.php";
$produits = getAllProducts();
$categories = getAllCategories();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Admin Profile · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">
 
    

    <!-- Bootstrap core CSS -->
<link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">



    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="../../deconnexion.php">Deconnexion</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
  <!--nav-->
  <?php
include "../template/navigation.php";
  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Liste de Produitss</h1>
       <div>
       <a class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">Ajouter</a>
       
       </div>
      </div>
       <div>
        <?php 
       
        ?>
        
        <!--liste categories-->
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">couleur</th>
      <th scope="col">size</th>
      <th scope="col">prix</th>
      <th scope="col">image</th>
      <th scope="col">categorie</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $i=0;
        foreach ($produits as $produit){
      $i++;
        print' <tr>
        <th scope="row">'.$i.'</th>
        <td>'.$produit['nom'].'</td>
        <td>'.$produit['description'].'</td>
        <td>'.$produit['coleur'].'</td>
        <td>'.$produit['size'].'</td>
        <td>'.$produit['prix'].'</td>
        <td>'.$produit['image'].'</td>
        <td>'.$produit['categorie'].'</td>
       
        
        
        <td>
          <a  class="btn btn-success" data-toggle="modal" data-target="#editModal'.$produit['id'].'">modifier</a>
          <a href="supprimer.php?id='.$produit['id'].'"class="btn btn-danger">supprimer</a>
        </td>
      </tr>';
        }
    ?>
   
    
  </tbody>
</table>

       </div>
      </div>

      
      
    </main>

</div>


<!-- Modal  ajout-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="ajoute.php" method="POST"  enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="nom" id="" placeholder="nom categorie...">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" name="description" id="" placeholder="description..."></textarea>
        </div>
        <div class="form-group">    
            <input type="text" class="form-control" name="size" id="" placeholder="size...">
        </div>
        <div class="form-group">    
            <input type="text" class="form-control" name="couleur" id="" placeholder="couleur de produit...">
        </div>
        <div class="form-group">    
            <input type="number" class="form-control" name="prix" id="" placeholder="prix de produit...">
        </div>
        <div class="form-group">    
            <input type="file" class="form-control" name="image" id="" placeholder="image de produit...">
        </div>
        <div class="form-group">
            <select name="categorie" id="" class="form-control">
                <?php 
                foreach($categories as $index =>$categorie){
                 print'   <option value="'.$categorie['id'].'">'.$categorie['nom'].'</option>';
                }
                
                ?>
            </select>  
        </div>
        <div class="form-group">
            <input type="number" name="quantite" class="form-control" value=""placeholder="quantite de produit...">
        </div>
        <div class="form-group">
            <input type="hidden" name="createur" value="<?php echo $_SESSION['id'];?>">
        </div>
     
      
    </div>
    <div class="modal-footer">
      
      <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
    </form>
    </div>
  </div>
</div>
<?php 
   foreach ($produits as $index=>$produit){?>
    <!-- Modal modifier -->
<div class="modal fade" id="editModal<?php echo $produit['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="modifier.php" method="POST" enctype="multipart/form-data">
      
        <div class="form-group">
        <input type="hidden" name="idc" value="<?php echo $produit['id'];?> ">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="nom" id=""  value="<?php echo $produit['nom'];?>"placeholder="nom produit...">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" name="description" id="" placeholder="description..."> <?php echo $produit['description'];?></textarea>
        </div>
        <div class="form-group">    
            <input type="text" class="form-control" name="size" id=""  value="<?php echo $produit['size'];?>" placeholder="size...">
        </div>
        <div class="form-group">    
            <input type="text" class="form-control" name="couleur" id="" value="<?php echo $produit['coleur'];?>"  placeholder="couleur de produit...">
        </div>
        <div class="form-group">    
            <input type="number" class="form-control" name="prix" id="" value="<?php echo $produit['prix'];?>" placeholder="prix de produit...">
        </div>
        <div class="form-group">    
            <input type="file" class="form-control" name="image" id="" placeholder="image de produit..." value="<?php echo $produit['image'];?>">
        </div>
        <div class="form-group">
            <select name="categorie" id="" class="form-control">
                <?php 
                foreach($categories as $index =>$categorie){
                 print'   <option value="'.$categorie['id'].'">'.$categorie['nom'].'</option>';
                }
                
                ?>
            </select>  
        </div>
        <div class="form-group">
            <input type="hidden" name="createur" value="<?php echo $_SESSION['id'];?>">
        </div>
    </div>
    <div class="modal-footer">
      
      <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
    </form>
    </div>
  </div>
</div>
<?php
   }
?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
      <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="../../js/dashboard.js"></script>
  </body>
</html>
