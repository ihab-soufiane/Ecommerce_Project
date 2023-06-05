<?php 
session_start();
if(isset($_SESSION['nom'])){
    header('location:profile.php');
} 
include "inc/functions.php";
$showRegistrationAleart =0;
$categories = getAllCategories();

if (!empty($_POST)){
   if( AddVisiteur($_POST)){
    $showRegistrationAleart =1;
   }
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
    
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.29/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<?php
include "inc/header.php";
?>
<form action="registre.php" method="post">
  <div class="form-row col-8 mt-5">
    <div class="col-4">
      <input type="text" class="form-control" name="nom" placeholder="nom">
    </div>
    <div class="col-4">
      <input type="text" class="form-control"  name="email" placeholder="email">
    </div>
    <div class="col-4">
      <input type="text" class="form-control"  name="tel" placeholder="tel">
    </div>
    <div class="col-4">
      <input type="text" class="form-control"  name="motpasse" placeholder="password">
    </div>
    <div class="col-4">
      <input type="text" class="form-control"  name="etat" placeholder="etat">
    </div>
    <div class="col-4">
      <button type="submit" class="btn btn-primary"  name="sauvgarder" placeholder="sauvgarder">
    </div>
  </div>
</form>  
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.29/sweetalert2.all.min.js"></script>
<?php
if(  $showRegistrationAleart ==1){
 print"<script>
 Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Your work has been saved',
    showConfirmButton: false,
    timer: 1500
  })
</script>
";}
?>
</html>