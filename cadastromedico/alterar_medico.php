<?php

session_start();
// $tempo_session = 10; // tempo em segundos
include("../temposessao.php");

if (isset($_SESSION["time"]) and $_SESSION["time"] + $tempo_session < time()) {
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 42000, '/');
    }
    session_unset();
    @session_destroy();

    header('Location: ../login/index.php');
} else {
    /* aqui vai o seu código normal */
    $_SESSION["time"] = time();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/cep.js"></script>
  <style>
    body {
      margin: 0px;
    }

    h1 {
      text-align: center;
    }

    form {
      margin-left: 15px;
      margin-right: 40px;


    }
  </style>
  <title>Atualização</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

 <?php include("../templates/menu.php"); ?>

<body>
  <!-- FINAL DO MENU AZUL -->
  <br>
  <h1>Alterar Cadastro - Médico</h1><br>
  <!-- FINAL DAS ABAS -->
<?php
  $token = $_POST['id'];
  include("../conexao.php");
  
  $query = $pdo->query("SELECT * FROM medicos WHERE id = $token");
  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

  foreach($resultado as $item){
    $id = $item['id'];
    $nome = $item['nome'];
    $datanasc = $item['nascimento'];
    //echo $datanasc . "<br>";
    //echo date("d/m/Y",strtotime($datanasc));
    //$datanasc = date("d/m/Y",strtotime($datanasc));
    $cpf =  $item['cpf'];
    $email =  $item['email'];
    $telefone =  $item['telefone'];
    $rua =  $item['rua'];
    $bairro =  $item['bairro'];
    $cidade =  $item['cidade'];
    $numero =  $item['numero'];
    $crm =  $item['crm'];
    $situacao =  $item['situacao'];
    $especialidade =  $item['especialidade'];
    $estado =  $item['estado'];
    $cep =  $item['cep'];


switch ($estado) {
  case $estado == "AC":
     $descEstado = "Acre";
      break;
  case $estado == "AL":
      $descEstado = "Alagoas";
      break;
  case $estado == "AP":
      $descEstado = "Amapá";
      break;
  case $estado == "AM":
      $descEstado = "Amazonas";
      break;
  case $estado == "BA":
      $descEstado = "Bahia";
      break;
  case $estado == "CE":
      $descEstado = "Ceará";
      break;
  case $estado == "DF":
      $descEstado = "Distrito Federal";
      break;
  case $estado == "ES":
      $descEstado = "Espírito Santo";
      break;
  case $estado == "GO":
      $descEstado = "Goiás";
      break;
  case $estado == "MA":
      $descEstado = "Maranhão";
      break;
  case $estado == "MT":
      $descEstado = "Mato Grosso";
      break;    
  case $estado == "MS":
      $descEstado = "Mato Grosso do Sul";
      break;    
  case $estado == "MG":
      $descEstado = "Minas Gerais";
      break;    
  case $estado == "PA":
      $descEstado = "Pará";
      break;    
  case $estado == "PB":
      $descEstado = "Paraíba";
      break;    
  case $estado == "PR":
      $descEstado = "Paraná";
      break;    
  case $estado == "PE":
      $descEstado = "Pernambuco";
      break;    
  case $estado == "PI":
      $descEstado = "Piauí";
      break;    
  case $estado == "RJ":
      $descEstado = "Rio de Janeiro";
      break;    
  case $estado == "RN":
      $descEstado = "Rio Grande do Norte";
      break;    
  case $estado == "RS":
      $descEstado = "Rio Grande do Sul";
      break;    
  case $estado == "RO":
      $descEstado = "Rondônia";
      break;    
  case $estado == "RR":
      $descEstado = "Roraima";
      break;    
  case $estado == "SC":
      $descEstado = "Santa Catarina";
      break;  
  case $estado == "SP":
      $descEstado = "São Paulo";
      break; 
  case $estado == "SE":
      $descEstado = "Sergipe";
      break; 
  case $estado == "TO":
      $descEstado = "Tocantins";
      break; 
  case $estado == "EX":
      $descEstado = "Estrangeiro";
      break;                  
}

  }

?>
  <form action="valida_medico.php" method="POST">
  <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
    <div class="form-row">
      <div class="form-group col-md-5">
        <label for="nome">Nome Completo</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?php echo $nome ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="datanasc">Data de Nascimento</label>
        <input type="date" class="form-control" id="datanasc" name="datanasc" placeholder="" value="<?php echo $datanasc; ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="" value="<?php echo $cpf ?>">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo $email ?>">
      </div>

      <div class="form-group col-md-2">
        <label for="tel">Telefone</label>
        <input type="tel" class="form-control" id="tel" name="tel" placeholder="" value="<?php echo $telefone ?>">
      </div>

      <div class="form-group col-md-2">
        <label for="crm">CRM</label>
        <input type="text" class="form-control" id="crm" name="crm" placeholder="" value="<?php echo $crm ?>">
      </div>

      <div class="form-group col-md-2">
        <label>Situação</label>
        <select class="form-control" name="situacao" id="situacao">
          <option value="A">Ativo</option>
          <option value="I">Inativo</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Especialidade:</label>
        <select class="form-control" name="especialidade" id="especialidade">
          <?php
            if (!empty($especialidade)){
              echo '<option value="'.$especialidade.'">'.$especialidade.'</option>';
            }else{
              echo '<option selected>Escolher...</option>';
            }
          ?>
          <option value="Anestesiologia">Anestesiologia</option>
          <option value="Cancerologia">Cancerologia</option>
          <option value="Cardiologia">Cardiologia</option>
          <option value="Cirurgia Geral">Cirurgia Geral</option>
          <option value="Clinico Geral">Clinico Geral</option>
          <option value="Cirurgia Plastica6">Cirurgia Plastica</option>
          <option value="Coloproctologia">Coloproctologia</option>
          <option value="Dermatologia">Dermatologia</option>
          <option value="Endocrinologia">Endocrinologia</option>
          <option value="Gastroenterologia">Gastroenterologia</option>
          <option value="Geriatria">Geriatria</option>
          <option value="Ginecologia Obstetricia">Ginecologia Obstetricia</option>
          <option value="Hematologia">Hematologia</option>
          <option value="Mastologia">Mastologia</option>
          <option value="Neurologia">Neurologia</option>
          <option value="Oftalmologia">Oftalmologia</option>
          <option value="Ortopedia">Ortopedia</option>
          <option value="Pediatria">Pediatria</option>
          <option value="Psiquiatria">Psiquiatria</option>
          <option value="Urologia">Urologia</option>
        </select>
        <!-- <button type="button" class="limpaArea">Limpar</button> -->
      </div>
    </div>
    </div>

    <div class="form-row">

    <div class="form-group col-md-2">
        <label for="inputCEP">CEP</label>
        <input type="text" class="form-control" id="cep" name="cep" placeholder="" onblur="pesquisacep(this.value);" value="<?php echo $cep ?>">
      </div>

      <div class="form-group col-md-4">
        <label for="rua">Rua</label>
        <input type="text" class="form-control" id="rua" name="rua" placeholder="" value="<?php echo $rua ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="bairro">Bairro</label>
        <input type="text" class="form-control" id="bairro" name="bairro" placeholder=" "value="<?php echo $bairro ?>">
      </div>
      
      <div class="form-group col-md-2">
        <label for="numero">Número</label>
        <input type="text" class="form-control" id="numero" name="numero" placeholder="" value="<?php echo $numero ?>">
      </div>
      
    </div>
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">Cidade</label>
        <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $cidade ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEstado">Estado</label>
        <select id="estado" name="estado" class="form-control">
        <?php
          if (!empty($estado)) {
            echo '<option value="'.$estado.'">'.$descEstado.'</option>';
          } else {
            echo '<option selected>Escolher...</option>';
          }          
        ?>
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
          <option value="EX">Estrangeiro</option>
        </select>
      </div>
  
    </div>

    <button type="submit" class="btn btn-primary" id="btnAtualiza" name="btnAtualiza"  value="btnAtualiza">Atualizar</button>
    <a href='index.php'>
      <button type="button" class="btn btn-danger">Voltar</button>
    </a>
  </form>

  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

<?php
}
?>