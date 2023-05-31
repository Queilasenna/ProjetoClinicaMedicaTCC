<?php
session_start();
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
  <title>Excluir Agenda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

 <?php include("../templates/menu.php"); ?>

<body>
  <!-- FINAL DO MENU AZUL -->
  <br>
  <h1> Excluir Agenda</h1><br>
  <!-- FINAL DAS ABAS -->
<?php
  $token = $_POST['id'];
  
  include("../conexao.php");
   
  $query = $pdo->query("SELECT * FROM agenda WHERE id = $token");
  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

  foreach($resultado as $item){
    $id = $item['id'];
    
  }


?>

<div class="alert alert-danger" role="alert">Deseja realmente excluir o registro: <b><?php echo $id ?> </b>
</div>
  <form action="validaAgenda.php" method="POST">
    <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />

    <button type="submit" class="btn btn-danger" id="btnExcluir" name="btnExcluir" value="btnExcluir">Excluir</button>
    <a href='index.php'>
      <button type="button" class="btn btn-secondary">Voltar</button>
    </a>
  </form>

  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>