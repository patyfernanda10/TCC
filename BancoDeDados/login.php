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
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);

    // Preparar e executar a instrução SQL
    $sql = "SELECT senha FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($senha_hash);
        $stmt->fetch();
        
          // Verificar a senha
          if (password_verify($senha, $senha_hash)) {
            // Inicia a sessão e armazena o e-mail do usuário
            session_start();
            $_SESSION['email'] = $email;
            
            // Redireciona para a página de redirecionamento
            echo "<script>
                    alert('Seja bem vindo usuário!');
                    window.location.href = 'http://localhost/MVC/view/index.php?page=controle-estoque';
                  </script>";
            exit(); // Certifique-se de que o script pare de executar após o redirecionamento
        } else {
            echo "<script>
            alert('Senha incorreta!');
            window.location.href = 'http://localhost/MVC/view/singup.php';
          </script>";
    exit(); // Certifique-se de que o script pare de executar após o redirecionamento
        }
    } else {
        echo "<script>
        alert('Email não encontrado!');
        window.location.href = 'http://localhost/MVC/view/singup.php';
      </script>";
exit(); // Certifique-se de que o script pare de executar após o redirecionamento
    }
}

// Fechar a conexão com o banco de dados
$conexao->close();
?>


