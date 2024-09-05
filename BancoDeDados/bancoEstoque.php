<?php
// Conectar ao banco de dados
include_once('conexao.php');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber dados do formulário
    $tipo_item = $_POST['tipo-item'];
    $subcategoria_item = $_POST['subcategoria-item']; // Novo campo
    $quantidade = $_POST['quantidade-item'];
    $localizacao = $_POST['localizacao'];

    // Inserir dados na tabela
    $query = "INSERT INTO estoque (tipo_item, subcategoria_item, quantidade, localizacao)
              VALUES ('$tipo_item', '$subcategoria_item', '$quantidade', '$localizacao')";
    if (mysqli_query($conexao, $query)) {
        echo "<script>
                alert('Dados inseridos com sucesso!');
                window.location.href = 'http://localhost/MVC/view/index.php?page=controle-estoque';
            </script>";
    } else {
        echo "Erro ao inserir os dados: " . mysqli_error($conexao);
    }
}

// Fechar conexão
mysqli_close($conexao);
?>
