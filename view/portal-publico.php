<div class="main-content">
    <div class="container">
        <div id="gestao-resgates" class="section active">
            <h2>Fazer nova públicação</h2>

            <button class="abrir-form-publicacao">+</button>

            <!-- Formulário Sobreposto -->
            <div class="form-overlay" id="publicacao-form-overlay">
                <div class="form-content">
                    <form action="../BancoDeDados/bancoPostagens.php" method="post" enctype="multipart/form-data">
                        <label for="tipo">Tipo de Postagem:</label>
                        <select name="tipo" id="tipo" required>
                            <option value="adocao">Adoção</option>
                            <option value="campanha">Campanha</option>
                        </select>

                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" required>

                        <label for="descricao">Descrição:</label>
                        <textarea name="descricao" id="descricao" required></textarea>

                        <label for="imagem">Imagem:</label>
                        <input type="file" name="imagem" id="imagem" accept="image/*">

                        <label for="meta">Meta de Arrecadação (caso seja uma campanha):</label>
                        <input type="number" name="meta" id="meta" step="0.01">

                        <button type="submit">Postar Publicacao</button>
                        <button type="button" class="fechar-form-publicacao">Fechar</button>
                    </form>
                </div>
            </div>

            <hr>
        </div>
    


<?php
    // Conectar ao banco de dados
    include_once('../BancoDeDados/conexao.php');

    // Consultar os dados dos animais cadastrados
    $query = "SELECT * FROM postagens";
    $resultado = mysqli_query($conexao, $query);
?>


    <h3>Resgates Registrados</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data da Publicação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
<?php
// Verificar se há resultados
if (mysqli_num_rows($resultado) > 0) {
    // Iterar sobre os resultados e preencher as linhas da tabela
    while ($row = mysqli_fetch_assoc($resultado)) {

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['tipo']) . "</td>";
        echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
        echo "<td>" . htmlspecialchars($row['descricao']) . "</td>";
        echo "<td>" . htmlspecialchars($row['data_publicacao']) . "</td>";

        // Botões de editar e excluir
        echo "<td>
                <button class='excluir' data-id='" . $row['id'] . "'>Excluir</button>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>Nenhum resgate cadastrado.</td></tr>";
}
?>
</div>

<script>
    document.querySelector('.abrir-form-publicacao').addEventListener('click', function() {
        document.getElementById('publicacao-form-overlay').style.display = 'block';
    });

    document.querySelector('.fechar-form-publicacao').addEventListener('click', function() {
        document.getElementById('publicacao-form-overlay').style.display = 'none';
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const botoesExcluir = document.querySelectorAll('.excluir');

    botoesExcluir.forEach(botao => {
        botao.addEventListener('click', function() {
            const id = this.getAttribute('data-id');

            if(confirm('Tem certeza que deseja excluir este este produto?')) {
                fetch('../BancoDeDados/excluirPostagens.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${id}`
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload(); // Recarrega a página para atualizar a tabela
                });
            }
        });
    });
});
</script>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    display: flex;
}
    .form-overlay {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    border: 1px solid #ccc;
    padding: 40px;
    z-index: 1000;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 50%;
    max-height: 80vh; 
    overflow-y: auto;
    border-radius: 20px;
}
.form-overlay.active {
    display: block;
}
.form-overlay::-webkit-scrollbar {
    width: 12px; 
    border-radius: 10px; 
}
.overlay-background {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
}
.overlay-background.active {
    display: block;
}
h2 {
    font-size: 28px;
    color: #555;
    margin-bottom: 20px;
}
h3 {
    font-size: 24px;
    color: #555;
    margin-bottom: 15px;
}
label {
    font-weight: bold;
    color: #333;
}
input[type="text"],
input[type="number"],
input[type="date"],
input[type="email"],
textarea,
select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}
input[type="file"] {
    margin-bottom: 15px;
}
button {
    background-color: #6db9ff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}
button:hover {
    background-color: #6db9ff;
}
table {
    justify-content: center;
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
}
table, th, td {
    border: 1px solid #ddd;
}
th, td {
    text-align: left;
    padding: 12px;
}
th {
    background-color: #6db9ff;
    color: white;
    font-weight: bold;
}
hr {
    border: 0;
    height: 1px;
    background-color: #ddd;
    margin: 20px 0;
}
button.editar, button.excluir {
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button.editar {
        background-color: #4CAF50;
        color: white;
    }

    button.editar:hover {
        background-color: #45a049;
    }

    button.excluir {
        background-color: #f44336;
        color: white;
    }

    button.excluir:hover {
        background-color: #e53935;
    }
/* Botão Cadastrar Animal */
.abrir-form-publicacao {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 80px; /* Ajuste a largura conforme necessário */
    height: 80px; /* Ajuste a altura conforme necessário */
    background: none;
    border: 2px solid #6db9ff; /* Cor da borda */
    border-radius: 8px; /* Cantos arredondados */
    font-size: 24px; /* Tamanho da fonte */
    color: #6db9ff; /* Cor do texto */
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease; /* Transição suave para hover */
    text-align: center;
    line-height: 1.2;
    position: relative;
}

.abrir-form-publicacao::before {
    content: '+';
    font-size: 48px; /* Tamanho do símbolo de mais */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.abrir-form-publicacao:hover {
    background: #6db9ff; /* Cor de fundo ao passar o mouse */
    color: white; /* Cor do texto ao passar o mouse */
    border-color: #6db9ff; /* Cor da borda ao passar o mouse */
}

</style>