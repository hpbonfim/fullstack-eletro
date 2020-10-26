<?php include_once("./banco-de-dados/conexao.php");

$arrayProdutos = json_decode($_POST['produtosId']);

if (isset($arrayProdutos)) {
    $produtoId = implode(', ', $arrayProdutos);
    filtrarLista($produtoId);
}

// QUERY
$SQL;
$resultado;

function filtrarLista($ids)
{
    global $SQL, $conn, $resultado;

    $SQL = "SELECT * FROM produtos WHERE `id_produto` IN ($ids)";

    if (mysqli_query($conn, $SQL) && isset($SQL)) {
        $resultado = mysqli_query($conn, $SQL);
        if (mysqli_num_rows($resultado) <= 0) {
            echo "<script>window.location.href='produtos.php'</script>";
        }
    } else {
        echo "Error: " . $SQL . "<br>" . mysqli_error($conn);
    }
}

// FIM QUERY

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Carrinho - Full Stack Eletro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="./css/modal.css">
    <script src="./js/script-carrinho.js"></script>
    <script src="./js/script-comprar.js"></script>
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

        <a class="navbar-brand" type="button" onclick="postProdutosSelecionados()">
            <img src="./images/carrinho_vazio.png" width="50" height="50" class="d-inline-block align-top" alt="carrinho_vazio" id="carrinhoImage">
            <span class='badge badge-pill' id="carrinho">0</span>
        </a>
    </nav>

    <!-- MAIN-->
    <main>
        <header>
            <p class="titulo">
                Carrinho
            </p>
            <?php if (isset($resultado)) { ?>
                <p class="subtitulo">Verifique se está tudo certo!</p>
            <?php } else { ?>
                <p class="subtitulo">Não há nada no carrinho!</p>
                <div class="container d-flex justify-content-center">
                    <div class="w-100">
                        <a class="button" href="produtos.php">
                            <button type="button" class="btn btn-info">Ver Produtos</button>
                        </a>
                    </div>
                </div>
            <?php }  ?>
            <hr>
        </header>
    </main>
    <!-- MAIN-->


    <?php if (isset($resultado)) { ?>
        <!-- CONTEÚDO -->
        <div class="container-fluid d-flex justify-content-around">
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="display: none;">#</th>
                        <th scope="col">Nome Produto</th>
                        <th scope="col">Valor unitário</th>
                        <th scope="col">Valor Total</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($dado = $resultado->fetch_array()) { ?>
                        <tr>
                            <th scope="row" style="display: none;" id="<?php echo $dado['id_produto']; ?>"></th>
                            <td class="text-left" id="nomeProduto_<?php echo $dado['id_produto']; ?>"><?php echo $dado['nome_produto']; ?></td>
                            <td id="precoProduto_<?php echo $dado['id_produto']; ?>"><?php echo $dado['preco_produto']; ?></td>
                            <td id="somaProduto_<?php echo $dado['id_produto']; ?>"></td>
                            <td id="quantidadeProduto_<?php echo $dado['id_produto']; ?>"></td>
                            <td>
                                <a type="button" onclick="adicionarNoCarrinho('<?php echo $dado['id_produto']; ?>')"><img src="./images/mais.png" alt="mais" width="30px;"></a>
                                <a type="button" onclick="removerDoCarrinho('<?php echo $dado['id_produto']; ?>')"><img src="./images/menos.png" alt="menos" width="30px;"></a>
                                <a type="button" onclick="removerProduto('<?php echo $dado['id_produto']; ?>')"><img src="./images/remover.png" alt="remover" width="30px;"></a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>
        <div class="container d-flex justify-content-center">
            <div class="w-50 m-1">
                <a class="button" onclick="deletarCarrinho()">
                    <button type="button" class="btn btn-danger">Remover todos os produtos</button>
                </a>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="w-100">
                <a class="button">
                    <button type="button" class="btn btn-success" onclick="mostrarModal()">Comprar</button>
                </a>
            </div>
        </div>

        <!-- Formulário -->
        <div id="modalBox" class="modal">

            <div class="card text-center modal-content">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <button class="btn btn-danger" onclick="fecharModal()"> &times; Voltar</button>
                        </li>
                    </ul>
                    <h5 class="subtitulo">Preencha o formulário de compra</h5>
                </div>
                <div class="card-body">
                    <form action="enviar.php" method="POST">
                        <input type="hidden" name="id_produto" id="id_produto">
                        <input type="hidden" name="nome_produto" id="nome_produto">
                        <input type="hidden" name="valor_unitario_produto" id="valor_unitario_produto">
                        <input type="hidden" name="valor_total_produto" id="valor_total_produto">
                        <input type="hidden" name="quantidade_produto" id="quantidade_produto">
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label for="nome_cliente">Nome</label>
                                <input class="form-control" type="text" id="nome_cliente" name="nome_cliente" placeholder="Digite seu nome">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="telefone_cliente">Telefone</label>
                                <input class="form-control" type="number" id="telefone_cliente" name="telefone_cliente" placeholder="Digite seu número de telefone">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="endereco_cliente">Endereço</label>
                                <input class="form-control" type="text" class="form-control" id="endereco_cliente" name="endereco_cliente" placeholder="Digite seu endereço. por exemplo: Rua das Avenidas, Nº 0 - 12345-678">
                            </div>
                        </div>
                        <br>
                        <button type="submit" name="salvarFormulario" id="salvarFormulario" value="salvarFormulario" class="btn btn-success" onclick="alert('Compra efetuada com sucesso!'), cleanAll()">Efetuar compra</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Fim Formulário -->

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