<?php
    include "conexao.php";
    
    if($_POST['preferencia']=="Gato"){
        die("gatoNao");
    }

    $query = $PDO->prepare("SELECT * 
                              FROM jogador
                             WHERE login = :login");

    $query->execute([
        ":login" => $_POST['login']
    ]);
    if( $query->rowCount()  > 0) 
    {
        die("LoginExiste");
    }

    $dateobj = DateTime::createFromFormat('d/m/Y', $_POST['dt_nascimento']);
    $date = $dateobj->format('Y-m-d');

    $queryInsert = $PDO->prepare("INSERT INTO 
                    jogador(login, senha, nome, dt_nascimento, genero, nacionalidade, preferencia)
                    VALUES (:login, MD5(:senha), :nome, :dt_nascimento, :genero, :nacionalidade, :preferencia)");

    $queryInsert->execute([
        ":login"         => $_POST['login'],
        ":senha"         => $chave . $_POST['senha'],
        ":nome"          => $_POST['nome'],
        ":dt_nascimento" => $date,
        ":genero"        => $_POST['genero'],
        ":nacionalidade" => $_POST['nacionalidade'],
        ":preferencia"   => $_POST['preferencia']
    ]);

    echo "DeuBom";

?>