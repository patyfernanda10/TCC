<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('conexao.php');

    // Obter os dados da solicitação POST
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Preparar a consulta SQL para atualizar o status
    $sql = "UPDATE resgates SET status = ? WHERE id = ?";

    // Preparar e executar a consulta
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param('si', $status, $id);
        $stmt->execute();
        $stmt->close();
        echo "Status atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar status: " . mysqli_error($conexao);
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>
