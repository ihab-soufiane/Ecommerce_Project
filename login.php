<?php 
session_start();/////////connexion
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
}///////////////registre


$showRegistrationAleart =0;
$categories = getAllCategories();

if (!empty($_POST)){
   if( AddVisiteur($_POST)){
    $showRegistrationAleart =1;
   }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ecommerce</title>
</head>
<body>
    <div class="promo">
        <span>Vente FLASH 80% de Réduction</span>
    </div>
    <header class="header">
        <nav class="nav container">
            <div class="navigation d-flex">
                <div class="icon1">
                    <i class='bx bx-menu'></i>
                </div>
                <div class="logo">
                    <a href="index.html"><span>T</span>ek-up</a>
                </div>
                <div class="menu">
                    <div class="top">
                        <span class="fermer">Fermer <i class='bx bx-x'></i></span>
                    </div>
                    <ul class="nav_list d-flex">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="products.html" class="nav-link">Boutique</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">A propos de nous</a>
                        </li>
                        <li class="nav-item">
                            <a href="account.html" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="icons d-flex">
                    <div><i class='bx bx-search'></i></div>
                    <a href="./account.html"><div><i class='bx bx-user'></i></div></a>
                    <div><i class='bx bx-heart'></i></div>
                    <div>
                        <a href="./cart.html"><i class='bx bx-shopping-bag'></i></a>
                        <span class="align-center">0</span>    
                    </div>
                </div>
            </div>
        </nav>
    </header>


<!---------- account-page ------------->    
<div class="account-page" >
    <div class="container" >
        <div class="row">
            <div class="col-2">
                <img src="images/login.jpg" width="100%">
            </div>

            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="Indicator">
                    </div>

                    <form id="LoginForm" action="login.php" method="post">
                        <input type="text" name="email" placeholder="email">
                        <input type="password" name="password" placeholder=" Tapper Password">
                        <button type="submit" class="btn">Login</button>
                        <a href="">Forgot password</a>
                    </form>

                    <form id="RegForm" action="login.php" method="post">
                    
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
      <input type="text" class="form-control"  name="password" placeholder="password">
    </div>
    <div class="col-4">
      <input type="text" class="form-control"  name="etat" placeholder="etat">
    </div>
    <div class="col-4">
      <button type="submit" class="btn "  name="sauvgarder" placeholder="Sauvgarder">Sauvgarder</button>
    </div>
  </div>
                        <a href="">Forgot password</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


        
<!---------------------------- Footer ------------------------------->

    <footer id="footer" class="section footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-center">
                    <h3>ENTREPRISE</h3>
                    <a href="#">Marque</a>
                    <a href="#">Code promo</a>
                    <a href="#">Offre speciale</a>
                    <a href="#">Affilié</a>
                    <a href="#">Carte de site</a>
                </div>
                <div class="footer-center">
                    <h3>ENTREPRISE</h3>
                    <a href="#">Marque</a>
                    <a href="#">Code promo</a>
                    <a href="#">Offre speciale</a>
                    <a href="#">Affilié</a>
                    <a href="#">Carte de site</a>
                </div>
                <div class="footer-center">
                    <h3>ENTREPRISE</h3>
                    <a href="#">Marque</a>
                    <a href="#">Code promo</a>
                    <a href="#">Offre speciale</a>
                    <a href="#">Affilié</a>
                    <a href="#">Carte de site</a>
                </div>
                <div class="footer-center">
                    <h3>CONTACTE NOUS</h3>
                    <div>
                        <span>
                            <i class="fa fa-map-marker-alt"></i>
                        </span>
                        Avenue Tunise ,Bab bhar
                    </div>
                    <div>
                        <span>
                            <i class="fa fa-envelope" ></i>
                        </span>
                        CadeauxDesAmis@gmail.com
                    </div>
                    <div>
                        <span>
                            <i class="fa fa-phone" ></i>
                        </span>
                        71 326 753
                    </div>
                    <div>
                        <span>
                            <i class="fa fa-paper-plane"></i>
                        </span>
                        Tunisie poure de France
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            Copyright©2022 Tous droits reservés 
            <a href="#">Tek-Up</a>
        </div>
    </footer>
     
    <script type="text/javascript" src="./script.js"></script>

<!----------- js for toggle Form --------------->

<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

        function register(){
            RegForm.style.transform = "translateX(0px)"
            LoginForm.style.transform = "translateX(0px)"
            Indicator.style.transform = "translateX(100px)"
        }
        function login(){
            RegForm.style.transform = "translateX(300px)"
            LoginForm.style.transform = "translateX(300px)"
            Indicator.style.transform = "translateX(0px)"
        }
</script>
</body>
</html>