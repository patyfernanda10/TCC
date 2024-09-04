<?php
// Conectar ao banco de dados
include_once('../BancoDeDados/conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verificar se a solicitação é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário e escapar de caracteres especiais
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);

    // Verificar se o email já está cadastrado
    $sql = "SELECT email FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
                    alert('Email já cadastrado! Redirecionando para a página cadastro.');
                    window.location.href = 'http://localhost/MVC/view/singup.php#';
                  </script>";
            exit(); // Certifique-se de que o script pare de executar após o redirecionamento
    } else {
        // Hash da senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Preparar e executar a instrução SQL
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha_hash);

        if ($stmt->execute()) {
            // Inicia a sessão e armazena o e-mail do usuário
            session_start();
            $_SESSION['email'] = $email;
            
            // Redireciona para a página de login
            echo "<script>
                    alert('Cadastro realizado com sucesso! Redirecionando para a página de login.');
                    window.location.href = 'http://localhost/MVC/view/singup.php';
                  </script>";
            exit(); // Certifique-se de que o script pare de executar após o redirecionamento
        } else {
            echo "Erro: " . $stmt->error;
        }
    }
}

// Fechar a conexão com o banco de dados
$conexao->close();
?>