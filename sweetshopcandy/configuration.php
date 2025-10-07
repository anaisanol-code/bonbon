<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$host = "localhost";
$user = "root"; 
$pass = "";     
$db = "sweetshopcandy"; 

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Erreur au niveau de la connexion : " . mysqli_connect_error());
}


?>
<link rel="stylesheet" href="style.css">
