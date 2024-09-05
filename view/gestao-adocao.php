
<div class="main-content">
<div class="container">
    <h2>Tutores Cadastrados</h2>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Nome Completo</th>
            <th>Data de Nascimento</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Ambiente</th>
            <th>Data da Entrevista</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

    <?php
// Conectar ao banco de dados
include_once('../BancoDeDados/conexao.php');

// Consultar os dados dos tutores cadastrados
$query = "SELECT * FROM adocao";
$resultado = mysqli_query($conexao, $query);

// Verificar se há resultados
if (mysqli_num_rows($resultado) > 0) {
    // Iterar sobre os resultados e preencher as linhas da tabela
    while($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nome_completo']) . "</td>";
        echo "<td>" . htmlspecialchars($row['data_nascimento']) . "</td>";
        echo "<td>" . htmlspecialchars($row['telefone']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['ambiente']) . "</td>";
        echo "<td>" . htmlspecialchars($row['data_entrevista']) . "</td>";

        echo "<td>
            <button class='excluir' data-id='" . $row['id'] . "'>Excluir</button>
            </td>";
       echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>Nenhum tutor cadastrado.</td></tr>";
}
?>

</tbody>
</table>

<?php
// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>
        <script>
            document.getElementById('abrir-form-cadastro').addEventListener('click', function() {
            document.getElementById('form-overlay').style.display = 'block';
        });

            document.getElementById('fechar-form-cadastro').addEventListener('click', function() {
            document.getElementById('form-overlay').style.display = 'none';
        });
        </script>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const botoesExcluir = document.querySelectorAll('.excluir');

    botoesExcluir.forEach(botao => {
        botao.addEventListener('click', function() {
            const id = this.getAttribute('data-id');

            if(confirm('Tem certeza que deseja excluir estes dados?')) {
                fetch('../BancoDeDados/excluirAdocao.php', {
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
</style>
