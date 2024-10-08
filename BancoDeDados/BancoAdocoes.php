<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('conexao.php');

    $nome_completo = $_POST['nome-tutor'];
    $data_nascimento = $_POST['data-nasc'];
    $telefone = $_POST['tel-tutor'];
    $email = $_POST['email-tutor'];
    $ambiente = $_POST['ambiente-tutor'];
    $data_entrevista = $_POST['data-entrevista'];

    // Preparar a consulta SQL para evitar injeção de SQL
    $sql = "INSERT INTO adocao (nome_completo, data_nascimento, telefone, email, ambiente, data_entrevista)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Criar a conexão com o banco de dados
    $stmt = $conexao->prepare($sql);

    // Verificar se a preparação da consulta foi bem-sucedida
    if ($stmt === false) {
        die('Erro ao preparar a consulta: ' . $conexao->error);
    }

    // Bind dos parâmetros
    $stmt->bind_param('ssssss', $nome_completo, $data_nascimento, $telefone, $email, $ambiente, $data_entrevista);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "<script>
                alert('Cadastro realizado com sucesso.');
                window.location.href = 'http://localhost/MVC/view/publico-adocao';
              </script>";
    } else {
        echo "Erro ao registrar tutor: " . $stmt->error;
    }

    // Fechar a declaração
    $stmt->close();
    
    // Fechar a conexão
    $conexao->close();
}
?>
