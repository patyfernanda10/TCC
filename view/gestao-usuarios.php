<?php
// Conectar ao banco de dados
include_once('../BancoDeDados/conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Adicionar usuário
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha_hash);
    if ($stmt->execute()) {
        echo "Usuário adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar usuário: " . $stmt->error;
    }
}

// Excluir usuário
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "";
    } else {
        echo "Erro ao excluir usuário: " . $stmt->error;
    }
}

// Listar usuários
$sql = "SELECT id, nome, email FROM usuarios";
$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestão de Usuários</title>
</head>
<body>

<div class="main-content">
<div class="container">
    <div id="gestao-usuarios" class="section">
    <h2>Lista Usuário</h2>

<!-- Botão para abrir o formulário -->


<!-- Formulário sobreposto -->
<div class="form-overlay" id="usuarios-form-overlay" style="display: none;">
    <div class="form-content">
        <form action="../BancoDeDados/bancoCadastros.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <br>
            <input type="submit" name="add_user" value="Adicionar Usuário">
            <button type="button" class="fechar-form-usuarios">Fechar</button>
        </form>
    </div>
</div>


    <hr>
    
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
    <a href="?page=gestao-usuarios&delete=<?php echo $row['id']; ?>" 
       onclick="return confirm('Tem certeza que deseja excluir?')" 
       class="excluir-button">
       Excluir
    </a>
</td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<script>
document.getElementById('abrir-form-usuarios').addEventListener('click', function() {
    document.getElementById('usuarios-form-overlay').style.display = 'block';
});

document.querySelector('.fechar-form-usuarios').addEventListener('click', function() {
    document.getElementById('usuarios-form-overlay').style.display = 'none';
});

</script>
</div>

<?php
// Fechar a conexão com o banco de dados
$conexao->close();
?>

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

    .excluir-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff4c4c;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
}

.excluir-button:hover {
    background-color: #e60000;
}


    table, th, td {
        border: 1px solid #ddd; /* Cor da borda alterada para cinza claro */
    }
/* Botão Cadastrar Animal */
#abrir-form-usuarios {
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

#abrir-form-usuarios::before {
    content: '+';
    font-size: 48px; /* Tamanho do símbolo de mais */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#abrir-form-usuarios:hover {
    background: #6db9ff; /* Cor de fundo ao passar o mouse */
    color: white; /* Cor do texto ao passar o mouse */
    border-color: #6db9ff; /* Cor da borda ao passar o mouse */
}
</style>
