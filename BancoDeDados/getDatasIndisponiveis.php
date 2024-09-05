<?php
include_once('conexao.php');

// Busca todas as datas de entrevistas já marcadas no banco de dados
$sql = "SELECT data_entrevista FROM adocao";
$result = $conexao->query($sql);

$datasIndisponiveis = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $datasIndisponiveis[] = $row['data_entrevista'];
    }
}

$conexao->close();

// Retorna as datas em formato JSON
echo json_encode($datasIndisponiveis);
?>
