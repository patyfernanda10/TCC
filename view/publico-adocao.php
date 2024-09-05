
<body>
    <div class="container">
        
        
      
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

            <button type="submit" name="submit">Registrar</button>

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
    background-color: #ffcc00;
}

.container {
    display: flex;
    flex-direction: column;
    max-width: 600px;
    margin: 50px auto;
    background-color: #ffffff;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
}

h2 {
    color: #ffb700;
    margin-bottom: 20px;
    font-size: 24px;
    text-align: center;
}

.form-section label {
    margin-bottom: 5px;
    color: #333;
    display: block;
    font-weight: bold;
}

.form-section input, .form-section select, .form-section textarea {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #ffff;
    margin-bottom: 15px;
}

button[type="submit"] {
    background-color: #ffcc00;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #ffb700;
}

#campo-outro {
    margin-top: 15px;
}

#campo-outro input {
    background-color: #fffbe6;
}

.form-section {
    padding: 20px;
    background-color: #ffff;
    border-radius: 10px;
}

@media (min-width: 768px) {
    .container {
        flex-direction: row;
        max-width: 800px;
    }

    .form-section {
        flex: 1;
    }
}

</style>