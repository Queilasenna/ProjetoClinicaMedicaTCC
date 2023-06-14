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
  <title>Excluir Médico</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

 <?php include("../templates/menu.php"); ?>

<body>
  <!-- FINAL DO MENU AZUL -->
  <br>
  <h1> Excluir Médico</h1><br>
  <!-- FINAL DAS ABAS -->
<?php
  $token = $_POST['id'];

  include("../conexao.php");
  
  $query = $pdo->query("SELECT * FROM medicos WHERE id = $token");
  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

  foreach($resultado as $item){
    $id = $item['id'];
    $nome = $item['nome'];
  }

?>

<div class="alert alert-danger" role="alert">Deseja realmente excluir o registro: <b><?php echo $nome ?> </b>
</div>
  <form action="valida_medico.php" method="POST">
    <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />

    <button type="submit" class="btn btn-danger btn-sm" id="btnExcluir" name="btnExcluir" value="btnExcluir">Excluir</button>
    <a href='index.php'>
      <button type="button" class="btn btn-secondary btn-sm">Voltar</button>
    </a>
  </form>

  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  
  <!-- Incluir SweetAlert2 no formulário -->
  <script src="js/sweetalert2.js"></script>
  <!-- Incluir JavaScript no HTML -->
<script src="js/custom.js"></script>
</body>

</html>

<?php
}
?>