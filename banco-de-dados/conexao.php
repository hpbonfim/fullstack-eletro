<?php

$conn = pg_connect(getenv("DATABASE_URL")) or die('Conexão com banco de dados falhou');

/* ---- */
/*
    $servername = "mysql";
    $username = "root";
    $password = "recode";
    $database = "fullstack-eletro";

    // Criando conexão
    $conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) { // Verificando a conexão
    die("A conexão com o Banco de dados falhou: " . mysqli_connect_error());
}
*/
