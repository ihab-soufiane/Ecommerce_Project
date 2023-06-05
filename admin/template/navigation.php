<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          
        <?php 


$uri = $_SERVER['REQUEST_URI']; 
$uriAr = explode("/", $uri);
$page = end($uriAr);

?>

          <li class="nav-item">
            <a class="nav-link " <?php echo ($page == '' || $page == 'home/home.php') ? 'active' : ''; ?> href="../home/home.php">
              <span data-feather="home"></span>
              Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" <?php echo ($page == '' || $page == 'categories/listecategorie.php') ? 'active' : ''; ?> href="../categories/listecategorie.php">
              <span data-feather="file"></span>
              Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" <?php echo ($page == '' || $page == 'produits/liste.php') ? 'active' : ''; ?> href="../produits/liste.php">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" <?php echo ($page == '' || $page == 'visiteurs/liste.php') ? 'active' : ''; ?> href="../visiteurs/liste.php">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" <?php echo ($page == '' || $page == 'visiteurs/liste.php') ? 'active' : ''; ?> href="">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link "<?php echo ($page == '' || $page == 'commandes/liste.php') ? 'active' : ''; ?> href="../commandes/liste.php">
              <span data-feather="bar-chart-2"></span>
              Paniers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " <?php echo ($page == '' || $page == 'home/profile.php') ? 'active' : ''; ?> href="../home/profile.php">
              <span data-feather="layers"></span>
             Profile
            </a>
          </li>
        </ul>

      </div>
    </nav>