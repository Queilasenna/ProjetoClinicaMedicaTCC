<?php
session_start();
include_once '../conexao.php';
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
    <title>Lista de Médicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <?php include("../templates/menu.php"); ?>

  <body>
    <main class="container-fluid">

      <!-- Modal INICIO -->
      <div class="modal fade" id="excluirMedicoModal" tabindex="-1" role="dialog" aria-labelledby="excluirMedicoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="excluirMedicoModalLabel">Atenção:</h5>
            </div>
            <div class="modal-body"><b>Deseja realmente excluir o registro?</b></div>
            <div class="modal-footer">
              <form action="valida_medico.php" method="POST">
                <input type="hidden" id="id_medico_excluir" name="id" value="" />

                <button type="submit" class="btn btn-danger btn-sm" id="btnExcluir" name="btnExcluir" value="btnExcluir">Excluir</button>
              </form>

              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Voltar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal" id="<?php echo $seuid; ?>">
        qualquer coisa
      </div>

      <!-- Modal FIM-->

      <!-- FINAL DO MENU AZUL -->
      <br>
      <h1>Lista de Médicos</h1><br>

      <table class="table table-stripped">

        <th>#</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>Ações</th>
        </tr>

        <?php
        $sql = "SELECT * FROM medicos"; // Cria a sql
        $resultado = $pdo->query($sql); // Executa no banco
        $medicos = $resultado->fetchAll(); // Pega os resultados

        foreach ($medicos as $medico) { ?>
          <tr>
            <td><?= $medico['id'] ?></td>
            <td><?= $medico['nome'] ?></td>
            <td><?= $medico['cpf'] ?></td>
            <td><?= $medico['telefone'] ?></td>
            <td class="d-flex flex-row">
              <form class="m-0" action="alterar_medico.php" method="POST">
                <button type="submit" class="btn btn-primary btn-sm" name="id" id="id" value="<?= $medico['id'] ?>">Editar</button>
              </form>

              <!-- <form class="m-0 ms-1" action="excluir_medico.php" method="POST">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#excluirMedicoModal" name="id" id="id" value="<?= $medico['id'] ?>">Excluir</button>
                -->
              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#excluirMedicoModal" data-id="<?php echo $medico['id']; ?>" data-nome="<?php echo $medico['id']; ?>" name="id" id="id" value="<?= $medico['id'] ?>">Excluir</button>

              <!-- </form> -->
            </td>
          </tr>
        <?php } ?>
      </table>
    </main>

    <script type="text/javascript">
      const modal = document.getElementById('excluirMedicoModal');

      modal.addEventListener('show.bs.modal', event => {
        let button = event.relatedTarget;
        let id = button.getAttribute('data-id');

        let campo = document.getElementById('id_medico_excluir');
        campo.value = id;
      })

      modal.addEventListener('hidden.bs.modal', event => {
        let campo = document.getElementById('id_medico_excluir');
        campo.value = '';
      })
    </script>

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