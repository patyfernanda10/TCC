<?php
// Desabilitar cache do navegador
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

// Conectar ao banco de dados
include_once('conexao.php');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber dados do formulário
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $genero = $_POST['genero'];
    $data_resgate = $_POST['data-resgate'];
    $local_resgate = $_POST['local-resgate'];
    $circunstancia_resgate = $_POST['circunstancia-resgate'];
    $status_adocao = $_POST['status-adocao'];

    // Verificar se a foto foi enviada sem erros
    if (isset($_FILES['fotos']) && $_FILES['fotos']['error'] === UPLOAD_ERR_OK) {
        $fotoTmpPath = $_FILES['fotos']['tmp_name'];
        $fotoName = $_FILES['fotos']['name'];
        $fotoSize = $_FILES['fotos']['size'];
        $fotoType = $_FILES['fotos']['type'];
        $fotoNameCmps = explode(".", $fotoName);
        $fotoExtension = strtolower(end($fotoNameCmps));

        // Nome único para o arquivo
        $newFileName = md5(time() . $fotoName) . '.' . $fotoExtension;

        // Diretório de upload
        $uploadFileDir = '../uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        // Mover o arquivo para o diretório de upload
        if (move_uploaded_file($fotoTmpPath, $dest_path)) {
            $fotos = $newFileName; // Nome do arquivo para armazenar no banco de dados
        } else {
            $fotos = ''; // Em caso de falha, não armazena o nome
            echo "Erro ao mover o arquivo para o diretório de upload.";
        }
    } else {
        $fotos = ''; // Nenhum arquivo enviado ou erro durante o upload
    }

    // Inserir dados na tabela 'animais'
    $query_animais = "INSERT INTO animais (nome, especie, raca, idade, genero, data_resgate, local_resgate, circunstancia_resgate, status_adocao, fotos)
                      VALUES ('$nome', '$especie', '$raca', '$idade', '$genero', '$data_resgate', '$local_resgate', '$circunstancia_resgate', '$status_adocao', '$fotos')";

    if (mysqli_query($conexao, $query_animais)) {
        $animal_id = mysqli_insert_id($conexao); // Captura o ID do animal recém-inserido

        // Inserir dados na tabela 'tratamentos'
        if (!empty($_POST['tratamentos'])) {
            foreach ($_POST['tratamentos'] as $tratamento) {
                $data_tratamento = $_POST['data_tratamento_' . $tratamento] ?? null;
                $local_tratamento = $_POST['local_tratamento_' . $tratamento] ?? null;
                $status_tratamento = $_POST['status_tratamento_' . $tratamento] ?? null;

                $query_tratamentos = "INSERT INTO tratamentos (animal_id, tratamento, data, local, status)
                                      VALUES ('$animal_id', '$tratamento', '$data_tratamento', '$local_tratamento', '$status_tratamento')";

                if (!mysqli_query($conexao, $query_tratamentos)) {
                    echo "Erro ao inserir tratamento: " . mysqli_error($conexao);
                }
            }
        }

        // Inserir dados na tabela 'vacinas'
        if (!empty($_POST['vacinas'])) {
            foreach ($_POST['vacinas'] as $vacina) {
                $nome_outras = $vacina === 'outras' ? $_POST['vacinas-outras'] : null;
                $data_vacina = $_POST['data_vacina_' . $vacina] ?? null;
                $local_vacina = $_POST['local_vacina_' . $vacina] ?? null;

                $query_vacinas = "INSERT INTO vacinas (animal_id, vacina, nome_outras, data, local)
                                  VALUES ('$animal_id', '$vacina', '$nome_outras', '$data_vacina', '$local_vacina')";

                if (!mysqli_query($conexao, $query_vacinas)) {
                    echo "Erro ao inserir vacina: " . mysqli_error($conexao);
                }
            }
        }

        // Inserir dados na tabela 'consultas'
        if (!empty($_POST['consulta_data'])) {
            foreach ($_POST['consulta_data'] as $index => $data) {
                $descricao = $_POST['consulta_descricao'][$index] ?? null;
                $status = $_POST['consulta_status'][$index] ?? null;

                $query_consultas = "INSERT INTO consultas (animal_id, data, descricao, status)
                                    VALUES ('$animal_id', '$data', '$descricao', '$status')";

                if (!mysqli_query($conexao, $query_consultas)) {
                    echo "Erro ao inserir consulta: " . mysqli_error($conexao);
                }
            }
        }

        echo "<script>
                alert('Cadastro realizado com sucesso.');
                window.location.href = 'http://localhost/MVC/view/index.php?page=gestao-animais';
              </script>";
    } else {
        echo "Erro ao inserir animal: " . mysqli_error($conexao);
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>
