<?php include_once("./banco-de-dados/conexao.php");


// LISTA SELECT CATEGORIAS
function listaCategorias()
{
    global $conn,  $categorias, $total_produtos;

    // $sql_categorias = "SELECT DISTINCT categoria_produto FROM produtos";
    $sql_contagem = "SELECT categoria_produto, COUNT(categoria_produto) FROM produtos GROUP BY categoria_produto";
    $sql_total = "SELECT COUNT(ALL id_produto) FROM produtos";

    if (mysqli_query($conn, $sql_contagem) && mysqli_query($conn, $sql_total)) {
        $categorias = mysqli_query($conn, $sql_contagem);
        $total_produtos = mysqli_query($conn, $sql_total);
    } else {
        echo "Error: " . $sql_contagem . "<br>" . mysqli_error($conn);
        echo "Error: " . $total_produtos . "<br>" . mysqli_error($conn);
    }
}
// FIM LISTA

// QUERY
$SQL;
$palavra_chave = $_GET["categoria"];

function filtrarLista()
{
    global $SQL, $palavra_chave, $conn, $resultado;

    if (isset($palavra_chave)) {
        $SQL = "SELECT * FROM produtos WHERE categoria_produto = '$palavra_chave'";
    } else {
        $SQL = "SELECT * FROM produtos";
    }

    if (mysqli_query($conn, $SQL) && isset($SQL)) {
        $resultado = mysqli_query($conn, $SQL);
        if (mysqli_num_rows($resultado) <= 0) {
            echo "<script>window.location.href='produtos.php'</script>";
        }
    } else {
        echo "Error: " . $SQL . "<br>" . mysqli_error($conn);
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
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="./css/produtos.css">
    <!-- <script src="./js/script-produtos.js"></script> -->

</head>

<body>
    <!-- MENU -->
    <nav>
        <ul>
            <a href="index.html"> <img class="logo" src="./images/logo.png" alt="Logo"> </a>
            <li> <a href="index.html"> Início </a> </li>
            <li> <a href="produtos.php"> Produtos </a> </li>
            <li> <a href="loja.html"> Nossas Lojas </a> </li>
            <li> <a href="contato.html"> Fale Conosco </a> </li>
        </ul>
    </nav>
    <!-- FIM DO MENU -->

    <br><br><br><br>

    <!-- MAIN-->
    <main>
        <p class="titulo"> Nossos Produtos </p>
        <p class="subtitulo">Aqui em nossa loja, os preços cabem no seu bolso!</p>

        <!-- CONTEÚDO -->
        <div class="produtos-container">
            <section class="categorias" id="categorias">
                <h2 class="subtitulo"> Categorias </h2>
                <ul class="lista-categorias" id="listaCategorias">

                    <?php while ($dado = $categorias->fetch_array()) { ?>
                        <li>
                            <a href="produtos.php?categoria=<?php echo $dado['categoria_produto']; ?>">
                                <button class="menu-botoes"><strong><?php echo $dado['categoria_produto'];  ?> (<?php echo $dado['COUNT(categoria_produto)']; ?>)</strong></button>
                            </a>
                        </li>
                    <?php } ?>
                    <?php while ($dado = $total_produtos->fetch_array()) { ?>
                        <li>
                            <a href="produtos.php">
                                <button class="menu-botoes"><strong>Mostrar Tudo (<?php echo $dado['COUNT(ALL id_produto)']; ?>)</strong></button>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </section>
            <?php while ($dado = $resultado->fetch_array()) { ?>
                <div class="box-produto" id="<?php echo $dado['id_produto']; ?>">
                    <br>
                    <img class="imagem-produto" src="<?php echo $dado['imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                    <hr>
                    <br>
                    <span class="titulo-produto">
                        <?php echo $dado['nome_produto']; ?>
                    </span>
                    <p class="descricao">
                        <em class="traco">De <?php echo $dado['preco_antigo_produto']; ?></em>
                        <br>
                        <br>
                        <span>Por apenas:
                            <br>
                            <strong class="preco-atual"> <?php echo $dado['preco_produto']; ?></strong>
                            <br>
                        </span>
                        <a href="detalhe-produto.php?ID=<?php echo $dado['id_produto']; ?>"><button class="detalhes-produto">DETALHES</button></a>
                        <a href=""><button class="adicionar-carrinho">COLOCAR NO CARRINHO</button></a>
                        <a href=""><button class="comprar-produto">COMPRAR</button></a>
                    </p>
                </div>
            <?php } ?>

            <!-- PRODUTOS SERÃO PREENCHIDOS AUTOMATICAMENTE-->
        </div>
    </main>
    <!-- FIM CONTEÚDO -->

    <br><br><br><br>


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