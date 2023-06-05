<?php 
session_start();
if(isset($_SESSION['nom'])){
    //header('location:profile.php');
}
include "../inc/functions.php";
$user=true;

if(!empty($_POST)){
    $user = ConnectAdmin($_POST);
   if(is_array($user) && count($user)> 0){
   SESSION_start();
   $_SESSION['id']=$user['id'];
    $_SESSION['email']=$user['email'];
    $_SESSION['nom']=$user['nom'];
    $_SESSION['password']=$user['password'];
   
header('location:home/profile.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.29/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>

<!-- Login Form -->
<form action="connexion.php" method="post">
  <div class="container">
    <h1 class="">Espace Administateur</h1>
  <div class="mb-3" m-5>
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control"  name="email"id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
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
";
}
?> 
</html>