<?php   
    $url = parse_url(getenv("mysql://bcf9e54be7d410:d07828d3@us-cdbr-east-02.cleardb.com/heroku_062e8e4b10fd3ba?reconnect=true"));


    $server = $url["host"];
    $user = $url["user"];
    $pass = $url["pass"];
    $db = substr($url["path"], 1);

    $conn = new mysqli($server, $user, $pass, $db);

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
    if(!$conn) {
        die("A conexão com o Banco de dados falhou: " . mysqli_connect_error());
    }

?>