<div class="main-content">
    <div class="container">
        <div id="gestao-financeira" class="section">
            <h2>Registrar Nova Transação</h2>

            <button id="abrir-form-financeiro">+</button>

            <div class="form-overlay" id="financeiro-form-overlay">
                <div class="form-content">
                    <form action="../BancoDeDados/bancoFinanceiro.php" method="post">
                        <label for="tipo-transacao">Tipo de Transação:</label><br>
                        <select id="tipo-transacao" name="tipo-transacao" required>
                            <option value="receita">Receita</option>
                            <option value="despesa">Despesa</option>
                        </select><br><br>

                        <label for="descricao-transacao">Descrição:</label><br>
                        <input type="text" id="descricao-transacao" name="descricao-transacao" required><br><br>

                        <label for="valor-transacao">Valor:</label><br>
                        <input type="number" step="0.01" id="valor-transacao" name="valor-transacao" required><br><br>

                        <label for="data-transacao">Data:</label><br>
                        <input type="date" id="data-transacao" name="data-transacao" required><br><br>

                        <label for="categoria-transacao">Categoria:</label><br>
                        <select id="categoria-transacao" name="categoria-transacao" required>
                            <option value="doacoes">Doações</option>
                            <option value="vendas">Vendas</option>
                            <option value="salarios">Salários</option>
                            <option value="alugueis">Aluguéis</option>
                            <option value="outros">Outros</option>
                        </select><br><br>

                        <button type="submit">Registrar</button>
                        <button type="button" class="fechar-form-financeiro">Fechar</button>
                    </form>
                </div>
            </div>

            <script>
                document.getElementById('abrir-form-financeiro').addEventListener('click', function() {
                    document.getElementById('financeiro-form-overlay').style.display = 'block';
                });

                document.querySelector('.fechar-form-financeiro').addEventListener('click', function() {
                    document.getElementById('financeiro-form-overlay').style.display = 'none';
                });
            </script>

            <hr>

            <?php
                // Conectar ao banco de dados
                include_once('../BancoDeDados/conexao.php');

                // Consultar os dados das transações financeiras
                $query = "SELECT * FROM financeiro";
                $resultado = mysqli_query($conexao, $query);

                // Inicializar variáveis de resumo financeiro
                $totalReceitas = 0;
                $totalDespesas = 0;

                // Calcular os totais de receitas e despesas
                if (mysqli_num_rows($resultado) > 0) {
                    while($row = mysqli_fetch_assoc($resultado)) {
                        if ($row['tipo_transacao'] === 'receita') {
                            $totalReceitas += $row['valor_transacao'];
                        } elseif ($row['tipo_transacao'] === 'despesa') {
                            $totalDespesas += $row['valor_transacao'];
                        }
                    }
                }

                // Calcular o saldo
                $saldo = $totalReceitas - $totalDespesas;
            ?>

            <!-- Lista de Transações Financeiras -->
        <h3>Transações Financeiras</h3>

        <form method="GET" action="">
            <input type="text" name="search" placeholder="Buscar por descrição">
            <button type="submit">Pesquisar</button>
        </form>

        <form method="GET" action="">
            <label for="mes">Mês:</label>
            <select id="mes" name="mes">
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <!-- Continue com os outros meses -->
            </select>
            
            <label for="ano">Ano:</label>
            <select id="ano" name="ano">
                <?php
                for($i = 2020; $i <= date("Y"); $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
            <button type="submit">Filtrar</button>
        </form>
        
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php   
                if (mysqli_num_rows($resultado) > 0) {
                    // Iterar sobre os resultados e preencher as linhas da tabela
                    mysqli_data_seek($resultado, 0); // Reinicia o ponteiro do resultado
                    while($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['tipo_transacao']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['descricao_transacao']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['valor_transacao']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['data_transacao']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['categoria_transacao']) . "</td>";
                        echo "<td>
                                <button class='editar' data-id='" . $row['id'] . "'>Editar</button>
                                <button class='excluir' data-id='" . $row['id'] . "'>Excluir</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>Nenhuma transação cadastrada.</td></tr>";
                }
                ?>
                </tbody>
            </table>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const botoesExcluir = document.querySelectorAll('.excluir');

                    botoesExcluir.forEach(botao => {
                        botao.addEventListener('click', function() {
                            const id = this.getAttribute('data-id');

                            if(confirm('Tem certeza que deseja excluir esta transação?')) {
                                fetch('../BancoDeDados/excluirFinanceiro.php', {
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

            <hr>

            <!-- Resumo Financeiro -->
            <div class="resumo-financeiro">
                <h3>Resumo Financeiro</h3>
                <p><strong>Total de Receitas:</strong> R$ <?php echo number_format($totalReceitas, 2, ',', '.'); ?></p>
                <p><strong>Total de Despesas:</strong> R$ <?php echo number_format($totalDespesas, 2, ',', '.'); ?></p>
                <p><strong>Saldo:</strong> R$ <?php echo number_format($saldo, 2, ',', '.'); ?></p>
            </div>


            <?php
            // Fechar a conexão com o banco de dados
            mysqli_close($conexao);
            ?>
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
.resumo-financeiro {
    background-color: #6db9ff; /* Cor de fundo */
    padding: 20px; /* Espaçamento interno */
    border-radius: 8px; /* Bordas arredondadas */
    color: white; /* Cor do texto */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra */
    margin-top: 20px; /* Margem superior */
    font-family: Arial, sans-serif; /* Fonte */
}

.resumo-financeiro h3 {
    font-size: 24px; /* Tamanho da fonte */
    margin-bottom: 15px; /* Espaçamento inferior */
    color: white; /* Cor do título */
}

.resumo-financeiro p {
    font-size: 18px; /* Tamanho da fonte */
    margin: 8px 0; /* Espaçamento entre parágrafos */
}

.resumo-financeiro p strong {
    color: #ffd700; /* Cor do texto em negrito */
    font-weight: bold; /* Negrito */
}

/* Botão Cadastrar Animal */
#abrir-form-financeiro {
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

#abrir-form-financeiro::before {
    content: '+';
    font-size: 48px; /* Tamanho do símbolo de mais */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#abrir-form-financeiro:hover {
    background: #6db9ff; /* Cor de fundo ao passar o mouse */
    color: white; /* Cor do texto ao passar o mouse */
    border-color: #6db9ff; /* Cor da borda ao passar o mouse */
}
</style>