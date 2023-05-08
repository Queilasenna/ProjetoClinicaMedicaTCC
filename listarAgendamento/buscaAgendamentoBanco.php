<?php

//Conectando ao banco de dados
include "../conexao.php";
session_start();
$data = $_SESSION['data'];

$dataInicial = date("Y-m-01", strtotime($data));
$dataFinal   = date("Y-m-t", strtotime($data));

$consulta = $pdo->query('SELECT * 
                               FROM eventos
                              WHERE dataAgendamento BETWEEN "' . $dataInicial . '" AND "' . $dataFinal . '";');

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $vetor[] = array(
        "id"    => $linha['id'],
        "title" => $linha['descricao'],
        "start" => $linha['dataAgendamento']
    );
}

//Passando vetor em forma de json
echo json_encode($vetor);
?>