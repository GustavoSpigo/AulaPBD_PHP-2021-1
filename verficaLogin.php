<?php
    include "conexao.php";
    
    //$_POST['login']
    //$_POST['senha']

    $query = $PDO->prepare("SELECT * 
                              FROM jogador
                             WHERE login = :login
                               AND senha = MD5( :senha ) ");

    $query->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
    $query->bindValue(':senha', $_POST['senha'], PDO::PARAM_STR);
    $query->execute();

    if($query->rowCount()==1)
    {
        echo "Ok";
    }
    else
    {
        echo "Deu ruim";
    }
?>