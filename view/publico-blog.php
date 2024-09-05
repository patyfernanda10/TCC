<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Blog Estilizado</title>
   
</head>
<body>

    <div class="container">
        <!-- Estrutura de postagens para campanhas -->
        <div class="campanha-list">
           
            <div class="post-list">
        <?php
            // Inclua a conexão com o banco de dados
            include_once('../BancoDeDados/conexao.php');

            // Consulta para obter as campanhas
            $query = "SELECT * FROM postagens WHERE tipo = 'campanha'";
            $result = $conexao->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $titulo = $row['titulo'];
                    $descricao = $row['descricao'];
                    $imagem = '../uploads/' . $row['imagem'];  // Certifique-se de que o caminho está correto
                    $meta = $row['meta'];
                    $arrecadado = 0; // Aqui você pode calcular o valor arrecadado se tiver uma tabela separada para transações
                    $percentual = $meta ? ($arrecadado / $meta) * 100 : 0;
        ?>
        
                        <div class="post">
                            <img src="<?php echo $imagem; ?>" alt="Campanha">
                            <div class="post-content">
                                <h4><?php echo $titulo; ?></h4>
                                <p class="meta">Meta de Arrecadação: R$ <?php echo number_format($meta, 2, ',', '.'); ?></p>
                                <div class="progress-bar-container">
                                    <div class="progress-bar" style="width: <?php echo $percentual; ?>%;"></div>
                                </div>
                                <p class="progress-text">R$ <?php echo number_format($arrecadado, 2, ',', '.'); ?> arrecadados de R$ <?php echo number_format($meta, 2, ',', '.'); ?></p>
                                <p>Descrição: <?php echo $descricao; ?>...</p>
                                <div class="button-container">
                                <a href="publico-adocao.php" class="btn-saiba-mais">Saiba mais</a>

                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>

        <!-- Estrutura de postagens para animais disponíveis para adoção -->
        <div class="animal-list">
            <h2>Conheça nossos animais!</h2>
            <div class="post-list">
                <?php
                // Consulta para obter os animais
                $query = "SELECT * FROM postagens";
                $result = $conexao->query($query);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $titulo = $row['titulo'];
                        $descricao = $row['descricao'];
                        $imagem = '../uploads/' . $row['imagem'];
                        ?>
                        <div class="post">
                            <img src="<?php echo $imagem; ?>" alt="Animal">
                            <div class="post-content">
                                <h4><?php echo $titulo; ?></h4>
                            
                                <p>Descrição: <?php echo $descricao; ?>...</p>
                                <div class="button-container">
                                <a href="publico-adocao.php" class="btn-saiba-mais">Saiba mais</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Nenhum animal disponível para adoção.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2024 Meu Blog Estilizado. Todos os direitos reservados.</p>
    </footer>

</body>
</html>

<style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f9fc;
    color: #333;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    flex-grow: 1;
}

h2 {
    text-align: center;
    color: #ffd900;
    margin-bottom: 20px;
    font-size: 35px;
    font-weight: bold;
    margin-bottom: 70px;
}

.post-list {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Define duas colunas */
    gap: 20px;
}

.post {
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    transition: transform 0.3s, box-shadow 0.3s;
}

.post:hover {
    transform: scale(1.02);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.post img {
    width: 100%;
    height: auto;
    object-fit: cover;
    max-height: 400px;
    border-radius: 10px;
}

.post-content {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.post h4 {
    margin: 0 0 10px;
    color: #333;
    font-size: 20px;
    font-weight: bold;
}

.post p {
    margin: 10px 0;
    color: #666;
    line-height: 1.6;
    font-size: 16px;
    flex-grow: 1;
}

.meta {
    margin-bottom: 10px;
    font-size: 14px;
    color: #999;
}

.progress-bar-container {
    background-color: #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
    margin-top: 10px;
    height: 10px;
}

.progress-bar {
    background-color: #007bff;
    height: 100%;
    width: 0;
    border-radius: 8px;
    transition: width 0.3s;
}

.progress-text {
    text-align: center;
    margin-top: 5px;
    font-size: 14px;
    color: #333;
}

.button-container {
    margin-top: 15px;
    text-align: center;
}

.btn-saiba-mais {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color:#ffd900;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
}

.btn-saiba-mais:hover {
    background-color: #0056b3;
}

footer {
    background-color: #ffd900;
    color: white;
    text-align: center;
    padding: 10px 0;
    margin-top: auto;
}

        