<?php
    include '../conexao.php';

    $dias_selecionados = $_POST['diaSemana'];
    $vagas = $_POST['vagas'];
    $medico_id = $_POST['medico_id'];
    $especialidade_id = $_POST['especialidade_id'];

    // Definir o mês e ano desejados
    $data = explode('-', $_POST['mes']);

    $mes = $data[1];
    $ano = $data[0];

    // Obter o número de dias do mês
    $num_dias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

    // Loop para passar por todos os dias do mês
    for ($dia = 1; $dia <= $num_dias; $dia++) {
        $data = "$ano-$mes-$dia";

        // Converter a data para o formato timestamp
        $timestamp = strtotime($data);

        // Verificar o dia da semana (0 - Domingo, 1 - Segunda, 2 - Terça, etc.)
        $dia_da_semana = date('w', $timestamp);

        if (in_array($dia_da_semana, $dias_selecionados)) {
            // Insere no banco de dados o registro de agenda
            $sql = "INSERT INTO agenda (dia, mes, ano, vagas, medico_id, especialidade) VALUES (:dia, :mes, :ano, :vagas, :medico_id, :especialidade_id)";
            
            $query = $pdo->prepare($sql);
                        
            $resultado = $query->execute([
                ':dia' => $dia,
                ':mes' => $mes,
                ':ano' => $ano,
                ':vagas' => $vagas,
                ':medico_id' => $medico_id,
                ':especialidade_id' => $especialidade_id
            ]);
        }

    }

    header('Location: /tcc/agenda/index.php');
