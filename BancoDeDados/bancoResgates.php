<?php
// BancoDeDados/bancoResgates.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('conexao.php');

    // Obter os dados do formulário
    $nomeDenunciante = $_POST['nome-denunciante'];
    $contatoDenunciante = $_POST['contato-denunciante'];
    $tipoAnimal = $_POST['tipo-animal'];
    $enderecoResgate = $_POST['endereco-resgate'];
    $descricaoSituacao = $_POST['descricao-situacao'];

    // Preparar a consulta SQL para inserir os dados
    $sql = "INSERT INTO resgates (nome_denunciante, contato_denunciante, tipo_animal, endereco_resgate, descricao_situacao)
            VALUES (?, ?, ?, ?, ?)";

    // Preparar e executar a consulta
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param('sssss', $nomeDenunciante, $contatoDenunciante, $tipoAnimal, $enderecoResgate, $descricaoSituacao);
        $stmt->execute();
        $stmt->close();
        
        echo "<script>
        alert('Cadastro realizado com sucesso.');
        window.location.href = 'http://localhost/MVC/view/index.php?page=controle-estoque';
      </script>";
} else {
echo "Erro ao inserir animal: " . mysqli_error($conexao);
}

// Fechar a conexão
mysqli_close($conexao);
}
?>
    

}
?>
