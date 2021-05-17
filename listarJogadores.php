<?php
    include "conexao.php";
    
    $query = $PDO->prepare("SELECT * 
                              FROM pontuacao 
                             ORDER BY pontos DESC
                             LIMIT :limite");

    $query->bindValue(':limite', $_POST['limite'], PDO::PARAM_INT);
    $query->execute();

    //print_r(json_encode(array("objetos" => $query->fetchAll(PDO::FETCH_ASSOC))));
    
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode(array("objetos" => $resultado));

    print_r($json);
?>