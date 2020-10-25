<?php include_once("./banco-de-dados/conexao.php");


// LISTA SELECT CATEGORIAS
function listaCategorias()
{
    global $conn,  $categorias, $total_produtos, $VAZIO;

    // $sql_categorias = "SELECT DISTINCT categoria_produto FROM produtos";
    $sql_contagem = "SELECT categoria_produto, COUNT(categoria_produto) FROM produtos GROUP BY categoria_produto";
    $sql_total = "SELECT COUNT(ALL id_produto) FROM produtos";

    if (mysqli_query($conn, $sql_contagem) && mysqli_query($conn, $sql_total)) {
        $categorias = mysqli_query($conn, $sql_contagem);
        $total_produtos = mysqli_query($conn, $sql_total);
    } else {
        $VAZIO = true;
        echo "<script>console.log('Banco de dados está vazio')</script>";
    }
}
// FIM LISTA

// QUERY
$SQL;
$palavra_chave = $_GET["categoria"];
$VAZIO = false;

function filtrarLista()
{
    global $SQL, $palavra_chave, $conn, $resultado, $VAZIO;

    if (isset($palavra_chave)) {
        $SQL = "SELECT * FROM produtos WHERE categoria_produto = '$palavra_chave'";
    } else {
        $SQL = "SELECT * FROM produtos";
    }

    if (mysqli_query($conn, $SQL) && isset($SQL)) {
        $resultado = mysqli_query($conn, $SQL);
        if (mysqli_num_rows($resultado) <= 0) {
            $VAZIO = true;
        }
    } else {
        $VAZIO = true;
        echo "<script>console.log('Banco de dados está vazio')</script>";
    }

    $palavra_chave = null;
}


// FIM QUERY

$resultado;
$categorias;
$total_produtos;

listaCategorias();
filtrarLista();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Produtos - Full Stack Eletro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilo.css">
    <script src="./js/script-produtos.js"></script>
    <script src="./js/script-carrinho.js"></script>
</head>

<body>
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

    <!-- MAIN-->
    <?php if (!$VAZIO) { ?>
        <div class="container-fluid">
            <main>
                <p class="titulo"> Nossos Produtos </p>
                <p class="subtitulo">Aqui em nossa loja, os preços cabem no seu bolso!</p>

                <!-- CONTEÚDO -->

                <div class="row row-cols-4">

                    <section class="col ">
                        <h2 class="subtitulo nav-link"> Categorias </h2>
                        <?php if (isset($categorias)) {
                            while ($dado = $total_produtos->fetch_array()) { ?>
                                <a class="nav-link " href="produtos.php">
                                    <button class="btn categorias text-dark " style="color: white;">Mostrar Tudo (<?php echo $dado['COUNT(ALL id_produto)']; ?>)</button>
                                </a>
                        <?php }
                        } ?>
                        <?php if (isset($categorias)) {
                            while ($dado = $categorias->fetch_array()) { ?>
                                <a class="nav-link" href="produtos.php?categoria=<?php echo $dado['categoria_produto']; ?>">
                                    <button class="btn categorias text-dark" style="color: white;"><?php echo $dado['categoria_produto'];  ?> (<?php echo $dado['COUNT(categoria_produto)']; ?>)</button>
                                </a>
                        <?php }
                        } ?>
                    </section>

                    <?php if (isset($resultado)) {
                        while ($dado = $resultado->fetch_array()) {
                    ?>
                            <section class="col">
                                <br>
                                <div class="col ">
                                    <div class="card" style="width: 18rem;" id="<?php echo $dado['id_produto']; ?>">
                                        <img class="card-img-top" src="<?php echo $dado['imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $dado['nome_produto']; ?></h5>
                                            <hr>
                                            <p class="card-text">
                                                <em class="traco" id="precoAntigoProduto<?php echo $dado['id_produto']; ?>">
                                                    <script>
                                                        formatarValor(<?php echo $dado['preco_antigo_produto']; ?>, 'precoAntigoProduto<?php echo $dado['id_produto']; ?>')
                                                    </script>
                                                </em>
                                                <br>
                                                <strong class="preco-atual" id="precoAtualProduto<?php echo $dado['id_produto']; ?>">
                                                    <script>
                                                        formatarValor(<?php echo $dado['preco_produto']; ?>, 'precoAtualProduto<?php echo $dado['id_produto']; ?>')
                                                    </script>
                                                    <br>a vista.
                                                </strong>
                                            </p>
                                            <div class="modal-footer">
                                                <a class="button" href="detalhe-produto.php?ID=<?php echo $dado['id_produto']; ?>">
                                                    <button type="button" class="btn btn-info ">Ver Detalhes</button>
                                                </a>
                                                <a class="button">
                                                    <button type="button" class="btn btn-primary" onclick="adicionarNoCarrinho('<?php echo $dado['id_produto']; ?>')">Colocar no Carrinho</button>
                                                </a>

                                                <a class="button">
                                                    <button type="button" class="btn btn-success" onclick="comprarProduto('<?php echo $dado['id_produto']; ?>')">Comprar</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                    <?php }
                    } ?>

                </div>
            </main>
        </div>
    <?php } else { ?>
        <div class="container-fluid">
            <main>
                <p class="titulo"> Nossos Produtos </p>
                <p class="subtitulo">Estamos sem produtos no estoque :(</p>
            </main>
        </div>
    <?php } ?>
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