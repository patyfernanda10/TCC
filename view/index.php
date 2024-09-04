<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGE ONG de Animais</title>
    <link rel="stylesheet" href="menu.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</head>

<body>
    
    <nav>
    <div class="logo-container">
        <div class="img">
           <img src="logomarca.pnj" alt="">
           </div>
    
            <h1>SGE ONG de Animais</h1>
    </div>
    <a href="?page=home">Home</a>
        <a href="?page=gestao-usuarios">Gestão de Usuários</a>
        <a href="?page=gestao-animais">Gestão de Animais</a>
        <a href="?page=gestao-adocao">Gestão de Adoção</a>
        <a href="?page=gestao-doacoes">Gestão de Doações</a>
        <a href="?page=gestao-resgates">Gestão de Resgates</a>
        <a href="?page=gestao-financeira">Gestão Financeira</a>
        <a href="?page=controle-estoque">Controle de Estoque</a>
        <a href="?page=portal-publico">Portal para o Público</a>
    </nav>

  
    <?php
    // Conectar ao banco de dados
include_once '../BancoDeDados/conexao.php';

// Verificar se o formulário foi enviado
if (isset($_POST['submit'])) {
    include '../BancoDeDados/bancoAnimais.php';
}

if (isset($_POST['submit'])) {
    include '../BancoDeDados/bancoResgates.php';
}

if (isset($_POST['submit'])) {
    include '../BancoDeDados/bancoFinanceiro.php';
}

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'home':
                include 'home.php';
                break;
            case 'gestao-usuarios':
                include 'gestao-usuarios.php';
                break;
            case 'gestao-animais':
                include 'gestao-animais.php';
                break;
            case 'gestao-adocao':
                include 'gestao-adocao.php';
                break;
            case 'gestao-doacoes':
                include 'gestao-doacoes.php';
                break;
            case 'gestao-resgates':
                 include 'gestao-resgates.php';
                 break;
            case 'gestao-financeira':
                 include 'gestao-financeira.php';
                 break;
            case 'controle-estoque':
                include 'controle-estoque.php';
                break;
            case 'portal-publico':
                include 'portal-publico.php';
                break;
            // Adicione outros cases conforme necessário
            default:
                include 'home.php';
                break;
        }
    } else {
        include 'home.php';
    }
    ?>
    
    <style>
     body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            height: 100vh;
        }

        nav {
            background-color: #ffff;
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            display: block;
            color: #333;
            text-align: left;
            padding: 12px 20px;
            text-decoration: none;
            margin: 8px 0;
            transition: background-color 0.3s, color 0.3s;}

        nav a:hover {
            background-color: #6db9ff;
            color: #fff;
        }

        /* Estilo para o contêiner da logo */
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .img {
            width: 60px;
            height: 60px;
        }

        .logo-container h1 {
            font-size: 18px;
            margin: 10px 0 0;
            font-weight: normal;
            color: #6db9ff;
        }
.main-content {
    margin-left: 77px; /* Margem para que o conteúdo não fique por baixo do menu */
    padding: 20px;
    width: calc(100% - 250px); /* Ajusta a largura para ocupar o restante da tela */
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

    </style>
    
