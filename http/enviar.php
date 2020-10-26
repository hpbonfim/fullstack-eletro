<?php include('./banco-de-dados/conexao.php');

$SALVAR = $_POST['salvarFormulario'];

if (isset($SALVAR) && $SALVAR == 'salvarFormulario') {
    $nomeCliente = $_POST['nome_cliente'];
    $enderecoCliente = $_POST['endereco_cliente'];
    $telefoneCliente = $_POST['telefone_cliente'];
    $nomeProduto = $_POST['nome_produto'];
    $valorUnitarioProduto = $_POST['valor_unitario_produto'];
    $valorTotalProduto = $_POST['valor_total_produto'];
    $quantidadeProduto = $_POST['quantidade_produto'];
    $idProduto = $_POST['id_produto'];

    $inserir = "INSERT INTO pedidos (nome_cliente, endereco_cliente, telefone_cliente, nome_produto, valor_unitario_produto, valor_total_produto, quantidade_produto, id_produtos) VALUES ('$nomeCliente', '$enderecoCliente', '$telefoneCliente', '$nomeProduto', '$valorUnitarioProduto', '$valorTotalProduto','$quantidadeProduto', '$idProduto')";


    if (mysqli_query($conn, $inserir)) {
        mysqli_close($conn);
        echo "<script> window.location.href='index.php'</script>";
    } else {
        echo "Error: " . $inserir . "<br>" . mysqli_error($conn);
    }
} else {
    echo "<script> window.location.href='index.php'</script>";
}
