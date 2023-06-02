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

            .btn-rel {
                padding: 6px;
                background-color: #007bff ;
                color: white;
                border-radius: 5px;
                text-decoration: none;
            }

            .btn-rel:hover {
                background-color: #005BBB;
                color: white;
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

            .card-body {

                text-align: center;
            }
        </style>
        <title>Lista de Pacientes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <?php include("../templates/menu.php"); ?>

    <body>
        <!-- FINAL DO MENU AZUL -->
        <br>
        <div class="container">
            <h1 class="mb-3 display-3">Relatórios</h1>

            <div class="row g-3 justify-content-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pacientes</h5>
                            <p class="card-text">
                                <i class="fa fa-users" aria-hidden="true" style="font-size:48px; color:#007bff"></i>
                            </p>
                            <a href="paciente/pacientes.php" class="btn-rel" target="_blank">Gerar Relatório</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Agendamentos</h5>
                            <p class="card-text">
                                <i class="fa fa-address-book" aria-hidden="true" style="font-size:48px; color: #007bff"></i>
                            </p>
                            <a href="agendamentos/agendamentos.php" class="btn-rel" target="_blank">Gerar Relatório</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Médicos</h5>
                            <p class="card-text">
                                <i class="fa fa-user-md" aria-hidden="true" style="font-size:48px; color:#007bff"></i>
                            </p>
                            <a href="medico/medicos.php" class="btn-rel" target="_blank">Gerar Relatório</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- JavaScript (Opcional) -->
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>

    </html>


<?php
}
?>