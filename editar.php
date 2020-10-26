<?php include_once('./banco-de-dados/conexao.php');

// PEGA AS INFORMAÇOES DO BANCO
$ID_PRODUTO = $_GET['ID'];
$opcao = isset($ID_PRODUTO) ? $ID_PRODUTO : false;

if ($opcao) {
    $sql = "SELECT * FROM produtos WHERE id_produto = '$ID_PRODUTO'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) <= 0) {
        // retorna a listagem se não existir o id digitado
        echo "<script>alert('Página invalida')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
} else {
    // Retorna a listagem se caso ocorra da pessoa digitar o endereço (http://localhost/editar.php?id=1) sem o (?id=1)
    echo "<script>alert('Página invalida')</script>";
    echo "<script>window.location.href='index.php'</script>";
}

// FIM

$SALVAR = $_POST['SALVAR'];

if (isset($SALVAR)) {
    $id = $_POST['id_produto'];
    $nome = $_POST['nome_produto'];
    $descricao = $_POST['descricao_produto'];
    $preco = $_POST['preco_produto'];
    $imagem = $_POST['imagem_produto'];
    $categoria = $_POST['categoria_produto'];
    $precoAntigo = $_POST['preco_antigo_produto'];
    $imagem1 = $_POST['1_imagem_produto'];
    $imagem2 = $_POST['2_imagem_produto'];
    $imagem3 = $_POST['3_imagem_produto'];
    $imagem4 = $_POST['4_imagem_produto'];
    $descricaoCompleta = $_POST['descricao_completa_produto'];

    $update = "UPDATE produtos SET nome_produto='$nome',descricao_produto='$descricao', preco_produto='$preco', imagem_produto='$imagem', categoria_produto='$categoria', preco_antigo_produto='$precoAntigo', 1_imagem_produto='$imagem1', 2_imagem_produto='$imagem2', 3_imagem_produto='$imagem3', 4_imagem_produto='$imagem4', descricao_completa_produto='$descricaoCompleta' WHERE id_produto=$id";


    if (mysqli_query($conn, $update)) {
        echo "<script> alert('Editado com sucesso!')</script>";
        echo "<script> window.location.href='index.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
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
                Voltar para a lista
            </button>
        </a>

        <br><br>
        <h1>EDITAR</h1>
        <br><br>


        
        
       
       
   

        <form action="" method="post">
            <?php while ($dado = $resultado->fetch_array()) { ?>

                <input id="id_produto" name="id_produto" type="hidden" value="<?php echo $dado['id_produto'] ?>">


                <div class="form-group">
                    <label for="nome_produto">Nome do Produto</label>
                    <input id="nome_produto" name="nome_produto" type="text" class="form-control" placeholder="Nome do Produto" value="<?php echo $dado['nome_produto']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="descricao_produto">Breve Descrição do Produto</label>
                    <textarea id="descricao_produto" name="descricao_produto" type="text" class="form-control" placeholder="Descrição do Produto" required><?php echo $dado['descricao_produto']; ?></textarea>
                </div>


                <div class="form-group">
                    <label for="descricao_completa_produto">Descrição Completa do Produto</label>
                    <textarea id="descricao_completa_produto" name="descricao_completa_produto" type="text" class="form-control" placeholder="Descrição do Produto" required><?php echo $dado['descricao_completa_produto']; ?></textarea>
                </div>

                <div class="form-row">
                    <div class="col-4">
                        <label for="preco_antigo_produto">Preço Antigo do Produto</label>
                        <input id="preco_antigo_produto" name="preco_antigo_produto" type="number" class="form-control"  value="<?php echo $dado['preco_antigo_produto']; ?>" placeholder="Preço Antigo do Produto" required>
                    </div>

                    <div class="col-4">
                        <label for="preco_produto">Preço do Produto</label>
                        <input id="preco_produto" name="preco_produto" type="number" class="form-control" value="<?php echo $dado['preco_produto']; ?>" placeholder="Preço do Produto" required>
                    </div>

                    <div class="col-4">
                        <label for="categoria_produto">Categoria do Produto</label>
                        <input id="categoria_produto" name="categoria_produto" type="text" class="form-control"  value="<?php echo $dado['categoria_produto']; ?>" placeholder="Categoria do Produto" required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="imagem_produto">Imagem do Produto</label>
                    <input id="imagem_produto" name="imagem_produto" type="text" class="form-control" value="<?php echo $dado['imagem_produto']; ?>" placeholder="Link da Imagem" required>
                </div>


                <div class="form-group">
                    <label for="1_imagem_produto">1 Imagem do Produto</label>
                    <input id="1_imagem_produto" name="1_imagem_produto" type="text" class="form-control" value="<?php echo $dado['1_imagem_produto']; ?>" placeholder="Link da Imagem 1" required>
                </div>

                <div class="form-group">
                    <label for="2_imagem_produto">2 Imagem do Produto</label>
                    <input id="2_imagem_produto" name="2_imagem_produto" type="text" class="form-control" value="<?php echo $dado['2_imagem_produto']; ?>" placeholder="Link da Imagem 2" required>
                </div>

                <div class="form-group">
                    <label for="3_imagem_produto">3 Imagem do Produto</label>
                    <input id="3_imagem_produto" name="3_imagem_produto" type="text" class="form-control" value="<?php echo $dado['3_imagem_produto']; ?>" placeholder="Link da Imagem 3" required>
                </div>

                <div class="form-group">
                    <label for="4_imagem_produto">4 Imagem do Produto</label>
                    <input id="4_imagem_produto" name="4_imagem_produto" type="text" class="form-control" value="<?php echo $dado['4_imagem_produto']; ?>" placeholder="Link da Imagem 4" required>
                </div>
     
            <?php } ?>
            <br>
            <button type="submit" id="SALVAR" value="SALVAR" name="SALVAR" class="btn btn-success btn-lg btn-block">Salvar edição</button>
        </form>
    </div>
</body>

</html>