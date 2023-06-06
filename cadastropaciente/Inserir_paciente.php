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
  <html lang="pt-br">

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

      .btn-cad {
        margin-top: 10px;
        border: none;
        padding: 5px;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        text-decoration: none;
      }

      .btn-cad:hover {
        background-color: #0f3e96;
        color: white;
      }

      .btn-vol {
        border: none;
        padding: 5px;
        background-color: #70809096;
        color: white;
        border-radius: 5px;
        text-decoration: none;
      }

      .btn-vol:hover {
        background-color: gray;
        color: white;
      }

      form {
        margin-left: 15px;
        margin-right: 40px;
      }
    </style>

    <title>Cadastrar Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <?php include("../templates/menu.php"); ?>

  <body>
    <br>
    <h1>Cadastro de Paciente</h1><br>

    <form action="valida_paciente.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="nome">Nome Completo</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="">
        </div>
        <div class="form-group col-md-4">
          <label for="datanasc">Data de Nascimento</label>
          <input type="date" class="form-control" id="datanasc" name="datanasc" placeholder="">
        </div>
        <div class="form-group col-md-3">
          <label for="cpf">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf" placeholder="">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="email">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="">
        </div>

        <div class="form-group col-md-4">
          <label for="tel">Telefone</label>
          <input type="tel" class="form-control" id="tel" name="tel" placeholder="">
        </div>

        <div class="form-group col-md-3">
          <label for="inputCEP">CEP</label>
          <input type="text" class="form-control" id="cep" name="cep" placeholder="" onblur="pesquisacep(this.value);">
        </div>
      </div>
      </div>

      <div class="form-row">
        
        <div class="form-group col-md-5">
          <label for="rua">Rua</label>
          <input type="text" class="form-control" id="rua" name="rua" placeholder="">
        </div>
        <div class="form-group col-md-5">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" name="bairro" placeholder="">
        </div>

        <div class="form-group col-md-2">
          <label for="numero">Número</label>
          <input type="text" class="form-control" id="numero" name="numero" placeholder="">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Cidade</label>
          <input type="text" class="form-control" name="cidade" id="cidade">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEstado">Estado</label>
          <select id="estado" name="estado" class="form-control">
            <option selected>Escolher...</option>
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

      <button type="submit" class="btn-cad" id="btnInserir" name="btnInserir" value="btnInserir">Cadastrar</button>
      <a href='index.php'>
        <button type="button" class="btn-vol">Voltar</button>
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