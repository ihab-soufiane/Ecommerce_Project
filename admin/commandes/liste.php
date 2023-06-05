<?php
session_start();
include "../../inc/functions.php";
 if(isset($_POST['sauvgarder'])){
  //changer l'etat de panier
  changerEtatPanier($_POST);
}

$paniers = getAllPaniers();
$commandes= getAllCommandes();

if(isset($_POST['btnSearch'])){
  if ($_POST['etat'] == "tout"){
    $paniers = getAllPaniers();
  }else{
  $paniers = getPaniersByEtat($paniers,$_POST['etat']);
  }
 } 
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
        <h1 class="h2">Liste de Paniers</h1>
       
      </div>
       <div>
     
        
        <!--liste categories-->
        <form action="<?php echo $_SERVER['PHP_SELF' ]; ?>" method="POST">
          <div class="form-group d-flex">
                  <select name="etat" class="form-control">
                           <option value=""> -- Choisir l'etat -- </option>
                           <option value="tout">Tout</option>
                           <option value="EnCours">En cours</option>
                           <option value="en livraison">En livraison</option>
                          <option value="livraison termine">Livraison termine</option>
                  </select>
                 <input type="submit" class="btn btn-primary ml-2" name="btnSearch" value="Chercher" />
           </div>
        </form>
    <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Client</th>
                      <th scope="col">Total</th>
                      <th scope="col">Date_creation</th>
                      <th scope="col">Email</th>
                      <th scope="col">Etat</th>
                      <th scope="col">Telephone</th>
                    
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=0;
                        foreach ($paniers as $p){
                      $i++;
                        print' <tr>
                        <th scope="row">'.$i.'</th>
                        <td>'.$p['nom'].'</td>
                        <td>'.$p['total'].'</td>
                        <td>'.$p['date_creation'].'</td>
                        <td>'.$p['email'].'</td>
                        <td>'.$p['etat'].'</td>
                        <td>'.$p['tel'].'</td>
                        <td>
                          <a  class="btn btn-success" data-toggle="modal" data-target="#commandes'.$p['id'].'">Affichier</a>
                          <a  class="btn btn-primary" data-toggle="modal" data-target="#traiter'.$p['id'].'">Traiter</a>
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

<?php 
   foreach ($paniers as $index=>$p){?>
    <!-- Modal modifier -->
<div class="modal fade" id="commandes<?php echo $p['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Liste des commandes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
             <thead>
                   <tr>
                      <th>Nom Article</th>
                      <th>Image</th>
                      <th>quantite</th>
                      <th>Panier</th>
                      <th>Total</th>
              
                   </tr>
             </thead>
             <tbody>
               <?php 
               foreach($commandes as $index => $c){
                if($c['panier']==$p['id']){
               print'
                   <tr>
                       <td>'.$c['nom'].'</td>
                       <td><img src="../../images/'.$c['image'].'" width="100"/></td>
                       <td>'.$c['quantite'].'</td>
                       <td>'.$c['panier'].'</td>
                       <td>'.$c['total'].'</td>
                   </tr>';
                  }
               }
               ?>
             </tbody>

        </table>
        
      
    </div>
    <div class="modal-footer">
      
    
    </div>
  
    </div>
  </div>
</div>
    <?php
   }
   foreach ($paniers as $index=>$p){?>
    <!-- Modal modifier -->
<div class="modal fade" id="traiter<?php echo $p['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Liste des commandes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <input type="hidden" value="<?php echo $p['id']; ?>" name="panier_id"> 
            <div class="form-group">
            <select name= "etat" class="form-control">
            <option value= "en livraison">En livraison</option>
            <option value="livraison termine">Livraison termine</option>
            </select>
            </div>
            <div class="form-group">
            <button type="submit" name="sauvgarder" class="btn btn-primary">Sauvgarder</button>
            </div>
      </form>
      
    </div>
    <div class="modal-footer">
      
    
    </div>
  
    </div>
  </div>
</div>
    <?php
   }
?>


     <script> 
       function popUpDeleteCategorie(){
        return confirm("vous avez supprimer la categorie?");
       }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
      <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        
        <script src="../../js/dashboard.js"></script>
  </body>
</html>
