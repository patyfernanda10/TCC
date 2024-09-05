<div class="main-content">
<div class="container">
    <div id="gestao-resgates" class="section active">
    <h2>Registrar Novo Resgate</h2>

    <button class="abrir-form-resgate">+</button>

    <!-- Formulário Sobreposto -->
    <div class="form-overlay" id="resgate-form-overlay">
        <div class="form-content">
            
            <form action="../BancoDeDados/bancoResgates.php" method="post">
            <input type="hidden" name="form_source" value="gestao-resgates">
                <label for="nome-denunciante">Nome do Denunciante:</label><br>
                <input type="text" id="nome-denunciante" name="nome-denunciante" required><br><br>

                <label for="contato-denunciante">Contato do Denunciante:</label><br>
                <input type="text" id="contato-denunciante" name="contato-denunciante" required><br><br>

                <div class="form-group">
                        <label for="tipo-animal">Tipo de Animal:</label>
                        <select id="tipo-animal" name="tipo-animal" required>
                      <option value="" disabled selected></option>
                      <option value="cachorro">Cachorro</option>
                      <option value="gato">Gato</option>
                    </select><br><br>
                    </div>

                <label for="endereco-resgate">Endereço do Resgate:</label><br>
                <input type="text" id="endereco-resgate" name="endereco-resgate" required><br><br>


                <label for="descricao-situacao">Descrição da Situação:</label><br>
                <textarea id="descricao-situacao" name="descricao-situacao" required></textarea><br><br>

                <button type="submit">Registrar Resgate</button>
                <button type="button" class="fechar-form-resgate">Fechar</button>
            </form>
        </div>
    </div>

    <hr>

<?php
    // Conectar ao banco de dados
    include_once('../BancoDeDados/conexao.php');

    // Consultar os dados dos animais cadastrados
    $query = "SELECT * FROM resgates";
    $resultado = mysqli_query($conexao, $query);
?>


    <h3>Resgates Registrados</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nome do Denunciante</th>
                <th>Contato</th>
                <th>Endereço</th>
                <th>Tipo de Animal</th>
                <th>Descrição</th>
                <th>Data e Hora</th>
                <th>Status</th>
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
        echo "<td>" . htmlspecialchars($row['nome_denunciante']) . "</td>";
        echo "<td>" . htmlspecialchars($row['contato_denunciante']) . "</td>";
        echo "<td>" . htmlspecialchars($row['endereco_resgate']) . "</td>";
        echo "<td>" . htmlspecialchars($row['tipo_animal']) . "</td>";
        echo "<td>" . htmlspecialchars($row['descricao_situacao']) . "</td>";
        echo "<td>" . htmlspecialchars($row['data_registro']) . "</td>";

        $statusClass = $row['status'] === 'Concluído' ? 'btn-status concluido' : 'btn-status pendente';
        echo "<td><button class='$statusClass' data-id='" . $row['id'] . "' onclick='toggleStatus(this)'>" . htmlspecialchars($row['status']) . "</button></td>";

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


<script>
function toggleStatus(button) {
    const id = button.getAttribute('data-id');
    const newStatus = button.textContent === 'Pendente' ? 'Concluído' : 'Pendente';
    const newClass = newStatus === 'Concluído' ? 'btn-status concluido' : 'btn-status pendente';

    button.textContent = newStatus;
    button.className = newClass;

    // Enviar a alteração para o backend
    fetch('../BancoDeDados/atualizarStatusResgate.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${id}&status=${newStatus}`
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'Sucesso') {
            console.log('Status atualizado com sucesso');
        } else {
            console.error('Erro ao atualizar status');
        }
    });
}

</script>

<?php
// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>

<script>document.querySelector('.abrir-form-resgate').addEventListener('click', function() {
document.getElementById('resgate-form-overlay').style.display = 'block';
});

document.querySelector('.fechar-form-resgate').addEventListener('click', function() {
document.getElementById('resgate-form-overlay').style.display = 'none';
});
</script>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const botoesExcluir = document.querySelectorAll('.excluir');

    botoesExcluir.forEach(botao => {
        botao.addEventListener('click', function() {
            const id = this.getAttribute('data-id');

            if(confirm('Tem certeza que deseja excluir este dado?')) {
                fetch('../BancoDeDados/excluirResgate.php', {
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

/* Alinha os elementos de tratamento e vacina em uma linha */
.tratamento-item, .vacina-item {
    display: flex;
    align-items: center;
    margin-bottom: 5px;
}

.tratamento-item label, .vacina-item label {
    margin-right: 10px;
    white-space: nowrap;
}

/* Tamanho dos campos de data, local e status */
.detalhes-tratamento input[type="date"],
.detalhes-tratamento input[type="text"],
.detalhes-tratamento select,
.detalhes-vacina input[type="date"],
.detalhes-vacina input[type="text"],
.detalhes-vacina select {
    width: 80px;
    margin-left: 5px;
    font-size: 12px;
    padding: 2px;
}

/* Esconde os campos de detalhes inicialmente */
.detalhes-tratamento,
.detalhes-vacina {
    display: none;
}

/* Mostra os campos de detalhes ao marcar o checkbox */
input[type="checkbox"]:checked + .detalhes-tratamento,
input[type="checkbox"]:checked + .detalhes-vacina {
    display: flex;
    gap: 5px;
    align-items: center;
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

/* Estilos para o botão de status */
.btn-status {
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}

/* Cor para status Pendente */
.btn-status.pendente {
    background-color: #f44336; /* Vermelho */
}

/* Cor para status Concluído */
.btn-status.concluido {
    background-color: #4caf50; /* Verde */
}

    table, th, td {
        border: 1px solid #ddd; /* Cor da borda alterada para cinza claro */
    }
/* Botão Cadastrar Animal */
.abrir-form-resgate {
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

.abrir-form-resgate::before {
    content: '+';
    font-size: 48px; /* Tamanho do símbolo de mais */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.abrir-form-resgate:hover {
    background: #6db9ff; /* Cor de fundo ao passar o mouse */
    color: white; /* Cor do texto ao passar o mouse */
    border-color: #6db9ff; /* Cor da borda ao passar o mouse */
}

</style>