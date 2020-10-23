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
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="./css/detalhes-produto.css">
</head>
<script>
    const visualizarImagemSelecionada = (coletaniaImagensImg, tituloProduto) => {
        if (coletaniaImagensImg != null && coletaniaImagensImg != undefined) {
            const imagemProdutoId = document.getElementById("imagemProduto")
            const novaImgTag = `<img src="${coletaniaImagensImg}" alt="${tituloProduto}">`
            imagemProdutoId.innerHTML = novaImgTag
        }
        return
    }

    const calcularParcelas = (precoAtualProduto) => {
        const precoParcelado = document.getElementById("precoParcelado")
        const valorTotal = precoAtualProduto.replace(/\D/g, "") // TRANSFORMA STRING EM NÚMERO

        function formatarValorParcelas(valor) {
            return valor.toLocaleString('pt-br', {
                style: 'currency',
                currency: 'BRL'
            })
        }

        for (let vezes = 2; vezes <= 10; vezes++) {
            let valorParcelas = valorTotal / vezes
            // valorParcelas /= 100 // remover uma casa decimal
            if (valorParcelas < 0)
                return
            precoParcelado.innerHTML += `<option value="">${vezes} x ${formatarValorParcelas(valorParcelas)} sem juros</option>`
        }
    }


    const formatarValor = (valor, elementId) => {
        const element = document.getElementById(elementId)
        return element.innerHTML = valor.toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
        })
    }
</script>
<?php while ($dado = $resultado->fetch_array()) { ?>

    <body onload="calcularParcelas('<?php echo $dado['preco_produto']; ?>')">
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

        <br><br><br><br><br>


        <!-- CONTEUDO -->
        <main class="container-main">
            <div class="container-coletania-imagens">
                <div>
                    <ul id="coletaniaImagensProduto">
                        <!--AUTO PREENCHER-->
                        <li>
                            <button class="button-coletania" onclick="visualizarImagemSelecionada('<?php echo $dado['imagem_produto']; ?>', '<?php echo $dado['nome_produto']; ?>')">
                                <img src="<?php echo $dado['imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                            </button>
                        </li>
                        <li>
                            <button class="button-coletania" onclick="visualizarImagemSelecionada('<?php echo $dado['1_imagem_produto']; ?>', '<?php echo $dado['nome_produto']; ?>')">
                                <img src="<?php echo $dado['1_imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                            </button>
                        </li>
                        <li>
                            <button class="button-coletania" onclick="visualizarImagemSelecionada('<?php echo $dado['2_imagem_produto']; ?>', '<?php echo $dado['nome_produto']; ?>')">
                                <img src="<?php echo $dado['2_imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                            </button>
                        </li>
                        <li>
                            <button class="button-coletania" onclick="visualizarImagemSelecionada('<?php echo $dado['3_imagem_produto']; ?>', '<?php echo $dado['nome_produto']; ?>')">
                                <img src="<?php echo $dado['3_imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                            </button>
                        </li>
                        <li>
                            <button class="button-coletania" onclick="visualizarImagemSelecionada('<?php echo $dado['4_imagem_produto']; ?>', '<?php echo $dado['nome_produto']; ?>')">
                                <img src="<?php echo $dado['4_imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container-imagem">
                <div id="imagemProduto">
                    <img src="<?php echo $dado['imagem_produto']; ?>" alt="<?php echo $dado['nome_produto']; ?>">
                </div>
            </div>

            <div class="container-detalhes">
                <section>
                    <h2 class="titulo-produto" id="tituloProduto">
                        <?php echo $dado['nome_produto']; ?>
                        <!--AUTO PREENCHER-->
                    </h2>
                    <hr>
                    <p id="descricaoProduto">
                        <?php echo $dado['descricao_produto']; ?>
                        <!--AUTO PREENCHER-->
                    </p>
                    <br>
                    <em class="traco" id="precoAntigoProduto">
                        De: <script>
                            formatarValor(<?php echo $dado['preco_antigo_produto']; ?>, 'precoAntigoProduto')
                        </script>
                    </em>
                    <br>
                    <span>
                        <br>
                        <strong class="preco-atual" id="precoAtualProduto">
                            <script>
                                formatarValor(<?php echo $dado['preco_produto']; ?>, 'precoAtualProduto')
                            </script>
                        </strong>
                        a vista.
                    </span>
                    <br>
                    <br>
                    <select id="precoParcelado">
                        <!--AUTO PREENCHER-->
                    </select>
                    <br>
                    <br>
                    <button class="comprar-produto" onclick="alert('Em breve!')">COMPRAR</button>
                    <br>
                    <strong id="quantidadeProduto"></strong>
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
            <br><br>
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
            <br><br><br><br><br>
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

                <div class="row">
                    <div class="lado">
                        <div>5 estrelas</div>
                    </div>
                    <div class="meio">
                        <div class="progresso-container">
                            <div class="progresso-5"></div>
                        </div>
                    </div>
                    <div class="lado direito">
                        <div>150</div>
                    </div>
                    <div class="lado">
                        <div>4 estrelas</div>
                    </div>
                    <div class="meio">
                        <div class="progresso-container">
                            <div class="progresso-4"></div>
                        </div>
                    </div>
                    <div class="lado direito">
                        <div>63</div>
                    </div>
                    <div class="lado">
                        <div>3 estrelas</div>
                    </div>
                    <div class="meio">
                        <div class="progresso-container">
                            <div class="progresso-3"></div>
                        </div>
                    </div>
                    <div class="lado direito">
                        <div>15</div>
                    </div>
                    <div class="lado">
                        <div>2 estrelas</div>
                    </div>
                    <div class="meio">
                        <div class="progresso-container">
                            <div class="progresso-2"></div>
                        </div>
                    </div>
                    <div class="lado direito">
                        <div>6</div>
                    </div>
                    <div class="lado">
                        <div>1 estrelas</div>
                    </div>
                    <div class="meio">
                        <div class="progresso-container">
                            <div class="progresso-1"></div>
                        </div>
                    </div>
                    <div class="lado direito">
                        <div>20</div>
                    </div>
                </div>
            </div>
            <br>
        </section>
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
<?php } ?>

</html>