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
    <title>Login</title>
    <style>
      body {
        margin: 0px;
      }

      .background {
        width: 100vw;
        height: 100vh;
        position: fixed;
        z-index: -1000;
        left: 0;
        top: 0;
        opacity: 0.5;
        /* filter: blur(3px); */
        background-image: url('clinica7.jpg');
        background-size: cover;
        background-repeat: no-repeat;
      }

      .navbar {
        height: 55px;
      }

      .container {
        width: 100vw;
        height: calc(100vh - 55px);
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center
      }

      .box {
        width: 400px;
        height: 350px;
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 16px 0px rgba(1, 1, 1, 0.33);
        border: 1px solid black;
      }

      .container .box h3 {
        justify-content: center;
        align-items: center;
        display: flex;
        color: #0f3e96;
        margin-bottom: 20px;
      }

    </style>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>
    <div class="background">
    </div>

    <nav class="navbar navbar-light" style="background-color: #0f3e96;">
      <a class="navbar-brand" style="color: #fff" href="index.php">JGPQ</a>

    </nav>

    <div class="container">
      <div class="box">
        <form action="valida.php" method="POST">
          <h3>Login</h3>
          <div class="form-group">
            <label for="user">Usuário</label>
            <input type="text" id="usuario" name="usuario" placeholder="Insira seu Usuário" class="form-control" required>

          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Insira sua Senha" class="form-control" required>
          </div>
          <!-- <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
          <div style="text-align: center;">
            <button type="submit" class="btn btn-primary" style="background-color: #0f3e96; margin-top:20px;">Entrar</button>
            <form method="POST" action="#">
          </div>
          <!-- <div style="text-align: center;">
            <button type="submit" class="btn btn-primary btn-sm"
              style="margin-top: 20px; background-color: #0f3e96;">Cadastrar</button>
            <form method="POST" action="#">
          </div> -->


          <?php
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
          ?>
          </p>
      </div>
      </form>



    </div>
    </div>

  </body>

  </html>


  <?php
}
?>