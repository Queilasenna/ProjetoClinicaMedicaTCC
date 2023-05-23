<?php

//Conectando ao banco de dados
include "../conexao.php";
session_start();
$data = $_SESSION['data'];

$dataInicial = date("Y-m-01", strtotime($data));
$dataFinal   = date("Y-m-t", strtotime($data));

$consulta = $pdo->query('SELECT *, p.nome nome_paciente, m.nome nome_medico  
FROM eventos 
 JOIN medicos m ON (m.id = eventos.medico_id)
 JOIN pacientes p ON (p.id = eventos.paciente_id)
WHERE dataAgendamento BETWEEN "' . $dataInicial . '" AND "' . $dataFinal . '";');

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $vetor[] = array(
        "id"    => $linha['id'],
        "title" => $linha['nome_paciente'],
        "start" => $linha['dataAgendamento']
    );
}

//Passando vetor em forma de json
echo json_encode($vetor);
?>