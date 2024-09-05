<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('conexao.php');

    // Obter os dados do formulário
    $nomeDenunciante = $_POST['nome-denunciante'];
    $contatoDenunciante = $_POST['contato-denunciante'];
    $tipoAnimal = $_POST['tipo-animal'];
    $enderecoResgate = $_POST['endereco-resgate'];
    $descricaoSituacao = $_POST['descricao-situacao'];
    $formSource = $_POST['form_source']; // Identifica a origem do formulário
    $status = 'Pendente'; // Valor padrão para o status

    // Preparar a consulta SQL para inserir os dados
    $sql = "INSERT INTO resgates (nome_denunciante, contato_denunciante, tipo_animal, endereco_resgate, descricao_situacao, status)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Preparar e executar a consulta
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param('ssssss', $nomeDenunciante, $contatoDenunciante, $tipoAnimal, $enderecoResgate, $descricaoSituacao, $status);
        $stmt->execute();
        $stmt->close();
        
        // Redirecionar com base na origem do formulário
        if ($formSource === 'gestao-resgates') {
            echo "<script>
            alert('Cadastro realizado com sucesso.');
            window.location.href = 'http://localhost/MVC/view/index.php?page=gestao-resgates';
          </script>";
        } elseif ($formSource === 'publico-denuncias') {
            echo "<script>
            alert('Cadastro realizado com sucesso.');
            window.location.href = 'http://localhost/MVC/view/publico-denuncias';
          </script>";
        } else {
            echo "<script>
            alert('Cadastro realizado com sucesso.');
            window.location.href = 'http://localhost/MVC/view/index.php?page=home';
          </script>";
        }
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conexao);
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>
