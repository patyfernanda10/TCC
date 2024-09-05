<body>
    <div class="container">
        <div class="info-section">
        
        </div>
        <div class="form-section">
            <h2>Preencha o formulário</h2>

            <form action="../BancoDeDados/bancoResgates.php" method="post">
            <input type="hidden" name="form_source" value="publico-denuncias">
                <label for="nome-denunciante">Nome do Denunciante:</label><br>
                <input type="text" id="nome-denunciante" name="nome-denunciante" required><br><br>

                <label for="contato-denunciante">Contato do Denunciante:</label><br>
                <input type="text" id="contato-denunciante" name="contato-denunciante" required><br><br>

                
                        <label for="tipo-animal">Tipo de Animal:</label>
                        <select id="tipo-animal" name="tipo-animal" required>
                      <option value="" disabled selected></option>
                      <option value="cachorro">Cachorro</option>
                      <option value="gato">Gato</option>
                    </select><br><br>
                  

                <label for="endereco-resgate">Endereço do Resgate:</label><br>
                <input type="text" id="endereco-resgate" name="endereco-resgate" required><br><br>


                <label for="descricao-situacao">Descrição da Situação:</label><br>
                <textarea id="descricao-situacao" name="descricao-situacao" required></textarea><br><br>

                <button type="submit">Registrar Resgate</button>
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
