

<?php // php start
$servername="localhost:8081";
$DBuser = "root" ;
$DBpassword ="";
$DBname = "ecommerce";
try {
$conn = new PDO("mysql:host-$servername;dbname=$DBname", $DBuser, $DBpassword);
// set the PDO error mode to exception
$conn->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
echo "Connected successfully";
}catch(PDOException $e) {
echo "Connection failed:" . $e->getMessage();
}
?>




<?php
$servername = "localhost;8081";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ecommerce", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>




<?php // php start
//1-connexion vers base de donnée
$servername = "localhost;8081";
$username = "root";
$password = "";
$DBname="ecommerce";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$DBname, $username, $password");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
// 2-creatin de la requette

$requette="SELECT * FROM categories";

// 3-executuin de la requette
$resultat =$conn->query($requette);

// 4-resultat de la requette
$categories = $resultat->fetchAll();

var_dump($categories);

?>