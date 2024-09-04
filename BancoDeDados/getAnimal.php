<?php
include_once('conexao.php');

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conexao, $_GET['id']);
    
    $query = "SELECT * FROM animais WHERE id='$id'";
    $result = mysqli_query($conexao, $query);
    
    if($result) {
        echo json_encode(mysqli_fetch_assoc($result));
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
}
mysqli_close($conexao);
?>
