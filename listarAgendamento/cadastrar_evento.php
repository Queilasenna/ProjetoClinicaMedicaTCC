<?php
require '../conexao.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Agendar Consulta</title>
	<!-- Link para o CSS do Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		.container {
			margin: 0 auto;
			max-width: 500px;
			padding: 20px;
		}

		.form-group {
			margin-bottom: 20px;
		}

		label {
			display: block;
			margin-bottom: 5px;
		}

		input[type="text"],
		input[type="date"],
		input[type="time"],
		select {
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
		}

		/* button[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  margin-top: 20px;
} */

		button[type="submit"]:hover {
			background-color: #0069d9;
			cursor: pointer;
		}
	</style>
</head>

<body>
	<!-- INICIO DO MENU -->
	<?php include("../templates/menu.php"); ?>
	<!-- FIM DO MENU-->


	<div class="container">
		<h1 class="text-center mt-4 mb-4">Agendar Consultas</h1>
		<form method="POST" action="processa_cadastro.php">
			<div class="form-group">
				<label for="nome">Paciente:</label>

				<select class="form-control" id="paciente_id" name="paciente_id" required>
					<option value="" disabled selected>Selecione o paciente</option>

					<?php
					$pacientes = retornaDados('SELECT * FROM pacientes');

					foreach ($pacientes as $paciente) {  ?>
						<option value="<?= $paciente['id'] ?>"><?= $paciente['nome'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="data">Data:</label>
				<input type="date" class="form-control" id="data" name="data" required>
			</div>
			<div class="form-group">
				<label for="hora">Hora:</label>
				<input type="time" class="form-control" id="hora" name="hora" required>
			</div>
			<div class="form-group">
				<label for="medico">Médico:</label>
				<select class="form-control" id="medico" name="medico_id" required>
					<option value="" disabled selected>Selecione o médico</option>

					<?php
					$medicos = retornaDados('SELECT * FROM medicos');

					foreach ($medicos as $medico) {  ?>
						<option value="<?= $medico['id'] ?>"><?= $medico['nome'] ?></option>
					<?php } ?>
				</select>
			</div>

			<button type="submit" class="btn btn-success" id="btnInserir" name="btnInserir" value="btnInserir">Cadastrar</button>

			<a href='index.php'>
				<button type="button" class="btn btn-secondary">Voltar</button>
			</a>
		</form>


	</div>
	<!-- Links para o JS do Bootstrap (jQuery e Popper.js são necessários para o funcionamento do Bootstrap) -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>