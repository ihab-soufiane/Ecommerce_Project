<?php 
session_start();
if(isset($_SESSION['nom'])){
    header('location:profile.php');
}
include "inc/functions.php";
$user=true;
$categories = getAllCategories();
if(!empty($_POST)){
    $user = ConnectVisiteur($_POST);
   if(is_array($user) && count($user)> 0){
   SESSION_start();
    $_SESSION['id']=$user['id'];
    $_SESSION['email']=$user['email'];
    $_SESSION['nom']=$user['nom'];
    $_SESSION['password']=$user['password'];
    $_SESSION['tel']=$user['tel'];
    $_SESSION['etat']=$user['etat'];
header('location:profile.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.29/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<?php
include "inc/header.php";
?>
<!-- Login Form -->
<form action="connexion.php" method="post">
  
  
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.29/sweetalert2.all.min.js"></script>
<?php
if(!$user){
 print"<script>
 Swal.fire({
    title:'Erreur',
    position: 'top-end',
    icon: 'error',
    title: 'verifier connexion',
    showConfirmButton: false,
    timer: 1500
  })
</script>
";}else {
    print"<script>
 Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Your work has been saved',
    showConfirmButton: false,
    timer: 1500
  })
</script>
";
}
?> 
</html>