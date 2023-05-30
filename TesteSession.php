<?php

session_start();
$tempo_session = 10; // tempo em segundos

if (isset($_SESSION["time"]) and $_SESSION["time"] + $tempo_session < time()) {
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 42000, '/');
    }
    session_unset();
    @session_destroy();

    /* Aqui vc pode redirecionar para outra página ou escrever uma mensagem de sessão
     finalizada por tempo de inatividade */

    //Redirecionado para alguma página


} else {
    $_SESSION["time"] = time();
    $_SESSION["nome"] = "Fabrício";

    /* aqui vai o seu código normal */
    
    //Código do Sistema
}

echo $_SESSION["nome"] . " - " . $_SESSION["time"];
