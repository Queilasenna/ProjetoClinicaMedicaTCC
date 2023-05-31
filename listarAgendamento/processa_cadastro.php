
<?php
session_start();

include("../conexao.php");
include('../agenda/funcoes.php');

$btnInserir  = filter_input(INPUT_POST, 'btnInserir');
$btnAtualiza = filter_input(INPUT_POST, 'btnAtualiza');
$btnExcluir  = filter_input(INPUT_POST, 'btnExcluir');

if(!empty($btnInserir)){

    $data = filter_input(INPUT_POST, 'data');
    $hora = filter_input(INPUT_POST, 'hora');
    $medico_id = filter_input(INPUT_POST, 'medico_id');
    $paciente_id = filter_input(INPUT_POST, 'paciente_id');
    $especialidade_id = filter_input(INPUT_POST, 'especialidade_id');

    $vagasRestantes = vagas_restantes($data, $medico_id, $especialidade_id);

    if($vagasRestantes < 1){
      $msg = "Não existem mais vagas para o agendamento";
      header('Location: cadastrar_evento.php?msg=' . $msg);
      exit;
    }

  $sql = "INSERT INTO eventos 
          (
            dataAgendamento,
            horaAgendamento,
            medico_id,
            paciente_id
          )
          VALUES (
            :data,
            :hora,
            :medico_id,
            :paciente_id
          )";

  $query = $pdo->prepare($sql);
                        
  $resultado = $query->execute([
    ':data' => $data, 
    ':hora' => $hora,
    ':medico_id' => $medico_id, 
    ':paciente_id' => $paciente_id
  ]);

  $id = $pdo->lastInsertId();

  if($id > 0){
    header('Location: index.php');
  }else{
    header('Location: cadastrar_evento.php');
  }

}else if(!empty($btnAtualiza)) {

  $id = filter_input(INPUT_POST, 'id');
  $nome = filter_input(INPUT_POST, 'nome');
  $nascimento = filter_input(INPUT_POST, 'datanasc');
  $cpf = filter_input(INPUT_POST, 'cpf');
  $email = filter_input(INPUT_POST, 'email');
  $telefone = filter_input(INPUT_POST, 'tel');
  $crm = filter_input(INPUT_POST, 'crm');
  $situacao = filter_input(INPUT_POST, 'situacao');
  $especialidade = filter_input(INPUT_POST, 'especialidade');
  $rua = filter_input(INPUT_POST, 'rua');
  $bairro = filter_input(INPUT_POST, 'bairro');
  $cidade = filter_input(INPUT_POST, 'cidade');
  $estado = filter_input(INPUT_POST, 'estado');
  $cep = filter_input(INPUT_POST, 'cep');
  $numero = filter_input(INPUT_POST, 'numero');


  $sql = "UPDATE
              medicos
            SET
              nome        = :nome,
              nascimento  = :nascimento,
              cpf         = :cpf, 
              email       = :email, 
              telefone    = :telefone, 
              rua         = :rua, 
              bairro      = :bairro, 
              cidade      = :cidade,
              numero      = :numero,
              crm         = :crm,
              situacao    = :situacao,
              especialidade = :especialidade,
              estado      = :estado,  
              cep         = :cep
            WHERE
              id = $id";

  $query = $pdo->prepare($sql);
                        
  $resultado = $query->execute([
    ':nome' => $nome, 
    ':nascimento' => $nascimento,
    ':cpf' => $cpf, 
    ':email' => $email, 
    ':telefone' => $telefone, 
    ':rua' => $rua, 
    ':bairro' => $bairro, 
    ':cidade' => $cidade,
    ':numero' => $numero,  
    ':estado' => $estado,
    ':crm' => $crm,
    ':especialidade' => $especialidade,
    ':situacao' => $situacao, 
    ':cep' => $cep
  ]);

  header('Location: index.php');

}elseif(!empty($btnExcluir)) {

  $id = filter_input(INPUT_POST, 'id');

  $sql = "DELETE FROM medicos 
           WHERE id = $id";

  $query = $pdo->prepare($sql);
                        
  $resultado = $query->execute();

  header('Location: index.php');
}

?>