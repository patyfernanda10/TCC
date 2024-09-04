<?php
// Conectar ao banco de dados
include_once('../BancoDeDados/conexao.php');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber dados do formulário
    $valor = $_POST['donation-value'];

    // Verificar se a conexão foi estabelecida
    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Inserir dados na tabela
    $query = "INSERT INTO doacoes (valor) VALUES ('$valor')";

    if (mysqli_query($conexao, $query)) {
        echo "<script>
                alert('Dados inseridos com sucesso!');
                window.location.href = 'http://localhost/MVC/view/index.php?page=pagamento.php';
            </script>";
    } else {
        echo "Erro ao inserir os dados: " . mysqli_error($conexao);
    }
    }
// Fechar conexão
mysqli_close($conexao);
?>
       
