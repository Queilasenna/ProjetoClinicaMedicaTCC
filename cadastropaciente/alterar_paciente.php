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

      .btn-del:hover {
        background-color: gray;
        color: white;
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
  <h1>Alterar Cadastro - Paciente</h1><br>
  <!-- FINAL DAS ABAS -->
<?php
  $token = $_POST['id'];

  include("../conexao.php");
  
  $query = $pdo->query("SELECT * FROM pacientes WHERE id = $token");
  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

  foreach($resultado as $item){
    $id = $item['id'];
    $nome = $item['nome'];
    $datanasc = $item['nascimento'];
    $cpf =  $item['cpf'];
    $email =  $item['email'];
    $telefone =  $item['telefone'];
    $rua =  $item['rua'];
    $bairro =  $item['bairro'];
    $cidade =  $item['cidade'];
    $numero =  $item['numero'];
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
  <form action="valida_paciente.php" method="POST">
    <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
    <div class="row mb-3">
      <div class="form-group col-md-5">
        <label for="nome">Nome Completo</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?php echo $nome ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="datanasc">Data de Nascimento</label>
        <input type="date" class="form-control" id="datanasc" name="datanasc" placeholder="" value="<?php echo $datanasc ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="" value="<?php echo $cpf ?>">
      </div>
    </div>

    <div class="row mb-3">
      <div class="form-group col-md-8">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo $email ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="tel">Telefone</label>
        <input type="tel" class="form-control" id="tel" name="tel" placeholder="" value="<?php echo $telefone ?>">
      </div>

    </div>

    <div class="row mb-3">

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
        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="" value="<?php echo $bairro ?>">
      </div>
      
      <div class="form-group col-md-2">
        <label for="numero">Número</label>
        <input type="text" class="form-control" id="numero" name="numero" placeholder="" value="<?php echo $numero ?>">
      </div>
      
    </div>
    
    <div class="row mb-3">
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

    <button type="submit" class="btn btn-primary btn-sm" id="btnAtualiza" name="btnAtualiza"  value="btnAtualiza">Atualizar</button>
    <a href='index.php'>
      <button type="button" class="btn btn-danger btn-sm">Voltar</button>
    </a>
  </form>

  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>

<?php
}
?>