<?php
function connect(){
    $host = "localhost";
    $databaseName = "ecommerce";
    $username = "root";
    $password = "";
    $dsn = "mysql:host=$host;dbname=$databaseName";
    try{
    $databaseConnection = new PDO($dsn, $username, $password);
    //echo "Connection successful";
    }catch (PDOException $error){
    echo "$error";
    }
    return  $databaseConnection;
}
function getAllCategories(){
/* Database connexion */
$databaseConnection = connect();
// 2-creatin de la requette

$requette="SELECT * FROM categories";

// 3-executuin de la requette
$resultat =$databaseConnection->query($requette);

// 4-resultat de la requette
$categories = $resultat->fetchAll();

//var_dump($categories);
return $categories;
}

function getAllProducts(){
/* Database connexion */
$databaseConnection = connect();
// 2-creatin de la requette

$requette="SELECT * FROM produits";

// 3-executuin de la requette
$resultat =$databaseConnection->query($requette);

// 4-resultat de la requette
$produits = $resultat->fetchAll();

//var_dump($categories);
return $produits;
}

function searchProducts($keywords){
    /* Database connexion */
    $databaseConnection = connect();
    // 2-creatin de la requette
    
    $requette="SELECT * FROM produits WHERE description LIKE '%$keywords% '";
    
    // 3-executuin de la requette
    $resultat =$databaseConnection->query($requette);
    
    // 4-resultat de la requette
    $produits = $resultat->fetchAll();
    
    //var_dump($categories);
    return $produits ;
    }
function getProduitById($id){

  /* Database connexion */
    $databaseConnection = connect();
    // 2-creatin de la requette
    
    $requette="SELECT * FROM produits WHERE id= $id";
    
    // 3-executuin de la requette
    $resultat =$databaseConnection->query($requette);
    
    // 4-resultat de la requette
    $produit = $resultat->fetch();
    
    //var_dump($categories);
    return $produit;
    }

    function AddVisiteur($data){
        $databaseConnection = connect();
        $motpassehash=md5($data['motpasse']);
        $requette = "INSERT INTO visiteurs(nom,email,tel,motpasse)VALUES('".$data['nom']."','".$data['email']."','".$data['tel']."','".$motpassehash."')";
        $resultat=$databaseConnection->query($requette);
        if ($resultat){
            return true;
        }else{
            return false;
        }
    }
function ConnectVisiteur($data){
   /* Database connexion */
   $databaseConnection = connect();
   // 2-creatin de la requette
   $email=$data['email'];
   $password=md5($data['motpasse']);
   $requette="SELECT * FROM visiteurs WHERE email='$email'AND motpasse='$password'";
   $resultat=$databaseConnection->query($requette);
   $user=$resultat->fetch();
//var_dump($user);
return $user;
  }
  function ConnectAdmin($data){
    /* Database connexion */
    $databaseConnection = connect();
    // 2-creatin de la requette
    $email=$data['email'];
    $password=md5($data['password']);
    $requette="SELECT * FROM administrateur WHERE email='$email'AND motpasse='$password'";
    $resultat=$databaseConnection->query($requette);
    $user=$resultat->fetch();
 //var_dump($user);
 return $user;
   }
function getAllUsers(){
       /* Database connexion */
   $databaseConnection = connect();
   // 2-creatin de la requette
   
   $requette="SELECT * FROM visiteurs WHERE etat=0";
   $resultat=$databaseConnection->query($requette);

   $users=$resultat->fetchAll();
//var_dump($users);
return $users;
  }

function getAllStocks(){
     /* Database connexion */
     $databaseConnection = connect();
     // 2-creatin de la requette
     
     $requette="SELECT S.id , P.nom , S.quantite FROM stock S, produits P WHERE P.id = S.produit";
     $resultat=$databaseConnection->query($requette);
  
     $stocks=$resultat->fetchAll();
  //var_dump($users);
  return $stocks;
 

}

function getAllPaniers(){

    /* Database connexion */
    $databaseConnection = connect();
    // 2-creatin de la requette
    
    $requette="SELECT v.nom ,v.tel ,v.email, p.date_creation , p.total,p.id,p.etat FROM paniers p , visiteurs v WHERE p.visiteur = v.id ";
    $resultat=$databaseConnection->query($requette);
 
    $paniers=$resultat->fetchAll();
 //var_dump($paniers);
 return $paniers;
}
function getAllCommandes(){

  /* Database connexion */
  $databaseConnection = connect();
  // 2-creatin de la requette
  
  $requette="SELECT p.nom,p.image,c.quantite , c.panier, c.total FROM produits p , commandes c WHERE c.produit = p.id ";
  $resultat=$databaseConnection->query($requette);

  $commandes=$resultat->fetchAll();
//var_dump($commandes);
return $commandes;
}

 
 function changerEtatPanier($data){
  /* Database connexion */
 $databaseConnection = connect();
 // 2-creatin de la requette
 $requette = "Update paniers SET etat='".$data['etat']."' Where id='".$data['panier_id']."'";
$resultat = $databaseConnection->query($requette);
  }
  
  
  function getPaniersByEtat($paniers,$etat){
    $paniersEtat = array();
    foreach($paniers as $p){
    if($p['etat'] == $etat ){
    array_push($paniersEtat,$p);
    }
  }
    return $paniersEtat;
    }
  function EditAdmin($data){
      $databaseConnection = connect();
      if($data['password'] !=" "){ // mot de passe a une valeur
      $requette = "Update administrateur SET nom='".$data['nom']."' , email='".$data['email']."', motpasse='".md5($data['password'])."' Where id='".$data['id_admin']."'";
      }else{
      $requette = "Update administrateur SET nom='".$data['nom']."' , email='".$data[ 'email']."' Where id='".$data['id_admin']."'";
      }
      $resultat = $databaseConnection->query($requette);
      return true;
      }


      function getData(){
        $data = array();
        $conn = connect();
        // calculer le nombre des produits dans la base
        $requette = "SELECT COUNT(*) from produits";
        $resultat = $conn->query($requette);
        $nbrPrds = $resultat->fetch();
        // calculer le nombre des categories dans la base
        $requettel = "SELECT COUNT(*) from categories";
        $resultat1 = $conn->query ($requettel);
        $nbrCat = $resultat1->fetch();
        // calculer le nombre des visiteurs dans la base
        $requette2 = "SELECT COUNT(*) from visiteurs";
        $resultat2 = $conn->query($requette2);
        $nbrClients = $resultat2->fetch();
        $data["produits"] = $nbrPrds[0]; 
        $data["categories"] = $nbrCat[0];
        $data["clients"] = $nbrClients[0];
        return $data;
        }
  



?>
