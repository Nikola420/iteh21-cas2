<?php 

$host = "localhost";
$db = "kolokvijumi";
$user = "root";
$password = "";



$conn = new mysqli($host,$user,$password,$db);

if($conn->connect_errno){
    exit("Neuspesna konekcija: ".$conn->connect_error); 
}



?>