<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o nome de usuário do formulário
    $username = htmlspecialchars($_POST['username']);

    // Exibe uma mensagem de boas-vindas
    echo "<h1>Olá, $username!</h1>";
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="singup.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title> Cadastro e Gerenciamento de Usuários </title>
</head>
<body>
  
    <div class="background"></div>

    <div class="container">
        <div class="item">
            <h2 class="logo"><i class='bx bx-leaf'></i>Magnus SGO</h2>
            <div class="text-item">
                <h2>Bem Vindo! <br><span>Ao nosso sistema</span></h2>
                <p> Nosso sistema de gerenciamento faz milagres</p>
                <div class="social-icon">
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                    <a href="#"><i class='bx bxl-tiktok'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>     
            </div>
        </div>
        <div class="login-section">
            <div class="form-box login">

                <form action="../BancoDeDados/login.php" method="post" enctype="multipart/form-data">
                    <h2>Faça Login</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bx-envelope'></i></span>
                        <input type="email" name="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="input-box">
                        <input type="password" name="senha" id="senha-login" required>
                        <label for="senha-login">Senha</label>
                        <button type="button" class="toggle-password" onclick="togglePasswordVisibility('senha-login', this)">👁️</button>
                    </div>
                    <div class="remember-password">
                        <label for=""><input type="checkbox">Lembre de mim</label>
                        <a href="#">Esqueci minha senha</a>
                    </div>
                    <button class="btn" type="submit">Entrar</button>
                    <div class="create-account">
                        <p>Não tem uma conta?<a href="#" class="register-link"> Cadastre-se</a></p>
                    </div>
                </form>
            </div>
            
            <div class="form-box register">
                <form action="../BancoDeDados/cadastro.php" method="post" enctype="multipart/form-data">
                    <h2>Faça seu cadastro</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bx-user-check'></i></span>
                        <input type="text" name="nome" required>
                        <label for="">Nome Completo</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bx-envelope'></i></span>
                        <input type="email" name="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="input-box">
                        <input type="password" name="senha" id="senha-cadastro" required>
                        <label for="senha-cadastro">Senha</label>
                        <button type="button" class="toggle-password" onclick="togglePasswordVisibility('senha-cadastro', this)">👁️</button>
                    </div>

                    <div class="password-requirements">
                        <p>Senha deve ter pelo menos:</p>
                        <ul>
                            <li>8 caracteres</li>
                            <li>Uma letra maiúscula (A-Z)</li>
                            <li>Uma letra minúscula (a-z)</li>
                            <li>Um número (0-9)</li>
                            <li>Um símbolo especial (@, $, !, %, *, ?, &)</li>
                        </ul>
                    </div>

                    <div class="remember-password">
                        <label for=""><input type="checkbox">Eu concordo em cadastrar meus dados</label>
                    </div>
                    <button class="btn" type="submit">Confirmar</button>
                    <div class="create-account">
                        <p>Já tem uma conta?<a href="#" class="login-link"> Faça Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="singup.js"></script>
</body>
</html>

<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "poppins",sans-serif;
}

body{

    height: 100vh;
    width: 100%;
    background-color: black;
}

.background{

    background: url(Imagens/login.webp) no-repeat;
    background-position: center;
    background-size: cover;
    height: 100vh;
    width: 100%;
    filter: blur(10px);
}


.header {

    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 25px 13%;
    background: transparent;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;

}


.navbar a{

    position: relative;
    font-size: 16px;
    color: #fff;
    margin: 30px;
    text-decoration: none;
}

.navbar a::after{

    content: "";
    position: absolute;
    left: 0;
    width: 100%;
    height: 2px;
    background: #fff;
    bottom: -5px;
    border-radius: 5px;
    transform: translateY(10px);
    opacity: 0;
    transition: .5s ease;

}

.navbar a:hover:after{

    transform: translateY(0);
    opacity: 1;
}

.search-bar{

    width: 250px;
    height: 45px;
    background-color: transparent;
    border: 2px solid #fff;
    border-radius: 6px;
    display: flex;
    align-items: center;
}


.search-bar input{

    width: 100%;
    background-color: transparent;
    border: none;
    outline: none;
    color: #fff;
    font-size: 16px;
    padding-left: 10px;
}


.search-bar button {

    width: 40px;
    height: 100%;
    background: transparent;
    outline: none;
    border: none;
    color: #fff;
    cursor: pointer;
}

.search-bar input::placeholder{
    color: #fff;
}



.search-bar button i{
    font-size: 22px;
}

.container{

    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 75%;
    height: 580px;
    background: url(Imagens/login.webp) no-repeat;
    background-position: center;
    background-size: cover;
    color: rgb(250, 247, 247);
    border-radius: 20px;
    overflow: hidden;

}

.item {

    position: absolute;
    top: 0;
    left: 0;
    width: 58%;
    height: 100%;
    color: #fff;
    background: transparent;
    padding: 80px;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    flex: 1 100%;

}

.item .logo {

    color: #fff;
    font-size: 30px;
}

.text-item h2{

    font-size: 40px;
    line-height: 1;
} 

.text-item p{

    font-size: 16px;
    margin: 20px 0;
} 

.social-icon a i{

    color: #fff;
    font-size: 24px;
    margin-left: 10px;
    cursor: pointer;
    transition: .5s ease;

}

.social-icon a:hover i{
    transform: scale(1.2);
}

.container .login-section{

    position: absolute;
    top: 0;
    right: 0;
    width: calc(100% - 58%);
    height: 100%;
    color: #fff;
}

.login-section .form-box {

    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    backdrop-filter: blur(15px);
}


.login-section .form-box.register{

    transform: translateX(430px);
    transition: transform .6s ease;
    transition-delay: 0s;
}

.login-section.active .form-box.register{

    transform: translateX(0px);
    transition-delay: .7s;
}


.login-section .form-box.login{

    transform: translateX(0px);
    transition: transform .6s ease;
    transition-delay: 0.7s;
}

.login-section.active .form-box.login{

    transform: translateX(430px);
    transition-delay: .0s;
}


.login-section .form-box h2{

    text-align: center;
    font-size: 25px;
}

.form-box .input-box{
    width: 340px;
    height: 50px;
    border-bottom: 2px solid #fff;
    margin: 30px 0;
    position: relative;
}

.input-box input{

    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 16px;
    padding-right: 28px;
    color: #fff;

}

.input-box label{

    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: 600px;
    pointer-events: none;
    
}

.input-box .icon{

    position: absolute;
    top: 14px;
    right: 0;
    font-size: 19px;
}

.input-box input:focus~ label,
.input-box input:valid~ label{

    top: -5px;
}

.remember-password{
    
    font-size: 14px;
    font-weight: 500;
    margin: -15px 0 15px;
    display: flex;
    justify-content: space-between;

}

.remember-password label input{
    margin-top: 40px;

    accent-color: #fff;
    margin-right: 3px;

}

.remember-password a{
    color: #fff;
    text-decoration: none;
}

.remember-password a:hover{
    text-decoration: underline;
}


.btn a{
    color: #fff;
}




.btn{
    margin-top: 45px;
    background: #fff;
    width: 100%;
    height: 45px;
    outline: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background: rgb(177, 55, 11);
    font-size: 16px;
    color: #fff;
    box-shadow: rgba(241, 234, 234, 0.4);

}

.create-account{
    font-size: 14.5px;
    text-align: center;
    margin: 25px;
}

.create-account p a{
    color: #fff;
    font-weight: 600px;
    text-decoration: none;
}

.create-account p a:hover{
    
    text-decoration: underline;
}

.input-box {
    width: 340px;
    height: 50px;
    border-bottom: 2px solid #fff;
    margin: 30px 0;
    position: relative;
}

.input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 16px;
    padding-right: 28px; /* Espaço para o botão */
}

/* Estilizar o botão de mostrar/ocultar a senha */
.toggle-password {
    position: absolute;
    top: 14px; /* Centraliza verticalmente */
    right: 0;
    background: none;
    border: none;
    cursor: pointer;
    font-size: 19px;
    color: #fff;
    outline: none;
}
</style>