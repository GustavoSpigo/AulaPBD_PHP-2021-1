<?php
    $SERVER_NAME = "localhost";
    $DATABASE_NAME = "mortal_clicker";
    $USER_NAME = "root";
    $PASSWORD = "";

    $PDO = new PDO("mysql:host=$SERVER_NAME;dbname=$DATABASE_NAME",$USER_NAME, $PASSWORD);
?>