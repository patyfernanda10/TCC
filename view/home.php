<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle - SGE</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>



<div class="main-content">
    <main>
        <div class="icon-container">
            <div class="icon-box">
                <a href="?page=gestao-animais">
                    <i class="fas fa-paw icon"></i>
                    <p>Gestão de Animais</p>
                </a>
            </div>
            <div class="icon-box">
                <a href="?page=gestao-adocao">
                    <i class="fas fa-heart icon"></i>
                    <p>Gestão de Adoção</p>
                </a>
            </div>
            <div class="icon-box">
                <a href="?page=gestao-doacoes">
                    <i class="fas fa-donate icon"></i>
                    <p>Gestão de Doações</p>
                </a>
            </div>
            <div class="icon-box">
                <a href="?page=gestao-resgates">
                    <i class="fas fa-hand-holding-heart icon"></i>
                    <p>Gestão de Resgates</p>
                </a>
            </div>
            <div class="icon-box">
                <a href="?page=gestao-financeira">
                    <i class="fas fa-money-bill-wave icon"></i>
                    <p>Gestão Financeira</p>
                </a>
            </div>
            <div class="icon-box">
                <a href="?page=controle-estoque">
                    <i class="fas fa-box icon"></i>
                    <p>Controle de Estoque</p>
                </a>
            </div>
            <div class="icon-box">
                <a href="?page=portal-publico">
                    <i class="fas fa-globe icon"></i>
                    <p>Portal para o Público</p>
                </a>
            </div>
        </div>
    </main>
</div>

</body>
</html>

<style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #4CAF50;
    color: #fff;
    padding: 20px;
    text-align: center;
}

h1 {
    margin: 0;
}

main {
    padding: 20px;
}

.icon-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.icon-box {
    background-color: #fff;
    border: 2px solid #ddd;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
    padding: 20px;
    width: 180px;
    transition: background-color 0.3s, transform 0.3s;
}

.icon-box .icon {
    font-size: 40px;
    color: #6db9ff;
    margin-bottom: 10px;
}

.icon-box p {
    font-size: 16px;
    margin: 0;
}

.icon-box a {
    text-decoration: none;
    color: #333;
}

.icon-box:hover {
    background-color: #e0f2f1;
    transform: translateY(-5px);
}

@media (max-width: 768px) {
    .icon-box {
        width: 150px;
    }

    .icon-box .icon {
        font-size: 30px;
    }

    .icon-box p {
        font-size: 14px;
    }
}

</style>