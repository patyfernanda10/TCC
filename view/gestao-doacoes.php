<div class="main-content">
<div class="container">
        <div id="gestao-doacoes" class="section">

    <h2>Adicionar Nova Doação</h2>
    
    <!-- Botão para abrir o formulário -->
    <button id="abrir-form-doacao">+</button>

    <!-- Formulário sobreposto -->
    <div class="form-overlay" id="doacao-form-overlay" style="display: none;">
        <div class="form-content">
            
        <form action="../BancoDeDados/bancoDoacoes.php" method="post">
            <label for="valor-doacao">Valor da Doação:</label><br>
            <input type="number" id="valor-doacao" name="valor-doacao" step="0.01" required><br><br>

            <label for="data-doacao">Data da Doação:</label><br>
            <input type="date" id="data-doacao" name="data-doacao" required><br><br>

            <label for="hora-doacao">Hora da Doação:</label><br>
            <input type="time" id="hora-doacao" name="hora-doacao" required><br><br>
        
                <button type="submit">Adicionar Doação</button>
                <button type="button" class="fechar-form-doacao">Fechar</button>
            </form>
        </div>
    </div>

    <hr>

<script>
    // Abrir o formulário
    document.getElementById('abrir-form-doacao').addEventListener('click', function() {
        document.getElementById('doacao-form-overlay').style.display = 'block';
    });

    // Fechar o formulário
    document.querySelector('.fechar-form-doacao').addEventListener('click', function() {
        document.getElementById('doacao-form-overlay').style.display = 'none';
    });
</script>
            <h2>Doações Registradas</h2>
    
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Valor da Doação</th>
                        <th>Data da Doação</th>
                        <th>Ações</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
               
               
    <?php
    // Conectar ao banco de dados
    include_once('../BancoDeDados/conexao.php');

    // Consultar os dados dos tutores cadastrados
    $query = "SELECT * FROM doacoes";
    $resultado = mysqli_query($conexao, $query);
                
    // Verificar se há resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Iterar sobre os resultados e preencher as linhas da tabela
        while ($row = mysqli_fetch_assoc($resultado)) {

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['valor']) . "</td>";
        echo "<td>" . htmlspecialchars($row['data']) . "</td>";
        // Botões de editar e excluir
        echo "<td>
                <button class='editar' data-id='" . $row['id'] . "'>Editar</button>
                <button class='excluir' data-id='" . $row['id'] . "'>Excluir</button>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>Nenhum resgate cadastrado.</td></tr>";
}
?>

                        </td>
                    </tr>
                    <!-- Outras entradas de doações podem ser adicionadas aqui -->
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

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
.btn-export {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4caf50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
}

.btn-export:hover {
    background-color: #45a049;
}

form {
    margin-bottom: 20px;
}


.btn-export {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4caf50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
}

.btn-export:hover {
    background-color: #45a049;
}

form {
    margin-bottom: 20px;
}

input[type="text"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 200px;
}
table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    thead {
        background-color: #6db9ff;
        color: white;
    }

    th, td {
        text-align: left;
        padding: 12px;
        border-bottom: 1px solid #ddd; /* Borda inferior */
    }

    th {
        background-color: #6db9ff;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e9f4ff;
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

    table, th, td {
        border: 1px solid #ddd; /* Cor da borda alterada para cinza claro */
    }
    /* Estilo para o Resumo Financeiro */


/* Botão Cadastrar Animal */
#abrir-form-doacao {
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

#abrir-form-doacao::before {
    content: '+';
    font-size: 48px; /* Tamanho do símbolo de mais */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#abrir-form-doacao:hover {
    background: #6db9ff; /* Cor de fundo ao passar o mouse */
    color: white; /* Cor do texto ao passar o mouse */
    border-color: #6db9ff; /* Cor da borda ao passar o mouse */
}
</style>