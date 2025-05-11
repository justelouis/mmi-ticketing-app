<?php

$prefixeTable = "";
try {
    $bdd = new PDO("mysql:host=localhost;dbname=sae203;charset=utf8", "root", "");
    session_start();
}catch (PDOException $e) 
{ 
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=db-cadixlou;charset=utf8", "usr-cadixlou", "(ekclndvchZL");
        $prefixeTable = "sae203_";
        session_start();
    } catch (PDOException $e) {
        die('Une erreur a été trouvée : '. $e->getMessage());
    }
}