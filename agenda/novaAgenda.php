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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Tela Inicial</title>
    <style>
        .bloco {
            width: 500px;
            margin: 0 auto;

        }

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

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include("../templates/menu.php"); ?>
    <br>
    <h1>Criar Agenda</h1>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <br>
    <div class="bloco">
        <div class="row mb">

            <div class="form-group col>
                <form action="processaAgenda.php" method="POST">

                    <div class="form-group">
                        <label for="medico">Médico:</label>
                        <select class="form-control" id="medico" name="medico_id">
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

                    <div class="form-group">
                        <label for="exampleInputEmail1">Mês</label>
                        <input type="month" name="mes" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Vagas</label>
                        <input type="Text" class="form-control" id="exampleInputEmail1" name="vagas">
                    </div>

                    <div class="form-group">
                        <label for="">Dias da semana de atendimento: </label>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="diaSemanaNews" name="diaSemana[]" value="0">
                                <label for="diaSemanaNews">Dom</label>
                            </div>

                            <div>
                                <input type="checkbox" id="subscribeNews" name="diaSemana[]" value="1">
                                <label for="diaSemanaNews">Seg</label>
                            </div>

                            <div>
                                <input type="checkbox" id="diaSemanaNews" name="diaSemana[]" value="2">
                                <label for="diaSemanaNews">Ter</label>
                            </div>

                            <div>
                                <input type="checkbox" id="diaSemanaNews" name="diaSemana[]" value="3">
                                <label for="diaSemanaNews">Qua</label>
                            </div>

                            <div>
                                <input type="checkbox" id="diaSemanaNews" name="diaSemana[]" value="4">
                                <label for="diaSemanaNews">Qui</label>
                            </div>

                            <div>
                                <input type="checkbox" id="diaSemanaNews" name="diaSemana[]" value="5">
                                <label for="diaSemanaNews">Sex</label>
                            </div>

                            <div>
                                <input type="checkbox" id="diaSemanaNews" name="diaSemana[]" value="6">
                                <label for="diaSemanaNews">Sab</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Criar</button>
                    <a href='index.php'>
                        <button type="button" class="btn btn-secondary btn-sm">Voltar</button>
                </form>
            </div>


        </div>
    </div>
</body>

</html>

<?php
}
?>