<?php include('./banco-de-dados/conexao.php');

$SALVAR = $_POST['SALVAR'];

if (isset($SALVAR) && $SALVAR == 'SALVAR') {
    $nome = $_POST['nome_produto'];
    $descricao = $_POST['descricao_produto'];
    $descricaoCompleta = $_POST['descricao_completa_produto'];
    $precoAntigo = $_POST['preco_antigo_produto'];
    $preco = $_POST['preco_produto'];
    $imagem = $_POST['imagem_produto'];
    $imagem1 = $_POST['1_imagem_produto'];
    $imagem2 = $_POST['2_imagem_produto'];
    $imagem3 = $_POST['3_imagem_produto'];
    $imagem4 = $_POST['4_imagem_produto'];
    $categoria = $_POST['categoria_produto'];

    $inserir = "INSERT INTO produtos (nome_produto, descricao_produto, descricao_completa_produto, preco_antigo_produto, preco_produto, imagem_produto, 1_imagem_produto, 2_imagem_produto, 3_imagem_produto, 4_imagem_produto, categoria_produto) VALUES ( '$nome', '$descricao', '$descricaoCompleta', '$precoAntigo','$preco', '$imagem', '$imagem1', '$imagem2', '$imagem3', '$imagem4', '$categoria')";


    if (mysqli_query($conn, $inserir)) {
        echo "<script> alert('Criado com sucesso!')</script>";
    } else {
        echo "Error: " . $inserir . "<br>" . mysqli_error($conn);
    }
}

$SALVAR = null;

?>

<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produtos</title>
</head>

<style>
    a {
        text-decoration: none;
        color: white;
    }

    h1 {
        text-align: center;
        font-size: 50px;
    }
</style>

<body>
    <br><br>

    <div class="container-lg">

        <a href="produtos.php">
            <button type="button" class="btn btn-primary btn-lg btn-block">
                Voltar
            </button>
        </a>

        <br><br>

        <h1>CRIAR PRODUTO</h1>

        <br><br>

        <form action="" method="post">
            <div class="form-group">
                <label for="nome_produto">Nome do Produto</label>
                <input id="nome_produto" name="nome_produto" type="text" class="form-control" placeholder="Nome do Produto" required>
            </div>

            <div class="form-group">
                <label for="descricao_produto">Breve Descrição do Produto</label>
                <textarea id="descricao_produto" name="descricao_produto" type="text" class="form-control" placeholder="Descrição do Produto" required></textarea>
            </div>

            <div class="form-group">
                <label for="descricao_completa_produto">Descrição Completa do Produto</label>
                <textarea id="descricao_completa_produto" name="descricao_completa_produto" type="text" class="form-control" placeholder="Descrição do Produto" required></textarea>
            </div>

            <div class="form-row">
                <div class="col-4">
                    <label for="preco_antigo_produto">Preço Antigo do Produto</label>
                    <input id="preco_antigo_produto" name="preco_antigo_produto" type="number" class="form-control" placeholder="Preço Antigo do Produto" required>
                </div>

                <div class="col-4">
                    <label for="preco_produto">Preço do Produto</label>
                    <input id="preco_produto" name="preco_produto" type="number" class="form-control" placeholder="Preço do Produto" required>
                </div>

                <div class="col-4">
                    <label for="categoria_produto">Categoria do Produto</label>
                    <input id="categoria_produto" name="categoria_produto" type="text" class="form-control" placeholder="Categoria do Produto" required>
                </div>
            </div>


            <div class="form-group">
                <label for="imagem_produto">Imagem do Produto</label>
                <input id="imagem_produto" name="imagem_produto" type="text" class="form-control" placeholder="Link da Imagem" required>
            </div>


            <div class="form-group">
                <label for="1_imagem_produto">1 Imagem do Produto</label>
                <input id="1_imagem_produto" name="1_imagem_produto" type="text" class="form-control" placeholder="Link da Imagem 1" required>
            </div>

            <div class="form-group">
                <label for="2_imagem_produto">2 Imagem do Produto</label>
                <input id="2_imagem_produto" name="2_imagem_produto" type="text" class="form-control" placeholder="Link da Imagem 2" required>
            </div>

            <div class="form-group">
                <label for="3_imagem_produto">3 Imagem do Produto</label>
                <input id="3_imagem_produto" name="3_imagem_produto" type="text" class="form-control" placeholder="Link da Imagem 3" required>
            </div>

            <div class="form-group">
                <label for="4_imagem_produto">4 Imagem do Produto</label>
                <input id="4_imagem_produto" name="4_imagem_produto" type="text" class="form-control" placeholder="Link da Imagem 4" required>
            </div>

            <br>
            <button type="submit" id="SALVAR" name="SALVAR" value="SALVAR"  class="btn btn-success btn-lg btn-block">Criar Produto</button>
            <br><br><br><br><br><br><br><br><br><br>
        </form>
    </div>
</body>

</html>