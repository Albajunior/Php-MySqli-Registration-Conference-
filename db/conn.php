<?php
    $host='localhost';
    $db='resevationrdv';
    $user='root';
    $pass='';
    $charset='utf8mb4';

    $connection = new mysqli($host, $user, $pass, $db);
     
    if($connection->connect_error){
        die("Error connecting to" . $connection->connect_error);
    }

    require_once 'crud.php';
    $crud = new crud($connection);
    require_once 'user.php';
    $user = new user($connection);

   // $user->insertUser('admin4', 'password');
?>

