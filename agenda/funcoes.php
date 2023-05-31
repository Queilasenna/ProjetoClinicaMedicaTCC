<?php

function vagas_restantes($dataConsulta, $medico_id, $especialidade_id)
{
    include("../login/conexao.php");

    $sql = "SELECT (SELECT vagas FROM agenda WHERE medico_id = :medico_id AND especialidade = :especialidade AND STR_TO_DATE(CONCAT(ano, '-', LPAD(mes, 2, '0'), '-', LPAD(dia, 2, '0')), '%Y-%m-%d') = :dataConsulta LIMIT 1) - count(e.id) as total FROM eventos e WHERE dataAgendamento = :dataConsulta AND medico_id = :medico_id AND especialidade = :especialidade";
    $query = $pdo->prepare($sql);

    $query->execute([
        ':medico_id' => $medico_id,
        ':dataConsulta' => $dataConsulta,
        ':especialidade' => $especialidade_id
    ]);

    $vagas = $query->fetch();

    return $vagas['total'];
}
