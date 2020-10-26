<?php include_once("./banco-de-dados/conexao.php");

// PEGA AS INFORMAÇOES DO BANCO
$ID_PRODUTO = $_GET['ID'];

if (isset($ID_PRODUTO)) {
    $sql = "SELECT * FROM produtos WHERE id_produto = '$ID_PRODUTO'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) <= 0) {
        echo "<script>window.location.href='produtos.php'</script>";
    }
} else {
    echo "<script>window.location.href='produtos.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Detalhe do Produto - Full Stack Eletro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="./css/detalhes-produto.css">
    <script src="./js/script-produtos.js"></script>
    <script src="./js/script-carrinho.js"></script>

</head>
<?php while ($dado = $resultado->fetch_array()) { ?>

    <body onload="calcularParcelas('<?php echo $dado['preco_produto']; ?>')">
        <div id="fake-form-container" style="display:none;"></div>


        <!-- MENU -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php">
                <img src="./images/logo.png" width="100" height="50" class="d-inline-block align-top" alt="" loading="lazy">
            </a>

            <ul class="navbar-nav mx-auto ">
                <li class="nav-item  ">
                    <a class="nav-link col px-md-5" href="index.php"> Início</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link col px-md-5" href="produtos.php"> Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link col px-md-5" href="loja.php"> Nossas Lojas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link col px-md-5" href="contato.php"> Fale Conosco</a>
                </li>
            </ul>

            <a class="navbar-brand" type="button" onclick="postProdutosSelecionados()">
                <img src="./images/carrinho_vazio.png" width="50" height="50" class="d-inline-block align-top" alt="carrinho_vazio" id="carrinhoImage">
                <span class='badge badge-pill' id="carrinho">0</span>
            </a>
        </nav>
        <!-- FIM DO MENU -->

        <!-- CONTEUDO -->
        <main class="container-fluid ">
            <div class="row  row-cols-3 justify-content-between ">
                <section class="col-1">
                    <div class="container-coletania-imagens">
                        <ul id="coletaniaImagensProduto">
                            <!--AUTO PREENCHER-->
                            <li>
                                <a type="button" class="" onclick="visualizarImagemSelecionada('<?php echo $dado['imagem_produto']; ?>', '<?php echo $dado['nome_produto']; ?>')">
                                    <img src="<?php echo $dado['imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                                </a>
                            </li>
                            <li>
                                <a type="button" class="" onclick="visualizarImagemSelecionada('<?php echo $dado['1_imagem_produto']; ?>', '<?php echo $dado['nome_produto']; ?>')">
                                    <img src="<?php echo $dado['1_imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                                </a>
                            </li>
                            <li>
                                <a type="button" class="" onclick="visualizarImagemSelecionada('<?php echo $dado['2_imagem_produto']; ?>', '<?php echo $dado['nome_produto']; ?>')">
                                    <img src="<?php echo $dado['2_imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                                </a>
                            </li>
                            <li>
                                <a type="button" class="" onclick="visualizarImagemSelecionada('<?php echo $dado['3_imagem_produto']; ?>', '<?php echo $dado['nome_produto']; ?>')">
                                    <img src="<?php echo $dado['3_imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                                </a>
                            </li>
                            <li>
                                <a type="button" class="" onclick="visualizarImagemSelecionada('<?php echo $dado['4_imagem_produto']; ?>', '<?php echo $dado['nome_produto']; ?>')">
                                    <img src="<?php echo $dado['4_imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                                </a>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="col">
                    <div class="container-imagem">
                        <div id="imagemProduto">
                            <img src="<?php echo $dado['imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                        </div>
                    </div>
                </section>


                <section class="col">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="titulo-produto">
                                <?php echo $dado['nome_produto']; ?>
                                <!--AUTO PREENCHER-->
                            </h2>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dado['descricao_produto']; ?></h5>
                        </div>
                        <p class="card-text">
                            <span>
                                <em class="traco" id="precoAntigoProduto">
                                    <script>
                                        formatarValor(<?php echo $dado['preco_antigo_produto']; ?>, 'precoAntigoProduto')
                                    </script>
                                </em>
                                <br>
                                <strong class="preco-atual" id="precoAtualProduto">
                                    <script>
                                        formatarValor(<?php echo $dado['preco_produto']; ?>, 'precoAtualProduto')
                                    </script>
                                </strong>
                                a vista.
                            </span>
                            <br>
                            <select id="precoParcelado">
                                <!--AUTO PREENCHER-->
                            </select>
                        </p>
                        <div class="card-footer">
                            <a class="button">
                                <button type="button" class="btn btn-success" onclick="comprarProduto('<?php echo $dado['id_produto']; ?>')">Comprar</button>
                            </a>
                            <strong id="quantidadeProduto">
                                <?php echo $dado['quantidade_produto']; ?>
                            </strong>
                        </div>
                    </div>
                </section>
            </div>
        </main>


        <section class="descricao-produto">
            <h3 class="subtitulo"> Descrição completa </h3>
            <hr>
            <p id="descricaoCompletaProduto">
                <?php echo $dado['descricao_completa_produto']; ?>

                <!--AUTO PREENCHER-->
                <br>
            </p>

            <h3 class="subtitulo"> Especificações técnicas </h3>
            <hr>
            <ol>
                <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</li>
                <br>
                <li>Sed quisquam magni minus perspiciatis, at, modi sint vero cum placeat mollitia quas doloremque eum
                    culpa,
                    eligendi incidunt! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa perspiciatis
                    nesciunt
                    doloribus nostrum optio consectetur.
                </li>
                <br>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</li>
                <br>
                <li>Sint facilis maiores quisquam molestias voluptatum cupiditate dolorum dolore, exercitationem itaque
                    repudiandae, qui veritatis reiciendis doloremque natus minus minima sed atque commodi.
                </li>
                <br>
                <li>Quisquam, porro nam! Numquam quisquam, debitis quia autem ratione accusamus doloremque tempora illum
                    dignissimos neque sapiente quas non minus iusto aut tenetur.
                </li>
                <br>
            </ol>
            <br>

            <div class="avaliacoes">
                <h3 class="subtitulo"> Avaliação dos Usuários </h3>
                <hr>

                <div class="avaliacao">
                    <span>Média de 4.1 pontos sobre 254 avaliações realizadas.</span>
                    <span class="estrela">⭐</span>
                    <span class="estrela">⭐</span>
                    <span class="estrela">⭐</span>
                    <span class="estrela">⭐</span>
                    <span class="">☆</span>
                </div>

            </div>
            <br>
        </section>
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
<?php } ?>

</html>