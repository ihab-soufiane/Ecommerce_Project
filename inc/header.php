 <!--nav
 <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            
          <?php
              foreach($categories as $categorie){
           print ' <li><a class="dropdown-item" href="#">'. $categorie['nom'].' </a></li>';  
            }
              ?>  
            
          
          </ul>
        </li>
        <form class="d-flex" role="search" action="index.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
        <?php
            if (isset($_SESSION['nom'])){
              print' <li class="nav-item">
              <a class="nav-link" href="profile.php"><div><i class="bx bx-user"></i></div></a>
            </li>';
            if(isset($_SESSION['panier']) && is_array($_SESSION['panier'][3])){
              print '<li class-"nav- item">
              <a class="nav-link active" aria-current="page" href="panier.php"><i class="bx bx-shopping-bag" width="100px"></i><span class="text-danger">( '. count($_SESSION['panier'][3]) .')</span></a>
              </li>';
              }else
              {
              print '<li class="nav-item">
              <a class="nav-link active" aria-current-"page" href="panier.php"><div><i class="bx bx-shopping-bag"></i></div><span">( 0 )</span></a>
              </li>'
             ;
              }
                }   else{
              print' <li class="nav-item">
              <a class="nav-link" href="connexion.php"><div><i class="bx bx-user"></i></div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="registre.php"><div><i class="bx bx-user"></i></div></a>
            </li>';
            }
        ?>
       
      </ul>
      
    </div>
  </div>
</nav>
 nav-->
 <header class="header">
 <div class="promo">
        <span>Vente FLASH 80% de Réduction</span>
    </div>
 <nav class="nav container p-2">
            <div class="navigation d-flex">
                <div class="icon1">
                    <i class='bx bx-menu'></i>
                </div>
                <div class="logo">
                    <a href="index.html"><span>E</span>-shop</a>
                </div>
                <div class="menu">
                    <div class="top">
                        <span class="fermer">Fermer <i class='bx bx-x'></i></span>
                    </div>
                    <ul class="nav_list d-flex">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="AllProduit.php" class="nav-link">Boutique</a>
                        </li>
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="./apropo.html" class="nav-link">A propos de nous</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
                <form class="d-flex" role="search" action="index.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <?php
            if (isset($_SESSION['nom'])){
              print'<div class="icons d-flex">
              <a class="nav-link" href="profile.php"><div><i class="bx bx-user"></i></div></a>
            </div>';
            if(isset($_SESSION['panier']) && is_array($_SESSION['panier'][3])){
              print ' <div class="icons d-flex">
              <div>
                   <a href="panier.php"><i class="bx bx-shopping-bag"></i></a>
                    <span class="align-center "><h5 class="text-white"> '. count($_SESSION['panier'][3]) .'</h1></span>    
                </div>
            </div>  ';
              }else
              {
              print ' <div class="icons d-flex">
              <div>
                   <a href="panier.php"><i class="bx bx-shopping-bag"> </i><span class="align-center" >0</span></a>
                       
                </div>
            </div>  '
              
             ;
              }
                }   else{
              print' <div class="icons d-flex">
              <a class="nav-link" href="login.php"><div><i class="bx bx-user"></i></div></a>
            </div>
          ';
            }
        ?>
                
                
                    
      
                </div>
            </div>
            </div>
        </nav>
 </header>
        <hr>