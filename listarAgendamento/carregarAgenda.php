<?php

session_start();
// $tempo_session = 10; // tempo em segundos
include("../temposessao.php");

include "../conexao.php";

//Limpa sessão e insere novos valores
unset($_SESSION['data']);
unset($data);
$_SESSION['data'] = $_POST['data'];
$data = $_POST['data'];

if (Empty($data)){
  header('Location: consultarAgendamento.php');
}


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
    </style> <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body>
    <?php include("../templates/menu.php"); ?>
    <br>
    
    <div class="row">
        <div class="col">
        <form action="consultarAgendamento.php">
            <button type="submit" class="btn btn-primary btn-sm" name="btnVoltar" id="btnVoltar" value="btnVoltar">Voltar</button>
        </form>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?php include "geraCalendario.php"; ?>
            <div id='calendario'></div>
        </div>
        <div class="col">
            <h2>Lista de Agendamentos</h2>
            <div class="list-group">
                <?php
                    $data = $_SESSION['data'];

                    $dataInicial = date("Y-m-01", strtotime($data));  // primeiro dia do mes da data digitada no index
                    $dataFinal   = date("Y-m-t", strtotime($data)); // ultimo dia da data digitada no index

                    $eventos = retornaDados(
                        "SELECT *, p.nome nome_paciente, m.nome nome_medico  
                           FROM eventos 
                            JOIN medicos m ON (m.id = eventos.medico_id)
                            JOIN pacientes p ON (p.id = eventos.paciente_id)
                        WHERE dataAgendamento BETWEEN :inicio AND :fim",
                        [':inicio' => $dataInicial, ':fim' => $dataFinal]
                    );
                    

                    foreach ($eventos as $evento){
                        $date = date_create($evento['dataAgendamento'] . $evento['horaAgendamento']);

                        echo '<a href="#" class="list-group-item list-group-item-action" aria-current="true">';
                        echo '<div class="d-flex w-100 justify-content-between">';
                        echo '<h5 class="mb-1">' . $evento['nome_paciente'] . '</h5>';
                        echo '<small>' . date_format($date, 'd/m/Y H:i') . '</small>';
                        echo '</div>';
                        echo '<p class="mb-1">Dr. ' . $evento['nome_medico'] . '</p>';
                        echo '</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>


<?php
}
?>