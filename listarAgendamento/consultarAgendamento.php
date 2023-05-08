<?php
//Limpa a variavel de sessão data
session_start();
unset($_SESSION['data']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Tela Inicial</title>
    <style>
        .background {
            width: 100vw;
            height: 100vh;
            position: fixed;
            z-index: -1000;
            left: 0;
            top: 0;
            background-image: url('clinica.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        form {
            margin-left: 15px;
            margin-right: 40px;
        }
   
    </style>
</head>

<body>
    <?php include("../templates/menu.php"); ?>
    <br>
    <h1>Consultar Agendamento</h1>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <br>
    <div class="row">
       
        <div class="col">
            <form action="carregarAgenda.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Data do Agendamento</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Data" name="data">
                </div>
                <button type="submit" class="btn btn-primary">Consultar</button>

                <a href='index.php'>
				<button type="button" class="btn btn-secondary">Voltar</button>
			</a>
            </form>
        </div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
    </div>

    

</body>

</html>