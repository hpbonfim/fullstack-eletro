<?php

$server = "ec2-34-192-122-0.compute-1.amazonaws.com";
$user = "pjkzxaixobtarh";
$pass = "14fa59ec81efe1f415dc9b89c1c3c4f392c1e4351c1959d98e34d2dd7bfaffdc";
$db = "d54ikg6rb6ffr";

$conn = pg_connect($server, $user, $pass, $db);

/* ---- */
/*
    $servername = "mysql";
    $username = "root";
    $password = "recode";
    $database = "fullstack-eletro";

    // Criando conexão
    $conn = mysqli_connect($servername, $username, $password, $database);
*/
// Verificando a conexão
if (!$conn) {
    die("A conexão com o Banco de dados falhou: " . mysqli_connect_error());
}
