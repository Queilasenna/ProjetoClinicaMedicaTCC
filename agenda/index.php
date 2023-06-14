<?php
session_start();
include_once '../conexao.php';
include 'funcoes.php';
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
  <title>Agenda Medica</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<?php include("../templates/menu.php"); ?>

<body>
  <!-- FINAL DO MENU AZUL -->
  <br>
  <h1>Agenda Medica</h1><br>

  <div class="px-3">
    <form class="m-0 ms-auto" action="novaAgenda.php" method="POST">
      <button type="submit" class="btn btn-primary btn-sm" name="btnInserir" id="btnInserir" value="btnInserir">Inserir</button>
    </form>
  </div>
  <table class="table table-stripped">
    <tr>
      <th>#</th>
      <th>Medico</th>
      <th>Especialidade</th>
      <th>Dia</th>
      <th>Mês</th>
      <th>Ano</th>
      <th>Vagas Totais</th>
      <th>Vagas Restantes</th>
      <th>Ações</th>
    </tr>

    <?php
    $sql = "SELECT *, m.id medico_id, a.especialidade especialidade_agenda, a.id as idagenda FROM agenda a join medicos m on (a.medico_id = m.id)"; // Cria a sql
    $resultado = $pdo->query($sql); // Executa no banco
    $agenda = $resultado->fetchAll(); // Pega os resultados

    foreach ($agenda as $agenda) { ?>
      <tr>
        <td><?= $agenda['idagenda'] ?></td>
        <td><?= $agenda['nome'] ?></td>
        <td><?= $agenda['especialidade_agenda'] ?></td>
        <td><?= $agenda['dia'] ?></td>
        <td><?= $agenda['mes'] ?></td>
        <td><?= $agenda['ano'] ?></td>
        <td><?= $agenda['vagas'] ?></td>

        <td>
          <?php
            $data = $agenda['ano'] . '-' . $agenda['mes'] . '-' . $agenda['dia'];
            echo vagas_restantes($data, $agenda['medico_id'], $agenda['especialidade_agenda']);
          ?>
        </td>
        <td class="d-flex">
          <form class="m-0" action="alterar_agenda.php" method="POST">
            <button type="submit" class="btn btn-primary btn-sm" name="id" id="id" value="<?= $agenda['idagenda'] ?>">Editar</button>
          </form>

          <form class="m-0 ms-1" action="excluir_agenda.php" method="POST">
            <button type="submit" class="btn btn-danger btn-sm" name="id" id="id" value="<?= $agenda['idagenda'] ?>">Excluir</button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </table>

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