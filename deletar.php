<?php include_once('./banco-de-dados/conexao.php'); 

$ID_PRODUTO = $_GET['ID'];

if (isset($ID_PRODUTO)) {
    $sql = "DELETE FROM `produtos` WHERE `id_produto` = '$ID_PRODUTO'";
    
    if(mysqli_query($conn, $sql)){
        $resultado = mysqli_query($conn, $sql);
    } else {
        echo "Error: " . $resultado . "<br>" . mysqli_error($conn);
    }

    if (mysqli_num_rows($resultado) <= 0) {
        // retorna se deletado com sucesso
        echo "<script>window.location.href='produtos.php'</script>";
    }
} else {
    // Retorna a listagem se caso ocorra da pessoa digitar o endereço (http://localhost/deletar.php?id=1) sem o (?id=1)
    echo "<script>alert('Página invalida')</script>";
    echo "<script>window.location.href='produtos.php'</script>";
}

?>