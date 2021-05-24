<?php
    $SERVER_NAME = "localhost";
    $DATABASE_NAME = "mortal_clicker";
    $USER_NAME = "root";
    $PASSWORD = "";
    
    $chave = "ninguém vai ganhar nem perder, vai todo mundo perder";

    $PDO = new PDO("mysql:host=$SERVER_NAME;dbname=$DATABASE_NAME",$USER_NAME, $PASSWORD);
?>