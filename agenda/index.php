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
  <title>Agenda Medica</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
 <?php include("../templates/menu.php"); ?>
<body>
  <!-- FINAL DO MENU AZUL -->
  <br>
  <h1>Agenda Medica</h1><br>

  <table class="table table-stripped">
    <tr>
    <tr>
      <th colspan="6">
          <form action="novaAgenda.php" method="POST">
            <button type="submit" class="btn btn-success" name="btnInserir" id="btnInserir" value="btnInserir">Inserir</button>
          </form>
      </th>
    </tr>
      <th>#</th>
      <th>Medico</th>
      <th>Mes</th>
      <th>Ano</th>
      <th>Atualizar</th>
      <th>Deletar</th>
    </tr>

    <?php
    $sql = "SELECT * FROM agenda"; // Cria a sql
    $resultado = $pdo->query($sql); // Executa no banco
    $agenda = $resultado->fetchAll(); // Pega os resultados

    foreach ($agenda as $agenda) { ?>
      <tr>
        <td><?= $agenda['id'] ?></td>
        <td><?= $agenda['medico_id'] ?></td>
        <td><?= $agenda['mes'] ?></td>
        <td><?= $agenda['ano'] ?></td>
        <td><form action="alterar_medico.php" method="POST">
            <button type="submit" class="btn-sm btn-warning" name="id" id="id" value="<?= $medico['id'] ?>">Editar</button>
          </form>
        </td>
        <td><form action="excluir_medico.php" method="POST">
            <button type="submit" class="btn-sm btn-danger" name="id" id="id" value="<?= $medico['id'] ?>">Excluir</button>
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