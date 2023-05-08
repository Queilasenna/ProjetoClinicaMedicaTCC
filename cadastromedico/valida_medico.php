
<?php
session_start();

include("../login/conexao.php");


$btnInserir  = filter_input(INPUT_POST, 'btnInserir');
$btnAtualiza = filter_input(INPUT_POST, 'btnAtualiza');
$btnExcluir  = filter_input(INPUT_POST, 'btnExcluir');

if(!empty($btnInserir)){

  $nome = filter_input(INPUT_POST, 'nome');
  $nascimento = filter_input(INPUT_POST, 'datanasc');
  $cpf = filter_input(INPUT_POST, 'cpf');
  $email = filter_input(INPUT_POST, 'email');
  $telefone = filter_input(INPUT_POST, 'tel');
  $rua = filter_input(INPUT_POST, 'rua');
  $bairro = filter_input(INPUT_POST, 'bairro');
  $cidade = filter_input(INPUT_POST, 'cidade');
  $estado = filter_input(INPUT_POST, 'estado');
  $numero = filter_input(INPUT_POST, 'numero');
  $cep = filter_input(INPUT_POST, 'cep');
  $crm = filter_input(INPUT_POST, 'crm');
  $situacao = filter_input(INPUT_POST, 'situacao');
  $especialidade = filter_input(INPUT_POST, 'especialidade');

  $sql = "INSERT INTO medicos 
          (
            nome, 
            nascimento,
            cpf, 
            email, 
            telefone, 
            rua, 
            bairro, 
            cidade,
            numero, 
            estado,
            crm,
            situacao,
            especialidade, 
            cep
          )
          VALUES (
            :nome, 
            :nascimento,
            :cpf, 
            :email, 
            :telefone,
            :crm,
            :situacao,
            :especialidade, 
            :rua, 
            :bairro, 
            :cidade,
            :numero, 
            :estado, 
            :cep
          )";

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
    ':situacao' => $situacao,
    ':especialidade' => $especialidade,
    ':cep' => $cep
  ]);

  $id = $pdo->lastInsertId();

  if($id > 0){
    header('Location: index.php');
  }else{
    header('Location: inserir_medico.php');
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