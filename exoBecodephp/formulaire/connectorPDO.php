<?php

$host = "mysql:host=localhost;dbname=becode";
$user = "root";
$mdp = "";

try
{
    $pdo = new PDO($host, $user, $mdp);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

 

?>