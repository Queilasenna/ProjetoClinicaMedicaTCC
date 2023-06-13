<?php
session_start();
require '../conexao.php';
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
	<html>

	<head>
		<title>Agendar Consulta</title>
		<!-- Link para o CSS do Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
			<?php
			if (isset($_GET['msg'])) { ?>
				<div class="alert alert-danger">
					<?= $_GET['msg'] ?>
				</div>
			<?php } ?>

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

				<div class="form-group">
					<label>Especialidade:</label>
					<select class="form-control" name="especialidade_id" id="especialidade_id">
						<option value="">Todas</option>
						<option value="1">Anestesiologia</option>
						<option value="2">Cancerologia</option>
						<option value="3">Cardiologia</option>
						<option value="4">Cirurgia Geral</option>
						<option value="5">Clinico Geral</option>
						<option value="6">Cirurgia Plastica</option>
						<option value="7">Coloproctologia</option>
						<option value="8">Dermatologia</option>
						<option value="9">Endocrinologia</option>
						<option value="10">Gastroenterologia</option>
						<option value="11">Geriatria</option>
						<option value="12">Ginecologia Obstetricia</option>
						<option value="13">Hematologia</option>
						<option value="14">Mastologia</option>
						<option value="15">Neurologia</option>
						<option value="16">Oftalmologia</option>
						<option value="17">Ortopedia</option>
						<option value="18">Pediatria</option>
						<option value="19">Psiquiatria</option>
						<option value="20">Urologia</option>
					</select>
					<!-- <button type="button" class="limpaArea">Limpar</button> -->
				</div>

				<button type="submit" class="btn btn-primary btn-sm" id="btnInserir" name="btnInserir" value="btnInserir">Cadastrar</button>

				<a href='index.php'>
					<button type="button" class="btn btn-secondary btn-sm">Voltar</button>
				</a>
			</form>


		</div>
		<!-- Links para o JS do Bootstrap (jQuery e Popper.js são necessários para o funcionamento do Bootstrap) -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

	</html>

<?php
}
?>