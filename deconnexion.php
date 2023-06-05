<?php
session_start();
session_unset();//supprimer les variable de session  
session_destroy();
header('location:index.php');


?>