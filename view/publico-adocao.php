
<body>
    <div class="container">
        <div class="info-section">
        
        </div>
        <div class="form-section">
            <h2>Preencha o formulário</h2>
            <form action="../BancoDeDados/bancoAdocoes.php" method="post">
            <label for="nome-tutor">Nome completo:</label><br>
            <input type="text" id="nome-tutor" name="nome-tutor" required><br><br>

            <label for="data-nasc">Data de nascimento:</label><br>
            <input type="date" id="data-nasc" name="data-nasc" required><br><br>

            <label for="tel-tutor">Telefone:</label><br>
            <input type="text" id="tel-tutor" name="tel-tutor" required><br><br>

            <label for="email-tutor">E-mail:</label><br>
            <input type="text" id="email-tutor" name="email-tutor" required><br><br>

            <label for="ambiente-tutor">Selecione o ambiente:</label><br>
            <select id="ambiente-tutor" name="ambiente-tutor" required onchange="mostrarCampoOutro(this)">
                <option value="" disabled selected></option>
                <option value="casa">Casa</option>
                <option value="apartamento">Apartamento</option>
                <option value="outro">Outro</option>
            </select><br><br>
        
            <div id="campo-outro" style="display: none;">
                <label for="outro-texto">Por favor, especifique:</label>
                <input type="text" id="outro-texto" name="outro-texto">
            </div>

            <label for="data-entrevista">Escolha um dia para a entrevista:</label><br>
            <input type="date" id="data-entrevista" name="data-entrevista" required><br><br>


            <button type="submit">Registrar</button>
        </form>
        </div>
    </div>
</body>
</html>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f8ff;
}

.container {
    display: flex;
    flex-direction: row;
    max-width: 1000px;
    margin: 50px auto;
    background-color: white;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.info-section, .form-section {
    flex: 1;
    padding: 20px;
}

.info-section {
    background-color: #f0f8ff;
    border-right: 1px solid #ddd;
}

h1 {
    color: #007acc;
    font-size: 24px;
    margin-bottom: 20px;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

p {
    color: #333;
    line-height: 1.6;
    margin-bottom: 15px;
}

button#start-test {
    background-color: #00aaff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button#start-test:hover {
    background-color: #007acc;
}

.form-section form {
    display: flex;
    flex-wrap: wrap;
}

.form-group {
    flex: 1 1 45%;
    margin: 10px;
}

.form-section label {
    margin-bottom: 5px;
    color: #555;
    display: block;
}

.form-section input, .form-section select, .form-section textarea {
    width: 100%;
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.form-section textarea {
    height: 80px;
}

button[type="submit"] {
    background-color: #00aaff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 20px;
}

button[type="submit"]:hover {
    background-color: #007acc;
}
</style>