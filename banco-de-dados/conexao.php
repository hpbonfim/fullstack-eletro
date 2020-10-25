<?php

$servername = "ec2-34-192-122-0.compute-1.amazonaws.com";
$username = "pjkzxaixobtarh";
$password = "14fa59ec81efe1f415dc9b89c1c3c4f392c1e4351c1959d98e34d2dd7bfaffdc";
$database = "d54ikg6rb6ffr";

$con_string = "host=" . $servername . "port=5432 dbname=" . $database . " user=" . $username . " password=" . $password . "";

$conn = pg_connect($con_string) or die('Conexão com banco de dados falhou');


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
