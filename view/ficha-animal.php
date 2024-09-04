<?php
// Conectar ao banco de dados
include_once('../BancoDeDados/conexao.php');

// Verificar se o ID foi passado na URL
if (isset($_GET['id'])) {
    $animal_id = intval($_GET['id']); // Garantir que o ID é um número inteiro

    // Consultar dados do animal
    $query = "SELECT * FROM animais WHERE id = $animal_id";
    $resultado = mysqli_query($conexao, $query);
    $animal = mysqli_fetch_assoc($resultado);

    if (!$animal) {
        echo "Animal não encontrado.";
        exit;
    }

    // Consultar vacinas do animal
    $query_vacinas = "SELECT * FROM vacinas WHERE animal_id = $animal_id";
    $resultado_vacinas = mysqli_query($conexao, $query_vacinas);

    // Consultar consultas do animal
    $query_consultas = "SELECT * FROM consultas WHERE animal_id = $animal_id";
    $resultado_consultas = mysqli_query($conexao, $query_consultas);

    // Fechar conexão
    mysqli_close($conexao);
} else {
    echo "ID do animal não especificado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha do Animal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <section id="animal-details">
            <header>
                <h1 id="animal-name"><?php echo htmlspecialchars($animal['nome']); ?></h1>
            </header>
            
            <div class="section">
                <h3><i class="fa fa-paw" aria-hidden="true"></i> Informações Básicas</h3>
                <p><strong>Nome:</strong> <span id="nome"><?php echo htmlspecialchars($animal['nome']); ?></span></p>
                <p><strong>Espécie:</strong> <span id="species"><?php echo htmlspecialchars($animal['especie']); ?></span></p>
                <p><strong>Raça:</strong> <span id="breed"><?php echo htmlspecialchars($animal['raca']); ?></span></p>
                <p><strong>Idade:</strong> <span id="age"><?php echo htmlspecialchars($animal['idade']); ?></span></p>
                <p><strong>Sexo:</strong> <span id="sex"><?php echo htmlspecialchars($animal['genero']); ?></span></p>
            </div>

            <div class="section">
                <h3><i class="fa fa-paw" aria-hidden="true"></i> Vacinas</h3>
                <?php if (mysqli_num_rows($resultado_vacinas) > 0) {
                    while ($vacina = mysqli_fetch_assoc($resultado_vacinas)) {
                        echo "<p><strong>" . htmlspecialchars($vacina['vacina']) . ":</strong> Concluído - Data: " . htmlspecialchars($vacina['data']) . ", Local: " . htmlspecialchars($vacina['local']) . "</p>";
                    }
                } else {
                    echo "<p>Nenhuma vacina registrada.</p>";
                }
                ?>
            </div>

            <div class="section">
                <h3><i class="fa fa-paw" aria-hidden="true"></i> Consultas</h3>
                <?php if (mysqli_num_rows($resultado_consultas) > 0) {
                    while ($consulta = mysqli_fetch_assoc($resultado_consultas)) {
                        echo "<p><strong>Data:</strong> " . htmlspecialchars($consulta['data']) . " - Descrição: " . htmlspecialchars($consulta['descricao']) . " - Status: " . htmlspecialchars($consulta['status']) . "</p>";
                    }
                } else {
                    echo "<p>Nenhuma consulta registrada.</p>";
                }
                ?>
            </div>

            <div class="section">
                <h3><i class="fa fa-paw" aria-hidden="true"></i> Histórico de Resgate</h3>
                <p><strong>Data do Resgate:</strong> <span id="rescue-date"><?php echo htmlspecialchars($animal['data_resgate']); ?></span></p>
                <p><strong>Local do Resgate:</strong> <span id="rescue-location"><?php echo htmlspecialchars($animal['local_resgate']); ?></span></p>
                <p><strong>Circunstâncias do Resgate:</strong> <span id="rescue-circumstances"><?php echo htmlspecialchars($animal['circunstancia_resgate']); ?></span></p>
            </div>
            
            <div class="section">
                <h3><i class="fa fa-paw" aria-hidden="true"></i> Adoção</h3>
                <p><strong>Status de Adoção:</strong> <span id="adoption-status"><?php echo htmlspecialchars($animal['status_adocao']); ?></span></p>
            </div>

            <div class="section">
    <h3><i class="fa fa-paw" aria-hidden="true"></i> Fotos</h3>
    <div id="photos">
        <?php
        // Supondo que as fotos sejam armazenadas em uma string separada por vírgulas
        $fotos = explode(',', $animal['fotos']);
        foreach ($fotos as $foto) {
            echo '<img src="../uploads/' . htmlspecialchars($foto) . '" alt="Foto do Animal" class="animal-photo">';
        }
        ?>
    </div>
</div>


            <a href="gestao-animais.php" class="btn">Voltar à Lista</a>
        </section>
    </main>
    <!-- Font Awesome CDN para ícones -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>


<style>
/* Estilos gerais */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #e0f7fa; /* Cor de fundo da página */
}

main {
    padding: 20px;
    max-width: 900px; /* Largura máxima do conteúdo */
    margin: auto; /* Centraliza o conteúdo */
    background-color: #ffffff; /* Cor de fundo do main */
    border-radius: 8px; /* Bordas arredondadas */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra leve */
}

header {
    background-color: #b3e5fc; /* Azul claro para o cabeçalho */
    color: #ffffff;
    padding: 15px;
    text-align: center;
    border-radius: 8px 8px 0 0; /* Bordas arredondadas no topo */
    margin-bottom: 20px; /* Espaço abaixo do cabeçalho */
}

header h1 {
    margin: 0;
    font-size: 1.8em; /* Tamanho maior para o nome do animal */
    font-family: Arial, sans-serif;
}

.section {
    background-color: #ffffff; /* Cor de fundo dos containers */
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra leve */
    width: 100%; /* Garante que a seção utilize toda a largura disponível */
    box-sizing: border-box; /* Inclui o padding e a borda na largura total */
}

.section h3 {
    margin-top: 0;
    color: #0288d1; /* Azul claro para os títulos das seções */
    border-bottom: 2px solid #0288d1; /* Linha abaixo dos títulos */
    padding-bottom: 8px;
    font-size: 1.2em; /* Tamanho maior para títulos */
    font-family: Arial, sans-serif;
}

.section h3 i {
    color: #ff4081; /* Cor das patinhas */
    margin-right: 8px; /* Espaço entre a patinha e o texto */
}

.section p {
    margin: 10px 0;
}

.section p strong {
    color: #333; /* Cor do texto em negrito */
    font-weight: bold;
}

.animal-photo {
    max-width: 100%;
    height: auto;
    border-radius: 8px; /* Bordas arredondadas para as fotos */
    margin-top: 10px;
    border: 1px solid #ddd; /* Borda sutil para a foto */
}

.btn {
    background-color: #0288d1; /* Azul claro para o botão */
    color: white;
    padding: 12px 20px;
    text-decoration: none;
    border-radius: 8px;
    display: inline-block;
    margin-top: 20px;
    text-align: center;
    font-size: 1em; /* Tamanho de fonte maior para o botão */
    transition: background-color 0.3s; /* Transição suave na cor de fundo */
}

.btn:hover {
    background-color: #0277bd; /* Azul escuro ao passar o mouse */
}

</style>