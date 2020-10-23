<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Nossas Lojas - Full Stack Eletro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="./css/loja.css">

</head>

<body>
    <!-- MENU -->
    <!-- MENU -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">
            <img src="./images/logo.png" width="100" height="50" class="d-inline-block align-top" alt="" loading="lazy">
        </a>

        <ul class="navbar-nav mx-auto ">
            <li class="nav-item  ">
                <a class="nav-link col px-md-5" href="index.php"> Início</a>
            </li>
            <li class="nav-item">
                <a class="nav-link col px-md-5" href="produtos.php"> Produtos</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link col px-md-5" href="loja.php"> Nossas Lojas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link col px-md-5" href="contato.php"> Fale Conosco</a>
            </li>
        </ul>

        <a class="navbar-brand" href="index.php">
            <img src="./images/carrinho_vazio.png" width="50" height="50" class="d-inline-block align-top" alt="carrinho_vazio">
            <span class='badge badge-pill'>0</span>
        </a>
    </nav>
    <!-- FIM DO MENU -->



    <!-- MAIN-->
    <main>
        <header>
            <p class="titulo">
                Nossas lojas
            </p>
            <p class="subtitulo">Tem sempre uma pertinho de você!</p>
            <hr>
        </header>
    </main>
    <!-- MAIN-->

    <!-- CONTEÚDO -->
    <div class="container-fluid d-flex justify-content-around">
        
        <div class="row">
            <div class="col">
                <div class="info">
                    <h3> Rio de Janeiro </h3>
                    <p> Avenida Presidente Vargas, 5000</p>
                    <p>10 &ordm; andar</p>
                    <p>Centro </p>
                    <p>(21) 3333-3333</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="info">
                    <h3>São Paulo</h3>
                    <p>Avenida Paulista, 985</p>
                    <p>3 &ordm; andar </p>
                    <p> Jardins </p>
                    <p> (11) 4444-4444 </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="info">
                    <h3> Santa Catarina </h3>
                    <p> Rua Major &Aacute;vila, 370 </p>
                    <p> 10 &ordm; andar </p>
                    <p> Vila Mariana </p>
                    <p> (47) 5555-5555 </p>
                </div>
            </div>
        </div>
        
    </div>
    <!-- FIM CONTEÚDO -->




    <!-- FOOTER -->
    <footer class="rodape">
        <hr>
        <strong>
            <p class="formas-pagamento"> Formas de Pagamento</p>
            <img src="./images/formas_de_pagamento.png" alt="Formas de pagamento">
            <hr>
            <div class="rodape-contato">
                <span>
                    <img src="./images/o-email.png" alt="email" width="4%">
                    contato@fullstackeletro.com
                </span>
                <span>
                    <img src="./images/whatsapp.png" alt="Whatsapp" width="4%">
                    (01) 23456-7800
                </span>
            </div>
        </strong>
        <hr>
        <span> &copy; Fullstack Eletro </span>
        <br>
        <br>
    </footer>
    <!-- FIM FOOTER-->
</body>

</html>