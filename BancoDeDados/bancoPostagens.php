<?php
// Inclua a conexão com o banco de dados
include_once('conexao.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $meta = !empty($_POST['meta']) ? $_POST['meta'] : null;
    
    // Verifica se o arquivo de imagem foi enviado
    if (isset($_FILES['imagem'])) {
        $imagem_error = $_FILES['imagem']['error'];
        
        if ($imagem_error === 0) {
            // Diretório onde a imagem será armazenada
            $diretorio_imagens = '../uploads/';
            
            // Verifica se o diretório existe, caso contrário, cria-o
            if (!is_dir($diretorio_imagens)) {
                mkdir($diretorio_imagens, 0755, true);
            }

            // Gera um nome único para a imagem
            $nome_imagem = uniqid() . '-' . basename($_FILES['imagem']['name']);
            $caminho_imagem = $diretorio_imagens . $nome_imagem;

            // Move o arquivo da pasta temporária para o diretório de uploads
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem)) {
                // Prepara a consulta SQL para inserir os dados no banco
                $sql = "INSERT INTO postagens (tipo, titulo, descricao, imagem, meta) VALUES (?, ?, ?, ?, ?)";
                if ($stmt = $conexao->prepare($sql)) {
                    $stmt->bind_param('ssssd', $tipo, $titulo, $descricao, $nome_imagem, $meta);
                    
                    if ($stmt->execute()) {
                        echo "<script>
                                alert('Postagem criada com sucesso!');
                                window.location.href = 'http://localhost/MVC/view/index.php?page=portal-publico';
                              </script>";
                    } else {
                        echo "Erro ao criar a postagem: " . $stmt->error;
                    }
                    
                    $stmt->close();
                } else {
                    echo "Erro ao preparar a consulta SQL: " . $conexao->error;
                }
            } else {
                echo "Erro ao fazer upload da imagem. Caminho: $caminho_imagem";
            }
        } else {
            echo "Erro no upload da imagem. Código do erro: $imagem_error";
        }
    } else {
        echo "Nenhuma imagem enviada.";
    }

    $conexao->close();
} else {
    echo "Método de requisição inválido.";
}
?>