<?php
include_once('conexao.php');

if(isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    
    $query = "DELETE FROM animais WHERE id='$id'";
    if(mysqli_query($conexao, $query)) {
        echo "Animal excluído com sucesso!";
    } else {
        echo "Erro ao excluir o animal: " . mysqli_error($conexao);
    }
}
mysqli_close($conexao);
?>
