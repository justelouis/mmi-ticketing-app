<?php

require_once __DIR__ . "/../config.php";
$prefixeTable = "sae203_";

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $psw);
    session_start();
}catch (PDOException $e) 
{ 
    die('Une erreur a été trouvée : '. $e->getMessage());
}