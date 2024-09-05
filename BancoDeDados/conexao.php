<?php
$Host = "localhost"; // Certifique-se de que está em minúsculas
$Username = "root";
$Password = "";
$Name = "onganimal";

$conexao = new mysqli($Host, $Username, $Password, $Name);

if ($conexao->connect_errno) {
    die("Falha na conexão: " . $conexao->connect_error);
} else {
    echo "";
}
?>
