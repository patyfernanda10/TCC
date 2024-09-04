<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    
</body>
</html>
<?php
// Conectar ao banco de dados
include_once('../BancoDeDados/conexao.php');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber dados do formulário
    $tipo_transacao = $_POST['tipo-transacao'];
    $descricao_transacao = $_POST['descricao-transacao'];
    $valor_transacao = $_POST['valor-transacao'];
    $data_transacao = $_POST['data-transacao'];
    $categoria_transacao = $_POST['categoria-transacao'];

    // Verificar se a conexão foi estabelecida
    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Inserir dados na tabela
    $query = "INSERT INTO financeiro (tipo_transacao, descricao_transacao, valor_transacao, data_transacao, categoria_transacao)
              VALUES ('$tipo_transacao', '$descricao_transacao', '$valor_transacao', '$data_transacao', '$categoria_transacao')";

    if (mysqli_query($conexao, $query)) {
        // Redirecionar após a operação
        echo "<script>
        alert('Cadastro realizado com sucesso.');
        window.location.href = 'http://localhost/MVC/view/index.php?page=gestao-financeira';
      </script>";
} else {
echo "Erro ao inserir animal: " . mysqli_error($conexao);
}

// Fechar a conexão
mysqli_close($conexao);
}
?>