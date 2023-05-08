
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
  $cep = filter_input(INPUT_POST, 'cep');
  $numero = filter_input(INPUT_POST, 'numero');

  $sql = "INSERT INTO pacientes 
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
            cep
          )
          VALUES (
            :nome, 
            :nascimento,
            :cpf, 
            :email, 
            :telefone, 
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
    ':cep' => $cep
  ]);

  $id = $pdo->lastInsertId();

  if($id > 0){
    header('Location: index.php');
  }else{
    header('Location: Inserir_paciente.php');
  }

}else if(!empty($btnAtualiza)) {

  $id = filter_input(INPUT_POST, 'id');
  $nome = filter_input(INPUT_POST, 'nome');
  $nascimento = filter_input(INPUT_POST, 'datanasc');
  $cpf = filter_input(INPUT_POST, 'cpf');
  $email = filter_input(INPUT_POST, 'email');
  $telefone = filter_input(INPUT_POST, 'tel');
  $rua = filter_input(INPUT_POST, 'rua');
  $bairro = filter_input(INPUT_POST, 'bairro');
  $cidade = filter_input(INPUT_POST, 'cidade');
  $estado = filter_input(INPUT_POST, 'estado');
  $cep = filter_input(INPUT_POST, 'cep');
  $numero = filter_input(INPUT_POST, 'numero');


  $sql = "UPDATE
              pacientes
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
    ':cep' => $cep
  ]);

  header('Location: index.php');

}elseif(!empty($btnExcluir)) {

  $id = filter_input(INPUT_POST, 'id');

  $sql = "DELETE FROM pacientes 
           WHERE id = $id";

  $query = $pdo->prepare($sql);
                        
  $resultado = $query->execute();

  header('Location: index.php');
}

?>