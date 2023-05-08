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
	.button {
		display: flex;
		width: 521px;
		margin-left: auto;
		margin-right: auto;
		text-align: center;
		
					
	}
	form .btn btn-success {
		text-align: center;
		align-items: center;
	}
	
  </style>
  <title>Lista de Pacientes</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
 <?php include("../templates/menu.php"); ?>
<body>
  <!-- FINAL DO MENU AZUL -->
  <br>

  <h1>PACIENTES AGENDADOS</h1> <br>

  <table class="table table-stripped">
    <div class="button">
	      <form action="cadastrar_evento.php" method="POST">
            <button type="submit" class="btn btn-success" name="btnInserir" id="btnInserir" value="btnInserir">Agendar Consulta</button>
          </form>
            <form action="consultarAgendamento.php" method="POST">
            <button type="submit" class="btn btn-success" name="btnInserir" id="btnInserir" value="btnInserir">Consultar Agendamento</button>
          </form>
		  
   </div>
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>CPF</th>
      <th>Telefone</th>
    
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