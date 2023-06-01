<?php
session_start();
include_once '../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0px;
    }

    h1 {
      text-align: center;
    }

    .background {
      width: 100vw;
      height: 100vh;
      position: fixed;
      z-index: -1000;
      left: 0;
      top: 0;
      opacity: 0.1;
      filter: blur(19px);
      background-color: #fff;
    }

    form {
      margin-left: 15px;
      margin-right: 40px;


    }
  </style>
  <title>Lista de Pacientes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<?php include("../templates/menu.php"); ?>

<body>
  <main class="container-fluid">

    <!-- FINAL DO MENU AZUL -->
    <br>
    <h1>Lista de Pacientes</h1><br>

    <table class="table table-stripped">

        <th>#</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>Ações</th>
      </tr>

      <?php
      $sql = "SELECT * FROM pacientes"; // Cria a sql
      $resultado = $pdo->query($sql); // Executa no banco
      $pacientes = $resultado->fetchAll(); // Pega os resultados

      foreach ($pacientes as $paciente) { ?>
        <tr>
          <td><?= $paciente['id'] ?></td>
          <td><?= $paciente['nome'] ?></td>
          <td><?= $paciente['cpf'] ?></td>
          <td><?= $paciente['telefone'] ?></td>
          <td class="d-flex flex-row">
            <form class="m-0" action="alterar_paciente.php" method="POST">
              <button type="submit" class="btn btn-sm btn-warning" name="id" id="id" value="<?= $paciente['id'] ?>">Editar</button>
            </form>
          
            <form class="m-0 ms-1" action="excluir_paciente.php" method="POST">
              <button type="submit" class="btn btn-sm btn-danger" name="id" id="id" value="<?= $paciente['id'] ?>">Excluir</button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </table>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>