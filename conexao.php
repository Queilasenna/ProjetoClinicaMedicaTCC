<?php

try {
	$hostname = "localhost";
	$dbname   = "tcc";
	$username = "root";
	$pw       = "";

	$pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");

	$GLOBALS['PDO'] = $pdo;
} catch (PDOException $e) {
	echo "Erro de Conexão " . $e->getMessage() . "\n";
	exit;
}

function retornaDados($sql, $parametros = [])
{
    $resultado = $GLOBALS['PDO']->prepare($sql);
	$resultado->execute($parametros);

    return $resultado->fetchAll();
}

function buscaItem($sql, $parametros = [])
{
	$resultado = $GLOBALS['PDO']->prepare($sql);
	$resultado->execute($parametros);

    return $resultado->fetch();
}