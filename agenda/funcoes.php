<?php

    function vagas_restantes($data, $medico_id, $especialidade_id){
        $sql = "SELECT * FROM eventos WHERE dataAgendamento = :data AND medico_id = :medico_id";
    }