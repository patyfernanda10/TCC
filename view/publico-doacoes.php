<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doação</title>
</head>
<body>
    <header>
        <div class="image-container">
            <img src="gato (1).png" alt="Imagem de destaque">
            <nav class="image-nav">
                <a href="inicio.html" class="active">Início</a>
                <a href="blog.html">Sobre nós</a>
                <a href="Adoção/Adoção.html">Adoção</a>
                <a href="Doação/doação.html">Doação</a>
                <a href="Denuncias/denuncias.html">Denúncias</a>
                <a href="singup.html">Login</a>
            </nav>
        </div>
    </header>

    <div class="text-container">
        <p>Doar é mais do que um ato de generosidade; é um gesto fundamental que pode transformar vidas e fortalecer comunidades. Cada contribuição, grande ou pequena, ajuda a atender necessidades imediatas e promove um impacto duradouro. Através da doação, expressamos nossa solidariedade e contribuímos para a construção de um mundo mais justo e empático. Ao apoiar causas importantes e compartilhar nossos recursos, ajudamos a criar oportunidades para aqueles que precisam e estimulamos uma cultura de apoio mútuo. Doar é um investimento no bem-estar coletivo e um passo crucial para um futuro melhor para todos.(Parte das arrecadações das ONGs será destinada à SGO MAGNUS)</p>
    </div>

    <div class="form-container">
        <div class="title">QUERO DOAR!</div>
        <form id="donation-form" action="../BancoDeDados/bancoDoacoes.php" method="POST">
            <div class="donation-grid">
                <h2>Escolha o valor da sua doação:</h2>
                <ul>
                    <li class="donation-item">
                        <input type="radio" id="donation-10" name="donation" value="10" class="donation-radio">
                        <label for="donation-10" class="donation-option">
                            <span class="checkbox"></span>
                            <span class="donation-value">R$ 10</span>
                        </label>
                    </li>
                    <li class="donation-item">
                        <input type="radio" id="donation-20" name="donation" value="20" class="donation-radio">
                        <label for="donation-20" class="donation-option">
                            <span class="checkbox"></span>
                            <span class="donation-value">R$ 20</span>
                        </label>
                    </li>
                    <li class="donation-item">
                        <input type="radio" id="donation-50" name="donation" value="50" class="donation-radio">
                        <label for="donation-50" class="donation-option">
                            <span class="checkbox"></span>
                            <span class="donation-value">R$ 50</span>
                        </label>
                    </li>
                    <li class="donation-item">
                        <input type="radio" id="donation-100" name="donation" value="100" class="donation-radio">
                        <label for="donation-100" class="donation-option">
                            <span class="checkbox"></span>
                            <span class="donation-value">R$ 100</span>
                        </label>
                    </li>
                    <li class="donation-item">
                        <input type="radio" id="donation-200" name="donation" value="200" class="donation-radio">
                        <label for="donation-200" class="donation-option">
                            <span class="checkbox"></span>
                            <span class="donation-value">R$ 200</span>
                        </label>
                    </li>
                    <li class="donation-item">
                        <input type="radio" id="custom-radio" name="donation" class="donation-radio">
                        <label for="custom-radio" class="donation-option custom-option">
                            <span class="checkbox"></span>
                            <span class="donation-value">Outro valor:</span>
                        </label>
                        <input type="number" id="custom-donation" name="custom-donation" placeholder="Valor" class="custom-donation-input" min="1">
                    </li>
                </ul>
                <input type="hidden" id="donation-value" name="donation-value" value="">
                <button type="submit">DOAR</button>
            </div>
        </form>
    </div>

   
    <script>
        document.getElementById('donation-form').addEventListener('submit', function(event) {
            var donationValue = document.querySelector('input[name="donation"]:checked');
            if (donationValue) {
                document.getElementById('donation-value').value = donationValue.value;
            } else {
                var customDonation = document.getElementById('custom-donation').value;
                if (customDonation) {
                    document.getElementById('donation-value').value = customDonation;
                } else {
                    alert('Por favor, selecione um valor de doação.');
                    event.preventDefault(); // Impede o envio do formulário
                }
            }
        });
    </script>

<script>
    document.getElementById('donation-form').addEventListener('submit', function(event) {
    var customDonationInput = document.getElementById('custom-donation');
    var customRadio = document.getElementById('custom-radio');
    var errorMessage = '';

    if (customRadio.checked) {
        var customValue = parseFloat(customDonationInput.value);

        if (isNaN(customValue) || customValue < 0) {
            errorMessage = 'Por favor, insira um valor válido (0 ou mais).';
            customDonationInput.style.borderColor = 'red'; // Optional: Highlight the input field
        } else {
            customDonationInput.style.borderColor = ''; // Reset border color if valid
        }
    }

    if (errorMessage) {
        event.preventDefault(); // Prevent form submission
        alert(errorMessage); // Display error message
    }
});
            document.addEventListener('DOMContentLoaded', function () {
                const customRadio = document.getElementById('custom-radio');
                const customDonationInput = document.getElementById('custom-donation');
                const donationForm = document.getElementById('donation-form');

                // Mostrar ou esconder o campo de valor personalizado baseado na seleção
                document.querySelectorAll('input[name="donation"]').forEach(input => {
                    input.addEventListener('change', function() {
                        if (customRadio.checked) {
                            customDonationInput.style.display = 'inline-block';
                        } else {
                            customDonationInput.style.display = 'none';
                        }
                    });
                });

                // Prevenir o envio do formulário com a tecla Enter
                donationForm.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                    }
                });

                donationForm.addEventListener('submit', function (event) {
                    event.preventDefault();

                    let donationValue;
                    if (customRadio.checked) {
                        donationValue = customDonationInput.value;
                    } else {
                        const selectedRadio = document.querySelector('input[name="donation"]:checked');
                        if (selectedRadio) {
                            donationValue = selectedRadio.value;
                        } else {
                            alert('Por favor, selecione um valor de doação.');
                            return;
                        }
                    }

                    if (!donationValue || isNaN(donationValue) || donationValue <= 0) {
                        alert('Por favor, insira um valor válido.');
                        return;
                    }

                    const paymentUrl = `pagamento.php?donation=${encodeURIComponent(donationValue)}`;
                    window.location.href = paymentUrl;
                });
            });
        </script>
    </div>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
 cursor: url('cursor.cur') 16 16, auto; /* '16 16' define a posição de clique do cursor */
}

button, a {
    cursor: url('cursor.cur') 16 16, auto; /* Aplica o cursor personalizado a botões e links */
}

button:hover, a:hover, button:focus, a:focus {
    cursor: url('cursor.cur') 16 16, auto; /* Aplica a patinha personalizada em hover e foco */
}


/* Header section */
header {
    width: 100%;
    position: relative;
}

.image-container {
    position: relative;
    width: 100%;
    height: 400px; /* Ajuste a altura conforme necessário */
    overflow: hidden;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.image-nav {
    position: absolute;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 20px;
    z-index: 10; /* Para garantir que os links fiquem acima da imagem */
}

.image-nav a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    transition: color 0.3s;
}

.image-nav a.active, .image-nav a:hover {
    color: #ffd900cb; /* Alterar cor ao passar o mouse ou se estiver ativo */
}

.text-container {
    background-color: #ffffff;
    padding: 20px;
    max-width: 900px;
    margin: 0 auto; /* Centraliza o contêiner de texto */
    margin-top: 90px;
  
    
}


p {
    text-align: justify;
    font-size: 1.1em;
    color: #333333;
    line-height: 1.6;
}

.title {
    font-size: 2em; /* Ajuste o tamanho conforme necessário */
    text-align: center;
    font-weight: bold;
    color: #ffd900;
    
}

.donation-grid {
    margin-top: 40px;
    padding: 20px;
    background-color: #f7f7f7;

    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.donation-grid h2 {
    margin-bottom: 10px;
}

.donation-grid ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.donation-grid li {
    margin-right: 20px;
    margin-bottom: 20px;
}

.donation-btn {
    background-color: #ffd900;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

.donation-btn:hover {
    background-color: #e6c300;
}

#custom-donation {
    width: 100px;
    height: 40px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}
/* Formulário */
.form-container {
    padding: 20px;
    background-color: #ffffff;
    margin-top: 70px;
   
}

.form-container form {
    max-width: 800px;
    margin: 0 auto;
}

.form-container label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-container input,
.form-container textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 8px;
    border: 1px solid #000000a5;
    border-radius: 4px;
}


.form-container button {
    background-color: #ffd900;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

.form-container button:hover {
    background-color: #e6c300;
}

.donation-grid ul {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Três colunas */
    grid-gap: 20px; /* Espaço entre os itens */
}


/* Estiliza os rádio buttons como círculos */
.donation-grid input[type="radio"] {
    appearance: none;
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    border: 2px solid #000;
    border-radius: 50%;
    outline: none;
    cursor: pointer;
    position: relative;
    margin-right: 10px;
}

.donation-grid input[type="radio"]:checked::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 12px;
    height: 12px;
    background: #ffd900;
    border-radius: 50%;
    transform: translate(-50%, -50%);
}

.donation-grid button {
    background-color: #ffd900;
    color: #fff;
    border: none;
    padding: 15px 30px; /* Aumenta o padding do botão */
    border-radius: 4px;
    font-size: 18px; /* Aumenta o tamanho da fonte */
    cursor: pointer;
    margin-top: 10px; /* Espaço acima do botão */
    display: block; /* Faz o botão ocupar a linha inteira */
    width: 100%; /* Ajusta a largura do botão */
    max-width: 800px; /* Limita a largura máxima do botão */
    text-align: center; /* Centraliza o texto no botão */
}


/* Estilo para o footer */
footer {
    background-color: #ffe033;
    padding: 20px;
    border-top: 1px solid #ffd900;
    position: relative;
    bottom: 0;
    width: 100%;
    box-sizing: border-box; 
    margin-top: 300px;
}

footer .container {
    height: 350px;
    max-width: 900px;
    margin: 0 auto;
}

footer .f-container {
    text-align: center; /* Centraliza o conteúdo dentro do footer */
}

footer .social a {
    margin-right: 10px;
}


</style>