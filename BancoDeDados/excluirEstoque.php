<?php
include_once('conexao.php');

if(isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    
    $query = "DELETE FROM estoque WHERE id='$id'";
    if(mysqli_query($conexao, $query)) {
        echo "Produto excluído com sucesso!";
    } else {
        echo "Erro ao excluir dados: " . mysqli_error($conexao);
    }
}
mysqli_close($conexao);
?>
