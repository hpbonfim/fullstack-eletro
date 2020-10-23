<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Contato - Full Stack Eletro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="./css/contato.css">

</head>

<body>
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
            <li class="nav-item">
                <a class="nav-link col px-md-5" href="loja.php"> Nossas Lojas</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link col px-md-5" href="contato.php"> Fale Conosco</a>
            </li>
        </ul>

        <a class="navbar-brand" href="index.php">
            <img src="./images/carrinho_vazio.png" width="50" height="50" class="d-inline-block align-top"
                alt="carrinho_vazio">
            <span class='badge badge-pill'>0</span>
        </a>
    </nav>
    

    <!-- MAIN-->
    <main>
        <header>
            <p class="titulo">
                Contacte-nos
            </p>
            <p class="subtitulo">Fique a vontade para falar conosco!</p>
            <hr>
        </header>
    </main>
    <!-- MAIN-->


    <!-- CONTEÚDO -->
    <div class="contato-container">
        <div>
            <p>Nome</p>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome...">
        </div>

        <div>
            <p>Email</p>
            <input type="email" id="email" name="email" placeholder="Digite seu email...">
        </div>

        <div>
            <p>Texto</p>
            <textarea id="texto" name="texto" placeholder="Escreva algo..."></textarea>
        </div>

        <div>
            <button class="enviar" onclick="alert('Em breve!')">Enviar</button>
        </div>

        <br>

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