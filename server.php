<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "holis";

try{
    //create pdo connection
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOexception $e){
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}
?>