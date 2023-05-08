<?php
session_start();

include("../login/conexao.php");


$btnInserir  = filter_input(INPUT_POST, 'btnInserir');
$btnAtualiza = filter_input(INPUT_POST, 'btnAtualiza');
$btnExcluir  = filter_input(INPUT_POST, 'btnExcluir');

if(!empty($btnInserir)){

  $vagas = filter_input(INPUT_POST, 'vagas');
  $dia = filter_input(INPUT_POST, 'dia');
  $mes = filter_input(INPUT_POST, 'mes');
  $ano = filter_input(INPUT_POST, 'ano');
  $medico = filter_input(INPUT_POST, 'medico_id');
  $especialidade = filter_input(INPUT_POST, 'especialidade');

  $sql = "INSERT INTO agenda 
          (
            vagas,
            dia,
            mes,
            ano,
            medico_id,
            especialidade
          )
          VALUES (
            :vagas,
            :dia,
            :mes,
            :ano,
            :medico_id,
            :especialidade     
          )";

  $query = $pdo->prepare($sql);
                        
  $resultado = $query->execute([
    ':vagas' => $vagas, 
    ':dia' => $dia,
    ':mes' => $mes, 
    ':ano' => $ano, 
    ':medico_id' => $medico_id, 
    ':especialidade' => $especialidade 
  ]);

  $id = $pdo->lastInsertId();

  if($id > 0){
    header('Location: index.php');
  }else{
    header('Location: novaAgenda.php');
  }

}else if(!empty($btnAtualiza)) {

  $vagas = filter_input(INPUT_POST, 'vagas');
  $dia = filter_input(INPUT_POST, 'dia');
  $mes = filter_input(INPUT_POST, 'mes');
  $ano = filter_input(INPUT_POST, 'ano');
  $medico_id = filter_input(INPUT_POST, 'medico_id');
  $especialidade = filter_input(INPUT_POST, 'especialidade');

  $sql = "UPDATE
              agenda
            SET
              vagas           = :vagas,
              mes             = :mes,
              ano             = :ano, 
              medico_id       = :medico_id, 
              especialidade   = :especialidade
            WHERE
              id = $id";

  $query = $pdo->prepare($sql);
                        
  $resultado = $query->execute([
    ':vagas' => $vagas, 
    ':mes' => $mes,
    ':ano' => $ano, 
    ':medico_id' => $medico_id, 
    ':especialidade' => $especialidade
  ]);

  header('Location: index.php');

}elseif(!empty($btnExcluir)) {

  $id = filter_input(INPUT_POST, 'id');

  $sql = "DELETE FROM agenda 
           WHERE id = $id";

  $query = $pdo->prepare($sql);
                        
  $resultado = $query->execute();

  header('Location: index.php');
}

?>