<?php
    include "conexao.php";
    //Consultar no BD
    $queryConsulta = $PDO->prepare("SELECT pontos FROM pontuacao WHERE jogador = :jogador");

    //Envia parâmetros para a consulta
    $queryConsulta->execute([
        ":jogador" => $_POST['jogador']
    ]);

    //Transforma o resultado em uma array
    $resultado = $queryConsulta->fetchAll(PDO::FETCH_ASSOC);

    //Se o count for 0, é pq não existia esse jogador, se for maior que 0, já tem pontuação para esse jogador
    if(count($resultado) > 0)
    {
        //Preparar a atualização da pontuação somente quando o novo ponto for maior que o ponto já salvo
        $query = $PDO->prepare("UPDATE pontuacao  SET 
                                    pontos = :pontos
                                WHERE jogador = :jogador
                                  AND :pontos > pontos");

        if($resultado[0]['pontos'] > $_POST['pontos'])
        {
            echo "Pontuacao menor, mas ";
        }
    }
    else
    {
        //Preparar uma nova pontuação
        $query = $PDO->prepare("INSERT INTO pontuacao (  jogador,  pontos ) 
                                 VALUES ( :jogador, :pontos ) ");
    }

    //Executa o Update ou Insert
    $query->execute([
        ":jogador" => $_POST['jogador'],
        ":pontos"  => $_POST['pontos']
    ]);

    echo "Ok";
?>